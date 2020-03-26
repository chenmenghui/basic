<?php


namespace app\commands;


use app\common\components\StringTool;
use app\models\VcsPath;
use Yii;
use app\models\VcsRecord;
use yii\console\Controller;
use yii\console\Exception;
use yii\console\ExitCode;


/**
 * This controller for vcs(svn) of company
 * Class VcsController
 * @package app\commands
 */
class VcsController extends Controller
{
    private $filePath = '';
    private $server = '';
    private $data;
    private $row;


    public function actionInsert()
    {
        $target = [
            [
                'server' => '2',
                'path'   => __DIR__ . '/../temp/rc_svn_committed_record.txt',
            ],
            [
                'server' => '1',
                'path'   => __DIR__ . '/../temp/dev2_svn_committed_record.txt',
            ],
        ];

        foreach ($target as $item) {
            $this->filePath = $item['path'];
            $this->server = $item['server'];
            $this->initData();

            foreach ($this->data as $item) {
                $this->row = $item;
                $this->save();
            }
        }


        return ExitCode::OK;
    }

    private function getFromFile()
    {
        $filePath = $this->filePath;
        $handle = fopen($filePath, 'r');
        $block = ''; // Segmented by /^\s*$/
        while (!feof($handle)) {
            $row = fgets($handle, 1024);
            if (preg_match('/^\s*$/', $row)) {
                yield $block;
                $block = '';
            }
            $block .= $row;
        }
        fclose($handle);
    }

    private function initData()
    {
        $data = [];
        $pattern = [
            'revision' => '/Revision: (?<value>\d*)/',
            'author'   => '/Author: (?<value>\S*)/',
            'date'     => '/Date: (?<value>\S*)/',
            'message'  => '/Message:\s(?<value>(\s|\S)*?)----/',
            'path'     => '/(?<value>(Modified|Added|Deleted) :(\s|\S)*)/', // 注意这个是贪婪模式，要不然就匹配不到东西啦
        ];

        $block = $this->getFromFile();

        foreach ($block as $blockItem) {
            $blockRes = [];
            foreach ($pattern as $key => $item) {
                $blockRes[$key] = StringTool::pregGetter($item, $blockItem);
            }
            $data[] = $blockRes;
        }

        $this->data = $data;
    }

    /**
     * todo 把数据库操作已到model中
     * @return int
     * @throws \yii\db\Exception
     */
    private function save()
    {
        $data = $this->row;
        $action = array_flip(VcsPath::transAction());
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $recordModel = new VcsRecord();
            $recordRow = [
                'revision' => $data['revision'],
                'rs'       => StringTool::pregGetter('/REF T(?<value>\d+)/', $data['message']),
                'ticket'   => StringTool::pregGetter('/ITCM(?<value>\d+)/', $data['message']),
                'message'  => $data['message'],
                'server'   => $this->server,
            ];

            $recordModel->setAttributes($recordRow); // 注意，对应model中rules里没有update_time等
            $res = $recordModel->save();
            if (!$res) throw new Exception('Vcs Record Insert Fail');


            if (isset($data['path'])) {
                /**
                 * 这里使用explode("\n", $data['path'])会多算一行
                 */
                preg_match_all('/(?<value>.+)/', $data['path'], $paths);
                $pathList = $paths['value'];
                unset($paths);

                foreach ($pathList as $item) {
                    $pathRow['revision'] = $data['revision'];
                    $pathRow['path'] = StringTool::pregGetter('/: (?<value>.*)$/', $item);
                    $actionTxt = StringTool::pregGetter('/(?<value>(Modified|Added|Deleted))/', $item);
                    $pathRow['action'] = $action[$actionTxt];
                    $pathModel = new VcsPath();
                    $pathModel->setAttributes($pathRow);
                    $res = $pathModel->save();
                    if (!$res) throw new Exception('Vcs Path Insert Fail');
                }
            }
            $transaction->commit();
        } catch (Exception $exception) {
            $transaction->rollBack();
            echo $exception->getMessage();
            return ExitCode::UNSPECIFIED_ERROR;
        }

        return ExitCode::OK;
    }

    public function actionTest()
    {
        $pathRow['revision'] = 'test';
        $pathRow['path'] = 'hello';
        $pathRow['action'] = 'what fuck';
        $pathModel = new VcsPath();
        // $pathModel->setAttributes($pathRow);
        foreach ($pathRow as $key => $item) {
            $pathModel->$key = $item;
        }
        var_dump($pathModel->revision);
        var_dump($pathModel->path);
        var_dump($pathModel->action);
        var_dump($pathModel->create_time);
        var_dump($pathModel->update_time);
        var_dump($pathModel->delete_time);

        var_dump($pathModel->validate()); // 写成$pathModel->validate($pathRow)是错误的。

        var_dump($pathModel->save());
    }
}
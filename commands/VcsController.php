<?php


namespace app\commands;


use app\common\components\StringTool;
use app\models\VcsPath;
use Yii;
use app\models\VcsRecord;
use yii\base\Model;
use yii\console\Controller;
use yii\console\Exception;
use yii\console\ExitCode;
use yii\console\widgets\Table;


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

        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($target as $item) {
                $this->filePath = $item['path'];
                $this->server = $item['server'];
                $this->initData();

                foreach ($this->data as $item) {
                    $this->data = $item;
                    $this->save();
                }

                $transaction->commit();

            }
        } catch (Exception $exception) {
            $transaction->rollBack();
        }
        return ExitCode::OK;
    }

    /**
     * @param $filePath
     */
    private function initData()
    {
        $data = [];
        $pattern = [
            'revision' => '/Revision: (?<value>\d*)/',
            'author'   => '/Author: (?<value>\S*)/',
            'date'     => '/Date: (?<value>\S*)/',
            'message'  => '/Message:\s(?<value>(\s|\S)*?)----/',
            // It affected by EOL, eg 'CRLF' is (\s){4}, 'LF' is (\s){2}
            'path'     => '/(?<value>(Modified|Added|Deleted) :(\s|\S)*?)(\s){2}/',
        ];

        $content = file_get_contents($this->filePath);
        $n = 0;
        foreach ($pattern as $key => $item) {
            preg_match_all($item, $content, $match, PREG_SET_ORDER);
            foreach ($match as $matchItem) {
                $data[$n][$key] = $matchItem['value'];
                $n++;
            }
            unset($match);
            $n = 0;
        }
        $this->data = $data;
    }

    private function save()
    {
        $data = $this->data;

        if (!isset($data['revision'])) {
            return ExitCode::UNSPECIFIED_ERROR;
        }

        $recordModel = new VcsRecord();
        $recordRow = [
            'revision' => $data['revision'],
            'rs'       => StringTool::pregGetter('/REF T(?<value>\d+)/', $data['message']),
            'ticket'   => StringTool::pregGetter('/ITCM(?<value>\d+)/', $data['message']),
            'message'  => $data['message'],
            'server'   => $this->server,
        ];

        $recordModel->setAttributes($recordRow);
        $recordModel->save();

        $pathList = explode("\n", $data['path']);
        foreach ($pathList as $item) {
            $pathRow['revision'] = $data['revision'];
            $pathRow['path'] = $item;
            $pathModel = new VcsPath();
            $pathModel->setAttributes($pathRow);
            $pathModel->save();
        }

        return ExitCode::OK;
    }
}
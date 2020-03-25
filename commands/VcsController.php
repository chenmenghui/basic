<?php


namespace app\commands;


use common\components\StringTool;
use Yii;
use app\models\VcsRecord;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\console\widgets\Table;


/**
 * This controller for vcs(svn) of company
 * Class VcsController
 * @package app\commands
 */
class VcsController extends Controller
{
    public function actionIndex()
    {
        echo Table::widget([
            'headers' => ['Project', 'Status', 'Participant'],
            'rows'    => [
                ['Yii', 'OK', '@samdark'],
                ['Yii', 'OK', '@cebe'],
            ],
        ]);
        return ExitCode::OK;
    }

    public function actionInsert()
    {
        $filePath = [
            __DIR__ . '/../temp/rc_svn_committed_record.txt',
        ];
        foreach ($filePath as $item) {
            $this->getDataFromFile($item);
        }
    }

    /**
     * @param $filePath
     */
    private function getDataFromFile($filePath)
    {
        $result = [];
        $pattern = [
            'revision' => '/Revision: (?<value>\d*)/',
            'author'   => '/Author: (?<value>\S*)/',
            'date'     => '/Date: (?<value>\S*)/',
            // 'message'  => '/Message:\n(?<value>(\s|\S)*?)----/',
            // 'path'     => '/(?<value>(Modified|Added|Deleted) :(\s|\S)*?)\n\n/',
            'message'  => '/Message:\n(?<value>(.|(\r\n)|\r|\n)*?)----/',
            'path'     => '/(?<value>(Modified|Added|Deleted) :(.|\n|\r|\r\n)*?)\n\n/',
        ];

        $content = file_get_contents($filePath);
        $n = 0;
        foreach ($pattern as $key => $item) {
            preg_match_all($item, $content, $match, PREG_SET_ORDER);
            foreach ($match as $matchItem) {
                $result[$n][$key] = $matchItem['value'];
                $n++;
            }
            unset($match);
            $n = 0;
        }

        $this->save($result);
    }

    private function save($result)
    {
        $model = new VcsRecord();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //
        // }
        // $model->load();

        foreach ($result as $item) {
            print_r($item);
            $recordRow = [
                'revision' => $item['revision'],
                'rs'       => StringTool::pregGetter('/REF T(?<value>\d+)/', $item['message']),
                'ticket'   => StringTool::pregGetter('/ITCM(?<value>\d+)/', $item['message']),
            ];
            print_r($recordRow);die;
        }
    }
}
<?php


namespace app\commands;


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
            $this->exportFile($item);
        }
    }

    private function exportFile($filePath)
    {
        $result = [];
        $pattern = [
            'revision' => '/Revision: (?<value>\d*)/',
            'author'   => '/Author: (?<value>\S*)/',
            'date'     => '/Date: (?<value>\S*)/',
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
    }
}
<?php


namespace app\commands;


use app\models\Test;
use common\components\StringTool;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\console\widgets\Table;

class TestController extends Controller
{
    public function actionFilter()
    {
        $str = <<<S
EA RET - Maintenance Schedule Planning (TBM) Development
ITCM813723
REF T11791
S;
        echo StringTool::pregGetter('/REF T(?<value>\d+)/', $str);
    }

    public function actionWidget()
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
}
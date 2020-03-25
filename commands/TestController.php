<?php


namespace app\commands;


use common\components\StringTool;
use yii\console\Controller;

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
}
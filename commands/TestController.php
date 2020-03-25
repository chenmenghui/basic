<?php


namespace app\commands;


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
        preg_match('/REF T(?<value>\d+)/', $str, $match);
        print_r($match['value']);

    }
}
<?php


namespace app\commands;


use app\common\components\StringTool;
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

    public function actionYield1()
    {
        function createRange($number)
        {
            $data = [];
            for ($i = 0; $i < $number; $i++) {
                $data[] = time();
            }
            return $data;
        }

        $data = createRange(10);
        foreach ($data as $value) {
            sleep(1);//这里停顿1秒，我们后续有用
            echo $value . PHP_EOL;
        }
    }

    public function actionYield2()
    {
        function createRange($number)
        {
            for ($i = 0; $i < $number; $i++) {
                yield time();
            }
        }

        $data = createRange(10);
        foreach ($data as $value) {
            sleep(1);//这里停顿1秒，我们后续有用
            echo $value . PHP_EOL;
        }
    }
    
    public function actionFile()
    {
        $readFile = function () {
            $handle = fopen(__DIR__ . '/../temp/rc_svn_committed_record.txt', 'r');
            while (!feof($handle)) {
                $message = '';
                $row = fgets($handle, 1024);
                if (preg_match('/^\s*$/', $row)) {
                    echo $message;
                    return $message;
                }
                $message .= $row;
            }
            fclose($handle);
        };

        $messages = $readFile();
        print_r($messages);
    }
}
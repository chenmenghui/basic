<?php

namespace app\common\components;


class StringTool
{
    /**
     * Return the part of string by preg
     * @param string $pattern e.g. '/REF T(?<value>\d+)/'
     * @param $subject
     * @param string $part
     * @return mixed
     */
    public static function pregGetter($pattern, $subject, $part = 'value')
    {
        preg_match($pattern, $subject, $match);
        return $match[$part] ?? '';
    }

}
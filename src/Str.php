<?php

namespace Ting\Aop;

class Str extends \think\helper\Str
{
    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     * @return string
     */
    public static function replaceFirst($search, $replace, $subject)
    {
        $search = (string)$search;

        if ($search === '') {
            return $subject;
        }

        $position = strpos($subject, $search);

        if ($position !== false) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }
}
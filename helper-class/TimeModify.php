<?php

class TimeModify
{
    public static function time_ago($time)
    {
        $timestamp = strtotime($time);
        $diff = time() - $timestamp;
        if($diff < 60) {
            return 'همین الان';
            exit;
        }
        $time_rules = [
            12 * 30 * 24 * 60 * 60 => 'سال',
            30 * 24 * 60 * 60 => 'ماه',
            24 * 60 * 60 => 'روز',
            60 * 60 => 'ساعت',
            60 => 'دقیقه',
        ];
        foreach ($time_rules as $secs => $str) {
            $final_time = round($diff / $secs);
            if ($final_time >= 1) {
                return $final_time . ' ' . $str . ' پیش';
            }
        }
    }
}

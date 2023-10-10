<?php

class ReadEstimateTime {
    public static function dwt_read_estimate_time($content, string $wpm = '300'): string {
        $clean_content = strip_tags(strip_shortcodes($content));
        $word_count = str_word_count($clean_content);
        return ceil($word_count / $wpm);
    }
}
<?php

namespace App\Helpers;

class TextHelper
{
    public static function highlight($text, $search)
    {
        if (!$search) {
            return $text;
        }
        return preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="highlight">$1</span>', $text);
    }
}

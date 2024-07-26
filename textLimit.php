<?php

namespace MyNamespace;

trait LimitText
{
    public static function limit_text($text, $limit = 100, $ellipsis = true)
    {
        if (strlen($text) <= $limit) {
            return $text;
        }

        $truncated = substr($text, 0, $limit);

        if ($ellipsis) {
            $truncated .= '...';
        }

        return $truncated;
    }
}

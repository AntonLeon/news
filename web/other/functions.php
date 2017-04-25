<?php

function crop_str_word($text, $max_words)
{
    $words = explode(' ',$text);

    if(count($words) > $max_words && $max_words > 0)
    {
        $text = implode(' ',array_slice($words, 0, $max_words)).'...';
    }

    return $text;
}


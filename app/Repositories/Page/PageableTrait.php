<?php

namespace App\Repositories\Page;

trait PageableTrait
{
    /**
     * @param $text
     * @param $size
     * @return string
     */
    public function trim($text, $size)
    {
        return mb_strimwidth(strip_tags($text), 0, $size, "...");
    }
}
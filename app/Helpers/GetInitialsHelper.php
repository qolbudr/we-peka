<?php

namespace App\Helpers;

class GetInitialsHelper
{
    public static function getInitials($name)
    {
        $name = trim($name);
        $parts = explode(' ', $name);

        if (count($parts) === 1) {
            return mb_strtoupper(mb_substr($name, 0, 2, 'UTF-8'), 'UTF-8');
        }

        $first = mb_strtoupper(mb_substr($parts[0], 0, 1, 'UTF-8'), 'UTF-8');
        $last = mb_strtoupper(mb_substr($parts[count($parts) - 1], 0, 1, 'UTF-8'), 'UTF-8');

        return $first . $last;
    }
}

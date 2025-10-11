<?php

namespace App\Helpers;

class GetInitialsHelper
{
    public static function getInitials($name)
    {
        $parts = explode(' ', trim($name));
        $first = strtoupper(substr($parts[0] ?? '', 0, 1));
        $last = strtoupper(substr(end($parts) ?? '', 0, 1));
        return $first . $last;
    }
}

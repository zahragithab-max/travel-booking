<?php

namespace App\Helpers;

use Morilog\Jalali\Jalalian;

class JalaliHelper
{
    public static function date($date)
    {
        if (!$date) {
            return '-';
        }

        return Jalalian::fromDateTime($date)->format('Y/m/d');
    }

    public static function toGregorian($jalaliDate)
{
    if (!$jalaliDate) {
        return null;
    }

    return Jalalian::fromFormat('Y/m/d', $jalaliDate)
        ->toCarbon()
        ->format('Y-m-d');
}
}
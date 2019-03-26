<?php

namespace App\Helpers;
use Carbon\Carbon;

class DateHelper
{

    public function getCreatedAtAttribute($date)
    {
        return $this->getDateFormated($date);
    }

    public function getUpdatedAtAttribute($date)
    {
        return $this->getDateFormated($date);
    }

    public static function getDateFormated($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }



}
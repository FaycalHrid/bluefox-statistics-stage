<?php
/**
 * Created by PhpStorm.
 * User: Sbalkaid
 * Date: 25/01/2019
 * Time: 10:21
 */

namespace App\Services;


use App\Models\PorteurSettings;

class PorteurSettingService
{
    public static function getPorteurSettings()
    {

        return PorteurSettings::all()[0];

    }
}
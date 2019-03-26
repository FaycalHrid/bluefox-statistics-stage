<?php
/**
 * Created by PhpStorm.
 * User: Sbalkaid
 * Date: 16/01/2019
 * Time: 14:36
 */

namespace App\Helpers;


use App\Models\LotCampaign;

class LotCampaignHelper
{
    public static function getLotByNumLot($numLot)
    {
        return LotCampaign::where('numLot', $numLot);
    }
}
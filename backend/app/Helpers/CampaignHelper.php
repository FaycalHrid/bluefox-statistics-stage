<?php

namespace App\Helpers;


use App\Models\Campaign;
use App\Models\LotCampaign;

class CampaignHelper
{

    /**
     * @author Soufiane BALKAID
     * @desc
     * @param $plainpasswd
     * @return string
     */
    public static function getFirstCampaign($idChain = false)
    {

        // recuperer tous les campaigns du premier lot
        $tablecampaigns = null;
        $idLot = LotCampaignHelper::getLotByNumLot(1)->first()->id;
        if (!($tablecampaigns = Campaign::where(['idLotCampaign' => $idLot, 'idChain' => $idChain])->get())) {
            return false;
        }
        $first = 0;
        $i = 0;

        // recuperer la campaign sans predecesseur

        while ($i != count($tablecampaigns) && $first == 0) {
            $first = 1;
            for ($j = 0; $j < count($tablecampaigns); $j++) {
                if ($tablecampaigns[$i]['id'] == $tablecampaigns[$j]['idNextCampaign'])
                    $first = 0;
            }
            $i++;
        }
        return $tablecampaigns[$i - 1];
    }
}
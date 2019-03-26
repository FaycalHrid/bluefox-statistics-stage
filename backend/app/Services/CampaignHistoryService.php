<?php
/**
 * Created by PhpStorm.
 * User: Sbalkaid
 * Date: 25/01/2019
 * Time: 10:27
 */

namespace App\Services;


use App\Helpers\CampaignHelper;
use App\Models\Campaign;
use App\Models\CampaignHistory;
use App\Models\Chain;

class CampaignHistoryService
{
    /*
       * Tratement for create new campaignHisotry(inital chain) for fresh lead
       * @param string Email
       */

    public static function createCampaignHistoryInitialChain($idUser)
    {
        $idCampaign = Campaign::where('ref', 'init_chain')->first();

        $idSubcampaign = $idCampaign->getSubCampaign()->get()[0]->id;

        $campaignHistroyInitChain = new CampaignHistory(['initialShootDate' => date("Y-m-d", time() - 86400), 'modifiedShootDate' => date("Y-m-d", time() - 86400),
            'idUser' => $idUser, 'idSubCampaign' => $idSubcampaign, 'groupPrice' => 1, 'behaviorHour' => 11, 'status' => 0]);

        $campaignHistroyInitChain->save();
    }

    /*
    * Tratement for create new campaignHisotry(inital chain) for fresh lead
    * @param string Email
    */

    public function createCampaignHistoryMonoOffre($idUser)
    {
        $idchain = Chain::where('label', 'monoOffre')->first()->id;

        $idfirstCamapginMonoOffre = CampaignHelper::getFirstCampaign($idchain)->getSubCampaign()->get()[0]->id;

        $campaignHistroyMonoOffre = new CampaignHistory(['initialShootDate' => date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')), 'modifiedShootDate' => date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')),
            'idUser' => $idUser, 'idSubCampaign' => $idfirstCamapginMonoOffre, 'groupPrice' => 1, 'behaviorHour' => 11, 'status' => 0]);

        $campaignHistroyMonoOffre->save();

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Sbalkaid
 * Date: 25/01/2019
 * Time: 10:24
 */

namespace App\Services;


use App\Models\AffiliateCampaign;
use App\Models\LeadAffiliatePlatform;
use App\Models\Site;
use Session;

class LeadAffiliatePlatformService
{
    public static function newLeadAffiliatePlatfromViaApi($idUser)
    {
        $Site = Session::get('siteConfig')['lang'];

        $idSite = Site::where('code', $Site)->first()->id;

        $idAffiliateCampaign = AffiliateCampaign::where('label', 'sitePromo')->first()->id;

        $leadAffiliatePlatform = new LeadAffiliatePlatform(['idUser' => $idUser, 'idSite' => $idSite, 'idAffiliateCampaign' => $idAffiliateCampaign,
            'creationDate' => date('Y-m-d H:i:s'), 'doubleOptin' => 1, 'AffSource' => 'API']);
        $leadAffiliatePlatform->save();

    }
}
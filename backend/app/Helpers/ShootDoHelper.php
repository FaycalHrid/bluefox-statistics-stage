<?php
/**
 * Created by PhpStorm.
 * User: Sbalkaid
 * Date: 25/01/2019
 * Time: 10:29
 */

namespace App\Helpers;


use Session;

class ShootDoHelper
{
    public static function shootEmailDO($chain, $email)
    {
        $siteConfig = Session::get('siteConfig');
        switch ($chain) {
            case 'initChain':
                $account = 'account_1';
                break;
            case 'monoOffre':
                $account = 'account_2';
                break;
            default :
                break;
        }
        $dns = $siteConfig['profile_GA'][$account]['sender']['dns'];
        $url = "https://dev." . $dns . "/SendDoubleOptin/SendDoubleOptinEmail?emailUser=$email&chain=$chain";

        $Curl = new CurlHelper();
        $Curl->setTimeout(30000);
        return $Curl->sendRequest($url);
    }
}
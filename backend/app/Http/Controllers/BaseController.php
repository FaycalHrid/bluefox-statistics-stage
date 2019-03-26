<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response;
use Session;


class BaseController extends Controller{


    public function sendResponse($result, $message, $code = 200){
        $response = [
            'success' => true,
            'result'    => $result,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }

    public function sendError($error, $errorMessages = [], $code = 404){
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages))
            $response['data'] = $errorMessages;
        return response()->json($response, $code);
    }

    public static function loadSiteConfig($site){
        if(!blank($site) ){
            config()->set('database.default', $site);
            Session::put('siteConfig', config()->get('site.'.$site));
        }
        else{
            config()->set('database.default', 'id_bluefox');
            Session::put('siteConfig', config()->get('site.id_bluefox'));
        }
    }

    public function getCurentSiteFromAuthorization(Request $request){
        $authorization = $request->header('Authorization');
        $config = config()->get('site');
        $currentSite=false;
        foreach ($config as $site => $confSite){
            if($confSite['api_key'] == $authorization){
                $currentSite = $site;
                break;
            }
        }
        return $currentSite;
    }
}
<?php

namespace App\Http\Controllers;

use App\Helpers\ShootDoHelper;
use App\Services\AccountHistoryService;
use App\Services\CampaignHistoryService;
use App\Services\LeadAffiliatePlatformService;
use App\Services\PorteurSettingService;
use App\Services\SupplierService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class LeadController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $site = $this->getCurentSiteFromAuthorization($request);
        if (!$site) {
            return $this->sendError(
                'Unauthorized.',
                array(),
                Response::HTTP_UNAUTHORIZED
            );
        } else {
            self::loadSiteConfig($site);

            $data = $request->only('email', 'firstname', 'lastname', 'birthday', 'gender', 'campaignName');
            if (!isset($data['email']) || !isset($data['firstname']) || !isset($data['campaignName'])) {
                return $this->sendError(
                    'mandatory fields are missing',
                    array(),
                    Response::HTTP_ACCEPTED
                );
            }
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return $this->sendError(
                    'bad email format',
                    array(),
                    Response::HTTP_ACCEPTED
                );
            }

            $user = UserService::createFreshLead($data['email'], (isset($data['gender'])) ? $data['gender'] : 1, $data['firstname'],
                (isset($data['birthday'])) ? $data['birthday'] : '1979-01-01', $data['campaignName']);
            $idUser = json_decode($user)->idUser;
            if (json_decode($user)->state) {
                SupplierService::create($data['campaignName'], 'AutomaticBatching');
                LeadAffiliatePlatformService::newLeadAffiliatePlatfromViaApi($idUser);
                CampaignHistoryService::createCampaignHistoryInitialChain($idUser);
                AccountHistoryService::create(PorteurSettingService::getPorteurSettings()->profieFreshLead, $idUser);
                ShootDoHelper::shootEmailDO('initChain', $data['email']);
            } else {
                return $this->sendResponse(
                    array('id' => $idUser),
                    'already exists',
                    Response::HTTP_ACCEPTED
                );

            }
            return $this->sendResponse(
                array('id' => $idUser),
                'Lead created successfully',
                Response::HTTP_CREATED
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

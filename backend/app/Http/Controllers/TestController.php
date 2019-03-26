<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class TestController extends BaseController
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hello()
    {
        echo "hello";
        $site = 'id_bluefox';
        self::loadSiteConfig($site);
        $user = User::where('email','saad.hdidou.cap@gmail.com')->get();
        print_r($user);
    }

    public function addUser(Request $request)
    {
        $site = $this->getCurentSiteFromAuthorization($request);
        if(!$site){
            return $this->sendError(
                'Unauthorized.',
                array(),
                Response::HTTP_UNAUTHORIZED
            );
        }
        else{
            self::loadSiteConfig($site);

            $data = $request->only('email', 'firstname', 'lastname', 'birthday', 'gender', 'supplier');
            if(!isset($data['email']) || !isset($data['firstname']) || !isset($data['supplier'])){
                return $this->sendResponse(
                    array(),
                    'mandatory fields are missing',
                    Response::HTTP_FORBIDDEN
                );
            }
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                return $this->sendResponse(
                    array(),
                    'bad email format',
                    Response::HTTP_FORBIDDEN
                );
            }
            //@bidra: tu trouvera tous les champs necessaire pour la creation du nouveau utilisateur dans la variable $data

           $idUser= UserController::createFreshLead($data['email'] ,(isset($data['gender']))?$data['gender']:1,$data['firstname'],
                (isset($data['birthday']))?$data['birthday']:'1979-01-01',$data['supplier']);

            if($idUser) {
                SuppliersController::create($data['supplier'], 'AutomaticBatching');
                LeadAffiliatePlatformController::newLeadAffiliatePlatfromViaApi($idUser);
                CampaignHistoryController::createCampaignHistoryInitialChain($idUser);
                AccountHistoryController::create(PorteurSettingController::getPorteurSettings()->profieFreshLead, $idUser);
                UserController::shootEmailDO('initChain', $data['email']);
            }else{
                return $this->sendResponse(
                    array(),
                    'already exists',
                    Response::HTTP_ACCEPTED
                );

            }
            return $this->sendResponse(
                array(),
                'User created successfully',
                Response::HTTP_ACCEPTED
            );
        }
    }
}

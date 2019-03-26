<?php

namespace App\Http\Controllers;

use App\Models\Chain;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ChainController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $site = $request->only('site');
            self::loadSiteConfig($site['site']);
            if($invoices = Chain::where('hasProduct','1')->get()){
                return $this->sendResponse(
                    $invoices->toArray(),
                    'Chains retrieved successfully.',
                    Response::HTTP_ACCEPTED
                );
            }
        }catch (\Exception $e){
            //if $e is an HttpException
            if ($e instanceof HttpException ) {
                //get the status code
                $status = $e->getStatusCode() ;
                //if status code is 501 redirect to custom view
                if( $status == 502 )
                    return $this->sendResponse(
                        array(),
                        'bad gateway.',
                        Response::HTTP_BAD_GATEWAY
                    );
                if( $status == 401 )
                    return $this->sendResponse(
                        array(),
                        'Unauthorized.',
                        Response::HTTP_UNAUTHORIZED
                    );
            }
        }
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
}

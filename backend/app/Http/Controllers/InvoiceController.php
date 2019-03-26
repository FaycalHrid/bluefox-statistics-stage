<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Models\Chain;
use App\Models\Invoice;
use App\Http\Controllers\BaseController as BaseController;
use App\models\Recordinvoice;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;
use function MongoDB\BSON\toJSON;
use Session;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class InvoiceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($search = $request->all()) {
            $site = $request->only('site');
            self::loadSiteConfig($site['site']);
            $query = Invoice::select(
                'user.id as userId',
                'user.civility as civility',
                'user.firstName as firstName',
                'user.lastName as lastName',
                'invoice.id as idInvoice',
                'invoice.phone as phone',
                'invoice.modificationDate as modificationDate',
                'invoice.refInterne as refInterne',
                'invoice.emailUser as emailUser',
                'invoice.address as addressInvoice',
                'invoice.province as province',
                'invoice.city as city',
                'invoice.district as district',
                'invoice.zipCode as zipCode',
                'invoice.commentary as commentary',
                'invoice.totalAmount as totalAmount',
                'invoice.deliveryStatus as deliveryStatus',
                'invoice.deliveryDate as deliveryDate',
                'chain.description as chainDescription'
                )
            ->join('campaign', 'campaign.ref', '=', 'invoice.campaign')
                ->join('chain', 'campaign.idChain', '=', 'chain.id')
                ->join('user', 'user.email', '=', 'invoice.emailUser')
                ->where('invoice.invoiceStatus', Invoice::INVOICE_PAYED)
                ->where('user.test', 0)
                ->orderBy('invoice.modificationDate', 'DESC');
            $fromDate = date('Y-m-01');
            $toDate = date('Y-m-d');
            if(isset($search['from']) && isset($search['to']) && $search['from']!='' && $search['to']!='')
                $query->whereBetween('invoice.modificationDate', array($search['from'].' 00:00:00', $search['to'].' 23:59:59'));
            else
                $query->whereBetween('invoice.modificationDate', array($fromDate.' 00:00:00', $toDate.' 23:59:59'));

            if(isset($search['email']) && $search['email']!= "" && $search['email']!= "null"){
                $query->where('invoice.emailUser', $search['email']);
            }


            if(isset($search['chain']) && $search['chain'] != "" && $search['chain'] != 'null' && $search['chain'] != 'allChains')
                $query->where('chain.label', $search['chain']);

            if (isset($search['status']) && $search['status'] != 3 && $search['status'] != "" && $search['status'] != "null")
                $query->where('invoice.deliveryStatus', $search['status']);


            try {
                if ($invoices = $query->get()) {
                    $results = array();
                    foreach ($invoices as $element){
                        $result['userId'] = $element->userId;
                        $result['civility'] = $element->civility;
                        $result['firstName'] = $element->firstName;
                        $result['lastName'] = $element->lastName;
                        $result['idInvoice'] = $element->idInvoice;
                        $result['phone'] = $element->phone;
                        $result['modificationDate'] = $element->modificationDate;
                        $result['refInterne'] = $element->refInterne;
                        $result['emailUser'] = $element->emailUser;
                        $result['addressInvoice'] = $element->addressInvoice ;
                        $result['province'] = $element->province;
                        $result['city'] = $element->city;
                        $result['district'] = $element->district;
                        $result['zipCode'] = $element->zipCode;
                        $result['commentary'] = $element->commentary;
                        $result['totalAmount'] = $element->totalAmount;
                        $result['deliveryStatus'] = $element->deliveryStatus;
                        $result['deliveryDate'] = $element->deliveryDate;
                        $result['chainDescription'] = $element->chainDescription;
                        $query = Recordinvoice::select('product.description as productDescription',
                                                        'product.descriptionPP as descriptionPP',
                                                        'product.nbMercury as nbMercury',
                                                        'recordinvoice.qty as qty',
                                                        'recordinvoice.refProduct as refProduct',
                                                        'recordinvoice.priceATI as priceATI'
                        )
                        ->join('product', 'product.ref', '=', 'recordinvoice.refProduct')
                            ->where('recordinvoice.idInvoice', $element->idInvoice);

                        if($recordInvoices = $query->get()){
                            $records = array();
                            foreach ($recordInvoices as $record){
                                $records[] = array(
                                    'productDescription' => $record->productDescription,
                                     'descriptionPP' => $record->descriptionPP,
                                     'nbMercury' => $record->nbMercury,
                                     'qty' => $record->qty,
                                     'refProduct' => $record->refProduct,
                                     'priceATI' => $record->priceATI
                                );
                            }
                            $result['product'] = $records;
                        }
                        $results[] = $result;



                    }

                    return $this->sendResponse(
                        $results,
                        'Invoice retrieved successfully.',
                        Response::HTTP_ACCEPTED
                    );
                }

            } catch (\Exception $e) {
                //if $e is an HttpException
                if ($e instanceof HttpException) {
                    //get the status code
                    $status = $e->getStatusCode();
                    //if status code is 501 redirect to custom view
                    if ($status == 502)
                        return $this->sendResponse(
                            array(),
                            'bad gateway.',
                            Response::HTTP_BAD_GATEWAY
                        );
                    if ($status == 401)
                        return $this->sendResponse(
                            array(),
                            'Unauthorized.',
                            Response::HTTP_UNAUTHORIZED
                        );
                }
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function submit($id, Request $request){
        $site = $request->only('site');
        self::loadSiteConfig($site['site']);
           $invoice = Invoice::find($id);
        $invoice->deliveryStatus = 1;
        $invoice->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        if (is_null($invoice = Invoice::find($id))) {
            return $this->sendError(
                'Sorry, invoice with id ' . $id . ' cannot be found.',
                null,
                Response::HTTP_NOT_FOUND
            );
        }
        return $this->sendResponse(
            $invoice->toArray(),
            'Invoice retrieved successfully.',
            Response::HTTP_CREATED
        );
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

    public function uploadFile(Request $request)
    {
        try{
            $site = $request->only('site');
            self::loadSiteConfig($site['site']);
            $siteConfig = Session::get('siteConfig');
            $url = $siteConfig['profile_GA']['account_1']['sender']['dns'];
            if(isset($_FILES['fileKey']['tmp_name'])) {
                $handle = fopen($_FILES['fileKey']['tmp_name'], "r");
                $array = array();
                if ($handle) {
                    while (($line = fgets($handle)) !== false) {
                        // elliminer les retours a la ligne
                        $line = str_replace("\n", '', $line);
                        $line = str_replace("\r", '', $line);
                        $array[] = $line;
                    }
                    fclose($handle);
                }
                //curl
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://direct.".$url."/stc/SendDeliveryEmail?listRefInterne=".implode(',',$array),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_TIMEOUT => 30000,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        // Set Here Your Requesred Headers
                        'Content-Type: application/json',
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                if ($err) {
                    return response()->json([
                        'success' => false,
                        'message' => "cURL Error #:" . $err
                    ]);
                } else {
                    $resp = json_decode($response);
                    if($resp->success){
                        return response()->json([
                            'success' => true,
                            'message' => 'invoice validated for: '.implode(", ",$array)
                        ]);
                    }
                    else
                    {
                        return response()->json([
                            'success' => false,
                            'message' => $resp->message
                        ]);
                    }
                }
            }
        }catch (\Exception $e) {
            //if $e is an HttpException
            if ($e instanceof HttpException) {
                //get the status code
                $status = $e->getStatusCode();
                //if status code is 501 redirect to custom view
                if ($status == 502)
                    return $this->sendResponse(
                        array(),
                        'bad gateway.',
                        Response::HTTP_BAD_GATEWAY
                    );
                if ($status == 401)
                    return $this->sendResponse(
                        array(),
                        'Unauthorized.',
                        Response::HTTP_UNAUTHORIZED
                    );
            }
        }

    }
}

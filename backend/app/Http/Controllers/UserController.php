<?php

namespace App\Http\Controllers;

use App\Helpers\CryptHelper;
use App\Http\Requests\RegisterAuthRequest;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends BaseController
{
    public $loginAfterSignUp = true;


    public function register(RegisterAuthRequest $request)
    {
        $user = new User();

        $user->civility = $request->civility;
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        if (isset($request->birthday) && $request->birthday != '' && $request->birthday != 'null')
            $user->birthday = $request->birthday;
        else
            $user->birthday = data('1970-01-01');
        $user->email = $request->email;
        $user->mailCrypte = md5($request->email);
        $user->address = $request->address;
        $user->province = $request->province;
        $user->district = $request->district;
        $user->addressComp = $request->addressComp;
        $user->zipCode = $request->zipCode;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->site = $request->site;
        $user->test = 0;
        $user->phone = $request->phone;
        $user->creationDate = $request->creationDate;
        $user->updateTS = $request->updateTS;
        $user->score = $request->score;
        $user->optinPartner = $request->optinPartner;
        $user->optin = $request->optin;
        $user->visibleDesinscrire = $request->visibleDesinscrire;
        $user->compteEMVactif = 'id_bluefox';
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->savComments = null;
        $user->AuthorizedIP = null;
        $user->promo = null;
        if (isset($request->validPhoneNumber) && $request->validPhoneNumber != '' && $request->validPhoneNumber != 'null')
            $user->validPhoneNumber = $request->validPhoneNumber;
        else
            $user->validPhoneNumber = -1;
        $user->dateValidPhone = null;
        $user->indiceImplication = 0;
        $user->totalIndice = 0;
        $user->totalIndice = 0;
        $user->dateGpChange = null;
        $user->bannReason = null;
        $user->countSoftBounce = null;
        $user->intialDate = null;
        $user->dateBanning = null;
        $user->origin = null;
        $user->reactivationDate = null;
        $user->quarantaine = null;
        $user->isMiniAnaconda = 0;
        $user->activationDate = null;
        $user->splitGp = 1;
        $user->positionGraph = null;
        $user->oneShoot = null;
        $user->dateReprise = null;
        $user->versionReleve = 1;
        $user->profileAccount = 'GA';

        return response()->json([
            array_merge($user->toArray()),
            'success' => true,
            'message' => 'Check your email or password',
        ], 200);
        die;

        try {
            if ($user->save()) {
                if ($this->loginAfterSignUp) {
                    return $this->login($request);
                }
                return response()->json([
                    'success' => true,
                    'data' => $user
                ], 200);
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

    public function login(Request $request)
    {

        $input = $request->only('email', 'password');
        $site = $request->only('site');
        self::loadSiteConfig($site['site']);

        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Check your email or password',
            ], 401);
        }
        $data['token'] = $jwt_token;
        $data['success'] = true;
        if ($currentUser = User::loadByUsername($input['email'])) {
            $siteConfig = Session::get('siteConfig');
            $data['user']['email'] = $currentUser->email;
            $data['user']['firstName'] = $currentUser->firstName;
            $data['user']['lastName'] = $currentUser->lastName;
            $data['currentSite']['site'] = $siteConfig['site'];
            $data['currentSite']['title'] = $siteConfig['title'];
            $data['currentSite']['lang'] = $siteConfig['lang'];
        }
        return response()->json($data);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::paginate();
        $users = User::all();
        return $this->sendResponse(
            $users->toArray(),
            'Users retrieved successfully.',
            Response::HTTP_ACCEPTED
        );
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
        $user = new User();

        if (isset($request->civility) && $request->civility != '' && $request->civility != 'null')
            $user->civility = $request->civility;
        else
            $user->civility = 1;
        if (isset($request->firstName) && $request->firstName != '' && $request->firstName != 'null')
            $user->firstName = $request->firstName;
        else
            return response()->json([
                'success' => false,
                'message' => 'thanks, check your first name',
            ], 200);
        if (isset($request->lastName) && $request->lastName != '' && $request->lastName != 'null')
            $user->lastName = $request->lastName;
        else
            return response()->json([
                'success' => false,
                'message' => 'thanks, check your last name',
            ], 200);
        if (isset($request->birthday) && $request->birthday != '' && $request->birthday != 'null')
            $user->birthday = $request->birthday;
        else
            $user->birthday = '1970-01-01';
        if (isset($request->email) && $request->email != '' && $request->email != 'null')
            $user->email = $request->email;
        else
            return response()->json([
                'success' => false,
                'message' => 'thanks, check your email',
            ], 200);
        $user->mailCrypte = md5($request->email);
        $user->address = $request->address;
        $user->province = $request->province;
        $user->district = $request->district;
        $user->addressComp = $request->addressComp;
        $user->zipCode = $request->zipCode;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->site = $request->site;
        $user->test = 0;
        $user->phone = $request->phone;
        $user->creationDate = $request->creationDate;
        $user->updateTS = $request->updateTS;
        $user->score = $request->score;
        $user->optinPartner = $request->optinPartner;
        $user->optin = $request->optin;
        $user->visibleDesinscrire = $request->visibleDesinscrire;
        $user->compteEMVactif = 'id_bluefox';
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->savComments = null;
        $user->AuthorizedIP = null;
        $user->promo = null;
        if (isset($request->validPhoneNumber) && $request->validPhoneNumber != '' && $request->validPhoneNumber != 'null')
            $user->validPhoneNumber = $request->validPhoneNumber;
        else
            $user->validPhoneNumber = -1;
        $user->dateValidPhone = null;
        $user->indiceImplication = 0;
        $user->totalIndice = 0;
        $user->totalIndice = 0;
        $user->dateGpChange = null;
        $user->bannReason = null;
        $user->countSoftBounce = null;
        $user->intialDate = null;
        $user->dateBanning = null;
        $user->origin = null;
        $user->reactivationDate = null;
        $user->quarantaine = null;
        $user->isMiniAnaconda = 0;
        $user->activationDate = null;
        $user->splitGp = 1;
        $user->positionGraph = null;
        $user->oneShoot = null;
        $user->dateReprise = null;
        $user->versionReleve = 1;
        $user->profileAccount = 'GA';


        try {
            $user->save();
        } catch (\Exception $e) {

            //if $e is an HttpException
            if ($e instanceof HttpException) {
                //get the status code
                $status = $e->getStatusCode();

                return $this->sendResponse(
                    array(),
                    'Unauthorized.',
                    $status
                );
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->sendError(
                'Sorry, user with id ' . $id . ' cannot be found.',
                null,
                Response::HTTP_NOT_FOUND
            );
        }
        return $this->sendResponse(
            $user->toArray(),
            'User retrieved successfully.',
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

    public function newUser(Request $request)
    {
        $data = $request->all();
        if (!isset($data['username']))
            $data['username'] = 'user1';
        if (!isset($data['email']))
            $data['email'] = '$email';
        if (!isset($data['password']))
            $data['password'] = CryptHelper::generatePassword(16);

        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];

        echo '<div>username: <code>' . $username . '</code></div>';
        echo '<div>password: <code>' . $password . '</code></div>';
        echo '<div>email: <code>' . $email . '</code></div>';
        echo '<div>password bcrypt: <code>' . bcrypt($password) . '</code></div>';

        // Encrypt password
        $encrypted_password = CryptHelper::crypt_apr1_md5($password);

        // Print line to be added to .htpasswd file
        echo '<div class="apr_md5_algo">APR1 MD5 Algorithm htaccess:  ';
        echo '<code>' . $username . ':' . $encrypted_password . '</code></div>';

        // Encrypt password
        $encrypted_password = crypt($password, base64_encode($password));

        // Print line to be added to .htpasswd file
        echo '<div class="crypt_algo">Crypt Algorithm:  ';
        echo '<code>' . $username . ':' . $encrypted_password . '</code></div>';

    }


}

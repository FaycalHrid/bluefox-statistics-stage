<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property int $id
 * @property string $civility
 * @property string $firstName
 * @property string $lastName
 * @property string $birthday
 * @property string $email
 * @property string $mailCrypte
 * @property string $address
 * @property string $province
 * @property string $district
 * @property string $addressComp
 * @property string $zipCode
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $site
 * @property boolean $test
 * @property string $phone
 * @property string $creationDate
 * @property string $updateTS
 * @property int $score
 * @property boolean $optinPartner
 * @property boolean $optin
 * @property int $visibleDesinscrire
 * @property string $compteEMVactif
 * @property string $password
 * @property boolean $status
 * @property boolean $savToMonitor
 * @property string $savComments
 * @property string $AuthorizedIP
 * @property string $promo
 * @property boolean $validPhoneNumber
 * @property string $dateValidPhone
 * @property integer $indiceImplication
 * @property integer $totalIndice
 * @property string $dateGpChange
 * @property boolean $bannReason
 * @property boolean $countSoftBounce
 * @property string $intialDate
 * @property string $dateBanning
 * @property boolean $origin
 * @property string $reactivationDate
 * @property boolean $quarantaine
 * @property boolean $isMiniAnaconda
 * @property string $activationDate
 * @property integer $splitGp
 * @property int $positionGraph
 * @property boolean $oneShoot
 * @property string $refSupplier
 * @property string $dateReprise
 * @property boolean $versionReleve
 * @property string $profileAccount
 */
class User extends Authenticatable implements JWTSubject
{
    protected $table = 'user';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['civility', 'firstName', 'lastName', 'birthday', 'email', 'mailCrypte', 'address', 'province', 'district', 'addressComp', 'zipCode', 'city', 'state', 'country', 'site', 'test', 'phone', 'creationDate', 'updateTS', 'score', 'optinPartner', 'optin', 'visibleDesinscrire', 'compteEMVactif', 'password', 'status', 'savToMonitor', 'savComments', 'AuthorizedIP', 'promo', 'validPhoneNumber', 'dateValidPhone', 'indiceImplication', 'totalIndice', 'dateGpChange', 'bannReason', 'countSoftBounce', 'intialDate', 'dateBanning', 'origin', 'reactivationDate', 'quarantaine', 'isMiniAnaconda', 'activationDate', 'splitGp', 'positionGraph', 'oneShoot', 'refSupplier', 'dateReprise', 'versionReleve', 'profileAccount'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function loadByUsername($username)
    {
        return self::where('email', $username)->first();
    }


    public function __construct(array $attributes = [])

    {
        parent::__construct($attributes);
        // creation d'un nouveau object
    }

}
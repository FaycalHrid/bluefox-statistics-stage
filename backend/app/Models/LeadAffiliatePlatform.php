<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idUser
 * @property int $idAffiliatePlatfom
 * @property int $idAffiliatePlatformSubId
 * @property int $idAffiliateCampaign
 * @property int $idSite
 * @property string $creationDate
 * @property string $promo
 * @property boolean $isDouble
 * @property boolean $doubleOptin
 * @property int $idTrackingCodeV2
 * @property boolean $Payed
 * @property string $device
 * @property string $paramAffilie
 * @property string $AffSource
 * @property string $porteursource
 * @property string $campsource
 * @property string $subSource
 * @property boolean $isDoSend
 * @property V2Affiliateplatform $v2Affiliateplatform
 * @property V2User $v2User
 * @property V2Affiliateplatformsubid $v2Affiliateplatformsubid
 * @property V2Affiliatecampaign $v2Affiliatecampaign
 * @property V2Site $v2Site
 */
class LeadAffiliatePlatform extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'leadaffiliateplatform';

    const UPDATED_AT = null;
    const CREATED_AT = null;
    /**
     * @var array
     */
    protected $fillable = ['idUser', 'idAffiliatePlatfom', 'idAffiliatePlatformSubId', 'idAffiliateCampaign', 'idSite', 'creationDate', 'promo', 'isDouble', 'doubleOptin', 'idTrackingCodeV2', 'Payed', 'device', 'paramAffilie', 'AffSource', 'porteursource', 'campsource', 'subSource', 'isDoSend'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function v2Affiliateplatform()
    {
        return $this->belongsTo(Affiliateplatform::class, 'idAffiliatePlatfom');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function v2Affiliateplatformsubid()
    {
        return $this->belongsTo('App\V2Affiliateplatformsubid', 'idAffiliatePlatformSubId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getAffiliatecampaign()
    {
        return $this->belongsTo(AffiliateCampaign::class, 'idAffiliateCampaign');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getSite()
    {
        return $this->belongsTo(Site::class, 'idSite');
    }

    public function __construct(array $attributes = [])

    {
        parent::__construct($attributes);
        // creation d'un nouveau object
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $modifiedShootDate
 * @property string $initialShootDate
 * @property boolean $groupPrice
 * @property string $status
 * @property string $deliveryDate
 * @property boolean $behaviorHour
 * @property int $idUser
 * @property int $idSubCampaign
 * @property boolean $bs
 * @property boolean $supposedGp
 * @property string $dateStb
 * @property string $shooteDateLastReflation
 * @property integer $position
 * @property int $intentBy
 * @property V2Subcampaign $v2Subcampaign
 * @property V2User $v2User
 */
class CampaignHistory extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'campaignHistory';
    const UPDATED_AT = null;
    const CREATED_AT = null;

    /**
     * @var array
     */
    protected $fillable = ['modifiedShootDate', 'initialShootDate', 'groupPrice', 'status', 'deliveryDate', 'behaviorHour', 'idUser', 'idSubCampaign', 'bs', 'supposedGp', 'dateStb', 'shooteDateLastReflation', 'position', 'intentBy'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getSubCampaign()
    {
        return $this->belongsTo('App\Models\SubCampaign', 'idSubCampaign');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'idUser');
    }



    public function __construct(array $attributes = [])

    {
        parent::__construct($attributes);
        // creation d'un nouveau object
    }
}

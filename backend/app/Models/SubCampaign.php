<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idCampaign
 * @property int $position
 * @property int $idProduct
 * @property V2Campaign $v2Campaign
 * @property V2Product $v2Product
 */
class SubCampaign extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'subcampaign';

    /**
     * @var array
     */
    protected $fillable = ['idCampaign', 'position', 'idProduct'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCampaign()
    {
        return $this->belongsTo('App\Models\Campaign', 'idCampaign');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function v2Product()
    {
        return $this->belongsTo('App\Models\Product', 'idProduct');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $numLot
 * @property string $creationDate
 */
class LotCampaign extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lotcampaign';

    /**
     * @var array
     */
    protected $fillable = ['numLot', 'creationDate'];

    public function getCampaign(){
                $this->hasMany(Campaign::class,'idLotCampaign');
    }
}

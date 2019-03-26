<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $lastDateClick
 * @property int $reflation
 * @property boolean $bdcClicks
 * @property int $idCampaignHistory
 * @property string $idChannel
 */
class UserBehavior extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'userbehavior';
    const UPDATED_AT = null;
    const CREATED_AT = null;

    /**
     * @var array
     */
    protected $fillable = ['lastDateClick', 'reflation', 'bdcClicks', 'idCampaignHistory', 'idChannel'];

    public function __construct($bdcClicks, $idCampaignHistory, $lastDateClick, $reflation)
    {
        $this->bdcClicks = $bdcClicks;
        $this->idCampaignHistory = $idCampaignHistory;
        $this->lastDateClick = $lastDateClick;
        $this->idCampaignHistory = $idCampaignHistory;
        //$this->idChannel = $idchannel;
        $this->reflation = $reflation;
    }


}

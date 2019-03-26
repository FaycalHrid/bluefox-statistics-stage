<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $label
 * @property string $description
 * @property string $updateTS
 */
class AffiliateCampaign extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'affiliateCampaign';

    /**
     * @var array
     */
    protected $fillable = ['label', 'description', 'updateTS'];
    public function getLeadAffiliatePlatform()
    {
        return $this->hasMany(LeadAffiliatePlatform::class, 'idAffiliateCampaign');
    }
}

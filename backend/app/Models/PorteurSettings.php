<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property boolean $display
 * @property int $idFirstCampaign
 * @property boolean $periodAnaconda
 * @property int $countImport
 * @property integer $indiceFidGeante
 * @property integer $periodInscriptionFidGeante
 * @property string $stcSplit
 * @property int $currentStc
 * @property boolean $periodVp
 * @property int $initialReleve
 * @property float $incrementRate
 * @property int $numberOfSubdivisions
 * @property int $periodReleve
 * @property boolean $resendDeliveryTime
 * @property integer $durationToBan
 * @property int $maxSignup
 * @property boolean $periodAsile
 * @property int $periodReleveNP
 * @property boolean $indiceActivityHour
 * @property integer $interAccountInterval
 * @property int $deliveryCosts
 * @property boolean $periodEnterMainChain
 * @property string $profieFreshLead
 */
class PorteurSettings extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'porteurSettings';

    /**
     * @var array
     */
    protected $fillable = ['display', 'idFirstCampaign', 'periodAnaconda', 'countImport', 'indiceFidGeante', 'periodInscriptionFidGeante', 'stcSplit', 'currentStc', 'periodVp', 'initialReleve', 'incrementRate', 'numberOfSubdivisions', 'periodReleve', 'resendDeliveryTime', 'durationToBan', 'maxSignup', 'periodAsile', 'periodReleveNP', 'indiceActivityHour', 'interAccountInterval', 'deliveryCosts', 'periodEnterMainChain', 'profieFreshLead'];

}

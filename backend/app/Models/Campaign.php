<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $label
 * @property int $type
 * @property string $ref
 * @property string $date_shoot
 * @property string $date_shoot2
 * @property int $duree_shoot
 * @property boolean $chainable
 * @property boolean $split
 * @property int $nb_produit
 * @property string $commentaire_shoot_acq
 * @property string $model_shoot_acq
 * @property string $commentaire_shoot_fid
 * @property string $model_shoot_fid
 * @property string $titre_stat
 * @property boolean $asile
 * @property string $num
 * @property string $date_creation_cdc_prev
 * @property string $date_control_cdc_prev
 * @property string $date_valid_cdc_it_prev
 * @property string $date_dev_it_prev
 * @property string $date_control_project_prev
 * @property string $date_valid_project_prev
 * @property string $date_creation_cdc
 * @property string $date_control_cdc
 * @property string $date_valid_cdc_it
 * @property string $date_dev_it
 * @property string $date_control_project
 * @property string $date_valid_project
 * @property string $commentaire_palanification
 * @property boolean $projectStatus
 * @property int $numSource
 * @property string $porteur_source
 * @property string $etape_envoi
 * @property string $type_projet
 * @property int $idNextCampaign
 * @property boolean $campaignStatus
 * @property int $idChain
 * @property boolean $isAnaconda
 * @property int $idLotCampaign
 * @property int $position
 */
class Campaign extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campaign';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['label', 'type', 'ref', 'date_shoot', 'date_shoot2', 'duree_shoot', 'chainable', 'split', 'nb_produit', 'commentaire_shoot_acq', 'model_shoot_acq', 'commentaire_shoot_fid', 'model_shoot_fid', 'titre_stat', 'asile', 'num', 'date_creation_cdc_prev', 'date_control_cdc_prev', 'date_valid_cdc_it_prev', 'date_dev_it_prev', 'date_control_project_prev', 'date_valid_project_prev', 'date_creation_cdc', 'date_control_cdc', 'date_valid_cdc_it', 'date_dev_it', 'date_control_project', 'date_valid_project', 'commentaire_palanification', 'projectStatus', 'numSource', 'porteur_source', 'etape_envoi', 'type_projet', 'idNextCampaign', 'campaignStatus', 'idChain', 'isAnaconda', 'idLotCampaign', 'position'];


    public function getSubCampaign()
    {
        return $this->hasMany(SubCampaign::class, 'idCampaign');
    }

    public function getLotCampaign()
    {
        $this->belongsTo(LotCampaign::class, 'idLotCampaign');
    }


}

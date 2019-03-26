<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idInvoice
 * @property string $refProduct
 * @property int $qty
 * @property float $priceATI
 * @property float $priceVAT
 * @property V2Invoice $v2Invoice
 */
class Recordinvoice extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'recordinvoice';

    /**
     * @var array
     */
    protected $fillable = ['idInvoice', 'refProduct', 'qty', 'priceATI', 'priceVAT'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Invoice()
    {
        return $this->belongsTo('App\ModelsInvoice', 'idInvoice');
    }
}

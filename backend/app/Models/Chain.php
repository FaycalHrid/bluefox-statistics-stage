<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $label
 * @property string $description
 * @property string $type
 * @property boolean $hasProduct
 */
class Chain extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'chain';

    /**
     * @var array
     */
    protected $fillable = ['label', 'description', 'type', 'hasProduct'];

}

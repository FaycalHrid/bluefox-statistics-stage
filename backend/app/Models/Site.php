<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $devise
 * @property string $codeDevise
 * @property string $nameDevise
 * @property string $country
 * @property string $company
 */
class Site extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'site';

    /**
     * @var array
     */
    protected $fillable = ['code', 'devise', 'codeDevise', 'nameDevise', 'country', 'company'];

}

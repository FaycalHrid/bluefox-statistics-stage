<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $ref
 * @property string $parent
 * @property float $gain
 * @property string $login
 * @property string $password
 * @property boolean $originNumber
 */
class Suppliers extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['ref', 'parent', 'gain', 'login', 'password', 'originNumber'];
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}

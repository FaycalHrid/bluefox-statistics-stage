<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idUser
 * @property string $profile
 * @property string $createDate
 * @property User $User
 */
class Accounthistory extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'AccountHistory';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    /**
     * @var array
     */
    protected $fillable = ['idUser', 'profile', 'createDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function v2User()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}

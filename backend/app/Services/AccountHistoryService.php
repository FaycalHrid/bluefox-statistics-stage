<?php
/**
 * Created by PhpStorm.
 * User: Sbalkaid
 * Date: 25/01/2019
 * Time: 10:31
 */

namespace App\Services;


use App\Models\Accounthistory;

class AccountHistoryService
{
    public static function create($profile, $idUser)
    {
        //
        $accoutHistory = new Accounthistory(['idUser' => $idUser, 'profile' => $profile, 'createDate' => date('Y-m-d H:i:s')]);
        $accoutHistory->save();
    }

}
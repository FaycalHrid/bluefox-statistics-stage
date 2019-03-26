<?php
/**
 * Created by PhpStorm.
 * User: Sbalkaid
 * Date: 25/01/2019
 * Time: 09:23
 */

namespace App\Services;


use App\Models\User;

class UserService
{
    /*
    * Tratement for create new campaignHisotry(inital chain) for fresh lead
    * @param string Email
    */

    public static function createFreshLead($email, $civility, $firstName, $birthday, $refSupplier)
    {
        $user = User::where('email', $email)->first();

        if (is_object($user))
            return json_encode(['state' => false, 'idUser' => $user->id]);
        $user = new User(['email' => $email, 'civility' => $civility, 'firstName' => $firstName, 'birthday' => date($birthday),
            'mailCrypte' => md5($email), 'refSupplier' => $refSupplier, 'profileAccount' => PorteurSettingService::getPorteurSettings()->profieFreshLead, 'creationDate' => date('Y-m-d H:i:s')]);
        $user->save();
        return json_encode(['state' => true, 'idUser' => $user->id]);
    }


}
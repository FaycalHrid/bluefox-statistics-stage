<?php
/**
 * Created by PhpStorm.
 * User: Sbalkaid
 * Date: 25/01/2019
 * Time: 10:25
 */

namespace App\Services;


use App\Models\Suppliers;

class SupplierService
{
    public static function create($supplier,$parent)
    {
        if(!self::checkSupplierExisting($supplier)){
            $newrefSupplier =  new Suppliers(['ref'=>$supplier,'parent'=>$parent,'originNumber'=>(self::getLastOriginNumber()+1)]);
            $newrefSupplier->save();
        }
    }

    public static function checkSupplierExisting($supplier)
    {
        return (count(Suppliers::where('ref', $supplier)->get()) == 0) ? false : true;
    }

    public static function getLastOriginNumber()
    {
        return Suppliers::orderBy('originNumber', 'desc')->limit(1)->first()->originNumber;
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $productType
 * @property string $ref
 * @property int $qty
 * @property float $priceATI
 * @property float $priceVAT
 * @property float $amountBif
 * @property string $paymentType
 * @property string $description
 * @property string $descriptionPP
 * @property string $webSiteProductCode
 * @property int $isCT
 * @property string $titleStat
 * @property string $abrStat
 * @property int $boutique
 * @property string $webSiteProductCodeAC
 * @property string $commercialText
 * @property string $bdcFields
 * @property string $priceModel
 * @property string $paramPriceModel
 * @property int $idPaymentProcessorSet
 * @property int $ctdate
 * @property float $theoPricePros
 * @property float $theoPriceVg
 * @property float $theoPriceVp
 * @property float $theoPriceCt
 * @property int $price_step
 * @property string $description_marketing
 * @property string $particularite_it
 * @property string $kdo
 * @property string $num_c
 * @property string $date_a
 * @property string $variable_page
 * @property string $variable_mail
 * @property string $asile_type
 * @property int $produit_expirable
 * @property int $nbrelance
 * @property string $productType2
 * @property string $preheader
 * @property string $subjectReshoot
 * @property string $nbMercury
 * @property int $idFamily
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product';

    /**
     * @var array
     */
    protected $fillable = ['productType', 'ref', 'qty', 'priceATI', 'priceVAT', 'amountBif', 'paymentType', 'description', 'descriptionPP', 'webSiteProductCode', 'isCT', 'titleStat', 'abrStat', 'boutique', 'webSiteProductCodeAC', 'commercialText', 'bdcFields', 'priceModel', 'paramPriceModel', 'idPaymentProcessorSet', 'ctdate', 'theoPricePros', 'theoPriceVg', 'theoPriceVp', 'theoPriceCt', 'price_step', 'description_marketing', 'particularite_it', 'kdo', 'num_c', 'date_a', 'variable_page', 'variable_mail', 'asile_type', 'produit_expirable', 'nbrelance', 'productType2', 'preheader', 'subjectReshoot', 'nbMercury', 'idFamily'];

}

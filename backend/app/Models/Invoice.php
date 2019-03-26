<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $invoiceCrypt
 * @property string $emailUser
 * @property string $creationDate
 * @property string $refInterne
 * @property string $ref1Transaction
 * @property string $ref2Transaction
 * @property boolean $invoiceStatus
 * @property string $origine
 * @property boolean $refundStatus
 * @property string $refundDate
 * @property string $modificationDate
 * @property float $parity
 * @property string $currency
 * @property string $deviseinformativecheque
 * @property string $dateDeliveryExport
 * @property string $dateTransfertToTransporter
 * @property string $paymentProcessor
 * @property string $codeSite
 * @property int $deliveryMode
 * @property int $thyCheckView
 * @property int $errorNumber
 * @property string $errorMessage
 * @property string $dateFinalAnswer
 * @property string $campaign
 * @property string $supportRef
 * @property string $supportDate
 * @property string $subPaymentProcessor
 * @property string $trackingNumber
 * @property string $refBatchSelling
 * @property int $priceStep
 * @property string $refPricingGrid
 * @property int $idAbandonedCaddy
 * @property float $pricePaid
 * @property int $numCheck
 * @property string $chrono
 * @property string $date_ouverture
 * @property int $countSend
 * @property string $lastSend
 * @property string $agent
 * @property string $commentary
 * @property string $vaName
 * @property string $vaNumber
 * @property string $vaExpiryDate
 */
class Invoice extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'invoice';



    /**
     * Invoice Status
     */
    const INVOICE_CADDIE		= 0;
    const INVOICE_IN_PROGRESS	= 1;
    const INVOICE_PAYED			= 2;
    const INVOICE_ERROR			= 3;
    const INVOICE_CANCEL		= 4;

    /**
     * Refund Status
     */
    const INVOICE_REFUND_NOT_ASKED		= 0;
    const INVOICE_REFUND_IN_PROGRESS	= 11;
    const INVOICE_REFUNDED				= 12;
    const INVOICE_REFUND_REFUSED		= 22;

    /**
     * Notification Invoice Status
     */
    const INVOICE_WAITING		        = 0;
    const INVOICE_SUBMITTED	            = 1;
    const INVOICE_DELIVERED			    = 2;
    const INVOICE_ALL			    = 2;


    /**
     * @var array
     */
    protected $fillable = ['invoiceCrypt', 'emailUser', 'creationDate', 'refInterne', 'ref1Transaction', 'ref2Transaction', 'invoiceStatus', 'origine', 'refundStatus', 'refundDate', 'modificationDate', 'parity', 'currency', 'deviseinformativecheque', 'dateDeliveryExport', 'dateTransfertToTransporter', 'paymentProcessor', 'codeSite', 'deliveryMode', 'thyCheckView', 'errorNumber', 'errorMessage', 'dateFinalAnswer', 'campaign', 'supportRef', 'supportDate', 'subPaymentProcessor', 'trackingNumber', 'refBatchSelling', 'priceStep', 'refPricingGrid', 'idAbandonedCaddy', 'pricePaid', 'numCheck', 'chrono', 'date_ouverture', 'countSend', 'lastSend', 'agent', 'commentary', 'vaName', 'vaNumber', 'vaExpiryDate', 'deliveryStatus'];

    public function recordinvoices()
    {
        return $this->hasMany(Invoice::class);
    }
}

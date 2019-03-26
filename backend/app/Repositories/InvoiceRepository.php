<?php
namespace App\Repositories;
use App\Models\Invoice;

class InvoiceRepository extends BaseRepository
{
    /**
     * Create a new InvoiceRepository instance.
     *
     * @param  \App\Models\Invoice $Invoice
     * @return void
     */
    /**
     * Create a new InvoiceRepository instance
     * InvoiceRepository constructor.
     * @param Invoice $invoice
     */
    public function __construct(Invoice $invoice)
    {
        $this->model = $invoice;
    }

    public function search($search)
    {
        return $this->queryActiveWithUserOrderByDate()
            ->where(function ($q) use ($search) {
                $q->where('creationDate', 'between', "%$search->%")
                    ->orWhere('deliveryStatus', 'like', "%$search->deliveryStatus%")
                    ->orWhere('invoiceStatus', 'like', "1");
            })->paginate($n);
    }

}
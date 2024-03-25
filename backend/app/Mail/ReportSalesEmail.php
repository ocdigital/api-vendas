<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportSalesEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $sales;

    public $totalSales;

    public function __construct($sales, $totalSales)
    {
        $this->sales = $sales;
        $this->totalSales = $totalSales;
    }

    public function build()
    {
        return $this->view('emails.SalesReport', [
            'vendas' => $this->sales,
            'totalVendas' => $this->totalSales,
        ]);
    }
}

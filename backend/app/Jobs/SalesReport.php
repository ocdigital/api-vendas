<?php

namespace App\Jobs;

use App\Mail\ReportSalesEmail;
use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SalesReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sales = Sale::join('sellers', 'sales.seller_id', '=', 'sellers.id')
            ->select('sales.*', 'sellers.name as seller_name')
            ->get();

        // Calcular o total das vendas
        $totalSales = $sales->sum('sale_value');

        // Enviar e-mail com o relatório de vendas
        Mail::to('teste@teste.com')->send(new ReportSalesEmail($sales, $totalSales));
    }
}

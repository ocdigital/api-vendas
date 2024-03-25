<?php

namespace App\Http\Controllers;


use App\Jobs\SalesReport;

class TestesController extends Controller
{
    public function testEmail()
    {
        // Disparar o job imediatamente
        SalesReport::dispatch();

    }
}

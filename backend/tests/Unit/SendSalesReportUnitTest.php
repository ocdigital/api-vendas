<?php

namespace Tests\Unit;

use App\Jobs\SalesReport;
use App\Models\Sale;
use App\Models\Seller;
use App\Mail\ReportSalesEmail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class);
uses(RefreshDatabase::class);

//testar simples teste de envio de email escreva o test em ingles

it('cant_send_email', function () {
    Mail::fake();
    Mail::assertNothingSent();
    Mail::assertNothingQueued();
});

it('cant_execute_job', function () {
    Mail::fake();
    Mail::assertNothingSent();
    Mail::assertNothingQueued();
    SalesReport::dispatch();
    Mail::assertNothingSent();
    Mail::assertNothingQueued();
});




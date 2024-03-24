<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seller;


class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seller::factory()->count(500)->create();
    }
}

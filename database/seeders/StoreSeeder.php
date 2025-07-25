<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $stores = [
            ['name' => 'Biedronka',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lidl',       'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Stokrotka',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Żabka',      'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('stores')->insert($stores);
    }
}

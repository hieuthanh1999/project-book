<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederShipping extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_shipping_fee')->insert([
            [
                'provinceid' => '01TTT',
                'name' => 'Phí Nội Thành',
                'price' => '12000',
            ],
            [
                'provinceid' => '0',
                'name' => 'Phí Ngoại Thành',
                'price' => '30000',
            ]
        ]);
    }
}

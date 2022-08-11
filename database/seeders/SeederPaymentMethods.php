<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederPaymentMethods extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_payments')->insert([
            [
                'status' => 'Hoàn thành',
                'type' => 'Thanh toán khi nhận hàng',
                'amount' => '1',
            ],
            [
                'status' => 'Hoàn thành',
                'type' => 'Thanh toán tại cửa hàng',
                'amount' => '1',
            ]
        ]);
    }
}

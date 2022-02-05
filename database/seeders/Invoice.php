<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class Invoice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Date('Y-m-d');
        DB::table('invoices')->insert([
            [
                'id'=>  'in202201221',
                'employeeID' => 'NV202201253',
                'userID' => 'em160120222',
                'shippingName' =>  'Huỳnh Tấn Nghĩa',
                'shippingPhone' => '0123456789',
                'shippingAddress' => 'Quận 6',
                'dateCreated' =>  $data,
                 'isPaid' => 1,
                 'total' => 70000,
                'status' => 1,
            ],
            [
                'id'=>  'in202201232',
                'employeeID' => 'NV202201253',
                'userID' => 'em160120223',
                'shippingName' =>  'Hồ Văn Tuân',
                'shippingPhone' => '1234561231',
                'shippingAddress' => 'Quận 5',
                'dateCreated' =>  $data,
                 'isPaid' => 0,
                 'total' => 120000,
                'status' => 1,
            ]
            ]);
    }
}
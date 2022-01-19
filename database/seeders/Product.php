<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' =>  'f23112001pr0',
                'sku' => Str::random(10),
                'name' => 'Dâu tằm',
                'price' =>  3,
                'stock' => 120,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '1.png',
                'status' => true,
            ],
            [
                'id' =>  'f23112001pr1',
                'sku' =>  Str::random(10),
                'name' => 'Rau salad',
                'price' =>  1,
                'stock' => 100,
                'type' => 'Rau củ',
                'unit' => 'Kg',
                'description' => 'Đẹp da, thanh lọc cơ thể, tốt cho sức khỏe',
                'image' => '7.png',
                'status' => true,
            ],
            [
                'id' =>  'f23112001pr2',
                'sku' =>  Str::random(10),
                'name' => 'Nước suối',
                'price' =>  2,
                'stock' => 100,
                'type' => 'Thức uống',
                'unit' => 'Chai',
                'description' => 'Hỗ trợ thể lực, bù lượng nước mất đi trong cơ thể',
                'image' => '8.png',
                'status' => true,
            ],
            [
                'id' => 'f23112001pr3',
                'sku' =>  Str::random(10),
                'name' => 'Kiwi',
                'price' =>  10,
                'stock' => 90,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '3.png',
                'status' => true,
            ],
            [
                'id' => 'f23112001pr4',
                'sku' =>  Str::random(10),
                'name' => 'Cam mỹ',
                'price' =>  30,
                'stock' => 90,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '4.png',
                'status' => true,
            ],

            [
                'id' => 'f23112001pr5',
                'sku' =>  Str::random(10),
                'name' => 'Thịt bò',
                'price' =>  5,
                'stock' => 90,
                'type' => 'Thịt',
                'unit' => 'Gram',
                'description' => 'Giàu protein, giúp cơ thể phát triển tốt',
                'image' => '9.png',
                'status' => true,
            ],
            [
                'id' =>  'f23112001pr6',
                'sku' =>  Str::random(10),
                'name' => 'Nho nhật',
                'price' =>  20,
                'stock' => 90,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '5.png',
                'status' => true,
            ],
            [
                'id' =>  'f23112001pr7',
                'sku' => Str::random(10),
                'name' => 'Dâu tây',
                'price' =>  20,
                'stock' => 90,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '6.png',
                'status' => true,
            ],
            [
                'id' => 'f23112001pr8',
                'sku' => Str::random(10),
                'name' => 'Táo mỹ',
                'price' =>  5,
                'stock' => 30,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '2.png',
                'status' => true,
            ],
        ]);
    }
}
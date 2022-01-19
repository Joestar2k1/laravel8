<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class Employee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
            DB::table('users')->insert([
                [ 
                    'id'=> 'user160120221',
                    'username' => 'layer01',
                    'password' => Hash::make('23112001'),
                    'email' => 'russian2311@gmail.com',
                    'fullName' => 'Nguyễn Hoài Chương',
                    'address' => 'Gò vấp',
                    'isAdmin' => true,
                    'phone' => '0123456789',
                     'avatar' => 'abc.jpg',
                    'status' => true,
                ],
                [    
                    'id'=> 'user160120221',
    
                    'username' => 'layer02',
                    'password' => Hash::make('123'),
                    'email' => 'tuannghia@gmail.com',
                    'fullName' => 'Huỳnh Tấn Nghĩa',
                    'address' => 'Quận 6',
                    'isAdmin' => true,
                    'phone' => '0123456789',
                     'avatar' => 'xyz.jpg',
    
                    'status' => true,
                ],
                [   
                    'id'=> 'user160120222',
                    'username' => 'layer03',
                    'password' => Hash::make('456'),
                    'email' => 'vantuan@gmail.com',
                    'fullName' => 'Hồ Văn Tuân',
                    'address' => 'Quận 5',
                    'isAdmin' => true,
                    'phone' => '0123456789',
                     'avatar' => 'xyz.jpg',
    
                    'status' => true,
                ],
                [
                    'id'=> 'user160120223',
                    'username' => 'layer04',
                    'password' => Hash::make('890'),
                    'email' => 'thanhle@gmail.com',
                    'fullName' => 'Nguyễn Thành Lễ',
                    'address' => 'Quận 5',  'isAdmin' => true,
                    'phone' => '0123456789',
                     'avatar' => 'xyz.jpg',
    
                    'status' => true,
                ], [
                    'id'=> 'user160120224',
                    'username' => 'layer04',
                    'password' => Hash::make('890'),
                    'email' => 'thanhle@gmail.com',
                    'fullName' => 'Nguyễn Thành Lễ',
                    'address' => 'Quận 5',  'isAdmin' => true,
                    'phone' => '0123456789',
                     'avatar' => 'xyz.jpg',
                    'status' => true,
                ],[
                    'id'=> 'user160120225',
                    'username' => 'layer05',
                    'password' => Hash::make('901'),
                    'email' => 'minhlong@gmail.com',
                    'fullName' => 'Nguyễn Vũ Minh Long',
                    'address' => 'TP Hồ Chí minh',  'isAdmin' => true,
                    'phone' => '0123456789',
                     'avatar' => 'xyz.jpg',
                    'status' => true,
                ],
            ]);
    }
}
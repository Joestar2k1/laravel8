<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Blogs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'title' => 'Dâu tây tốt cho sức khỏe như thế nào?',
                'content' => 'Dâu tây chứa hàm lượng calo rất thấp, nhiều nước và nhiều chất xơ, do đó nó có tác dụng giữ cho bạn no lâu, hạn chế lượng thức ăn nạp vào cơ thể, từ đó hỗ trợ giảm cân.',
                'postDated' => Date('Y-m-d'),
                'employeeID' => 'A202201251',
                 'image' => 'news-bg-1.jpg',
                'status' => 1,
            ],
            [
                'title' => 'Bữa ăn BeHealthy là gì?',
                'content' => 'Một chế độ ăn healthy nên có sự đa dạng và đầy đủ các chất bao gồm cả tinh bột, natri, đường, chất xơ, hay chất khoáng từ rau, củ, trái cây, ngũ cốc nguyên hạt.',
                'postDated' => Date('Y-m-d'),
                'employeeID' => 'A202201251',
                 'image' => 'news-bg-2.jpg',
                'status' => 1,
            ],
            [
                'title' => 'Quả việt quất xuất xứ từ đâu mà lại HOT đến thế ?',
                'content' => 'Quả việt quất có nguồn gốc ở Bắc Mỹ, quả việt quất rất giàu proanthocyanidin, các chất chống oxy hóa tự nhiên đã được chứng minh để chống lại ung thư, giảm cân và cho bạn làn da sáng trẻ.',
                'postDated' => Date('Y-m-d'),
                'employeeID' => 'A202201251',
                 'image' => 'news-bg-2.jpg',
                'status' => 1,
            ],
        ]);
    }
}

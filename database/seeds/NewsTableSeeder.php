<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('news')->insert([
            ['id' => '1','title' => 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam "Bánh trung thu Bơ Sữa HongKong".','content' => 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ','image' => 'sample1.jpg','created_at' => new DateTime(),'updated_at' => new DateTime()],
            ['id' => '2','title' => 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát','content' => 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ','image' => 'sample2.jpg','created_at' => new DateTime(),'updated_at' => new DateTime()],
            ['id' => '3','title' => 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng','content' => 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ','image' => 'sample3.jpg','created_at' => new DateTime(),'updated_at' => new DateTime()],
            ['id' => '4','title' => 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.','content' => 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ','image' => 'sample4.jpg','created_at' => new DateTime(),'updated_at' => new DateTime()],
            ['id' => '5','title' => 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình','content' => 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ','image' => 'sample5.jpg','created_at' => new DateTime(),'updated_at' => new DateTime()],

        ]);
    }
}

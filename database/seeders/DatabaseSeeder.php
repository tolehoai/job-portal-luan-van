<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = \Faker\Factory::create();

        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ]
        ]);


        $limit = 500;

        for ($i = 0; $i < $limit; $i++) {
            $countryName = $faker->country;
            DB::table('countries')->insert([
                'country_name' => $countryName,
                'country_name_slug' => Str::slug($countryName)
            ]);
        }
        $cityListOfVietNam = ["An Giang","Bà Rịa - Vũng Tàu","Bạc Liêu","Bắc Kạn","Bắc Giang","Bắc Ninh","Bến Tre","Bình Dương","Bình Định","Bình Phước","Bình Thuận","Cà Mau","Cao Bằng","Cần Thơ","Đà Nẵng","Đắk Lắk","Đắk Nông","Đồng Nai","Đồng Tháp","Điện Biên","Gia Lai","Hà Giang","Hà Nam","Hà Nội","Hà Tĩnh","Hải Dương","Hải Phòng","Hòa Bình","Hậu Giang","Hưng Yên","Thành phố Hồ Chí Minh","Khánh Hòa","Kiên Giang","Kon Tum","Lai Châu","Lào Cai","Lạng Sơn","Lâm Đồng","Long An","Nam Định","Nghệ An","Ninh Bình","Ninh Thuận","Phú Thọ","Phú Yên","Quảng Bình","Quảng Nam","Quảng Ngãi","Quảng Ninh","Quảng Trị","Sóc Trăng","Sơn La","Tây Ninh","Thái Bình","Thái Nguyên","Thanh Hóa","Thừa Thiên - Huế","Tiền Giang","Trà Vinh","Tuyên Quang","Vĩnh Long","Vĩnh Phúc","Yên Bái"];
        for ($i = 0; $i < count($cityListOfVietNam); $i++) {
            $cityName = $cityListOfVietNam[$i];
            DB::table('cities')->insert([
                'name' => $cityName,
                'slug' => Str::slug($cityName)
            ]);
        }

//        for ($i = 0; $i < $limit; $i++) {
//            DB::table('companys')->insert([
//                'name'               => $faker->company,
//                'country_id'         => $i + 1,
//                'company_desc'       => $faker->paragraph,
//                'address'            => $faker->address,
//                'email'              => $faker->unique()->email,
//                'password'           => bcrypt('123456'),
//                'phone'              => $faker->phoneNumber,
//                'start_work_time'    => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
//                'end_work_time'      => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
//                'number_of_personal' => $faker->numberBetween(50, 1000),
//            ]);
//        }
    }
}

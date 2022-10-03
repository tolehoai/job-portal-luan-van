<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

        DB::table('admins')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ]
        ]);

        DB::table('countrys')->insert(
            [
                [
                    'country_name' => 'Vietnam'
                ],
                [
                    'country_name' => 'German'
                ]
            ]
        );

        DB::table('images')->insert([
            [
                'path' => 'nfq.png',
            ]
        ]);

        DB::table('companys')->insert([
            [
                'name' => 'NFQ Asia',
                'country_id' => '2',
                'company_desc' => 'NFQ Asia Vietnam',
                'address' => 'Q1, HCM',
                'email' => 'nfq@nfq.asia',
                'password' => bcrypt('nfqasia'),
                'phone' => '123456789',
                'start_work_time' => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time' => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personel' => 500,
                'logo_img' => 1,
            ]
        ]);
    }
}

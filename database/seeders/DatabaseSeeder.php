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
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ]
        ]);


        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            $countryName = $faker->country;
            DB::table('countrys')->insert([
                'country_name'      => $countryName,
                'country_name_slug' => Str::slug($countryName)
            ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('images')->insert([
                'path' => $faker->imageUrl,
            ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('companys')->insert([
                'name'               => $faker->company,
                'country_id'         => $i + 1,
                'company_desc'       => $faker->paragraph,
                'address'            => $faker->address,
                'email'              => $faker->unique()->email,
                'password'           => bcrypt('123456'),
                'phone'              => $faker->phoneNumber,
                'start_work_time'    => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time'      => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personal' => $faker->numberBetween(50, 1000),
                'logo_img'           => $i + 1,
            ]);
        }
    }
}

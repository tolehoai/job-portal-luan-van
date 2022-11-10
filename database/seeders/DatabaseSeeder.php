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
//        \App\Models\User::factory(10)->create();
//
//        \App\Models\User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $faker = \Faker\Factory::create();

        DB::table('admins')->insert([
            [
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ]
        ]);


        $limit = 500;

        for ($i = 0; $i < $limit; $i++) {
            $countryName = $faker->country;
            DB::table('countries')->insert([
                'country_name'      => $countryName,
                'country_name_slug' => Str::slug($countryName)
            ]);
        }
        $cityListOfVietNam = [
            "An Giang",
            "Bà Rịa - Vũng Tàu",
            "Bạc Liêu",
            "Bắc Kạn",
            "Bắc Giang",
            "Bắc Ninh",
            "Bến Tre",
            "Bình Dương",
            "Bình Định",
            "Bình Phước",
            "Bình Thuận",
            "Cà Mau",
            "Cao Bằng",
            "Cần Thơ",
            "Đà Nẵng",
            "Đắk Lắk",
            "Đắk Nông",
            "Đồng Nai",
            "Đồng Tháp",
            "Điện Biên",
            "Gia Lai",
            "Hà Giang",
            "Hà Nam",
            "Hà Nội",
            "Hà Tĩnh",
            "Hải Dương",
            "Hải Phòng",
            "Hòa Bình",
            "Hậu Giang",
            "Hưng Yên",
            "Thành phố Hồ Chí Minh",
            "Khánh Hòa",
            "Kiên Giang",
            "Kon Tum",
            "Lai Châu",
            "Lào Cai",
            "Lạng Sơn",
            "Lâm Đồng",
            "Long An",
            "Nam Định",
            "Nghệ An",
            "Ninh Bình",
            "Ninh Thuận",
            "Phú Thọ",
            "Phú Yên",
            "Quảng Bình",
            "Quảng Nam",
            "Quảng Ngãi",
            "Quảng Ninh",
            "Quảng Trị",
            "Sóc Trăng",
            "Sơn La",
            "Tây Ninh",
            "Thái Bình",
            "Thái Nguyên",
            "Thanh Hóa",
            "Thừa Thiên - Huế",
            "Tiền Giang",
            "Trà Vinh",
            "Tuyên Quang",
            "Vĩnh Long",
            "Vĩnh Phúc",
            "Yên Bái"
        ];
        for ($i = 0; $i < count($cityListOfVietNam); $i++) {
            $cityName = $cityListOfVietNam[$i];
            DB::table('cities')->insert([
                'name' => $cityName,
                'slug' => Str::slug($cityName)
            ]);
        }

        $jobTypeList = ['Full-time', 'Part-time', 'Remote', 'Freelance'];

        for ($i = 0; $i < count($jobTypeList); $i++) {
            $jobTypeName = $jobTypeList[$i];
            DB::table('job_types')->insert([
                'name' => $jobTypeName,
                'slug' => Str::slug($jobTypeName)
            ]);
        }

        $jobLevelList = ['Intern Developer', 'Fresher Developer', 'Junior Developer', 'Senior Developer', 'Leader'];

        for ($i = 0; $i < count($jobLevelList); $i++) {
            $jobLevelName = $jobLevelList[$i];
            DB::table('job_levels')->insert([
                'name' => $jobLevelName,
                'slug' => Str::slug($jobLevelName)
            ]);
        }

        $skills = ['HTML', 'CSS', 'Javascript', 'PHP'];

        for ($i = 0; $i < count($skills); $i++) {
            $skill = $skills[$i];
            DB::table('skills')->insert([
                'name' => $skill,
                'slug' => Str::slug($skill)
            ]);
        }

        $technologies = ['Frontend', 'Backend', 'Fullstack', 'DevOps'];

        for ($i = 0; $i < count($technologies); $i++) {
            $technology = $technologies[$i];
            DB::table('technology')->insert([
                'name' => $technology,
                'slug' => Str::slug($technology)
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


        $jobTitles = [
            [
                "name" => ".NET Developer"
            ],
            [
                "name" => ".NET Web Developer"
            ],
            [
                "name" => "AI engineer"
            ],
            [
                "name" => "ASP.NET Developer"
            ],
            [
                "name" => "ASP.NET Web Developer"
            ],
            [
                "name" => "Android App Developer"
            ],
            [
                "name" => "Android Developer"
            ],
            [
                "name" => "AngularJS Developer"
            ],
            [
                "name" => "AngularJS Web Developer"
            ],
            [
                "name" => "Automation Tester"
            ],
            [
                "name" => "Back End Developer"
            ],
            [
                "name" => "Back End Web Developer"
            ],
            [
                "name" => "C Language Developer"
            ],
            [
                "name" => "C# Developer"
            ],
            [
                "name" => "C# Web Developer"
            ],
            [
                "name" => "C++ Developer"
            ],
            [
                "name" => "CSS Developer"
            ],
            [
                "name" => "CSS Web Developer"
            ],
            [
                "name" => "CTO"
            ],
            [
                "name" => "Chief Technology Officer"
            ],
            [
                "name" => "Chuyên viên Quản Trị Mạng"
            ],
            [
                "name" => "Data Analyst"
            ],
            [
                "name" => "Data Engineer"
            ],
            [
                "name" => "Data Scientist"
            ],
            [
                "name" => "Database Administrator"
            ],
            [
                "name" => "Django Developer"
            ],
            [
                "name" => "Django Web Developer"
            ],
            [
                "name" => "Drupal Developer"
            ],
            [
                "name" => "Drupal Web Developer"
            ],
            [
                "name" => "ERP Developer"
            ],
            [
                "name" => "ERP Specialist"
            ],
            [
                "name" => "Embedded Developer"
            ],
            [
                "name" => "Embedded Engineer"
            ],
            [
                "name" => "Freelancer"
            ],
            [
                "name" => "Front End Developer"
            ],
            [
                "name" => "Front End Web Developer"
            ],
            [
                "name" => "Full Stack Developer"
            ],
            [
                "name" => "Full Stack Web Developer"
            ],
            [
                "name" => "Game Designer"
            ],
            [
                "name" => "Game Developer"
            ],
            [
                "name" => "Games Developer"
            ],
            [
                "name" => "Giám đốc công nghệ"
            ],
            [
                "name" => "Graphic Designer"
            ],
            [
                "name" => "HTML5 Developer"
            ],
            [
                "name" => "Hardware Design Engineer"
            ],
            [
                "name" => "IT Administrator"
            ],
            [
                "name" => "IT Infrastructure"
            ],
            [
                "name" => "IT Manager"
            ],
            [
                "name" => "IT Section Manager"
            ],
            [
                "name" => "J2EE Developer"
            ],
            [
                "name" => "JSON Developer"
            ],
            [
                "name" => "Java Developer"
            ],
            [
                "name" => "Java Web Developer"
            ],
            [
                "name" => "JavaScript Developer"
            ],
            [
                "name" => "JavaScript Web Developer"
            ],
            [
                "name" => "Kỹ sư cầu nối"
            ],
            [
                "name" => "Kỹ sư phần mềm"
            ],
            [
                "name" => "Lead developer"
            ],
            [
                "name" => "Linux Developer"
            ],
            [
                "name" => "Linux System Administrator"
            ],
            [
                "name" => "Lập trình viên .NET"
            ],
            [
                "name" => "Lập trình viên ASP.NET"
            ],
            [
                "name" => "Lập trình viên Agile"
            ],
            [
                "name" => "Lập trình viên Android"
            ],
            [
                "name" => "Lập trình viên AngularJS"
            ],
            [
                "name" => "Lập trình viên Back End"
            ],
            [
                "name" => "Lập trình viên C"
            ],
            [
                "name" => "Lập trình viên C#"
            ],
            [
                "name" => "Lập trình viên C++"
            ],
            [
                "name" => "Lập trình viên CSS"
            ],
            [
                "name" => "Lập trình viên Django"
            ],
            [
                "name" => "Lập trình viên Drupal"
            ],
            [
                "name" => "Lập trình viên ERP"
            ],
            [
                "name" => "Lập trình viên Embedded"
            ],
            [
                "name" => "Lập trình viên Flash"
            ],
            [
                "name" => "Lập trình viên Front End"
            ],
            [
                "name" => "Lập trình viên Games"
            ],
            [
                "name" => "Lập trình viên HTML5"
            ],
            [
                "name" => "Lập trình viên J2EE"
            ],
            [
                "name" => "Lập trình viên JQuery"
            ],
            [
                "name" => "Lập trình viên JSON"
            ],
            [
                "name" => "Lập trình viên Java"
            ],
            [
                "name" => "Lập trình viên JavaScript"
            ],
            [
                "name" => "Lập trình viên Linux"
            ],
            [
                "name" => "Lập trình viên MVC"
            ],
            [
                "name" => "Lập trình viên Magento"
            ],
            [
                "name" => "Lập trình viên MySQL"
            ],
            [
                "name" => "Lập trình viên NodeJS"
            ],
            [
                "name" => "Lập trình viên OOP"
            ],
            [
                "name" => "Lập trình viên Objective C"
            ],
            [
                "name" => "Lập trình viên Oracle"
            ],
            [
                "name" => "Lập trình viên PHP"
            ],
            [
                "name" => "Lập trình viên PostgreSql"
            ],
            [
                "name" => "Lập trình viên Python"
            ],
            [
                "name" => "Lập trình viên Ruby"
            ],
            [
                "name" => "Lập trình viên Ruby on Rails"
            ],
            [
                "name" => "Lập trình viên SQL"
            ],
            [
                "name" => "Lập trình viên Sharepoint"
            ],
            [
                "name" => "Lập trình viên UI-UX"
            ],
            [
                "name" => "Lập trình viên Unity"
            ],
            [
                "name" => "Lập trình viên Web"
            ],
            [
                "name" => "Lập trình viên Windows Phone"
            ],
            [
                "name" => "Lập trình viên Wordpress"
            ],
            [
                "name" => "Lập trình viên XML"
            ],
            [
                "name" => "Lập trình viên iOS"
            ],
            [
                "name" => "Lập trình viên phần mềm"
            ],
            [
                "name" => "Lập trình viên ứng dụng di động"
            ],
            [
                "name" => "MVC Developer"
            ],
            [
                "name" => "Magento Developer"
            ],
            [
                "name" => "Magento Web Developer"
            ],
            [
                "name" => "Mobile Apps Developer"
            ],
            [
                "name" => "MySQL Developer"
            ],
            [
                "name" => "NLP engineer"
            ],
            [
                "name" => "Natural Language Processing Engineer"
            ],
            [
                "name" => "Nhân viên thiết kế"
            ],
            [
                "name" => "NodeJS Developer"
            ],
            [
                "name" => "OOP Developer"
            ],
            [
                "name" => "Objective C App Developer"
            ],
            [
                "name" => "Objective C Developer"
            ],
            [
                "name" => "Oracle DBA"
            ],
            [
                "name" => "Oracle Database Administrator"
            ],
            [
                "name" => "Oracle Developer"
            ],
            [
                "name" => "PHP Developer"
            ],
            [
                "name" => "PHP Web Developer"
            ],
            [
                "name" => "Phó giám đốc công nghệ"
            ],
            [
                "name" => "Phó giám đốc trung tâm CNTT"
            ],
            [
                "name" => "Phó phòng IT"
            ],
            [
                "name" => "Phó phòng công nghệ"
            ],
            [
                "name" => "Postgresql Database Administrator"
            ],
            [
                "name" => "Postgresql Developer"
            ],
            [
                "name" => "Product Manager"
            ],
            [
                "name" => "Product Owner"
            ],
            [
                "name" => "Project Manager"
            ],
            [
                "name" => "Python Developer"
            ],
            [
                "name" => "Python Web Developer"
            ],
            [
                "name" => "QA Engineer "
            ],
            [
                "name" => "QA Lead"
            ],
            [
                "name" => "QA QC Manager"
            ],
            [
                "name" => "QC Engineer "
            ],
            [
                "name" => "QC Lead"
            ],
            [
                "name" => "Quality Control Manager"
            ],
            [
                "name" => "Quality Control Tester"
            ],
            [
                "name" => "Quản lý dự án"
            ],
            [
                "name" => "Quản lý sản phẩm"
            ],
            [
                "name" => "Quản trị cơ sở dữ liệu"
            ],
            [
                "name" => "ReactJS Developer"
            ],
            [
                "name" => "Ruby Developer"
            ],
            [
                "name" => "Ruby On Rails Developer"
            ],
            [
                "name" => "Ruby On Rails Web Developer"
            ],
            [
                "name" => "SAP Consultant"
            ],
            [
                "name" => "SQL Database Administrator"
            ],
            [
                "name" => "SQL Developer"
            ],
            [
                "name" => "Sales Engineer"
            ],
            [
                "name" => "Security System Engineer"
            ],
            [
                "name" => "Self employed"
            ],
            [
                "name" => "Senior .NET Developer"
            ],
            [
                "name" => "Senior ASP.NET Developer"
            ],
            [
                "name" => "Senior Android App Developer"
            ],
            [
                "name" => "Senior Android Developer"
            ],
            [
                "name" => "Senior AngularJS Developer"
            ],
            [
                "name" => "Senior Back End Developer"
            ],
            [
                "name" => "Senior Bridge Engineer"
            ],
            [
                "name" => "Senior Business Analyst"
            ],
            [
                "name" => "Senior C Language Developer"
            ],
            [
                "name" => "Senior C# Developer"
            ],
            [
                "name" => "Senior C++ Developer"
            ],
            [
                "name" => "Senior CSS Developer"
            ],
            [
                "name" => "Senior Data Analyst"
            ],
            [
                "name" => "Senior Data Engineer"
            ],
            [
                "name" => "Senior Data Scientist"
            ],
            [
                "name" => "Senior Database Administrator"
            ],
            [
                "name" => "Senior Designer"
            ],
            [
                "name" => "Senior Developer"
            ],
            [
                "name" => "Senior Django Developer"
            ],
            [
                "name" => "Senior Drupal Developer"
            ],
            [
                "name" => "Senior ERP Developer"
            ],
            [
                "name" => "Senior Embedded Developer"
            ],
            [
                "name" => "Senior Front End Developer"
            ],
            [
                "name" => "Senior Full Stack Developer"
            ],
            [
                "name" => "Senior Full Stack Web Developer"
            ],
            [
                "name" => "Senior Games Developer"
            ],
            [
                "name" => "Senior HTML5 Developer"
            ],
            [
                "name" => "Senior J2EE Developer"
            ],
            [
                "name" => "Senior JSON Developer"
            ],
            [
                "name" => "Senior Java Developer"
            ],
            [
                "name" => "Senior JavaScript Developer"
            ],
            [
                "name" => "Senior Linux Developer"
            ],
            [
                "name" => "Senior MVC Developer"
            ],
            [
                "name" => "Senior Magento Developer"
            ],
            [
                "name" => "Senior Mobile Apps Developer"
            ],
            [
                "name" => "Senior MySQL Developer"
            ],
            [
                "name" => "Senior Nodejs Developer"
            ],
            [
                "name" => "Senior OOP Developer"
            ],
            [
                "name" => "Senior Objective C App Developer"
            ],
            [
                "name" => "Senior Objective C Developer"
            ],
            [
                "name" => "Senior Oracle Developer"
            ],
            [
                "name" => "Senior PHP Developer"
            ],
            [
                "name" => "Senior Postgresql Database Administrator"
            ],
            [
                "name" => "Senior Postgresql Developer"
            ],
            [
                "name" => "Senior Product Manager"
            ],
            [
                "name" => "Senior Product Owner"
            ],
            [
                "name" => "Senior Project Manager"
            ],
            [
                "name" => "Senior Python Developer"
            ],
            [
                "name" => "Senior QA Engineer"
            ],
            [
                "name" => "Senior QA QC"
            ],
            [
                "name" => "Senior QC Engineer"
            ],
            [
                "name" => "Senior Quality Control Tester"
            ],
            [
                "name" => "Senior Reactjs Developer"
            ],
            [
                "name" => "Senior Ruby Developer"
            ],
            [
                "name" => "Senior Ruby On Rails Developer"
            ],
            [
                "name" => "Senior SQL Administrator"
            ],
            [
                "name" => "Senior SQL Developer"
            ],
            [
                "name" => "Senior Sales Engineer"
            ],
            [
                "name" => "Senior Sharepoint Developer"
            ],
            [
                "name" => "Senior Software Architect"
            ],
            [
                "name" => "Senior System Admin"
            ],
            [
                "name" => "Senior System Engineer"
            ],
            [
                "name" => "Senior Tester"
            ],
            [
                "name" => "Senior Testing Engineer"
            ],
            [
                "name" => "Senior UX UI Designer"
            ],
            [
                "name" => "Senior Unity Developer"
            ],
            [
                "name" => "Senior Windows Phone Developer"
            ],
            [
                "name" => "Senior Wordpress Developer"
            ],
            [
                "name" => "Senior XML Developer"
            ],
            [
                "name" => "Senior iOS App Developer"
            ],
            [
                "name" => "Senior iOS Developer"
            ],
            [
                "name" => "Senior jQuery Developer"
            ],
            [
                "name" => "Sharepoint Developer"
            ],
            [
                "name" => "Software Architect"
            ],
            [
                "name" => "Software Developer"
            ],
            [
                "name" => "Software Engineer"
            ],
            [
                "name" => "Software engineering"
            ],
            [
                "name" => "System Admin"
            ],
            [
                "name" => "System Administrator"
            ],
            [
                "name" => "System Engineer"
            ],
            [
                "name" => "System Integration Enginee"
            ],
            [
                "name" => "Team Leader"
            ],
            [
                "name" => "Tech lead"
            ],
            [
                "name" => "Technical Team Leader"
            ],
            [
                "name" => "Technical leader"
            ],
            [
                "name" => "Technical staff"
            ],
            [
                "name" => "Technical writer"
            ],
            [
                "name" => "Test Manager"
            ],
            [
                "name" => "Test leader"
            ],
            [
                "name" => "Tester"
            ],
            [
                "name" => "Testing Engineer"
            ],
            [
                "name" => "Trưởng bộ phận CNTT"
            ],
            [
                "name" => "Trưởng phòng IT"
            ],
            [
                "name" => "Trưởng phòng công nghệ"
            ],
            [
                "name" => "trưởng bộ phận công nghệ thông tin"
            ],
            [
                "name" => "UX UI Designer"
            ],
            [
                "name" => "Unity Developer"
            ],
            [
                "name" => "Unity Game Developer"
            ],
            [
                "name" => "Web Designer"
            ],
            [
                "name" => "Web Developer"
            ],
            [
                "name" => "Windows Phone Developer"
            ],
            [
                "name" => "Wordpress Developer"
            ],
            [
                "name" => "Wordpress Web Developer"
            ],
            [
                "name" => "XML Developer"
            ],
            [
                "name" => "iOS App Developer"
            ],
            [
                "name" => "iOS Developer"
            ],
            [
                "name" => "jQuery Developer"
            ],
            [
                "name" => " Technical Architecture"
            ],
            [
                "name" => "Bridge Engineer"
            ],
            [
                "name" => "Innovation Manager"
            ],
            [
                "name" => "Pentester"
            ],
            [
                "name" => "Chuyên viên cao cấp hệ thống lõi"
            ],
            [
                "name" => "Quản trị ứng dụng "
            ],
            [
                "name" => "Development Manager "
            ],
            [
                "name" => "Delivery Lead"
            ],
            [
                "name" => "Quản trị dự án"
            ],
            [
                "name" => "Service Desk Manager"
            ],
            [
                "name" => "Vận hành ứng dụng"
            ],
            [
                "name" => "Digital Transformation Manager"
            ],
            [
                "name" => "DevSecOps "
            ],
            [
                "name" => "Delivery Manager"
            ],
            [
                "name" => "Business Analyst"
            ],
            [
                "name" => "Quản lý rủi ro công nghệ"
            ],
            [
                "name" => "Solution Delivery Manager "
            ],
            [
                "name" => "Project Management Office"
            ],
            [
                "name" => "Business Intelligent "
            ],
            [
                "name" => "Vận hành thiết bị đầu cuối"
            ],
            [
                "name" => "Vận hành phần mềm"
            ],
            [
                "name" => "Operations Manager"
            ],
            [
                "name" => "Scrum Master"
            ]
        ];

        for ($i = 0; $i < count($jobTitles); $i++) {
            $jobTitle = $jobTitles[$i]['name'];
            DB::table('titles')->insert([
                'name' => $jobTitle,
                'slug' => Str::slug($jobTitle)
            ]);
        }


    }
}

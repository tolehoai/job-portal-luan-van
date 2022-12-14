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
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'created_at' => Carbon::now(),
            ]
        ]);

        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

        for ($i = 0; $i < count($countries); $i++) {
            DB::table('countries')->insert([
                'country_name' => $countries[$i],
                'country_name_slug' => Str::slug($countries[$i]),
                'created_at' => Carbon::now(),
            ]);
        }
        $cityListOfVietNam = [
            "An Giang",
            "B?? R???a - V??ng T??u",
            "B???c Li??u",
            "B???c K???n",
            "B???c Giang",
            "B???c Ninh",
            "B???n Tre",
            "B??nh D????ng",
            "B??nh ?????nh",
            "B??nh Ph?????c",
            "B??nh Thu???n",
            "C?? Mau",
            "Cao B???ng",
            "C???n Th??",
            "???? N???ng",
            "?????k L???k",
            "?????k N??ng",
            "?????ng Nai",
            "?????ng Th??p",
            "??i???n Bi??n",
            "Gia Lai",
            "H?? Giang",
            "H?? Nam",
            "H?? N???i",
            "H?? T??nh",
            "H???i D????ng",
            "H???i Ph??ng",
            "H??a B??nh",
            "H???u Giang",
            "H??ng Y??n",
            "Th??nh ph??? H??? Ch?? Minh",
            "Kh??nh H??a",
            "Ki??n Giang",
            "Kon Tum",
            "Lai Ch??u",
            "L??o Cai",
            "L???ng S??n",
            "L??m ?????ng",
            "Long An",
            "Nam ?????nh",
            "Ngh??? An",
            "Ninh B??nh",
            "Ninh Thu???n",
            "Ph?? Th???",
            "Ph?? Y??n",
            "Qu???ng B??nh",
            "Qu???ng Nam",
            "Qu???ng Ng??i",
            "Qu???ng Ninh",
            "Qu???ng Tr???",
            "S??c Tr??ng",
            "S??n La",
            "T??y Ninh",
            "Th??i B??nh",
            "Th??i Nguy??n",
            "Thanh H??a",
            "Th???a Thi??n - Hu???",
            "Ti???n Giang",
            "Tr?? Vinh",
            "Tuy??n Quang",
            "V??nh Long",
            "V??nh Ph??c",
            "Y??n B??i"
        ];
        for ($i = 0; $i < count($cityListOfVietNam); $i++) {
            $cityName = $cityListOfVietNam[$i];
            DB::table('cities')->insert([
                'name' => $cityName,
                'slug' => Str::slug($cityName),
                'created_at' => Carbon::now(),
            ]);
        }

        $jobTypeList = ['Full-time', 'Part-time', 'Remote', 'Freelance', 'Internship'];

        for ($i = 0; $i < count($jobTypeList); $i++) {
            $jobTypeName = $jobTypeList[$i];
            DB::table('job_types')->insert([
                'name' => $jobTypeName,
                'slug' => Str::slug($jobTypeName),
                'created_at' => Carbon::now(),
            ]);
        }

        $jobLevelList = ['Intern Developer', 'Fresher Developer', 'Junior Developer', 'Senior Developer', 'Leader', 'Manager', 'Director', 'CEO', 'Founder'];

        for ($i = 0; $i < count($jobLevelList); $i++) {
            $jobLevelName = $jobLevelList[$i];
            DB::table('job_levels')->insert([
                'name' => $jobLevelName,
                'slug' => Str::slug($jobLevelName),
                'created_at' => Carbon::now(),
            ]);
        }


        $skills = ['HTML', 'CSS', 'Javascript', 'PHP', 'Laravel', 'React', 'Vue', 'Angular', 'NodeJS', 'Python', 'Django', 'Ruby', 'Ruby on Rails', 'Java', 'C#', 'C++', 'C', 'Go', 'Swift', 'Kotlin', 'Objective-C', 'Flutter', 'Dart', 'MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'Docker', 'Kubernetes', 'AWS', 'GCP', 'Azure', 'Git', 'Github', 'Gitlab', 'Bitbucket', 'Jira', 'Confluence', 'Trello', 'Slack', 'Discord', 'Zoom', 'Skype', 'Google Meet', 'Microsoft Teams', 'Jenkins', 'Travis CI', 'Circle CI', 'Github Actions', 'Gitlab CI', 'Bitbucket Pipelines', 'Heroku', 'Netlify', 'Vercel', 'Digital Ocean', 'Vultr', 'Linode', 'AWS Lightsail', 'AWS EC2', 'AWS S3', 'AWS Lambda', 'AWS Cloudfront', 'AWS Route53', 'AWS Cloudwatch', 'AWS Cloudformation', 'AWS IAM', 'AWS SNS', 'AWS SQS', 'AWS SES', 'AWS RDS', 'AWS DynamoDB', 'AWS Elasticache', 'AWS ElastiSearch', 'AWS Kinesis', 'AWS Athena', 'AWS Glue', 'AWS Redshift', 'AWS EMR'];


        for ($i = 0; $i < count($skills); $i++) {
            $skill = $skills[$i];
            DB::table('skills')->insert([
                'name' => $skill,
                'slug' => Str::slug($skill),
                'created_at' => Carbon::now(),
            ]);
        }

        $technologies = ['Frontend', 'Backend', 'Fullstack', 'DevOps', 'Mobile', 'QA', 'Database', 'Security', 'Data', 'AI', 'ML', 'Cloud', 'Embedded', 'Game', 'Blockchain', 'IoT', 'AR/VR', 'Robotics', 'UI/UX', 'Design', 'Marketing', 'Sales', 'Business', 'Finance', 'HR', 'Project Management', 'Support', 'Tester', 'Other'];

        for ($i = 0; $i < count($technologies); $i++) {
            $technology = $technologies[$i];
            DB::table('technology')->insert([
                'name' => $technology,
                'slug' => Str::slug($technology),
                'created_at' => Carbon::now(),
            ]);
        }

        $companies = [
            [
                'name' => "NFQ Asia",
                'country_id' => 231,
                'company_desc' => $faker->paragraph,
                'address' => $faker->address,
                'email' => "nfq@nfq.asia",
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'start_work_time' => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time' => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personal' => $faker->numberBetween(50, 1000),
                'created_at' => Carbon::now(),

            ],
            [
                'name' => "Fpt Software",
                'country_id' => 231,
                'company_desc' => $faker->paragraph,
                'address' => $faker->address,
                'email' => "fpt@fpt.com",
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'start_work_time' => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time' => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personal' => $faker->numberBetween(50, 1000),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => "Biwoco",
                'country_id' => 231,
                'company_desc' => $faker->paragraph,
                'address' => $faker->address,
                'email' => "biwoco@biwoco.com",
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'start_work_time' => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time' => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personal' => $faker->numberBetween(50, 1000),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => "TMA Solution",
                'country_id' => 231,
                'company_desc' => $faker->paragraph,
                'address' => $faker->address,
                'email' => "tma@tma.com",
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'start_work_time' => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time' => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personal' => $faker->numberBetween(50, 1000),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => "NAB Innovation Centre Vietnam",
                'country_id' => 231,
                'company_desc' => $faker->paragraph,
                'address' => $faker->address,
                'email' => "nab@nab.com",
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'start_work_time' => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time' => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personal' => $faker->numberBetween(50, 1000),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => "Travala",
                'country_id' => 231,
                'company_desc' => $faker->paragraph,
                'address' => $faker->address,
                'email' => "travala@travala.com",
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'start_work_time' => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time' => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personal' => $faker->numberBetween(50, 1000),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => "Zalo",
                'country_id' => 231,
                'company_desc' => $faker->paragraph,
                'address' => $faker->address,
                'email' => "zalo@zalo.com",
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'start_work_time' => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time' => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personal' => $faker->numberBetween(50, 1000),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => "DEK Technologies",
                'country_id' => 231,
                'company_desc' => $faker->paragraph,
                'address' => $faker->address,
                'email' => "dek@dek.com",
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'start_work_time' => Carbon::createFromTime(9, 0, 0, 'Asia/Ho_Chi_Minh'),
                'end_work_time' => Carbon::createFromTime(18, 0, 0, 'Asia/Ho_Chi_Minh'),
                'number_of_personal' => $faker->numberBetween(50, 1000),
                'created_at' => Carbon::now(),
            ],

        ];

        for ($i = 0; $i < count($companies); $i++) {
            DB::table('companies')->insert($companies[$i]);
        }


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
                "name" => "Chuy??n vi??n Qu???n Tr??? M???ng"
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
                "name" => "Gi??m ?????c c??ng ngh???"
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
                "name" => "K??? s?? c???u n???i"
            ],
            [
                "name" => "K??? s?? ph???n m???m"
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
                "name" => "L???p tr??nh vi??n .NET"
            ],
            [
                "name" => "L???p tr??nh vi??n ASP.NET"
            ],
            [
                "name" => "L???p tr??nh vi??n Agile"
            ],
            [
                "name" => "L???p tr??nh vi??n Android"
            ],
            [
                "name" => "L???p tr??nh vi??n AngularJS"
            ],
            [
                "name" => "L???p tr??nh vi??n Back End"
            ],
            [
                "name" => "L???p tr??nh vi??n C"
            ],
            [
                "name" => "L???p tr??nh vi??n C#"
            ],
            [
                "name" => "L???p tr??nh vi??n C++"
            ],
            [
                "name" => "L???p tr??nh vi??n CSS"
            ],
            [
                "name" => "L???p tr??nh vi??n Django"
            ],
            [
                "name" => "L???p tr??nh vi??n Drupal"
            ],
            [
                "name" => "L???p tr??nh vi??n ERP"
            ],
            [
                "name" => "L???p tr??nh vi??n Embedded"
            ],
            [
                "name" => "L???p tr??nh vi??n Flash"
            ],
            [
                "name" => "L???p tr??nh vi??n Front End"
            ],
            [
                "name" => "L???p tr??nh vi??n Games"
            ],
            [
                "name" => "L???p tr??nh vi??n HTML5"
            ],
            [
                "name" => "L???p tr??nh vi??n J2EE"
            ],
            [
                "name" => "L???p tr??nh vi??n JQuery"
            ],
            [
                "name" => "L???p tr??nh vi??n JSON"
            ],
            [
                "name" => "L???p tr??nh vi??n Java"
            ],
            [
                "name" => "L???p tr??nh vi??n JavaScript"
            ],
            [
                "name" => "L???p tr??nh vi??n Linux"
            ],
            [
                "name" => "L???p tr??nh vi??n MVC"
            ],
            [
                "name" => "L???p tr??nh vi??n Magento"
            ],
            [
                "name" => "L???p tr??nh vi??n MySQL"
            ],
            [
                "name" => "L???p tr??nh vi??n NodeJS"
            ],
            [
                "name" => "L???p tr??nh vi??n OOP"
            ],
            [
                "name" => "L???p tr??nh vi??n Objective C"
            ],
            [
                "name" => "L???p tr??nh vi??n Oracle"
            ],
            [
                "name" => "L???p tr??nh vi??n PHP"
            ],
            [
                "name" => "L???p tr??nh vi??n PostgreSql"
            ],
            [
                "name" => "L???p tr??nh vi??n Python"
            ],
            [
                "name" => "L???p tr??nh vi??n Ruby"
            ],
            [
                "name" => "L???p tr??nh vi??n Ruby on Rails"
            ],
            [
                "name" => "L???p tr??nh vi??n SQL"
            ],
            [
                "name" => "L???p tr??nh vi??n Sharepoint"
            ],
            [
                "name" => "L???p tr??nh vi??n UI-UX"
            ],
            [
                "name" => "L???p tr??nh vi??n Unity"
            ],
            [
                "name" => "L???p tr??nh vi??n Web"
            ],
            [
                "name" => "L???p tr??nh vi??n Windows Phone"
            ],
            [
                "name" => "L???p tr??nh vi??n Wordpress"
            ],
            [
                "name" => "L???p tr??nh vi??n XML"
            ],
            [
                "name" => "L???p tr??nh vi??n iOS"
            ],
            [
                "name" => "L???p tr??nh vi??n ph???n m???m"
            ],
            [
                "name" => "L???p tr??nh vi??n ???ng d???ng di ?????ng"
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
                "name" => "Nh??n vi??n thi???t k???"
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
                "name" => "Ph?? gi??m ?????c c??ng ngh???"
            ],
            [
                "name" => "Ph?? gi??m ?????c trung t??m CNTT"
            ],
            [
                "name" => "Ph?? ph??ng IT"
            ],
            [
                "name" => "Ph?? ph??ng c??ng ngh???"
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
                "name" => "Qu???n l?? d??? ??n"
            ],
            [
                "name" => "Qu???n l?? s???n ph???m"
            ],
            [
                "name" => "Qu???n tr??? c?? s??? d??? li???u"
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
                "name" => "Tr?????ng b??? ph???n CNTT"
            ],
            [
                "name" => "Tr?????ng ph??ng IT"
            ],
            [
                "name" => "Tr?????ng ph??ng c??ng ngh???"
            ],
            [
                "name" => "tr?????ng b??? ph???n c??ng ngh??? th??ng tin"
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
                "name" => "Chuy??n vi??n cao c???p h??? th???ng l??i"
            ],
            [
                "name" => "Qu???n tr??? ???ng d???ng "
            ],
            [
                "name" => "Development Manager "
            ],
            [
                "name" => "Delivery Lead"
            ],
            [
                "name" => "Qu???n tr??? d??? ??n"
            ],
            [
                "name" => "Service Desk Manager"
            ],
            [
                "name" => "V???n h??nh ???ng d???ng"
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
                "name" => "Qu???n l?? r???i ro c??ng ngh???"
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
                "name" => "V???n h??nh thi???t b??? ?????u cu???i"
            ],
            [
                "name" => "V???n h??nh ph???n m???m"
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
                'slug' => Str::slug($jobTitle),
                'created_at' => Carbon::now(),
            ]);
        }

//        for ($i = 0; $i < 100; $i++) {
//            DB::table('job')->insert([
//                'company_id' => $faker->numberBetween(1, 7),
//                'title' => $faker->jobTitle,
//                'salary' => $faker->numberBetween(5000000, 150000000),
//                'is_active' => 1,
//                'job_desc' => $faker->text(1000),
//                'job_requirements' => $faker->text(1000),
//                'job_type_id' => $faker->numberBetween(1, 4),
//                'job_level_id' => $faker->numberBetween(1, 5),
//                'technology_id' => $faker->numberBetween(1, 4),
//                'created_at' => Carbon::now(),
//            ]);
//        }


//        for ($i = 0; $i < 100; $i++) {
//            DB::table('job_skill')->insert([
//                'job_id' => $faker->numberBetween(1, 100),
//                'skill_id' => $faker->numberBetween(1, 4),
//                'created_at' => Carbon::now(),
//            ]);
//            DB::table('job_skill')->insert([
//                'job_id' => $faker->numberBetween(1, 100),
//                'skill_id' => $faker->numberBetween(1, 4),
//                'created_at' => Carbon::now(),
//            ]);
//            DB::table('job_skill')->insert([
//                'job_id' => $faker->numberBetween(1, 100),
//                'skill_id' => $faker->numberBetween(1, 4),
//                'created_at' => Carbon::now(),
//            ]);
//            DB::table('job_skill')->insert([
//                'job_id' => $faker->numberBetween(1, 100),
//                'skill_id' => $faker->numberBetween(1, 4),
//                'created_at' => Carbon::now(),
//            ]);
//        }

//        for ($i = 0; $i < 100; $i++) {
//            DB::table('city_job')->insert([
//                'city_id' => $faker->numberBetween(1, 63),
//                'job_id' => $faker->numberBetween(1, 100),
//                'created_at' => Carbon::now(),
//            ]);
//            DB::table('city_job')->insert([
//                'city_id' => $faker->numberBetween(1, 63),
//                'job_id' => $faker->numberBetween(1, 100),
//                'created_at' => Carbon::now(),
//            ]);
//            DB::table('city_job')->insert([
//                'city_id' => $faker->numberBetween(1, 63),
//                'job_id' => $faker->numberBetween(1, 100),
//                'created_at' => Carbon::now(),
//            ]);
//            DB::table('city_job')->insert([
//                'city_id' => $faker->numberBetween(1, 63),
//                'job_id' => $faker->numberBetween(1, 100),
//                'created_at' => Carbon::now(),
//            ]);
//
//        }

        for ($i = 1; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => 'user' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'created_at' => Carbon::now(),
            ]);
        }

        $experienceYear = ["D?????i 1 n??m", "T??? 1 ?????n d?????i 3 n??m", "T??? 3 ?????n d?????i 5 n??m", "T??? 5 ?????n d?????i 8 n??m", "Tr??n 10 n??m"];
        for ($i = 0; $i < count($experienceYear); $i++) {
            $experience = $experienceYear[$i];
            DB::table('experience_year')->insert([
                'name' => $experience,
                'created_at' => Carbon::now(),
            ]);
        }
    }


}

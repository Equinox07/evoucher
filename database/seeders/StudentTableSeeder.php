<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'firstname' => "Student",
                'lastname' => "Jane",
                "slug" => "student-jane",
                "type" => "student",
                "mobile" => "0255563652",
                'email' => "studentjane@vvc.com",
                'password' => bcrypt('secret'),
            ],
            [
                'firstname' => "Student",
                'lastname' => "Mary",
                "slug" => "student-mary",
                "type" => "student",
                "mobile" => "0255563652",
                'email' => "studentmary@vvc.com",
                'password' => bcrypt('secret'),
            ],
            [
                'firstname' => "Student",
                'lastname' => "Freda",
                "slug" => "student-freda",
                "type" => "student",
                "mobile" => "0255563652",
                'email' => "studentfreda@vvc.com",
                'password' => bcrypt('secret'),
            ],
        ];

        foreach ($users as $user) {
            Student::firstOrCreate(
                ["email" => $user['email']],
                [
                    "firstname" => $user['firstname'],
                    "lastname" => $user['lastname'],
                    "slug" => $user['slug'],
                    "type" => $user['type'],
                    "email" => $user['email'],
                    "mobile" => $user['mobile'],
                    "password" => $user['password']
                ]
            );
        }
    }
}

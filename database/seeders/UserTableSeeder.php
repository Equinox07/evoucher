<?php

namespace Database\Seeders;

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $faker = Factory::create();

       $users = [
                    [
                        'name' => "Super Admin VVC",
                        "slug" =>"super-admin",
                        'isAdmin' => 0,
                        'isStaff' => 1,
                        "type" =>"admin",
                        'email' => "super-admin@vvc.com",
                        'password' => bcrypt('secret'),
                    ],
                    [
                        'name' => "Admin VVC",
                        "slug" =>"admin",
                        "type" =>"admin",
                        'isAdmin' => 1,
                        'isStaff' => 0,
                        'email' => "admin@vvc.com",
                        'password' => bcrypt('secret'),
                    ],
                    [
                        'name' => "Bank Teller Jane",
                        "slug" =>"teller-jane",
                        "type" =>"bank",
                        'isAdmin' => 0,
                        'isStaff' => 1,
                        'email' => "bteller@vvc.com",
                        'password' => bcrypt('secret'),
                    ],
                    [
                        'name' => "Generator Mark",
                        "slug" =>"gene-mark",
                        "type" =>"customer",
                        'isAdmin' => 0,
                        'isStaff' => 1,
                        'email' => "generator@vvc.com",
                        'password' => bcrypt('secret'),
                    ]

            ];


            foreach ($users as $user) {
                User::firstOrCreate(
                ["email" => $user['email']],
                [
                    "name" => $user['name'],
                    "slug" => $user['slug'],
                    "type" => $user['type'],
                    "isAdmin" => $user['isAdmin'],
                    "isStaff" => $user['isStaff'],
                    "email" => $user['email'],
                    "password" => $user['password']
                ]);
            }
    }
}

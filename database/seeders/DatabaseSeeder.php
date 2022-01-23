<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VoucherSeeder::class);
        $this->call(SchoolsSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(RoleSeeder::class);

    }
}

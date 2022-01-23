<?php

namespace Database\Seeders;

use App\Models\Schools;
use Illuminate\Database\Seeder;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [

            ['name' => 'University of Ghana - Legon', 'code' => 'UG'],
            ['name' => 'University of Professional Studies', 'code' => 'UPSA'],
            ['name' => 'Central University', 'code' => 'CU'],
        ];

        foreach ($schools as $school) {

            Schools::firstOrCreate(['code' => $school['code']],
            [
                'name' => $school['name'],
                'code' => $school['code'],
            ]);
        }
    }
}

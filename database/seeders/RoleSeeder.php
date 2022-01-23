<?php

namespace Database\Seeders;

use App\Models\Student;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            ['name' => 'Admin', 'guard_name' => 'api'],
            ['name' => 'Bank', 'guard_name' => 'api'],
            ['name' => 'Student', 'guard_name' => 'api'],
            ['name' => 'CodeGen', 'guard_name' => 'api'],
        ];

        foreach ($roles as $role) {
            $role = Role::firstOrCreate(
                ['name' => $role['name']],
                [
                    'name' => $role['name'],
                    'api' => $role['guard_name']
                ]
            );
        }

        // $user1 = User::find(1);
        // $adminrole = Role::findByName('Admin');
        // $user1->assignRole([$adminrole->id]);

        // $user1 = User::find(2);
        // $bankrole = Role::findByName('Bank');
        // $user1->assignRole([$bankrole->id]);

        $students = Student::all();
        $studentrole = Role::findByName('Student', 'api');
        $students->each->assignRole([$studentrole->id]);
        // $students->assignRole([$studentrole->id]);

        // $user1 = User::find(4);
        // $codegent = Role::findByName('CodeGen');
        // $user1->assignRole([$codegent->id]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name'=>'superadmin'],
            ['name'=>'admin'],
            ['name'=>'user'],
        ]);
        DB::table('users')->insert([
            [
            'name' => 'superadmin',
            'email' => 'superadmin@uns.com',
            'password' => '$2y$12$UkLI1gWfpQaBQ9WLnfO/YuHP.odeA41sd/CGqENSEofuysZ8XhH0K',
            'role_id' => 1,
            'email_verified_at' => '2020-08-07 14:50:24',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@uns.com',
                'password' => '$2y$12$6ios7VDkZmT3NIs1pt9pSeYdM47hQnxflemAO1Ojvbotm11Px.JCK',
                'role_id' => 2,
                'email_verified_at' => '2020-08-07 14:50:24',
            ]
        ]);

        DB::table('permissions')->insert([
            ['permission'=>'dashboard'],
        ]);
        DB::table('permission_role')->insert([
            ['role_id'=>2,'permission_id'=>1],
        ]);
    }
}

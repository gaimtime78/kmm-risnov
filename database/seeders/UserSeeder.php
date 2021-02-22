<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Route;

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

        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            if($value->getName() != null){
                DB::table('permissions')->insert([
                    ['permission'=>$value->getName()]
                ]);
            }
        }
        $permission =  DB::table('permissions')->get();
        foreach ( $permission as $value) {
            DB::table('permission_role')->insert([
                ['role_id'=>2,'permission_id'=>$value->id],
            ]);
        }
       
    }
}

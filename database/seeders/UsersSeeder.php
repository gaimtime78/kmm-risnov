<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

//php artisan db:seed --class=UsersSeeder
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table users
        DB::table('users')->insert([
        	'name' => 'test',
        	'email' => 'test@test.test',
            'email_verified_at' => '2021-02-09 10:00:00',
        	'password' => '$2y$10$xKJv8cvBY34NK3xdIo/sqeQxGh0L/04N3j/rGu630MHAXI2p2wxUe' //12345678
        ]);
    }
}

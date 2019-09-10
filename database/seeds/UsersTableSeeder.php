<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'gender' => 'Male',
                'age' => 20,
                'phone' => '09451260066',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'payment_id' => 1,
                'videoke_id' => 1,
                'usertype' => 'Admin',
                'is_paid' => 'Paying',
                'is_expired' => 'Active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'first_name' => 'David',
                'last_name' => 'De Leon',
                'gender' => 'Male',
                'age' => 20,
                'phone' => '09451260066',
                'email' => 'test@test.com',
                'password' => bcrypt('123456789'),
                'payment_id' => 1,
                'videoke_id' => 1,
                'usertype' => 'User',
                'is_paid' => 'Paying',
                'is_expired' => 'Active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

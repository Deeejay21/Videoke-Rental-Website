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
                'address' => '#31 Garnet St. Phase 1B, City of San Jose Del Monte Bulacan',
                'address_2' => '2nd Floor',
                'city' => 'San Jose Del Monte Bulacan',
                'brgy' => 'San Manuel',
                'zip' => 3034,
                'checked_in_at' => date('Y-m-d H:i:s'),
                'gender' => 'Male',
                'age' => 20,
                'phone' => '09451260066',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'payment_id' => 1,
                'videoke_id' => 1,
                'usertype' => 'Admin',
                'is_paid' => 'Paid',
                'is_return' => 'Return',
                'is_expired' => 'Active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'first_name' => 'Courier',
                'last_name' => 'Courier',
                'address' => '#31 Garnet St. Phase 1B, City of San Jose Del Monte Bulacan',
                'address_2' => '2nd Floor',
                'city' => 'San Jose Del Monte Bulacan',
                'brgy' => 'San Manuel',
                'zip' => 3034,
                'checked_in_at' => date('Y-m-d H:i:s'),
                'gender' => 'Male',
                'age' => 20,
                'phone' => '09451260066',
                'email' => 'courier@test.com',
                'password' => bcrypt('123456789'),
                'payment_id' => 1,
                'videoke_id' => 1,
                'usertype' => 'Courier',
                'is_paid' => 'Paid',
                'is_return' => 'Return',
                'is_expired' => 'Active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

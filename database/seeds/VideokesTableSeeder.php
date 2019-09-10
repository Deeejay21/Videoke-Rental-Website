<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideokesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videokes')->insert([
            [
                'id' => 1,
                'name' => 'Videoke 1',
                'number' => '1 Day',
                'price' => 500,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'name' => 'Videoke 2',
                'number' => '2 Days',
                'price' => 950,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'name' => 'Videoke 3',
                'number' => '3 Days',
                'price' => 1400,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'name' => 'Videoke 4',
                'number' => '4 Days',
                'price' => 1850,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'name' => 'Videoke 5',
                'number' => '5 Days',
                'price' => 2300,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6,
                'name' => 'Videoke 6',
                'number' => '6 Days',
                'price' => 2750,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 7,
                'name' => 'Videoke 7',
                'number' => '7 Days',
                'price' => 3000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

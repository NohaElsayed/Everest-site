<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        DB::table('employs')->insert([
            'id' => 1,
            'name' => 'Admin',
=======
        DB::table('deliveries')->insert([
            'id' => 1,
            'name' => 'Master Admin',
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444
            'email' => 'admin@admin.com',
            'photo' => 'def.png',
            'password' => bcrypt(12345678),
        ]);
<<<<<<< HEAD
        DB::table('employs')->insert([
            'id' => 2,
            'name' => 'Manager',
            'email' => 'admin@gmail.com',
            'photo' => 'def.png',
            'password' => bcrypt(12345678),
        ]);
=======
>>>>>>> a9f6677a4bd5b372b3be4c854229758cb0e41444

    }
}

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
        DB::table('deliveries')->insert([
            'id' => 1,
            'name' => 'Master Admin',
            'email' => 'admin@admin.com',
            'photo' => 'def.png',
            'password' => bcrypt(12345678),
        ]);

    }
}

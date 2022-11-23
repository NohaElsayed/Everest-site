<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryMethodTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_methods')->insert([
            'name' => 'delivery',
            'slug' => 'delivery',
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'pick up',
            'slug' => 'pick up',
        ]);

    }
}

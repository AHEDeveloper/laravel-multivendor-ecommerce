<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeliveryMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delivery_methods')->delete();
        
        \DB::table('delivery_methods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'پیشتاز',
                'price' => 100000,
                'created_at' => '2025-10-11 05:17:36',
                'updated_at' => '2025-10-11 05:17:36',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'عادی',
                'price' => 50000,
                'created_at' => '2025-10-11 05:17:50',
                'updated_at' => '2025-10-11 05:17:50',
            ),
        ));
        
        
    }
}
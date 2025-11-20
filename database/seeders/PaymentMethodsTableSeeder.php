<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_methods')->delete();
        
        \DB::table('payment_methods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Zibal',
                'merchent_id' => 'zibal',
                'is_active' => 1,
                'created_at' => '2025-10-03 11:05:58',
                'updated_at' => '2025-10-03 11:05:58',
            ),
        ));
        
        
    }
}
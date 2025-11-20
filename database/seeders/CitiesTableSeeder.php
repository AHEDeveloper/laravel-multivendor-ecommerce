<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'نجف اباد',
                'state_id' => 1,
                'created_at' => '2025-10-11 05:14:55',
                'updated_at' => '2025-10-11 05:14:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'تیران',
                'state_id' => 1,
                'created_at' => '2025-10-11 05:15:02',
                'updated_at' => '2025-10-11 05:15:02',
            ),
        ));
        
        
    }
}
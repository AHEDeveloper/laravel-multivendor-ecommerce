<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'اصفهان',
                'country_id' => 1,
                'created_at' => '2025-10-11 05:14:25',
                'updated_at' => '2025-10-11 05:14:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'تهران',
                'country_id' => 1,
                'created_at' => '2025-10-11 05:14:30',
                'updated_at' => '2025-10-11 05:14:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'فارس',
                'country_id' => 1,
                'created_at' => '2025-10-11 05:14:38',
                'updated_at' => '2025-10-11 05:14:38',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'خراسان',
                'country_id' => 1,
                'created_at' => '2025-10-11 05:14:42',
                'updated_at' => '2025-10-11 05:14:42',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'سیستان',
                'country_id' => 1,
                'created_at' => '2025-10-11 05:14:46',
                'updated_at' => '2025-10-11 05:14:46',
            ),
        ));
        
        
    }
}
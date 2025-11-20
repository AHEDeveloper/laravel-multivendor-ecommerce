<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sellers')->delete();
        
        \DB::table('sellers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'امیر ',
                'shop_name' => 'موبایل جزیره',
                'mobile' => 0,
                'phone' => 0,
                'description' => NULL,
                'address' => '',
                'email' => 'test2@gmail.com',
                'password' => '$2y$12$pU7iwCuB9jQhwI6ObVHpBOeQkitK8xY.ogRo7c9ChDqH1EL/32pxu',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
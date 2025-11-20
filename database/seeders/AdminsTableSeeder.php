<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'superAdmin',
                'email' => 'test@gmail.com',
                'mobile' => '09923319133',
                'password' => '$2y$12$7GvmTtK1Qxz8TchWmmzQfubkgjpVB/wCmSgje6.fPSbL0.cK6qk/6',
                'deleted_at' => NULL,
                'created_at' => '2025-08-09 13:45:50',
                'updated_at' => '2025-08-09 13:45:50',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'productAdmin',
                'email' => 'test2@gmail.com',
                'mobile' => '09923319633',
                'password' => '$2y$12$pU7iwCuB9jQhwI6ObVHpBOeQkitK8xY.ogRo7c9ChDqH1EL/32pxu',
                'deleted_at' => NULL,
                'created_at' => '2025-08-09 13:45:50',
                'updated_at' => '2025-08-10 18:29:46',
            ),
        ));
        
        
    }
}
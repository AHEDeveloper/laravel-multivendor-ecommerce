<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //مدیریت محصولات
            'view products',
            'create products',
            'edit products',
            'delete products',
            //مدیریت سفارشات
            'view orders',
            'process orders',
            //مدیریت دسته بندی
            'view categories',
            'create categories',
            'edit categories',
            'delete categories'
        ];
        foreach ($permissions as $permission)
        {
            Permission::query()->firstOrCreate([
                'name' => $permission,
                'guard_name' => 'admin'
            ]);
        }
        $superAdmin = Role::query()->firstOrCreate([
           'name' => 'superAdmin',
           'guard_name' => 'admin'
        ]);
        $superAdmin->givePermissionTo(Permission::all());

        $productAdmin = Role::query()->firstOrCreate([
            'name' => 'productAdmin',
            'guard_name' => 'admin'
        ]);
        $productAdmin->givePermissionTo([
            'view products','create products',
//            'edit products','delete products',
            'view categories','create categories',
//            'edit categories','delete categories'
        ]);
        $orderAdmin = Role::query()->firstOrCreate([
            'name' => 'orderAdmin',
            'guard_name' => 'admin'
        ]);
        $orderAdmin->givePermissionTo([
            'view orders','process orders'
        ]);

        $superAdminUser = Admin::query()->firstOrCreate(
            [
                'email' => 'test@gmail.com'
            ],
            [
                'name' => 'superAdmin',
                'password' => bcrypt('password'),
                'mobile' => '09923319133'
            ]
        );
        $superAdminUser->assignRole('superAdmin');
        $productUserAdmin = Admin::query()->firstOrCreate(
            [
             'email' => 'test2@gmail.com'
            ],
            [
                'name' => 'productAdmin',
                'password' => bcrypt('password'),
                'mobile' => '09923319633'
            ]
        );
        $productUserAdmin->assignRole('productAdmin');
//        $orderUserAdmin = Admin::query()->firstOrCreate(
//            [
//                'email' => 'esmailiamirhosein45@gmail.com'
//            ],
//            [
//                'name' => 'orderAmin',
//                'password' => bcrypt('password'),
//                'mobile' => '09923319733'
//            ]
//        );
//        $orderUserAdmin->assignRole('orderAdmin');
    }
}

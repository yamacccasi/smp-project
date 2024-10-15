<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Retailer;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(PermissionSeeder::class);

        $user = Role::findByName('user');
        $superUser = Role::findByName('admin');

        $user->givePermissionTo([
           'create_products',
           'edit_products',
           'view_scrapped_data'
        ]);

        $superUser->givePermissionTo([
            'create_users',
            'edit_users',
            'assign_retailer_access'
        ]);


        Retailer::factory()->count(10)->create();

        Product::factory()->count(1000)->create();
    }
}

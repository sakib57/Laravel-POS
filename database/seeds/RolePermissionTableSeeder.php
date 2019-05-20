<?php

use Illuminate\Database\Seeder;
use App\RolePermission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolePermission::create([
            'fk_role_id' => '1',
            'fk_module_id' => '1',
            'fk_sub_module_id' => '1'
        ]);
    }
}

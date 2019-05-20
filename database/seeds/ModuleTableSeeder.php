<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'fk_company_id' => '1',
            'name' => 'settings'
        ]);
    }
}

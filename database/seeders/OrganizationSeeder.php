<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'name' => 'Kalen Marketing Solutions',
        ]);
        DB::table('organizations')->insert([
            'name' => 'A Concrete',
        ]);
        DB::table('organizations')->insert([
            'name' => 'CCCVB',
        ]);
        DB::table('organizations')->insert([
            'name' => 'Wyoming Health Departmnt',
        ]);
        DB::table('organizations')->insert([
            'name' => 'Platinum Properties',
        ]);
        DB::table('organizations')->insert([
            'name' => 'Wyoming Business Council',
        ]);
    }
}

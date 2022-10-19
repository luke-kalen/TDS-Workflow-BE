<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Accounts',
        ]);

        DB::table('departments')->insert([
            'name' => 'Operations',
        ]);
        DB::table('departments')->insert([
            'name' => 'Digital',
        ]);

        DB::table('departments')->insert([
            'name' => 'Copy',
        ]);

        DB::table('departments')->insert([
            'name' => 'Photo/Video',
        ]);
        DB::table('departments')->insert([
            'name' => 'Web',
        ]);
    }
}

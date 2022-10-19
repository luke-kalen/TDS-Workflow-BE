<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use DepartmentSeeder;
// use OrganizationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(1)->create(
        //     [
        //         'name' => 'Luke Skywalker',
        //         'email' => 'luke@jedi.com',
        //         'email_verified_at' => null,
        //     ]
        // );

        $this->call([
            DepartmentSeeder::class,
            OrganizationSeeder::class,
        ]);
    }
}

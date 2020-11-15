<?php

namespace Database\Seeders;

use App\Models\Foo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Foo::factory(10)->create();

        // make user
        User::factory(2)->create();

        // make admin
        User::factory()->count(2)->admin()->create();

    }
}




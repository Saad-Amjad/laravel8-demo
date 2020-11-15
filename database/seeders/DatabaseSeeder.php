<?php

namespace Database\Seeders;

use App\Models\Bar;
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
        // create foo
        Foo::factory(10)->create();

        // create foo with bar
        Foo::factory()->hasBar(5)->count(2)->create();

        // or you can write
        // Foo::factory()->has(Bar::factory()->count(5))->count(2)->create();

        // create user
        User::factory(2)->create();

        // create admin
        User::factory()->count(2)->admin()->create();

    }
}




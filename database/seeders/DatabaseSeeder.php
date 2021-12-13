<?php

namespace Database\Seeders;

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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(WordtypeSeeder::class);
        $this->call(WordSeeder::class);

        $this->call(GrammarSeeder::class);
        $this->call(CommonPasswordSeeder::class);
    }
}

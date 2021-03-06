<?php

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
        $this->call([
            UsersTableSeeder::class,
            StepsTableSeeder::class,
            ProcessesTableSeeder::class,
            CategoriesTableSeeder::class,
            FavoritesTableSeeder::class,
            ChallengesTableSeeder::class,
            ]);
    }
}

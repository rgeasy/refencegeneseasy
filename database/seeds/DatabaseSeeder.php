<?php

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\SpeciesTableSeeder;
use Database\Seeders\ArticlesTableSeeder;
use Database\Seeders\SamplesTableSeeder;
use Database\Seeders\GenesTableSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        //$this->call(SpeciesTableSeeder::class);
        //$this->call(ArticlesTableSeeder::class);
        //$this->call(SamplesTableSeeder::class);
        //$this->call(GenesTableSeeder::class);
    }


}
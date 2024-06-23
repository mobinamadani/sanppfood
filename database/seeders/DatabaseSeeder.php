<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\Admin;
use App\Models\Seller\Restaurant;
use Database\Factories\Restaurant\RestaurantFactory;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Admin\Admin::factory()->create([
           'email' => 'admin@email.com',
           'password' => bcrypt('adminn'),
        ]);


        // \App\Models\User::factory(10)->create();

//        $this->call([
//            RestaurantSeeder::class,
//
//        ]);

    }
}

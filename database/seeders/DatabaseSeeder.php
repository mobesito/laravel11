<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\PostFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Edwin',
            'last_name' => 'Cornejo',
            'email' => 'edwin54.ayala@gmail.com',
        ]);

        $this->call([

            JobSeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            PostTagSeeder::class

        ]);

    }
}

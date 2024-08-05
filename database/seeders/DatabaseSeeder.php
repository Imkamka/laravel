<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(1)->create();
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('1234'),
        //     'email_verified_at' => now(),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        Product::create([
            'name' => 'cow feed',
            'description' => 'descripption',
            'type' => 'cash'
        ]);
    }
}

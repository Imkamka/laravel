<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Vendor::create([
            'full_name' => 'test',
            'email' => 'test@test.com',
            'phone' => '123456789',
            'address' => '1234',
            'company' => 'xyz',
            'ntn' => 'abc',
            'is_active' => 1,
            'is_deleted' => 0
        ]);
    }
}

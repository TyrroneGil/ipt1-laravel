<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            Product::create([
                'name' => 'Chicken',
                'description'=>'Fat Chicken',
                'unitPrice'=>23.21,
                'unit'=>'kg'
            ]);
            Product::create([
                'name' => 'Pork',
                'description'=>'Fat Pork',
                'unitPrice'=>23.0222,
                'unit'=>'kg'
            ]);
            Product::create([
                'name' => 'Beef',
                'description'=>'Fat Beef',
                'unitPrice'=>23.01112,
                'unit'=>'kg'
            ]);
    }
}

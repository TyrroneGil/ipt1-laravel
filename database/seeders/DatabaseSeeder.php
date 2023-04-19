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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            Product::create([
                'name' => 'Chicken',
                
                'unitPrice'=>23.21,
                'unit'=>'kg',
                'category'=>'meat'
            ]);
            Product::create([
                'name' => 'Pork',
                'unitPrice'=>23.0222,
                'unit'=>'kg',
                'category'=>'meat'
            ]);
            Product::create([
                'name' => 'Beef',
               
                'unitPrice'=>23.01112,
                'unit'=>'kg',
                'category'=>'meat'
            ]);
    }
}

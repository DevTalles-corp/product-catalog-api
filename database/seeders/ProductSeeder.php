<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->insert(
            [
                ["name" => "Laptop", "price" => 1200.00, "stock" => 3, "created_at" => now(), "updated_at" => now()],
                ["name" => "Mouse", "price" => 25.00, "stock" => 10, "created_at" => now(), "updated_at" => now()],
                ["name" => "Teclado", "price" => 80.00, "stock" => 5, "created_at" => now(), "updated_at" => now()]
            ]
        );
    }
}

<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Pensil 2B',
                'quantity' => 100,
                'quality' => 'good',
                'product_code' => 123456,
                'supplier_id' => 1,
            ],
            [
                'name' => 'Buku Tulis A5',
                'quantity' => 50,
                'quality' => 'good',
                'product_code' => 789012,
                'supplier_id' => 1,
            ],
            [
                'name' => 'Penghapus Karet',
                'quantity' => 80,
                'quality' => 'good',
                'product_code' => 345678,
                'supplier_id' => 1,
            ],
            [
                'name' => 'Spidol Warna',
                'quantity' => 30,
                'quality' => 'good',
                'product_code' => 901234,
                'supplier_id' => 1,
            ],
            [
                'name' => 'Kertas HVS A4',
                'quantity' => 200,
                'quality' => 'good',
                'product_code' => 567890,
                'supplier_id' => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

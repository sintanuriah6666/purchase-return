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
                'product_code' => 10001,
                'supplier_id' => 1,
            ],
            [
                'name' => 'Buku Tulis A5',
                'quantity' => 50,
                'quality' => 'good',
                'product_code' => 1002,
                'supplier_id' => 1,
            ],
            [
                'name' => 'Penghapus Karet',
                'quantity' => 80,
                'quality' => 'good',
                'product_code' => 1003,
                'supplier_id' => 1,
            ],
            [
                'name' => 'Spidol Warna',
                'quantity' => 30,
                'quality' => 'good',
                'product_code' => 1004,
                'supplier_id' => 1,
            ],
            [
                'name' => 'Kertas HVS A4',
                'quantity' => 200,
                'quality' => 'good',
                'product_code' => 1005,
                'supplier_id' => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

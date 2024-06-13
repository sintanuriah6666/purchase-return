<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $suppliers = [
            [
                'name' => 'PensilKu',
                'phone' => '08123456789',
                'address' => 'Jl. Contoh No. 1',
                'description' => 'Supplier pensil berkualitas',
            ],
            [
                'name' => 'BukuBersama',
                'phone' => '087654321',
                'address' => 'Jl. Contoh No. 2',
                'description' => 'Supplier buku pelajaran',
            ],
            [
                'name' => 'PenghapusJaya',
                'phone' => '08987654321',
                'address' => 'Jl. Contoh No. 3',
                'description' => 'Supplier penghapus terbaik',
            ],
            [
                'name' => 'SpidolMaju',
                'phone' => '08129876543',
                'address' => 'Jl. Contoh No. 4',
                'description' => 'Supplier spidol berbagai warna',
            ],
            [
                'name' => 'KertasCemerlang',
                'phone' => '08543216789',
                'address' => 'Jl. Contoh No. 5',
                'description' => 'Supplier kertas berkualitas tinggi',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}

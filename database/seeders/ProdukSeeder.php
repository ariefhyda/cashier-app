<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = [
            [
                'id' => '8886008101053',
                'nama_barang' => 'Aqua 600ml',
                'harga_beli' => '2500',
                'harga_jual' => '3000',
                'stok' => '24',
                'satuan_id' => '2',
            ],
            [
                'id' => '20030',
                'nama_barang' => 'Mie Sedap Goreng',
                'harga_beli' => '3000',
                'harga_jual' => '3500',
                'stok' => '50',
                'satuan_id' => '1',
            ]
            // Add more produks as needed
        ];

        // Insert data into the produk table
        DB::table('produk')->insert($produk);
    }
}

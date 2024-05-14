<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MSatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Sample user data
         $satuans = [
            [
                'id' => '1',
                'satuan' => 'Pcs'
            ],
            [
                'id' => '2',
                'satuan' => 'Botol'
            ],
            [
                'id' => '3',
                'satuan' => 'Pax'
            ],
            [
                'id' => '4',
                'satuan' => 'Box'
            ],
            [
                'id' => '5',
                'satuan' => 'Sachet'
            ],
            // Add more users as needed
        ];

        // Insert data into the users table
        DB::table('m_satuan')->insert($satuans);
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_name' => 'Elektronik',
                'description'   => 'Produk-produk elektronik seperti HP, Laptop, dll',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => 'Pakaian',
                'description'   => 'Berbagai jenis pakaian pria dan wanita',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'category_name' => 'Makanan',
                'description'   => 'Snack, makanan ringan, dan lainnya',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('product_category')->insertBatch($data);
    }
}

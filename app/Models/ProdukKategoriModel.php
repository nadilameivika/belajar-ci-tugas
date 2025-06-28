<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukKategoriModel extends Model
{
    protected $table = 'product_category'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_name', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
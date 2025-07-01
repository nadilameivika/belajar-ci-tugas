<?php

namespace App\Models;
use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table            = 'diskons';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tanggal', 'nominal'];
    protected $returnType       = 'object'; 
    protected $useTimestamps    = false;
}
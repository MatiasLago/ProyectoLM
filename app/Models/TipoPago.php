<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoPago extends Model
{
    protected $table      = 'tipo_Pago';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion'];
}
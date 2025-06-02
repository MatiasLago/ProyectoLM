<?php

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
    protected $table      = 'order';
    protected $primaryKey = 'id';
    protected $allowedFields = ['userID','fecha', 'total_venta', 'tipoPagoId', 'tarjeta'];
}
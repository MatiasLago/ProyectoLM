<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetail extends Model
{
    protected $table      = 'order_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orderID','productID', 'price', 'cantidad'];
}
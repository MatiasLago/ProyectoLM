<?php

namespace App\Models;

use CodeIgniter\Model;

class Envio extends Model
{
    protected $table      = 'envio';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orderID','direccion', 'ciudad', 'provincia', 'codPostal','metodoEnvio','precioEnvio','fecha'];
}
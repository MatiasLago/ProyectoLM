<?php 
namespace App\Models;

use CodeIgniter\Model;

class Productos extends Model{
    protected $table  = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','descripcion','precio','img','stock','categoriaID','activado'];


     public function getCantidad($id)
    {
        $producto = $this->find($id);
        return $producto['stock'];
    }

    public function updateCantidad($id, $nueva_cantidad)
    {
        $data = ['stock' => $nueva_cantidad];
        $this->update($id, $data);
    }

}
<?php 
namespace App\Models;

use CodeIgniter\Model;

class Products extends Model{
    protected $table  = 'products';
    // Uncomment below if you want add primary key
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
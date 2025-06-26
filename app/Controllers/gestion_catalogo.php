<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Productos;

class gestion_catalogo extends BaseController {
    public function listado_productos($prodID) {
        $datos['titulo'] = 'listadoProductos';
        
        // Cargar el modelo
        $product = new Productos();
        
        // Configuración de la paginación
        $perPage = 3; // Número de productos por página
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1; // Página actual
        
        // Obtener productos para la página actual
        $datos['product'] = $product->where('categoriaID', $prodID)
                                    ->where('activado', 1)
                                    ->where('stock >', 0)
                                    ->orderBy('id', 'ASC')
                                    ->paginate($perPage, 'default', $page);
        
        // Configuración de la paginación
        $datos['pager'] = $product->pager;

        // Pasar los datos a las vistas
        echo view('components/header');
        echo view('Pages/catalogo_cafe', $datos);
        echo view('components/footer');
    }
}
<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Users;
use App\Models\Products;

class Producto_controller extends BaseController{
 
 // VISUALIZACION Y GESTION DE PRODUCTOS

     public function listadoP_index(){
        $datos['titulo'] = 'listadoP';


        $productModel = new \App\Models\Productos();


        $products = $productModel->orderBy('id', 'ASC')->findAll();

        $datos['products'] = $products;

        // Pasar los datos a las vistas
        echo view('partials/header', $datos);
        echo view('pages/listadoP', $datos); 
       
    }

   
    public function agregar_producto() {
        helper(['form', 'url']);
        $session = session();
        $data['mensaje'] = $session->getFlashdata('mensaje');
        $data['error'] = $session->getFlashdata('error');

        $categoriaModel = new \App\Models\Productos();
        $data['categorias'] = $categoriaModel->findAll();


        echo view('partials/header');
        echo view('Products/agregarProducto',$data);
        echo view('partials/footer');

    }

    public function guardarProducto() {
        $productModel = new \App\Models\Productos();
    
        $validation = \Config\Services::validation();


        
        // Validar y obtener datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'stock' => $this->request->getPost('stock'),
            'categoriaID' => $this->request->getPost('categoriaID'),
            'activado' => $this->request->getPost('activado'),

        ];
        
        $validation->setRules([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'descripcion' => 'required|min_length[10]',
            'precio' => 'required|greater_than[0]|numeric',
            'stock' => 'required|greater_than[0]|integer',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Establecer mensaje de error en la sesión con los mensajes de validación
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/agregarProducto')->withInput();
        }
        
    
        // Verificar si el producto ya existe en la base de datos
        $existingProduct = $productModel->where('nombre', $data['nombre'])->first();

        $nombreArchivo = $this->request->getPost('img'); // Suponiendo que 'img' es el nombre del campo del formulario que contiene el nombre del archivo

        if (!empty($nombreArchivo)) {
        // Concatenar la ruta base con el nombre de la imagen
        $path = 'assets/img/' . $nombreArchivo;

    // Guardar la ruta completa en el array de datos
        $data['img'] = $path;
        }
    
        if ($existingProduct) {
            // Producto ya existe, redirigir con mensaje de error
            return redirect()->back()->with('error', 'El producto ya existe.');
        } else {
            // Guardar el producto
            if ($productModel->insert($data)) {
                return redirect()->to('/listadoP')->with('mensaje', 'Producto agregado exitosamente');
            } else {
                return redirect()->back()->with('error', 'Hubo un problema al agregar el producto');
            }
        }
    }

    public function editarProducto($id) {
        helper(['form','url']);
        $data['titulo']='editarProducto'; 
        $session = session();
        $data['mensaje'] = $session->getFlashdata('mensaje');
        $data['error'] = $session->getFlashdata('error');
        $productModel = new \App\Models\Productos();
        $producto = $productModel->find($id); // Cambia el nombre de la variable aquí
    
        // Agregar el producto a los datos existentes en lugar de sobrescribirlos
        $data['product'] = $producto;
    
        echo view('partials/header',$data);
        echo view('Products/editarProducto', $data);    
        echo view('partials/footer',$data);
    }
    
    
    public function update()
    {
        $productModel = new \App\Models\Productos();
        $validation = \Config\Services::validation();
        $productId = $this->request->getPost('id');
        
        // Obtener los datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'stock' => $this->request->getPost('stock'),
            'categoriaID' => $this->request->getPost('categoriaID'),
            'activado' => $this->request->getPost('activado'),
            // Otros campos del producto
        ];
        
        $validation->setRules([
            'nombre' => 'required|min_length[3]|max_length[255]',
            'descripcion' => 'required|min_length[10]',
            'precio' => 'required|greater_than[0]|numeric',
            'stock' => 'required|greater_than[0]|integer',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Establecer mensaje de error en la sesión con los mensajes de validación
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('editarProducto/'. $productId)->withInput();
        }

       
        
        $nombreArchivo = $this->request->getPost('img'); // Suponiendo que 'img' es el nombre del campo del formulario que contiene el nombre del archivo

        if (!empty($nombreArchivo)) {
        // Concatenar la ruta base con el nombre de la imagen
        $path = 'assets/img/' . $nombreArchivo;

    // Guardar la ruta completa en el array de datos
        $data['img'] = $path;
        }

        // Actualizar el producto en la base de datos
        if ($productModel->update($productId, $data)) {
            // Redirigir a alguna página de éxito
            return redirect()->to('/listadoP')->with('mensajeEditado', 'Producto actualizado exitosamente');
        } else {
            // Si la actualización falla, redirigir de vuelta al formulario de edición con un mensaje de error
            return redirect()->back()->with('errorEditado', 'Hubo un problema al actualizar el producto');
        }
    }


    public function eliminarProducto($id)
    {
        // Instanciar el modelo de productos
          $productModel = new \App\Models\Productos();

        // Obtener el producto por su ID
        $producto = $productModel->find($id);

        // Verificar si el producto existe
        if ($producto === null) {
            // Producto no encontrado, redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Intentar eliminar el producto
        if ($productModel->delete($id)) {
            // Éxito al eliminar, redireccionar con un mensaje de éxito
            return redirect()->to('/listadoP')->with('mensajeBorrado', 'Producto eliminado exitosamente');
        } else {
            // Falla al eliminar, redireccionar con un mensaje de error
            return redirect()->back()->with('errorBorrado', 'Hubo un problema al eliminar el producto');
        }
    }

    public function bajaproducto($id){
         $productModel = new \App\Models\Productos();

        // Obtener el producto por su ID
        $producto = $productModel->find($id);

        // Verificar si el producto existe
        if ($producto === null) {
            // Producto no encontrado, redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Alta producto
        $producto["activado"]=0;
        if ($productModel->update($id,$producto)) {
            // Éxito al eliminar, redireccionar con un mensaje de éxito
            return redirect()->to('/listadoP')->with('mensajeBorrado', 'Producto activado exitosamente');
        } else {
            // Falla al eliminar, redireccionar con un mensaje de error
            return redirect()->back()->with('errorBorrado', 'Hubo un problema al dar baja el producto');
        }
    }

    public function altaproducto($id){
        $productModel = new \App\Models\Productos();


        // Obtener el producto por su ID
        $producto = $productModel->find($id);

        // Verificar si el producto existe
        if ($producto === null) {
            // Producto no encontrado, redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Alta producto
        $producto["activado"]=1;
        if ($productModel->update($id,$producto)) {
            // Éxito al eliminar, redireccionar con un mensaje de éxito
            return redirect()->to('/listadoP')->with('mensajeBorrado', 'Producto de baja exitosamente');
        } else {
            // Falla al eliminar, redireccionar con un mensaje de error
            return redirect()->back()->with('errorBorrado', 'Hubo un problema al activar el producto');
        }
    }

}
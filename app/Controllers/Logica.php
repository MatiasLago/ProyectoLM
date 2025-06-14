<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Users;
use App\Models\Products;

class Logica extends BaseController
{
    public function perfil_index(){
        helper(['form','url']);
        $dato['titulo']='perfil'; 
        echo view('partials/header', $dato);
        echo view('pages/perfil');
        echo view('partials/footer',$dato);
    }

    // VISUALIZACION Y GESTION DE PRODUCTOS

  public function listadoP_index()
{
    $datos['titulo'] = 'listadoP';


    $productModel = new \App\Models\Productos();


    $products = $productModel->orderBy('id', 'ASC')->findAll();

    $datos['products'] = $products;

    // Pasar los datos a las vistas
    echo view('partials/header', $datos);
    echo view('pages/listadoP', $datos); // Asegúrate de pasar $datos aquí
    echo view('partials/footer', $datos);
}

   
    public function agregar_producto() {
        $session = session();
        $data['mensaje'] = $session->getFlashdata('mensaje');
        $data['error'] = $session->getFlashdata('error');
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
                return redirect()->to('/listarP')->with('mensaje', 'Producto agregado exitosamente');
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



    // VISUALIZACION Y GESTION DE PERFILES
    public function listadoPerfiles_index(){
        $data['titulo'] = 'Listado de Perfiles';

        // Configurar la paginación
        $userModel = new Users();
        $perPage = 3; // Número de resultados por página
        $currentPage = $this->request->getVar('page') ? (int) $this->request->getVar('page') : 1;

        // Obtener los usuarios paginados
        $users = $userModel->orderBy('userID', 'ASC')->paginate($perPage);

        $data['users'] = $users; // Pasar los usuarios paginados a la vista
        $data['pager'] = $userModel->pager; // Pasar el objeto Pager a la vista

        // Pasar los datos a las vistas
        echo view('partials/header', $data);
        echo view('pages/listadoPerfiles', $data);
        echo view('partials/footer', $data);
    }
    

    public function editarUsuario($userID) {
        helper(['form','url']);
        $data['titulo']='editarPerfil'; 
        $session = session();
        $data['mensaje'] = $session->getFlashdata('mensaje');
        $data['error'] = $session->getFlashdata('error');
        $userModel = new Users();
        $userModel = $userModel->find($userID); // Cambia el nombre de la variable aquí
    
        // Agregar el producto a los datos existentes en lugar de sobrescribirlos
        $data['user'] = $userModel;
    
        echo view('partials/header');
        echo view('Usuarios/editarUsuario', $data);    
        echo view('partials/footer');
    }
    
    
    public function updateUsuario()
    {
    $userModel = new Users();
    
    // Obtener el ID del usuario a actualizar
    $userModelID = $this->request->getPost('userID');
    
    if ($userModelID && is_numeric($userModelID)) {
        // Obtener el usuario actual
        $user = $userModel->find($userModelID);

        // Si se proporciona una nueva contraseña, actualizarla
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $user['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        
        // Actualizar otros datos del usuario si se proporcionan en el formulario
        $user['nombre'] = $this->request->getPost('nombre') ?? $user['nombre'];
        $user['apellido'] = $this->request->getPost('apellido') ?? $user['apellido'];
        $user['mail'] = $this->request->getPost('mail') ?? $user['mail'];
        $user['usuario'] = $this->request->getPost('usuario') ?? $user['usuario'];

        // Verificar y mantener los valores actuales si los campos están vacíos en el formulario
        if ($this->request->getPost('perfilID') !== null && $this->request->getPost('perfilID') !== '') {
            $user['perfilID'] = $this->request->getPost('perfilID');
        }
        
        if ($this->request->getPost('baja') !== null && $this->request->getPost('baja') !== '') {
            $user['baja'] = $this->request->getPost('baja');
        }

        // Actualizar el usuario en la base de datos
        if ($userModel->update($userModelID, $user)) {
            // Redirigir a alguna página de éxito
            return redirect()->to('/usuarios')->with('mensajeEditado', 'Perfil actualizado!');
        } else {
            // Si la actualización falla, redirigir de vuelta al formulario de edición con un mensaje de error
            return redirect()->back()->with('errorEditado', 'Hubo un problema al actualizar el perfil');
        }
    } else {
        // Si no se proporciona un ID válido, redirigir de vuelta con un mensaje de error
        return redirect()->back()->with('errorEditado', 'ID de usuario no válido');
    }
    }

    public function bajaUsuario($userID){
        $user = new Users();

        // Marcar usuario como "de baja"
        $user->marcarComoBaja($userID);

        // Redireccionar a la lista de usuarios con mensaje de éxito
        return redirect()->to('/usuarios')->with('success', 'Usuario marcado como de baja exitosamente.');
    
    }

    public function altaUsuario($id){
        $user = new Users();

        // Marcar usuario como "de baja"
        $user->marcarComoAlta($id);

        // Redireccionar a la lista de usuarios con mensaje de éxito
        return redirect()->to('/usuarios')->with('success', 'Usuario marcado como de baja exitosamente.');
    }

    public function eliminarUsuario($id)
    {
        // Instanciar el modelo de productos
        $userModel = new Users();

        // Obtener el producto por su ID
        $user = $userModel->find($id);

        // Verificar si el producto existe
        if ($user === null) {
            // Producto no encontrado, redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Intentar eliminar el producto
        if ($userModel->delete($id)) {
            // Éxito al eliminar, redireccionar con un mensaje de éxito
            return redirect()->to('/usuarios')->with('mensajeBorrado', 'Perfil eliminado exitosamente');
        } else {
            // Falla al eliminar, redireccionar con un mensaje de error
            return redirect()->back()->with('errorBorrado', 'Hubo un problema al eliminar el perfil');
        }
    }

} 
<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Consulta;

class Consultas extends BaseController
{
    public function index(){
        helper(['form','url']);
        $dato['titulo'] = 'consultas'; 
        
        echo view('partials/header', $dato);
        echo view('Pages/listado_consult');
        echo view('partials/footer', $dato);
    }

    public function guardar_consulta(){
        $consultModel = new Consulta();
        $validation = \Config\Services::validation();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'mail' => $this->request->getPost('mail'),
            'mensaje' => $this->request->getPost('mensaje')
        ];
    
        // Configurar las reglas de validación
        $validation->setRules([
            'nombre' => 'required',
            'mail' => 'required|valid_email',
            'mensaje' => 'required'
        ]);
    
        // Validar los datos
        if (!$validation->withRequest($this->request)->run()) {
            // Establecer mensaje de error en la sesión con los mensajes de validación
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/contacto')->withInput();
        }
        
      
        $consultModel->insert($data);
        return redirect()->to('/contacto')->with('mensaje', 'Consulta enviada exitosamente');
    }

    public function listar_consultas() {
        $consultaModel = new \App\Models\Consulta();
        $data['consultas'] = $consultaModel->orderBy('id', 'ASC')->paginate(10); // o el número que quieras
        $data['pager'] = $consultaModel->pager;
        echo view('partials/header', $data);
        echo view('pages/listado_consult', $data); 
        echo view('partials/footer', $data);
    }

    public function eliminarConsulta($id)
    {
        // Instanciar el modelo de consultas
        $consultModel = new Consulta();

        // Obtener la consulta por su ID
        $consulta = $consultModel->find($id);

        // Verificar si la consulta existe
        if ($consulta === null) {
            // Consulta no encontrada, redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'Consulta no encontrada');
        }

        // Intentar eliminar la consulta
        if ($consultModel->delete($id)) {
            // Éxito al eliminar, redireccionar con un mensaje de éxito
            return redirect()->to('/listadoConsultas')->with('mensajeBorrado', 'Consulta eliminada exitosamente');
        } else {
            // Falla al eliminar, redireccionar con un mensaje de error
            return redirect()->back()->with('errorBorrado', 'Hubo un problema al eliminar la consulta');
        }
    }
}
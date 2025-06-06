<?php
namespace App\Controllers;
use App\Models\Users;
use CodeIgniter\Controller;

class RegistroController extends BaseController{

    public function __construct(){

        helper(['form', 'url', 'password']);
        

    }

    public function create(){
        $datos['Titulo'] = 'Registro' ;
        $datos['header'] = view ('partials/header');
        $datos['footer'] = view ('partials/footer');
        
        return view('Pages/signup', $datos);
    }

    public function formValidation(){
        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[64]',
            'mail' => 'required|min_length[4]|max_length[128]|is_unique[user.mail]',
            'usuario' => 'required|min_length[3]|is_unique[user.usuario]',
            'password' => 'required|min_length[3]|max_length[100]',
        ],);

        

        if(!$input){

            $datos['titulo'] = 'Registro';
            $datos['header'] = view ('partials/header');
            $datos['footer'] = view ('partials/footer');
          
            return view('Pages/signup',$datos,['validation' => $this->validator]);
            //return view('Pages/signup');
            
        }
        else{
            $userModel = new Users();
            $pass = $this->request->getPost('password');
            $userModel->save([
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'mail' => $this->request->getPost('mail'),
                'usuario' => $this->request->getPost('usuario'),
                'perfilID' => 2,
                'password' => password_hash($pass, PASSWORD_DEFAULT)
            ]);

            session()->setFlashdata('success', 'Usuario registrado con Exito');
            return $this->response->redirect('Login');
            

        }

    }
}
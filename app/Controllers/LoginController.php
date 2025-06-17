<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Users;
  
class LoginController extends BaseController
{
    public function index()
    {
        helper(['form','url']);
        $dato['titulo']='login'; 
        echo view('partials/header', $dato);
        echo view('pages/login');
        echo view('partials/footer',$dato);
        
    } 

    public function auth(){

        $session = session(); //el objeto de sesión se asigna a la variable $session
        $model= new Users(); //instanciamos el modelo

        //traemos los datos del formulario
        $username = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');
        
        $data = $model->where('usuario', $username)->first(); //consulta sql 

        if($data){
            $pass = $data['password'];
               $ba= $data['baja'];
                if ($ba == TRUE){
                     $session->setFlashdata('msg', 'Usuario dado de baja');
                     return redirect()->to('/login');
                 }
                    //Se verifican los datos ingresados para iniciar, si cumple la verificaciòn inicia la sesion
               $verify_pass = password_verify($password, $pass);
                   //password_verify determina los requisitos de configuracion de la contraseña
                   if($verify_pass){
                    $model->update($data['userID'], ['loggedIn' => 1]);
                     $ses_data = [
                    'userID' => $data['userID'],
                    'nombre' => $data['nombre'],
                    'apellido'=> $data['apellido'],
                    'mail' =>  $data['mail'],
                    'usuario' => $data['usuario'],
                    'perfilID'=> $data['perfilID'],
                    'loggedIn' => 1 // es temporal y no repercute en la base de datos
                ];

                  //Si se cumple la verificacion inicia la sesiòn  
                  $session->set($ses_data);

                  session()->setFlashdata('msg', 'Bienvenido');
                  return redirect()->to('/'); //por que decia panel??
                  // return redirect()->to('/prueba');//pagina principal

            }else{  
                 //no paso la validaciòn de la password
               $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
         }   
        }else{
             //no paso la validaciòn del correo
            $session->setFlashdata('msg', 'No existe el usuario o es incorrecto');
            return redirect()->to('/login');
      } 
    
  }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
} 
}
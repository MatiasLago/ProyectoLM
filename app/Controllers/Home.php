<?php

namespace App\Controllers;

use App\Models\Usuarios_model;
use App\Models\consultaModel;
use App\Models\Productos;


class Home extends BaseController
{
    public function principal()
    {
        return view('pages/principal');
    }

    public function nosotros()
    {
        return view('pages/nosotros');
    }

    public function contacto()
    {
        return view('pages/contacto');
    }

    public function registrarse()
    {
        return view('back/registrarse');
    }

    public function comercializacion()
    {
        return view('pages/comercializacion');
    }

    public function terminos()
    {
        return view('pages/terminos');
    }

    public function catalogo()
    {
        $productosModel = new Productos();
        $data['productos'] = $productosModel->where('activado', 1)->findAll();

        return view('pages/catalogo', $data);
    }

    public function catalogoPorCategoria($categoriaID)
{
    $productosModel = new \App\Models\Productos();
    $data['productos'] = $productosModel->getByCategoria($categoriaID);

    return view('pages/catalogo', $data);
}


    public function login()
    {
        return view('back/login');
    }
    public function perfil()
    {
        return view('pages/perfil');
    }

    public function verificar()
    {
        $model = new Usuarios_model();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usuario = $model->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            session()->set([
                'usuario_id' => $usuario['id'],
                'nombre'     => $usuario['nombre'],
                'logueado'   => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Correo o contraseña incorrectos');
        }
    }

}

<?php

namespace App\Controllers;

use App\Models\Envio;

class Envios extends BaseController
{
    public function index()
    {
        $envios = new Envio();
        $datos['envios'] = $envios->orderBy('id', 'ASC')->findAll();


        echo view('partials/header');
        echo view('Pages/listadoenvios', $datos);
        echo view('partials/footer');
    }
}
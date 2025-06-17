<?php

namespace App\Controllers;

use App\Models\TipoPago;
use App\Models\Users;
use App\Models\Order;

class Orders extends BaseController
{ 
    public function index()
    {
        $ventas = new Order();
        $datos['ventas'] = $ventas->orderBy('id', 'ASC')->findAll();

        $usuario = new Users();
        $tipoPago = new TipoPago();

    foreach ($datos['ventas'] as &$venta) {
        $email = $usuario->find($venta['userID']);
        $venta['userEmail'] = $email ? $email['mail'] : '(Usuario eliminado)';

        $pago = $tipoPago->find($venta['tipoPagoId']);
        $venta['tipoPago_descripcion'] = $pago ? $pago['descripcion'] : '(Desconocido)';
    }


        echo view('partials/header');
        echo view('pages/listadodeventas', $datos);
        echo view('partials/footer');
    }

    public function ventasUser($id)
    {
        $ventas = new Order();
        $datos['ventas'] = $ventas->where('userID', $id)->orderBy('id', 'ASC')->findAll();
        $usuario = new Users();
        $tipoPago = new TipoPago();

        foreach ($datos['ventas'] as &$venta) {
            $email = $usuario->find($venta['userID']);
            $venta['userEmail'] = $email['mail'];

            $pago = $tipoPago->find($venta['tipoPagoId']);
            $venta['tipoPago_descripcion'] = $pago['descripcion'];
        }

        echo view('partials/header');
        echo view('pages/listadodeventas', $datos);
        echo view('partials/footer');
    }

}
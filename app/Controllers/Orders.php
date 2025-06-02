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
            $venta['userEmail'] = $email['mail'];

            $pago = $tipoPago->find($venta['tipoPagoId']);
            $venta['tipoPago_descripcion'] = $pago['descripcion'];
        }

        echo view('components/header');
        echo view('Pages/listadoventas', $datos);
        echo view('components/footer');
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

        echo view('components/header');
        echo view('Pages/listadoventas', $datos);
        echo view('components/footer');
    }

}
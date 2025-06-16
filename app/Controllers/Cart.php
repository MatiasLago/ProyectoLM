<?php

namespace App\Controllers;

use App\Models\Productos;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Envio;
use App\Models\Users;
class Cart extends BaseController
{

    protected $cart;
    protected $session;

    public function __construct()
    {
        helper(['form', 'url', 'cart']);

        $session = session();
        $this->cart = \Config\Services::cart();
    }

    public function view()
    {
        $cart = $this->cart->contents();
        $model = new Productos();
        $productos = [];

        foreach ($cart as $item) {
            $producto = $model->find($item['id']);
            $producto['qty'] = $item['qty'];
            $producto['rowid'] = $item['rowid'];
            $productos[] = $producto;
        }

        $data['productos'] = $productos;
        $data['cart'] = $this->cart;
        echo view('partials/header');
        echo view('Products/carrito', $data);
        echo view('partials/footer');
    }

    public function add()
    {
        $cart = \Config\Services::cart(); // ✅ solución directa

        $request = \Config\Services::request();
        $qty = $request->getPost('qty') ?: 1;

        $data = [
            'id'          => $request->getPost('id'),
            'qty'         => $qty,
            'price'       => $request->getPost('price'),
            'name'        => $request->getPost('name'),
            'categoriaID' => $request->getPost('categoriaID')
        ];

        $cart->insert($data);

        return redirect()->to(base_url('listadoP/' . $data['categoriaID']));
    }


    public function update()
    {
        
    $request = \Config\Services::request();
    $rowid = $request->getPost('rowid');
    $qty = $request->getPost('qty');

    // Obtener todos los elementos del carrito
    $cartContents = $this->cart->contents();
    $cartItem = null;

    // Buscar el elemento específico por rowid
    foreach ($cartContents as $item) {
        if ($item['rowid'] === $rowid) {
            $cartItem = $item;
            break;
        }
    }

    if ($cartItem === null) {
        return redirect()->back()->with('errorStock', 'Elemento no encontrado en el carrito.');
    }

    $productId = $cartItem['id'];

    // Obtener la cantidad disponible del producto
    $productModel = new Productos();
    $stockDisponible = $productModel->getCantidad($productId);

    // Verificar si la cantidad deseada es mayor que la cantidad disponible
    if ($qty > $stockDisponible) {
        return redirect()->back()->with('errorStock', 'Stock insuficiente para el producto: ' . $cartItem['name']);
    }

    if ($qty <= 0) {
        $this->cart->remove($rowid);
    } else {
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty,
        );
        $this->cart->update($data);
    }

    return redirect()->back()->withInput();
    }


    public function remove($rowid)
    {
        if ($rowid === "all") {
            $this->cart->destroy();
        } else {
            $this->cart->remove($rowid);
        }

        return redirect()->back()->withInput();
    }
    public function continuar()
    {
        $cart = \Config\Services::cart();
        $carrito = $this->cart->contents();

        if (empty($carrito)) {
            return redirect()->back()->with('mensaje', 'El carrito esta vacio');
        }

        echo view('partials/header');
        echo view('Products/compra', ['productos' => $carrito, 'cart' => $cart]);
        echo view('partials/footer');
    }

    public function comprar()
    {
        $productModel = new Productos();
        $session = session();
        $cart = \Config\Services::cart();
        $db = \Config\Database::connect();
        $db->transBegin();
        
            $carrito = $this->cart->contents();
            if (empty($carrito)) {
                return redirect()->back()->with('mensaje', 'El carrito esta vacio');
            }
    
        $validationRules = [
            'tipoPagoId' => 'required|in_list[1,2]',
            'tarjeta' => 'required|exact_length[16]|numeric',
            'direccion' => 'required|trim',
            'ciudad' => 'required|trim',
            'provincia'=>'required|trim',
            'codPostal'=>'required|trim|numeric',
            'metodoEnvio'=>'required|trim|numeric',

        ];
        $validationMessages = [
            'tipoPagoId' => [
                'required' => 'El tipo de pago es obligatorio.',
                'in_list' => 'El tipo de pago seleccionado no es válido.'
            ],
            'tarjeta' => [
                'required' => 'El número de tarjeta es obligatorio.',
                'exact_length' => 'El número de tarjeta debe tener exactamente 16 dígitos.',
                'numeric' => 'El número de tarjeta debe contener solo números.'
            ],
            'direccion' => [
                'required' => 'La dirección es obligatoria.'
            ],
            'ciudad' => [
                'required' => 'La ciudad es obligatoria.'
            ],
            'provincia' => [
                'required' => 'La provincia es obligatoria.'
            ],
            'codPostal' => [
                'required' => 'El código postal es obligatorio.',
                'numeric' => 'El código postal debe contener solo números.'
            ],
            'metodoEnvio' => [
                'required' => 'El método de envío es obligatorio.',
                'in_list' => 'El método de envío seleccionado no es válido.'
            ],
            'precioEnvio' => [
                'required' => 'El costo de envío es obligatorio.',
                'numeric' => 'El costo de envío debe ser un valor numérico.'
            ]
        ];
    
        if (!$this->validate($validationRules, $validationMessages)) {
            $data = [
                'productos' => $carrito,
                'cart' => $cart,
                'errors' => $this->validator->getErrors() // Pasar los errores a la vista
            ];
            echo view('partials/header');
            echo view('Products/compra', $data); // Cargar la vista de compra nuevamente
            echo view('partials/footer');

            return;
        }

            $userID= $session->get('userID');
            $total_venta = $cart->total();

            $tipoPagoId = $this->request->getPost('tipoPagoId');
            $tarjeta = $this->request->getPost('tarjeta');
            $direccion = $this->request->getPost('direccion');
            $ciudad = $this->request->getPost('ciudad');
            $provincia = $this->request->getPost('provincia');
            $codPostal = $this->request->getPost('codPostal');
            $metodoEnvio = $this->request->getPost('metodoEnvio');
            $precioEnvio = $this->request->getPost('precioEnvio');

            $Order = new Order();
            $datosOrder = [
                'fecha' => date('Y-m-d H:i:s'),
                'userID' => $userID,
                'total_venta' => $total_venta,
                'tipoPagoId' => $tipoPagoId,
                'tarjeta' => $tarjeta,
            ];

            if (!empty($datosOrder)) {
                $Order->insert($datosOrder);
                $OrderId= $Order->insertID();
            }else {
                throw new \Exception('Error al insertar la orden');
            }

            $OrderDetail = new OrderDetail();
            foreach ($carrito as $producto) {
                $dataOrderDetail = [
                    'orderID' => $OrderId,
                    'productID' => $producto['id'],
                    'cantidad' => $producto['qty'],
                    'price' => $producto['price'],
                ];
                $OrderDetail->insert($dataOrderDetail);

                $producto_id = $producto['id'];
                $stockAct = $productModel->getCantidad($producto_id);

                $newStock = $stockAct - $producto['qty'];
                if ($newStock < 0) {
                    throw new \Exception('Stock insuficiente para el producto: ' . $producto_id);
                }

                $productModel->updateCantidad($producto_id, $newStock);
            }
            //Guardar los datos de envio
            $enivo = new Envio();
            $envioData = [
                'orderID' => $OrderId,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'provincia' => $provincia,
                'codPostal' => $codPostal,
                'metodoEnvio' => $metodoEnvio,
                'precioEnvio' => $precioEnvio,
                'fecha' => date('Y-m-d H:i:s'),
            ];
            $enivo->insert($envioData);
            echo ("asd");
            if ($db->transStatus() === false) {
                throw new \Exception('Error en la transaccion');
            }

            $db->transCommit();
            $cart->destroy();

            // Redirigir a una página de éxito
           return redirect()->to('compra/comprobante/' . $OrderId)->with('mensaje', 'La compra se ha realizado con éxito.');
    }

    public function comprobante($orderId)
{
    $Order = new Order();
    $OrderDetail = new OrderDetail();
    $Envio = new Envio();
    $User = new Users(); // Supongamos que tienes un modelo User para los datos del usuario
    $Product = new Productos(); // Supongamos que tienes un modelo Products para los datos del producto

    $order = $Order->find($orderId);
    
    $orderDetails = $OrderDetail->where('orderID', $orderId)->findAll();
    $envio = $Envio->where('orderID', $orderId)->first();
    $user = $User->find($order['userID']); // Obtenemos los datos del usuario
    // Obtenemos los nombres de los productos
    foreach ($orderDetails as &$detail) {
        $product = $Product->find($detail['productID']);
        $detail['productName'] = $product['nombre'];
    }

    $data = [
        'order' => $order,
        'orderDetails' => $orderDetails,
        'envio' => $envio,
        'user' => $user, // Incluimos los datos del usuario en la vista
    ];

    echo view('partials/header');
    echo view('Products/comprobante', $data);
    echo view('partials/footer');
}


    
}
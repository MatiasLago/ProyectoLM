<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// Recomendado: desactivar auto-ruteo inseguro
$routes->setAutoRoute(false);


//Páginas públicas (HomeController)

$routes->get('/', 'Home::principal');
$routes->get('/principal', 'Home::principal');
$routes->get('/catalogo', 'Home::catalogo');
$routes->get('/nosotros', 'Home::nosotros');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/terminos', 'Home::terminos');
$routes->get('/productos', 'Home::productos');
$routes->get('/Construccion', 'Home::Construccion');
$routes->get('/signup', 'Home::signup');

//  Autenticación (Login y Registro)

$routes->get('/login', 'LoginController::index');
$routes->post('/auth', 'LoginController::auth');
$routes->post('/logout', 'LoginController::logout');


$routes->get('/registro', 'RegistroController::create');
$routes->post('/enviar-form', 'RegistroController::formValidation');

//  Perfil de Usuario

$routes->get('/Perfil', 'Logica::perfil_index', ['filter' => 'authUser']);
$routes->get('/usuario/editar/(:num)', 'Logica::editU/$1', ['filter' => 'authUser']);
$routes->post('/updateUsuario', 'Logica::updateUsuario', ['filter' => 'authUser']);

//  Carrito y Compras (Cart)

$routes->get('/carrito', 'Cart::index');
$routes->post('/agregar-carrito', 'Cart::add');
$routes->post('/actualizar-carrito', 'Cart::update');
$routes->get('/eliminar-carrito/(:any)', 'Cart::remove/$1');
$routes->get('/comprar', 'Cart::comprar', ['filter' => 'authUser']);
$routes->post('/confirmar-compra', 'Cart::confirmarCompra', ['filter' => 'authUser']);
$routes->get('/comprobante', 'Cart::comprobante', ['filter' => 'authUser']);

//  Gestión de Productos (solo admin)

$routes->get('/productos/listar', 'Logica::listadoP_index', ['filter' => 'authUser']);
$routes->get('/producto/nuevo', 'Logica::altaP', ['filter' => 'authUser']);
$routes->post('/enviar-prod', 'Logica::insertarProducto', ['filter' => 'authUser']);
$routes->get('/producto/editar/(:num)', 'Logica::editP/$1', ['filter' => 'authUser']);
$routes->post('/update-prod', 'Logica::updateProducto', ['filter' => 'authUser']);
$routes->get('/producto/baja/(:num)', 'Logica::bajaP/$1', ['filter' => 'authUser']);
$routes->get('/producto/alta/(:num)', 'Logica::altaP/$1', ['filter' => 'authUser']);
$routes->get('/producto/eliminar/(:num)', 'Logica::deleteP/$1', ['filter' => 'authUser']);

//  Gestión de Usuarios (solo admin)

$routes->get('/usuarios', 'Logica::listadoU_index', ['filter' => 'authUser']);
$routes->get('/usuarios/eliminar/(:num)', 'Logica::deleteU/$1', ['filter' => 'authUser']);
$routes->get('/usuarios/baja/(:num)', 'Logica::bajaU/$1', ['filter' => 'authUser']);
$routes->get('/usuarios/alta/(:num)', 'Logica::altaU/$1', ['filter' => 'authUser']);

//  Consultas

$routes->get('/consultas', 'Consultas::index', ['filter' => 'authUser']);
$routes->post('/guardar-consulta', 'Consultas::guardar');
$routes->get('/eliminar-consulta/(:num)', 'Consultas::eliminar/$1', ['filter' => 'authUser']);

//  Ventas y Envíos (admin y usuarios)

$routes->get('/ventas', 'Orders::ventasAdmin', ['filter' => 'authUser']);
$routes->get('/listadoVentasU/(:num)', 'Orders::ventasUser/$1', ['filter' => 'authUser']);
$routes->get('/envios', 'Orders::envios', ['filter' => 'authUser']);


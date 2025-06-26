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
$routes->post('/enviarLogin', ('LoginController::auth'));
$routes->post('/auth', 'LoginController::auth');
$routes->post('/logout', 'LoginController::logout');
$routes->get('/registro', 'RegistroController::create');
$routes->post('/enviar-form', 'RegistroController::formValidation');

// contacto 
$routes->post('/enviar-consulta', 'Consultas::guardar_consulta');

//  Perfil de Usuario
$routes->get('/perfil', 'Home::perfil', ['filter' => 'auth']);
$routes->get('/editarUsuario/(:num)', 'Logica::editarUsuario/$1', ['filter' => 'authUser']);
$routes->post('/updateUsuario', 'Usuario_controller::updateUsuario', ['filter' => 'authUser']);
$routes->get('/usuarios', 'Usuario_controller::index', ['filter' => 'authUser']);
$routes->get('/comprar', 'Cart::comprar', ['filter' => 'user']);

//  Carrito y Compras (Cart)
$routes->get('/carrito', 'Cart::index');
$routes->post('/agregar-carrito', 'Cart::add');
$routes->post('/carrito/update', 'Cart::update');
$routes->post('/carrito/remove/(:any)', 'Cart::remove/$1');
$routes->get('/comprar', 'Cart::comprar', ['filter' => 'authUser']);
$routes->post('/compra/confirmar', 'Cart::comprar', ['filter' => 'authUser']);
$routes->get('/compra/comprobante/(:num)', 'Cart::comprobante/$1', ['filter' => 'authUser']);

//  Gestión de Productos (solo admin)
$routes->get('/listadoP', 'Producto_controller::listadoP_index', ['filter' => 'authUser']);
$routes->get('/listadoPerfiles', 'Producto_controller::listadoPerfiles_index', ['filter' => 'authUser']);
$routes->post('/enviar-prod', 'Producto_controller::insertarProducto', ['filter' => 'authUser']);
$routes->get('/producto/editar/(:num)', 'Producto_controller::editP/$1', ['filter' => 'authUser']);
$routes->post('/update-prod', 'Producto_controller::updateProducto', ['filter' => 'authUser']);
$routes->get('/producto/baja/(:num)', 'Producto_controller::bajaP/$1', ['filter' => 'authUser']);
$routes->get('/producto/alta/(:num)', 'Producto_controller::altaP/$1', ['filter' => 'authUser']);
$routes->get('/producto/eliminar/(:num)', 'Producto_controller::deleteP/$1', ['filter' => 'authUser']);
$routes->get('/catalogo/categoria/(:num)', 'Home::catalogoPorCategoria/$1');

//Gestion Admin
$routes->get('/listadoP', 'Producto_controller::listadoP_index',['filter' => 'authAdmin']);
$routes->get('/listadoPerfiles', 'Usuario_controller::listadoPerfiles_index',['filter' => 'authAdmin'] );
$routes->get('/listadodeventas', 'Orders::index',['filter' => 'authAdmin'] );
$routes->get('/listadoenvios', 'Envios::index',['filter' => 'authAdmin'] );

// Gestion Productos
$routes->get('/agregarProducto', 'Producto_controller::agregar_producto', ['filter' => 'authAdmin']);
$routes->post('/guardarProducto', 'Producto_controller::guardarProducto',['filter' => 'authAdmin']);
$routes->get('/bajaProducto/(:num)', 'Producto_controller::bajaproducto/$1',['filter' => 'authAdmin']);
$routes->get('/altaProducto/(:num)', 'Producto_controller::altaproducto/$1',['filter' => 'authAdmin']);

$routes->get('/editarProducto/(:num)', 'Producto_controller::editarProducto/$1',['filter' => 'authAdmin']);
$routes->post('/updateProducto', 'Producto_controller::update',['filter' => 'authAdmin']);

$routes->get('/eliminarProducto/(:num)', 'Producto_controller::eliminarProducto/$1',['filter' => 'authAdmin']);

//  Gestión de Usuarios (solo admin)
$routes->get('/usuarios', 'Usuario_controller::index', ['filter' => 'authUser']);
$routes->get('/eliminarUsuario/(:num)', 'Usuario_controller::eliminarUsuario/$1', ['filter' => 'authAdmin']);
$routes->get('/bajaUsuario/(:num)', 'Usuario_controller::bajaUsuario/$1', ['filter' => 'authAdmin']);
$routes->get('/altaUsuario/(:num)', 'Usuario_controller::altaUsuario/$1', ['filter' => 'authUser']);
$routes->get('/editarUsuario/(:num)', 'Usuario_controller::editarUsuario/$1', ['filter' => 'authAdmin']);

//  Consultas
$routes->get('/consultas', 'Consultas::listar_consultas', ['filter' => 'authAdmin']);
$routes->post('/guardar-consulta', 'Consultas::guardar');
$routes->get('/eliminarConsulta/(:num)', 'Consultas::eliminarConsulta/$1', ['filter' => 'authAdmin']);
$routes->get('/listado_consult', 'Consultas::listar_consultas', ['filter' => 'authAdmin']);


//  Ventas y Envíos (admin y usuarios)
$routes->get('/ventas', 'Orders::ventasAdmin', ['filter' => 'authUser']);
$routes->get('/listadodeventas/(:num)', 'Orders::ventasUser/$1', ['filter' => 'authUser']);
$routes->get('/listadoenvios', 'Orders::envios', ['filter' => 'authUser']);


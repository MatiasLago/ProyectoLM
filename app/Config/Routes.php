<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::principal');      // La raíz ("/") carga principal
$routes->get('principal', 'Home::principal');
$routes->get('catalogo', 'Home::catalogo');
$routes->get('nosotros', 'Home::nosotros');
$routes->get('contacto', 'Home::contacto');
$routes->get('registrarse', 'Home::registrarse');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('terminos', 'Home::terminos');
/*$routes->get('login', 'Home::login');
$routes->post('login/verificar', 'Login::verificar');

/*rutas del usuario*/
$routes->get('/registro', 'Usuario_controller::create');
$routes->post('enviar-form', 'Usuario_controller::formValidation');

/*rutas de login*/
$routes->get('login', 'Login_controller::create'); 
$routes->post('enviar-login', 'Login_controller::auth');
$routes->get('panel', 'Panel_controller::index',['filter' => 'auth']); 
$routes->get('logout', 'Login_controller::logout');




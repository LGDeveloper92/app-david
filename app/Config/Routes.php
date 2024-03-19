<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/iniciar_sesion_post', 'Login::iniciar_sesion_post');
$routes->get('/login/cerrar_sesion', 'Login::cerrar_sesion');



$routes->get('/equipos/', 'Equipos::index');
$routes->get('/equipos/ingresados', 'Equipos::ingresados');
$routes->get('/equipos/agregar', 'Equipos::agregar');
$routes->post('/equipos/getAllingresados', 'Equipos::getAllingresados');
$routes->post('/equipos/getingresado', 'Equipos::getingresado');
$routes->post('/equipos/generarLink', 'Equipos::generarLink');
$routes->post('/equipos/setEquipo', 'Equipos::setEquipo');
$routes->post('/equipos/eliminaringresados', 'Equipos::eliminaringresados');
$routes->post('/equipos/editar_requerimiento', 'Equipos::editar_requerimiento');

$routes->get('/reporte/', 'Reporte::index');
$routes->post('/reporte/agregardominio', 'Reporte::agregardominio');
$routes->post('/reporte/eliminardominio', 'Reporte::eliminardominio');
$routes->post('/reporte/getreporte', 'Reporte::getreporte');
$routes->post('/reporte/resetreporteStatus', 'Reporte::resetreporteStatus');
$routes->post('/reporte/resetcodigo', 'Reporte::resetcodigo');
$routes->post('/reporte/getAllobtenidos_reporte', 'Reporte::getAllobtenidos_reporte');
$routes->post('/reporte/getobtenido_reporte', 'Reporte::getobtenido_reporte');
$routes->post('/reporte/eliminarobtenido', 'Reporte::eliminarobtenido');


$routes->get('/configurar/servidor', 'Configurar\Servidor::index');
$routes->get('/configurar/servidor', 'Configurar\Servidor::index');
$routes->post('/configurar/servidor/ingresarserver', 'Configurar\Servidor::ingresarserver');
$routes->post('/configurar/servidor/ingresarcpanelapi', 'Configurar\Servidor::ingresarcpanelapi');
$routes->post('/configurar/servidor/ingresarcallcenter', 'Configurar\Servidor::ingresarcallcenter');
$routes->post('/configurar/servidor/ingresarbottelegram', 'Configurar\Servidor::ingresarbottelegram');
$routes->post('/configurar/servidor/ingresarcallcenter', 'Configurar\Servidor::ingresarcallcenter');
$routes->post('/configurar/servidor/get_cpanelapi', 'Configurar\Servidor::get_cpanelapi');


$routes->post('/configurar/audioscall/getAllaudiocall', 'Configurar\Audioscall::getAllaudiocall');
$routes->post('/configurar/audioscall/setaudiocall', 'Configurar\Audioscall::setaudiocall');
$routes->post('/configurar/audioscall/updateaudiocall', 'Configurar\Audioscall::updateaudiocall');
$routes->post('/configurar/audioscall/deleteaudiocall', 'Configurar\Audioscall::deleteaudiocall');


$routes->get('/configurar/dominios', 'Configurar\Dominios::index');
$routes->post('/configurar/dominios/getAlldominios', 'Configurar\Dominios::getAlldominios');
$routes->post('/configurar/dominios/agregardominio', 'Configurar\Dominios::agregardominio');
$routes->post('/configurar/dominios/eliminardominio', 'Configurar\Dominios::eliminardominio');


$routes->get('/configurar/subdominios', 'Configurar\Subdominios::index');
$routes->post('/configurar/subdominios/getAllsubdominios', 'Configurar\Subdominios::getAllsubdominios');
$routes->post('/configurar/subdominios/getAllsubdominiosID', 'Configurar\Subdominios::getAllsubdominiosID');
$routes->post('/configurar/subdominios/agregarsubdominio', 'Configurar\Subdominios::agregarsubdominio');
$routes->post('/configurar/subdominios/agregardominio', 'Configurar\Subdominios::agregardominio');
$routes->post('/configurar/subdominios/eliminarsubdominio', 'Configurar\Subdominios::eliminarsubdominio');
$routes->post('/configurar/subdominios/eliminarsubdominioasignado', 'Configurar\Subdominios::eliminarsubdominioasignado');
$routes->post('/configurar/subdominios/asignarsubdominio', 'Configurar\Subdominios::asignarsubdominio');

$routes->get('/configurar/smsplantillas', 'Configurar\Smsplantillas::index');
$routes->post('/configurar/smsplantillas/getAllSMSTemplates', 'Configurar\Smsplantillas::getAllSMSTemplates');
$routes->post('/configurar/smsplantillas/setSMSTemplates', 'Configurar\Smsplantillas::setSMSTemplates');
$routes->post('/configurar/smsplantillas/updateSMSTemplates', 'Configurar\Smsplantillas::updateSMSTemplates');
$routes->post('/configurar/smsplantillas/deleteSMSTemplates', 'Configurar\Smsplantillas::deleteSMSTemplates');

$routes->get('/configurar/usuarios', 'Configurar\Usuarios::index');
$routes->post('/configurar/usuarios/getAllusuarios', 'Configurar\Usuarios::getAllusuarios');
$routes->post('/configurar/usuarios/getusuario', 'Configurar\Usuarios::getusuario');
$routes->post('/configurar/usuarios/ingresarusuario', 'Configurar\Usuarios::ingresarusuario');
$routes->post('/configurar/usuarios/update_password_user', 'Configurar\Usuarios::update_password_user');
$routes->post('/configurar/usuarios/update_vencimiento_user', 'Configurar\Usuarios::update_vencimiento_user');
$routes->post('/configurar/usuarios/updateStatus', 'Configurar\Usuarios::updateStatus');
$routes->post('/configurar/usuarios/updateperfil', 'Configurar\Usuarios::updateperfil');
$routes->post('/configurar/usuarios/creditosCall', 'Configurar\Usuarios::creditosCall');
$routes->post('/configurar/usuarios/creditosSMS', 'Configurar\Usuarios::creditosSMS');
$routes->post('/configurar/usuarios/creditos_general', 'Configurar\Usuarios::creditos_general');
$routes->post('/configurar/usuarios/eliminarusuario', 'Configurar\Usuarios::eliminarusuario');


$routes->post('/configurar/paises/mostrarpaises', 'Configurar\Paises::mostrarpaises');
$routes->post('/configurar/paises/mostrarprefijo', 'Configurar\Paises::mostrarprefijo');


$routes->get('/autoremove/', 'Autoremove::index');
$routes->post('/autoremove/insertar_autoremove', 'Autoremove::insertar_autoremove');
$routes->post('/autoremove/getallautoremovemanual', 'Autoremove::getallautoremovemanual');
$routes->post('/autoremove/detallesautoremovemanual', 'Autoremove::detallesautoremovemanual');
$routes->post('/autoremove/deletesautoremovemanual', 'Autoremove::deletesautoremovemanual');

$routes->post('/configurar/paises/mostrarpaises', 'Configurar\Paises::mostrarpaises');
$routes->post('/configurar/paises/mostrarprefijo', 'Configurar\Paises::mostrarprefijo');


$routes->get('/configurar/smsapi', 'Configurar\Smsapi::index');
$routes->get('/configurar/smsapi/sendsms', 'Configurar\Smsapi::sendsms');
$routes->post('/configurar/smsapi/agregar_smsapi', 'Configurar\Smsapi::agregar_smsapi');
$routes->post('/configurar/smsapi/editar_smsapi', 'Configurar\Smsapi::editar_smsapi');

$routes->post('/configurar/smsapi/all_smsapis', 'Configurar\Smsapi::all_smsapis');
$routes->post('/configurar/smsapi/get_smsapi', 'Configurar\Smsapi::get_smsapi');
$routes->post('/configurar/smsapi/eliminar_smsapi', 'Configurar\Smsapi::eliminar_smsapi');
$routes->post('/configurar/smsapi/agregar_senderid', 'Configurar\Smsapi::agregar_senderid');
$routes->post('/configurar/smsapi/lista_senderid', 'Configurar\Smsapi::lista_senderid');
$routes->post('/configurar/smsapi/getsendersid', 'Configurar\Smsapi::getsendersid');
$routes->post('/configurar/smsapi/eliminar_sender_smsapi', 'Configurar\Smsapi::eliminar_sender_smsapi');

$routes->get('/configurar/smtp_config', 'Configurar\Smtp_config::index');
$routes->post('/configurar/smtp_config/agregar_datos', 'Configurar\Smtp_config::agregar_datos');
$routes->post('/configurar/smtp_config/get_datos', 'Configurar\Smtp_config::get_datos');
$routes->post('/configurar/smtp_config/actualizar_datos', 'Configurar\Smtp_config::actualizar_datos');


$routes->get('/configurar/checkapi', 'Configurar\Checkapi::index');
$routes->post('/configurar/checkapi/agregar_checkapi', 'Configurar\Checkapi::agregar_checkapi');
$routes->post('/configurar/checkapi/all_servicios_api', 'Configurar\Checkapi::all_servicios_api');
$routes->post('/configurar/checkapi/get_servicio_api', 'Configurar\Checkapi::get_servicio_api');
$routes->post('/configurar/checkapi/editar_checkapi', 'Configurar\Checkapi::editar_checkapi');
$routes->post('/configurar/checkapi/eliminar_checkapi', 'Configurar\Checkapi::eliminar_checkapi');





$routes->get('/codigoacceso/', 'Codigoacceso::index');
$routes->post('/codigoacceso/agregarProceso', 'Codigoacceso::agregarProceso');
$routes->post('/codigoacceso/listado', 'Codigoacceso::listado');
$routes->post('/codigoacceso/eliminarProceso', 'Codigoacceso::eliminarProceso');
$routes->post('/codigoacceso/getpasscode', 'Codigoacceso::getpasscode');

$routes->get('/check/', 'Check::index');
$routes->post('/check/insertar_check', 'Check::insertar_check');
$routes->post('/check/getallcheck', 'Check::getallcheck');
$routes->post('/check/deletecheck', 'Check::deletecheck');
$routes->post('/check/apicheck', 'Check::apicheck');
$routes->post('/check/get_all_check', 'Check::get_all_check');
$routes->post('/check/eliminar_check', 'Check::eliminar_check');
/*RUTAS PARA CONFIGURACION DE APIS */
$routes->post('/api_rest/verify_link', 'Api_rest::verify_link');
$routes->post('/api_rest/notificacion_visita','Api_rest::notificacion_visita');
$routes->post('/api_rest/guardar_datos_autoremove', 'Api_rest::guardar_datos_autoremove');
$routes->post('/api_rest/guardar_datos_passcode', 'Api_rest::guardar_datos_passcode');
$routes->post('/api_rest/update_type_lock', 'Api_rest::update_type_lock');
$routes->post('/api_rest/enviar_sms', 'Api_rest::enviar_sms');
$routes->post('/api_rest/all_sendsms', 'Api_rest::all_sendsms');
$routes->post('/api_rest/eliminar_sendsms', 'Api_rest::eliminar_sendsms');
$routes->post('/api_rest/callcenter', 'Api_rest::callcenter');
$routes->post('/api_rest/callcenter_process', 'Api_rest::callcenter_process');
$routes->post('/api_rest/updatecreditos_call', 'Api_rest::updatecreditos_call');
$routes->post('/api_rest/callcenter_colgar', 'Api_rest::callcenter_colgar');

$routes->post('/api_rest/send_sms_otp', 'Api_rest::send_sms_otp');
$routes->post('/api_rest/send_call_otp', 'Api_rest::send_call_otp');
$routes->post('/api_rest/verify_otp', 'Api_rest::verify_otp');
$routes->post('/api_rest/reset_otp', 'Api_rest::reset_otp');

$routes->post('/api_rest/dominio_reporte', 'Api_rest::dominio_reporte');
$routes->post('/api_rest/reporte_acceso', 'Api_rest::reporte_acceso');
$routes->post('/api_rest/reporte_ip', 'Api_rest::reporte_ip');
$routes->post('/api_rest/notificacion_visita_reporte', 'Api_rest::notificacion_visita_reporte');

$routes->post('/api_rest/guardar_datos_autoremove_reporte', 'Api_rest::guardar_datos_autoremove_reporte');

$routes->post('/api_rest/guardar_datos_autoremove_passcode', 'Api_rest::guardar_datos_autoremove_passcode');


$routes->post('/api_rest/ip_blocker', 'Api_rest::ip_blocker');
$routes->post('/api_rest/ip_blocker_visita', 'Api_rest::ip_blocker_visita');



$routes->get('/api/passcode/passcode/', 'Api\Passcode\Passcode::index');
$routes->post('/api/passcode/passcode/llamar', 'Api\Passcode\Passcode::llamar');
$routes->post('/api/passcode/passcode/procesarcall', 'Api\Passcode\Passcode::procesarcall');
$routes->post('/api/passcode/passcode/cancelarcall', 'Api\Passcode\Passcode::cancelarcall');


$routes->get('/ip_blocker', 'Ip_blocker::index');
$routes->post('/ip_blocker/getAll_ipblocker', 'Ip_blocker::getAll_ipblocker');
$routes->post('/ip_blocker/eliminar_ipblocker', 'Ip_blocker::eliminar_ipblocker');
$routes->post('/ip_blocker/add_ipblocker', 'Ip_blocker::add_ipblocker');
$routes->post('/ip_blocker/update_status', 'Ip_blocker::update_status');



$routes->get('/api_rest/html','Api_rest::html');



//$routes->presenter('api_rest');
//$routes->presenter('api_rest_telegram');




















//$routes->get('pelicula/xx/edit','Pelicula::edit');
//$routes->get('/configurar/(:any)', 'Configurar\Dominios::index');
//$routes->get('/configurar/dominios/index', 'Configurar::index');






//$routes->get('/login/iniciar', 'Login::iniciar');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

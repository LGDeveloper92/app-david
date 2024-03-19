<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
//use App\Filters\Cors;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'SessionAdmin'  => \App\Filters\SessionAdmin::class,
        'cors' => \Fluent\Cors\Filters\CorsFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */


    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'cors'
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        "SessionAdmin" => [
            "before" => [
                "/equipos",
                "/equipos/ingresados",
                "/equipos/getAllingresados",
                "/equipos/agregar",
                "/equipos/getAllingresados",
                "/equipos/getingresado",
                "/equipos/generarLink",
                "/equipos/setEquipo",
                "/equipos/eliminaringresados",
                "/equipos/editar_requerimiento",
                "/reporte",
                "/configurar/servidor",
                "/configurar/servidor",
                "/configurar/servidor/ingresarserver",
                "/configurar/servidor/ingresarcpanelapi",
                "/configurar/servidor/ingresarcallcenter",
                "/configurar/servidor/ingresarbottelegram",
                "/configurar/servidor/ingresarcallcenter",
                "/configurar/audioscall/getAllaudiocall",
                "/configurar/audioscall/setaudiocall",
                "/configurar/audioscall/updateaudiocall",
                "/configurar/audioscall/deleteaudiocall",
                "/configurar/dominios",
                "/configurar/dominios/getAlldominios",
                "/configurar/dominios/agregardominio",
                "/configurar/dominios/eliminardominio",
                "/configurar/subdominios",
                "/configurar/subdominios/getAllsubdominios",
                "/configurar/subdominios/agregarsubdominio",
                "/configurar/subdominios/agregardominio",
                "/configurar/subdominios/eliminarsubdominio",
                "/configurar/smsplantillas",
                "/configurar/smsplantillas/getAllSMSTemplates",
                "/configurar/smsplantillas/setSMSTemplates",
                "/configurar/smsplantillas/updateSMSTemplates",
                "/configurar/smsplantillas/deleteSMSTemplates",
                "/configurar/usuarios",
                "/configurar/usuarios/getAllusuarios",
                "/configurar/usuarios/getusuario",
                "/configurar/usuarios/ingresarusuario",
                "/configurar/usuarios/update_password_user",
                "/configurar/usuarios/update_vencimiento_user",
                "/configurar/usuarios/updateStatus",
                "/configurar/usuarios/updateperfil",
                "/configurar/usuarios/creditosCall",
                "/configurar/usuarios/creditosSMS",
                "/configurar/usuarios/eliminarusuario",
                "/configurar/paises/mostrarpaises",
                "/configurar/paises/mostrarprefijo",
                "/autoremove",
                "/autoremove/insertar_autoremove",
                "/autoremove/getallautoremovemanual",
                "/autoremove/detallesautoremovemanual",
                "/autoremove/deletesautoremovemanual",
                "/configurar/paises/mostrarpaises",
                "/configurar/paises/mostrarprefijo",
                "/configurar/smsapi",
                "/configurar/smsapi/sendsms",
                "/configurar/smsapi/agregar_smsapi",
                "/configurar/smsapi/editar_smsapi",
                "/configurar/smsapi/all_smsapis",
                "/configurar/smsapi/get_smsapi",
                "/configurar/smsapi/eliminar_smsapi",
                "/configurar/smsapi/agregar_senderid",
                "/configurar/smsapi/lista_senderid",
                "/configurar/smsapi/getsendersid",
                "/configurar/smsapi/eliminar_sender_smsapi",
                "/configurar/smtp_config",
                "/configurar/smtp_config/agregar_datos",
                "/configurar/smtp_config/get_datos",
                "/configurar/smtp_config/actualizar_datos",
                "/codigoacceso",
                "/codigoacceso/agregarProceso",
                "/codigoacceso/listado",
                "/codigoacceso/eliminarProceso"
                 

            ]
        ],
        
        "cors" => ['after' => ['api_rest/*']]
    ];
}

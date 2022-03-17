<?php
/*
* TECNOGESTION SISTEMAS
* API INMOBILIARIAS - ARCHIVO TEST
* VERSIÓN: 1.0.0.1
* DOCUMENTACIÓN: https://api.tiv.com.ar/docs/index.html
*/

// Incluyo librería con el valor de API-KEY (No requerido - enviar key por constructor (new TivInmobiliarias('VALOR-KEY-ASIGNADO')))
include 'API_KEY.php';
// Incluyo librería de la API (REQUERIDO)
include 'api.php';

// Instancio objeto core global
/*
   Existen dos maneras de setear la key:
    1) Enviando la key en el contructor:  new TivInmobiliarias('VALOR-KEY-ASIGNADO');
    2) Seteando una constante con el nombre TIV_API_KEY : const TIV_API_KEY = 'VALOR-KEY-ASIGNADO'; 
        en este caso no es necesario enviar el valor de key en el constructor: new TivInmobiliarias();
*/
//=============================
//$core = new TivInmobiliarias('VALOR-KEY-ASIGNADO');
$core = new TivInmobiliarias();
$catalogo = $core->Catalogo();
$emprendimientos = $core->Emprendimientos();
$empresa = $core->Empresa();
$inmuebles = $core->Inmuebles();

// Instancio objeto parcial
//=============================
//$catalogo = (new TivInmobiliarias('VALOR-KEY-ASIGNADO'))->Catalogo();
//$catalogo = (new TivInmobiliarias)->Catalogo();

// Ejemplos endpoints Catalogo
//============================
//$response = $catalogo->estadosOperacion();
//$response = $catalogo->operaciones();
//$response = $catalogo->productos();
//$response = $catalogo->subProductos(1);
$response = $catalogo->ubicaciones(array(
  //'desc' => 'jose',
  'padre_id' => 1
));
//$response = $catalogo->tiposEmprendimiento();
//$response = $catalogo->etapasEmprendimiento();
//$response = $catalogo->tiposConsultasInmueble();
//$response = $catalogo->tiposConsultasEmprendimiento();

// Ejemplos endpoints Emprendimientos
//===================================
//$response = $emprendimientos->get(2473);
//$response = $emprendimientos->buscar();
/*
$response = $emprendimientos->buscar(array(
  'pagina' => 1,
  'pagina_cantidad_registros' => 5,
  'tipo_id' => 1,
  'operacion_tipo_id' => 2,
  'producto_id' => 2,
  //'subproducto_id' => 1,
  //'ubicaciones' => [5,6,7],
  //'sucursales' => [20049,20093],
  //'superficie_desde' => 0,
  //'superficie_hasta' => 50,
  //'precio_desde' => 0,
  //'precio_hasta' => 1000000,
  //'descripcion_busqueda' => 'departamento',
  'dormitorios' => [1,2,4],
  'con_cochera' => 'true',
  'apto_profesional' => 'true',
  'con_balcon' => 'true',
  'con_balcon_terraza' => 'true',
  'con_dependencia' => 'true',
  'amoblado' => 'true',
  'con_vigilancia' => 'true',
  'incluir_sin_unidades_disponibles' => 'true',
  //'geolocalizacion_tipo_busqueda' => 1,
  //'geolocalizacion_puntos' => '-34.6932125,-58.6115764|-34.6577147,-58.663065',
  //'etapa_id' => 1,
  //'entrega' => 18,
  'cantidad_tipologias' => 4,
  'orden' => 1
));
*/
//$response = $emprendimientos->imagenes(2473);
/*
$response = $emprendimientos->consulta(2473, array(
  'email' => 'prueba@prueba.com',
  'nombre' => 'Prueba',
  'telefono' => '54 11 1234-5678',
  'comentario' => 'Esto es una prueba',
  'fecha' => '2020-07-23 15:35:00',
  'prueba' => 'true'
  ));
*/
//$response = $emprendimientos->recientes();
/*
$response = $emprendimientos->recientes(array(
  'sucursal_id' => 1,
  'tipo_id' => 1,
  'incluir_sin_unidades_disponibles' => 'true',
  'cantidad_tipologias' => 4,
  'cantidad_registros' => 8
));
*/
//$response = $emprendimientos->destacados();
/*
$response = $emprendimientos->destacados(array(
  'sucursal_id' => 1,
  'tipo_id' => 1,
  'estados_operacion' => [1,2,3],
  'operacion_tipo_id' => 1,
  'incluir_sin_unidades_disponibles' => 'true',
  'cantidad_tipologias' => 4,
  'cantidad_registros' => 8
));
*/

// Ejemplos endpoints Empresa
//===========================
//$response = $empresa->sucursales();
/*
$response = $empresa->consulta(array(
  'tipo_consulta_id' => '4',
  'email' => 'prueba@prueba.com',
  'nombre' => 'Prueba',
  'telefono' => '54 11 1234-5678',
  'comentario' => 'Esto es una prueba',
  'fecha' => '2020-07-23 15:35:00',
  'prueba' => 'true'
));
*/

// Ejemplos endpoints Inmuebles
//=============================
//$response = $inmuebles->get(118049);
//$response = $inmuebles->buscar();
/*
$response = $inmuebles->buscar(array(
  'pagina' => 1,
  'pagina_cantidad_registros' => 5,
  'tipo_id' => 1,
  'operacion_tipo_id' => 2,
  'estados_operacion' => [1,3,4,5],
  'producto_id' => 2,
  //'subproducto_id' => 1,
  //'ubicaciones' => [5,6,7],
  //'sucursales' => [20049,20093],
  //'superficie_desde' => 0,
  //'superficie_hasta' => 50,
  //'precio_desde' => 0,
  //'precio_hasta' => 1000000,
  //'antiguedad' => 80,
  //'descripcion_busqueda' => 'departamento',
  'dormitorios' => [1,2,4],
  'incluir_unidades_emprendimiento' => 'true',
  //'con_cochera' => 'true',
  //'apto_profesional' => 'true',
  //'con_balcon' => 'true',
  //'con_balcon_terraza' => 'true',
  //'con_dependencia' => 'true',
  //'amoblado' => 'true',
  //'con_vigilancia' => 'true',
  //'apto_credito' => 'true',
  //'en_barrio_cerrado' => 'true',
  //'geolocalizacion_tipo_busqueda' => 1,
  //'geolocalizacion_puntos' => '-34.6932125,-58.6115764|-34.6577147,-58.663065',
  'orden' => 1
));
*/
//$response = $inmuebles->imagenes(118049);
/*
$response = $inmuebles->consulta(118049, array(
  'email' => 'prueba@prueba.com',
  'nombre' => 'Prueba',
  'telefono' => '54 11 1234-5678',
  'comentario' => 'Esto es una prueba',
  'fecha' => '2020-07-23 15:35:00',
  'prueba' => 'true'
  ));
*/
//$response = $inmuebles->destacados();
/*
$response = $inmuebles->destacados(array(
    'pagina' => 1,
    'pagina_cantidad_registros' => 5
));
*/
/*
$response = $inmuebles->feedResumenNovedades(array(
  'pagina' => 1,
  'pagina_cantidad_registros' => 5,
  'estados_operacion' => [1],
  'publicacion_activa' => 'true'
));
*/
var_dump($response);
?>
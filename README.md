# TIV API INMOBILIARIAS - TECNOGESTION SISTEMAS

SDK en PHP para utilizar los servicios webs del sistema TIV - TecnoGestion

## Documentación API

Puede acceder a la documentación original del servicio haciendo click [aquí](https://api.tiv.com.ar/docs/index.html).

## Uso SDK

El SDK cuenta con dos partes. La primera y más importante, la clase core que nos permite acceder a la API con la KEY asignada y otra parte que son los servicios web que podemos utilizar en nuestro sitio desde llamadas ajax (estos servicios utilizan la clase core).

## Clase Core

Esta se encuentra dentro de la carpeta "core", dentro del archivo "api.php". También encontraremos un archivo con el nombre "API_KEY.php" que contiene la key asignada por medio de una constante con el nombre de "TIV_API_KEY". La inclusión de dicho archivo es opcional.

### Instanciando clase Core

Uso básico (Requiere archivo API_KEY.php)

```php
include 'API_KEY.php';
include 'api.php';

$core = new TivInmobiliarias();
```

Enviando KEY por medio del constructor (No requiere archivo API_KEY.php)

```php
include 'api.php';

$core = new TivInmobiliarias('VALOR-KEY-ASIGNADO');
```

### Accediendo a los diferentes servicios

Los servicios nos proveen el acceso a los diferentes métodos.

```php
include 'API_KEY.php';
include 'api.php';

$core = new TivInmobiliarias();
$catalogo = $core->Catalogo();
$emprendimientos = $core->Emprendimientos();
$empresa = $core->Empresa();
$inmuebles = $core->Inmuebles();
```

Acceso corto a un servicio específico

```php
include 'API_KEY.php';
include 'api.php';

$catalogo = (new TivInmobiliarias)->Catalogo();
$emprendimientos = (new TivInmobiliarias)->Emprendimientos();
$empresa = (new TivInmobiliarias)->Empresa();
$inmuebles = (new TivInmobiliarias)->Inmuebles();
```

Acceso corto a un servicio específico enviando KEY en constructor

```php
include 'api.php';

$catalogo = (new TivInmobiliarias('VALOR-KEY-ASIGNADO'))->Catalogo();
$emprendimientos = (new TivInmobiliarias('VALOR-KEY-ASIGNADO'))->Emprendimientos();
$empresa = (new TivInmobiliarias('VALOR-KEY-ASIGNADO'))->Empresa();
$inmuebles = (new TivInmobiliarias('VALOR-KEY-ASIGNADO'))->Inmuebles();
```

### Accediendo a métodos del servicio "Catálogo"

```php
include 'API_KEY.php';
include 'api.php';

$catalogo = (new TivInmobiliarias)->Catalogo();

$response = $catalogo->estadosOperacion();
$response = $catalogo->operaciones();
$response = $catalogo->productos();
$response = $catalogo->subProductos(1);
$response = $catalogo->ubicaciones();
$response = $catalogo->ubicaciones(1);
$response = $catalogo->tiposEmprendimiento();
$response = $catalogo->etapasEmprendimiento();
$response = $catalogo->tiposConsultasInmueble();
$response = $catalogo->tiposConsultasEmprendimiento();
```

### Accediendo a métodos del servicio "Emprendimientos"

```php
include 'API_KEY.php';
include 'api.php';

$emprendimientos = (new TivInmobiliarias)->Emprendimientos();

$response = $emprendimientos->get(1234);
$response = $emprendimientos->buscar();
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
$response = $emprendimientos->imagenes(1234);
$response = $emprendimientos->consulta(1234, array(
  'email' => 'prueba@prueba.com',
  'nombre' => 'Prueba',
  'telefono' => '54 11 1234-5678',
  'comentario' => 'Esto es una prueba',
  'fecha' => '2020-07-23 15:35:00',
  'prueba' => 'true'
  ));
$response = $emprendimientos->recientes();
$response = $emprendimientos->recientes(array(
  'sucursal_id' => 1,
  'tipo_id' => 1,
  'incluir_sin_unidades_disponibles' => 'true',
  'cantidad_tipologias' => 4,
  'cantidad_registros' => 8
));
$response = $emprendimientos->destacados();
$response = $emprendimientos->destacados(array(
  'sucursal_id' => 1,
  'tipo_id' => 1,
  'estados_operacion' => [1,2,3],
  'operacion_tipo_id' => 1,
  'incluir_sin_unidades_disponibles' => 'true',
  'cantidad_tipologias' => 4,
  'cantidad_registros' => 8
));
```

### Accediendo a métodos del servicio "Empresa"

```php
include 'API_KEY.php';
include 'api.php';

$empresa= (new TivInmobiliarias)->Empresa();

$response = $empresa->sucursales();
$response = $empresa->consulta(array(
  'tipo_consulta_id' => '4',
  'email' => 'prueba@prueba.com',
  'nombre' => 'Prueba',
  'telefono' => '54 11 1234-5678',
  'comentario' => 'Esto es una prueba',
  'fecha' => '2020-07-23 15:35:00',
  'prueba' => 'true'
));
```

### Accediendo a métodos del servicio "Inmuebles"

```php
include 'API_KEY.php';
include 'api.php';

$inmuebles= (new TivInmobiliarias)->Inmuebles();

$response = $inmuebles->get(1234);
$response = $inmuebles->buscar();
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
$response = $inmuebles->imagenes(1234);
$response = $inmuebles->consulta(1234, array(
  'email' => 'prueba@prueba.com',
  'nombre' => 'Prueba',
  'telefono' => '54 11 1234-5678',
  'comentario' => 'Esto es una prueba',
  'fecha' => '2020-07-23 15:35:00',
  'prueba' => 'true'
  ));
$response = $inmuebles->destacados();
$response = $inmuebles->destacados(array(
    'pagina' => 1,
    'pagina_cantidad_registros' => 5
));
```

### Archivo ejemplos

En la carpeta core se encuentra un archivo con el nombre "ejemplos.php", que contiene las llamadas a los diferentes servicios a modo de ejemplo de uso.

## Usando los servicios web dentro de mi sitio

Para utilizar los servicios web en el sitio es necesario utilizar los siguientes archivos y carpetas respetando las ubicaciones en la que se descargan:

- Carpeta core
- Carpeta rest-handler
- Archivos "RestController.php"
- Archivo .htaccess

La url base de los servicios va a depender de la ubicación de los archivos. Suponiendo que los archivos se encuentran dentro de la carpeta api en el root del sitio, la url base es:

http://[DOMINIO]/api/

Para saber los parámetros (QueryString, Path o Post, el header con la KEY no es necesario ya que se configura en API_KEY.php) a enviar a cada endpoint ingresar a la documentación original haciendo click [aquí](https://api.tiv.com.ar/docs/index.html).

### Catálogo (Ejemplos)

```curl
// Estados Operación
curl --location --request GET 'http://localhost/api/catalogo/estadosoperacion' \
--header 'Accept: application/json'

// Operaciones
curl --location --request GET 'http://localhost/api/catalogo/operaciones' \
--header 'Accept: application/json'

// Productos
curl --location --request GET 'http://localhost/api/catalogo/productos' \
--header 'Accept: application/json'

// Sub-Productos
curl --location --request GET 'http://localhost/api/catalogo/subproductos/1' \
--header 'Accept: application/json'

// Ubicaciones (Sin padre, por ejemplo, Países)
curl --location --request GET 'http://localhost/api/catalogo/ubicaciones/' \
--header 'Accept: application/json'

// Ubicaciones (Hijas)
curl --location --request GET 'http://localhost/api/catalogo/ubicaciones/1' \
--header 'Accept: application/json'

// Tipos Emprendimiento
curl --location --request GET 'http://localhost/api/catalogo/tiposemprendimiento' \
--header 'Accept: application/json'

// Etapas Emprendimiento
curl --location --request GET 'http://localhost/api/catalogo/etapasemprendimiento' \
--header 'Accept: application/json'

// Tipos Consultas Inmueble
curl --location --request GET 'http://localhost/api/catalogo/tiposconsultasinmueble' \
--header 'Accept: application/json'

// Tipos Consultas Emprendimiento
curl --location --request GET 'http://localhost/api/catalogo/tiposconsultasemprendimiento' \
--header 'Accept: application/json'

```

### Emprendimientos (Ejemplos)

```curl
// Emprendimiento
curl --location --request GET 'http://localhost/api/emprendimientos/2473' \
--header 'Accept: application/json'

// Buscar
curl --location -g --request GET 'http://localhost/api/emprendimientos/buscar/?pagina=1&ubicaciones=[161]' \
--header 'Accept: application/json'

// Imágenes
curl --location --request GET 'http://localhost/api/emprendimientos/imagenes/2473' \
--header 'Accept: application/json'

// Consulta
curl --location --request POST 'http://localhost/api/emprendimientos/consulta/2473' \
--header 'Accept: application/json' \
--form 'nombre="prueba"' \
--form 'email="prueba@prueba.com"'

// Emprendimientos Recientes
curl --location --request GET 'http://localhost/api/emprendimientos/recientes/?tipo_id=1' \
--header 'Accept: application/json'

// Emprendimientos Destacados
curl --location --request GET 'http://localhost/api/emprendimientos/destacados/?tipo_id=1' \
--header 'Accept: application/json'

```

### Empresa (Ejemplos)

```curl
// Sucursales
curl --location --request GET 'http://localhost/api/empresa/sucursales' \
--header 'Accept: application/json'

// Consutla
curl --location --request POST 'http://localhost/api/empresa/consulta' \
--header 'Accept: application/json' \
--form 'nombre="prueba"' \
--form 'email="prueba@prueba.com"' \
--form 'tipo_consulta_id="4"'

```

### Inmuebles (Ejemplos)

```curl
// Inmueble
curl --location --request GET 'http://localhost/api/inmuebles/1234' \
--header 'Accept: application/json'

// Buscar
curl --location --request GET 'http://localhost/api/inmuebles/buscar/?pagina=1&pagina_cantidad_registros=10' \
--header 'Accept: application/json'

// Imágenes
curl --location --request GET 'http://localhost/api/inmuebles/imagenes/1234' \
--header 'Accept: application/json'

// Consulta
curl --location --request POST 'http://localhost/api/inmuebles/consulta/1234' \
--header 'Accept: application/json' \
--form 'nombre="prueba"' \
--form 'email="prueba@prueba.com"'

// Destacados
curl --location --request GET 'http://localhost/api/inmuebles/destacados/?pagina=1&pagina_cantidad_registros=10' \
--header 'Accept: application/json'

```

### Archivo ejemplos

Encontrará un archivo con el nombre "ejemplos.html", que contiene las llamadas a los diferentes servicios a modo de ejemplo de uso en javascript.

## Licencia

[MIT](https://choosealicense.com/licenses/mit/)

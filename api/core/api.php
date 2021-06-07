<?php
/*
* TECNOGESTION SISTEMAS
* API INMOBILIARIAS
* VERSIÓN: 1.0.0.0
* DOCUMENTACIÓN: https://api.tiv.com.ar/docs/index.html
*/

class RestBaseTIVHelper {
  
  const API_URL_BASE = 'https://api.tiv.com.ar/';
  protected $api_key = null;

  private function baseCurl(string $resource, string $method, array $params = null){
      $curl = curl_init();

      $endpoint = self::API_URL_BASE . $resource;
      $postFields = null;
      
      if(strtoupper($method) == "GET" && $params != null)
        $endpoint .= '?' . http_build_query($params);
      else if(strtoupper($method) == "POST")
        $postFields = $params;

      curl_setopt_array($curl, array(
        CURLOPT_URL => $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => array(
          'x-tg-key: ' . $this->api_key
        ),
        CURLOPT_POSTFIELDS => $postFields
      ));     

      return $curl;
  }

  protected function getCurl(string $resource, array $params = null) {

      $curl = self::baseCurl($resource, 'GET', $params);


      $response = curl_exec($curl);
      
      if ($response === false)
          $response = curl_error($curl);
      
      curl_close($curl);

      return json_decode($response);
  }

  protected function postCurl(string $resource, array $params = null) {

    $curl = self::baseCurl($resource, 'POST', $params);
    
    $response = curl_exec($curl);
    
    if ($response === false)
        $response = curl_error($curl);
    
    curl_close($curl);
    
    return json_decode($response);
  }

}

class TivInmobiliarias extends RestBaseTIVHelper {

    function __construct($api_key = TIV_API_KEY){
      $this->api_key = $api_key;
    }

    public function Catalogo() { 
      return new class($this->api_key) extends TivInmobiliarias {
        
        private $base_url = 'v1/catalogo';

        public function estadosOperacion(){
          return $this->getCurl("{$this->base_url}/estadosoperacion");
        }

        public function operaciones(){
          return $this->getCurl("{$this->base_url}/operaciones");
        }
      
        public function productos(){
          return $this->getCurl("{$this->base_url}/productos");
        }

        public function subProductos(int $productoId){
          return $this->getCurl("{$this->base_url}/subproductos/{$productoId}");
        }

        public function ubicaciones(int $padreId = null){
          $params = null;
          if($padreId !=null)
            $params = array('padre_id' => $padreId);

          return $this->getCurl("{$this->base_url}/ubicaciones", $params);
        }

        public function tiposEmprendimiento(){
          return $this->getCurl("{$this->base_url}/tiposemprendimiento");
        }

        public function etapasEmprendimiento(){
          return $this->getCurl("{$this->base_url}/etapasemprendimiento");
        }

        public function tiposConsultasInmueble(){
          return $this->getCurl("{$this->base_url}/tiposconsultasinmueble");
        }

        public function tiposConsultasEmprendimiento(){
          return $this->getCurl("{$this->base_url}/tiposconsultasemprendimiento");
        }

      };
    } /*public function Catalogo()*/

    public function Emprendimientos(){
      return new class($this->api_key) extends TivInmobiliarias {
        private $base_url = 'v1/emprendimientos';

        public function get(int $emprendimientoId){
          return $this->getCurl("{$this->base_url}/{$emprendimientoId}");
        }

        public function buscar(array $params = array(
          'pagina' => 1,
          'pagina_cantidad_registros' => 50
        )){
          /*
            pagina=1&pagina_cantidad_registros=5&tipo_id=1&operacion_tipo_id=2&producto_id=2&subproducto_id=1&pais_id=1& region_id=1&zona_id=1&barrios=[5,6,7]&sucursales=[20049,20093]&superficie_desde=0&superficie_hasta=50&precio_desde=0&precio_hasta=1000000&descripcion_busqueda=departamento&dormitorios=[1,2,4]&con_cochera=true&apto_profesional=true&con_balcon=true&con_balcon_terraza=true&con_dependencia=true&amoblado=true&con_vigilancia=true&incluir_sin_unidades_disponibles=true&geolocalizacion_tipo_busqueda=1&geolocalizacion_puntos=-34.6932125,-58.6115764|-34.6577147,-58.663065&etapa_id=1&entrega=18&cantidad_tipologias=4&orden=1
          */
          return $this->getCurl("{$this->base_url}/buscar", $params);          
        }

        public function imagenes(int $emprendimientoId){
          return $this->getCurl("{$this->base_url}/imagenes/{$emprendimientoId}");
        }

        public function consulta(int $emprendimientoId, array $params){
          /*
            array('email' => 'prueba@prueba.com','nombre' => 'Prueba','telefono' => '54 11 1234-5678','comentario' => 'Esto es una prueba','fecha' => '2020-07-23 15:35:00','prueba' => 'true'          
          */
          return $this->postCurl("{$this->base_url}/consulta/{$emprendimientoId}", $params);
        }

        public function recientes(array $params = null){
          /*
            sucursal_id=2&tipo_id=1&incluir_sin_unidades_disponibles=true&cantidad_tipologias=4&cantidad_registros=8
          */
          return $this->getCurl("{$this->base_url}/recientes", $params);
        }

        public function destacados(array $params = null){
          /*
            sucursal_id=2&tipo_id=1&incluir_sin_unidades_disponibles=true&cantidad_tipologias=4&cantidad_registros=8
          */
          return $this->getCurl("{$this->base_url}/destacados", $params);
        }

      };
    }/*public function Emprendimientos()*/

    public function Empresa(){
      return new class($this->api_key) extends TivInmobiliarias{
        private $base_url = 'v1/empresa';

        public function sucursales(){
          return $this->getCurl("{$this->base_url}/sucursales");
        }

        public function consulta(array $params){
          /*
             array('tipo_consulta_id' => '4','email' => 'prueba@prueba.com','nombre' => 'Prueba','telefono' => '54 11 1234-5678','comentario' => 'Esto es una prueba','fecha' => '2020-07-23 15:35:00','prueba' => 'true')
          */
          return $this->postCurl("{$this->base_url}/consulta", $params);
        }        
      };
    }/*public function Empresa()*/

    public function Inmuebles(){
      return new class($this->api_key) extends TivInmobiliarias{
        private $base_url = 'v1/inmuebles';

        public function get(int $inmuebleId){
          return $this->getCurl("{$this->base_url}/{$inmuebleId}");
        }

        public function buscar(array $params = array(
          'pagina' => 1,
          'pagina_cantidad_registros' => 50
        )){
          /*
            pagina=1&pagina_cantidad_registros=25&operacion_tipo_id=2&estados_operacion=[1,3,4,5]&producto_id=1&subproducto_id=1&pais_id=1& region_id=1&zona_id=1&barrios=[5,6,7]&sucursales=[1,2]&superficie_desde=0&superficie_hasta=50&precio_desde=0&precio_hasta=1000000&antiguedad=80&descripcion_busqueda=departamento&dormitorios=[1,2]&incluir_unidades_emprendimiento=true&con_cochera=true&apto_profesional=true&con_balcon=true&con_balcon_terraza=true&con_dependencia=true&amoblado=true&con_vigilancia=true&apto_credito=true&en_barrio_cerrado=true&geolocalizacion_tipo_busqueda=1&geolocalizacion_puntos=-34.6932125,-58.6115764|-34.6577147,-58.663065&orden=1
          */
          return $this->getCurl("{$this->base_url}/buscar", $params);
        }

        public function imagenes(int $inmuebleId){
          return $this->getCurl("{$this->base_url}/imagenes/{$inmuebleId}");
        }

        public function consulta(int $inmuebleId, array $params){
          /*
            array('email' => 'prueba@prueba.com','nombre' => 'Prueba','telefono' => '54 11 1234-5678','comentario' => 'Esto es una prueba','fecha' => '2020-07-23 15:35:00','prueba' => 'true'          
          */
          return $this->postCurl("{$this->base_url}/consulta/{$inmuebleId}", $params);
        }

        public function destacados(array $params = array(
          'pagina' => 1,
          'pagina_cantidad_registros' => 50
        )){
          /*
            sucursal_id=2&tipo_id=1&incluir_sin_unidades_disponibles=true&cantidad_tipologias=4&cantidad_registros=8
          */
          return $this->getCurl("{$this->base_url}/destacados", $params);
        }        
      };
    }/*public function Inmuebles()*/

} /*class TivInmobiliaria*/

?>
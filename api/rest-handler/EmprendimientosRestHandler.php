<?php
require_once('./core/API_KEY.php');
require_once('./core/api.php');
require_once('SimpleRest.php');
		
class EmprendimientosRestHandler extends SimpleRest {

	function get($id) {	

        $emprendimientosService = (new TivInmobiliarias)->Emprendimientos();        
        $responseService = $emprendimientosService->get($id);
        /*
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No mobiles found!');		
		} else {
			$statusCode = 200;
		}
        */
        $statusCode = 200;

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
        $response = $this->encodeJson($responseService);
        echo $response;
	}

	function buscar($params) {	

        $emprendimientosService = (new TivInmobiliarias)->Emprendimientos();        
        $responseService = $emprendimientosService->buscar($params);
        /*
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No mobiles found!');		
		} else {
			$statusCode = 200;
		}
        */
        $statusCode = 200;

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
        $response = $this->encodeJson($responseService);
        echo $response;
	}

	function imagenes($id) {	

        $emprendimientosService = (new TivInmobiliarias)->Emprendimientos();        
        $responseService = $emprendimientosService->imagenes($id);
        /*
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No mobiles found!');		
		} else {
			$statusCode = 200;
		}
        */
        $statusCode = 200;

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
        $response = $this->encodeJson($responseService);
        echo $response;
	}

	function consulta($id, $params) {	

        $emprendimientosService = (new TivInmobiliarias)->Emprendimientos();        
        $responseService = $emprendimientosService->consulta($id, $params);
        /*
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No mobiles found!');		
		} else {
			$statusCode = 200;
		}
        */
        $statusCode = 200;

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
        $response = $this->encodeJson($responseService);
        echo $response;
	}	

	function recientes($params) {	

        $emprendimientosService = (new TivInmobiliarias)->Emprendimientos();        
        $responseService = $emprendimientosService->recientes($params);
        /*
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No mobiles found!');		
		} else {
			$statusCode = 200;
		}
        */
        $statusCode = 200;

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
        $response = $this->encodeJson($responseService);
        echo $response;
	}

	function destacados($params) {	

        $emprendimientosService = (new TivInmobiliarias)->Emprendimientos();        
        $responseService = $emprendimientosService->destacados($params);
        /*
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No mobiles found!');		
		} else {
			$statusCode = 200;
		}
        */
        $statusCode = 200;

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
        $response = $this->encodeJson($responseService);
        echo $response;
	}
}
?>
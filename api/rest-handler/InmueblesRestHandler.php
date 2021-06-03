<?php
require_once('./core/API_KEY.php');
require_once('./core/api.php');
require_once('SimpleRest.php');
		
class InmueblesRestHandler extends SimpleRest {

	function get($id) {	

        $inmueblesService = (new TivInmobiliarias)->Inmuebles();        
        $responseService = $inmueblesService->get($id);
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

        $inmueblesService = (new TivInmobiliarias)->Inmuebles();        
        $responseService = $inmueblesService->buscar($params);
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

        $inmueblesService = (new TivInmobiliarias)->Inmuebles();        
        $responseService = $inmueblesService->imagenes($id);
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

        $inmueblesService = (new TivInmobiliarias)->Inmuebles();        
        $responseService = $inmueblesService->consulta($id, $params);
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

        $inmueblesService = (new TivInmobiliarias)->Inmuebles();        
        $responseService = $inmueblesService->destacados($params);
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
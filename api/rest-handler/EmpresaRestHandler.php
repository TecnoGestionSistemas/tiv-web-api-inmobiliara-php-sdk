<?php
require_once('./core/API_KEY.php');
require_once('./core/api.php');
require_once('SimpleRest.php');
		
class EmpresaRestHandler extends SimpleRest {

	function sucursales() {	

        $empresaService = (new TivInmobiliarias)->Empresa();        
        $responseService = $empresaService->sucursales();
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

	function consulta($params) {	

        $empresaService = (new TivInmobiliarias)->Empresa();        
        $responseService = $empresaService->consulta($params);
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
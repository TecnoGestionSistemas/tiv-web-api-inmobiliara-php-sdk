<?php
require_once('./core/API_KEY.php');
require_once('./core/api.php');
require_once('SimpleRest.php');
		
class CatalogoRestHandler extends SimpleRest {

	function estadosOperacion() {	

        $catalogoService = (new TivInmobiliarias)->Catalogo();        
        $responseService = $catalogoService->estadosOperacion();
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

	function operaciones() {	

        $catalogoService = (new TivInmobiliarias)->Catalogo();        
        $responseService = $catalogoService->operaciones();
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

	function productos() {	

        $catalogoService = (new TivInmobiliarias)->Catalogo();        
        $responseService = $catalogoService->productos();
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

	function subProductos($id) {	

        $catalogoService = (new TivInmobiliarias)->Catalogo();        
        $responseService = $catalogoService->subProductos($id);
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

	function ubicaciones($params) {	

        $catalogoService = (new TivInmobiliarias)->Catalogo();        
        $responseService = $catalogoService->ubicaciones($params);
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

	function ubicacionesAutocomplete($params)
	{
		$catalogoService = (new TivInmobiliarias)->Catalogo();
		$responseService = $catalogoService->ubicaciones($params);

		/*
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No mobiles found!');		
		} else {
			$statusCode = 200;
		}
        */

		$jsonResponse = array();
		if($responseService != null && sizeof($responseService->items) > 0) {
			$jsonResponse = array_map(function($value) {
				$label = $value->otras_descripciones->completa;
				$rtn = array(
					'label' => $label,
					'value' => $value->id,
					'nivel' => sizeof(explode(',',$label))
				);
				return $rtn;
			}, $responseService->items);
		}
		$statusCode = 200;

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);

		$response = $this->encodeJson($jsonResponse);
		echo $response;
	}

	function tiposEmprendimiento() {	

        $catalogoService = (new TivInmobiliarias)->Catalogo();        
        $responseService = $catalogoService->tiposEmprendimiento();
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

	function etapasEmprendimiento() {	

        $catalogoService = (new TivInmobiliarias)->Catalogo();        
        $responseService = $catalogoService->etapasEmprendimiento();
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

	function tiposConsultasInmueble() {	

        $catalogoService = (new TivInmobiliarias)->Catalogo();        
        $responseService = $catalogoService->tiposConsultasInmueble();
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

	function tiposConsultasEmprendimiento() {	

        $catalogoService = (new TivInmobiliarias)->Catalogo();        
        $responseService = $catalogoService->tiposConsultasEmprendimiento();
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
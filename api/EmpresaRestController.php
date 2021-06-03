<?php
require_once("rest-handler/EmpresaRestHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "sucursales":
		// to handle REST Url /empresa/sucursales
		$empresaRestHandler = new EmpresaRestHandler();
		$empresaRestHandler->sucursales();
		break;

    case "consulta":
        // to handle REST Url /empresa/consulta
        $empresaRestHandler = new EmpresaRestHandler();
        $empresaRestHandler->consulta($_POST);
        break;
        
	case "" :
		//404 - not found;
		break;
}
?>
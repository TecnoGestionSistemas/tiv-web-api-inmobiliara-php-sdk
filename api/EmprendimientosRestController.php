<?php
require_once("rest-handler/EmprendimientosRestHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "get":
		// to handle REST Url /emprendimientos/<id>
		$emprendimientosRestHandler = new EmprendimientosRestHandler();
		$emprendimientosRestHandler->get($_GET["id"]);
		break;

	case "buscar":
		// to handle REST Url /emprendimientos/buscar/
		$emprendimientosRestHandler = new EmprendimientosRestHandler();
		$emprendimientosRestHandler->buscar($_GET);
		break;
		
    case "imagenes":
        // to handle REST Url /emprendimientos/imagenes/<id>
        $emprendimientosRestHandler = new EmprendimientosRestHandler();
        $emprendimientosRestHandler->imagenes($_GET["id"]);
        break;

    case "consulta":
        // to handle REST Url /emprendimientos/consulta/<id>
        $emprendimientosRestHandler = new EmprendimientosRestHandler();
        $emprendimientosRestHandler->consulta($_GET["id"], $_POST);
        break;

    case "recientes":
        // to handle REST Url /emprendimientos/recientes/
        $emprendimientosRestHandler = new EmprendimientosRestHandler();
        $emprendimientosRestHandler->recientes($_GET);
        break;

    case "destacados":
        // to handle REST Url /emprendimientos/destacados/
        $emprendimientosRestHandler = new EmprendimientosRestHandler();
        $emprendimientosRestHandler->destacados($_GET);
        break;

	case "" :
		//404 - not found;
		break;
}
?>
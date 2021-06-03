<?php
require_once("rest-handler/InmueblesRestHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "get":
		// to handle REST Url /inmuebles/<id>
		$inmueblesRestHandler = new InmueblesRestHandler();
		$inmueblesRestHandler->get($_GET["id"]);
		break;

	case "buscar":
		// to handle REST Url /inmuebles/buscar/
		$inmueblesRestHandler = new InmueblesRestHandler();
		$inmueblesRestHandler->buscar($_GET);
		break;
		
    case "imagenes":
        // to handle REST Url /inmuebles/imagenes/<id>
        $inmueblesRestHandler = new InmueblesRestHandler();
        $inmueblesRestHandler->imagenes($_GET["id"]);
        break;

    case "consulta":
        // to handle REST Url /inmuebles/consulta/<id>
        $inmueblesRestHandler = new InmueblesRestHandler();
        $inmueblesRestHandler->consulta($_GET["id"], $_POST);
        break;

    case "destacados":
        // to handle REST Url /inmuebles/destacados/
        $inmueblesRestHandler = new InmueblesRestHandler();
        $inmueblesRestHandler->destacados($_GET);
        break;

	case "" :
		//404 - not found;
		break;
}
?>
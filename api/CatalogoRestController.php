<?php
require_once("rest-handler/CatalogoRestHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "estados-operacion":
		// to handle REST Url /catalogo/estadosoperacion
		$catalogoRestHandler = new CatalogoRestHandler();
		$catalogoRestHandler->estadosOperacion();
		break;
		
    case "operaciones":
        // to handle REST Url /catalogo/operaciones
        $catalogoRestHandler = new CatalogoRestHandler();
        $catalogoRestHandler->operaciones();
        break;

    case "productos":
        // to handle REST Url /catalogo/productos
        $catalogoRestHandler = new CatalogoRestHandler();
        $catalogoRestHandler->productos();
        break;

	case "sub-productos":
		// to handle REST Url /catalogo/subproductos/<id>
		$catalogoRestHandler = new CatalogoRestHandler();
		$catalogoRestHandler->subProductos($_GET["id"]);
		break;

    case "ubicaciones":
        // to handle REST Url /catalogo/ubicaciones/
        $catalogoRestHandler = new CatalogoRestHandler();
        $catalogoRestHandler->ubicaciones($_GET);
        break;

    case "tipos-emprendimiento":
        // to handle REST Url /catalogo/tiposemprendimiento
        $catalogoRestHandler = new CatalogoRestHandler();
        $catalogoRestHandler->tiposEmprendimiento();
        break;

    case "etapas-emprendimiento":
        // to handle REST Url /catalogo/etapasemprendimiento
        $catalogoRestHandler = new CatalogoRestHandler();
        $catalogoRestHandler->etapasEmprendimiento();
        break;

    case "tipos-consultas-inmueble":
        // to handle REST Url /catalogo/tiposconsultasinmueble
        $catalogoRestHandler = new CatalogoRestHandler();
        $catalogoRestHandler->tiposConsultasInmueble();
        break;

    case "tipos-consultas-emprendimiento":
        // to handle REST Url /catalogo/tiposconsultasemprendimiento
        $catalogoRestHandler = new CatalogoRestHandler();
        $catalogoRestHandler->tiposConsultasEmprendimiento();
        break;

	case "" :
		//404 - not found;
		break;
}
?>
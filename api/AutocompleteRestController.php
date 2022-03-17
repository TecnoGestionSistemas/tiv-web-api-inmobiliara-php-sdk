<?php
require_once("rest-handler/CatalogoRestHandler.php");

$view = "";
if (isset($_GET["view"]))
    $view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch ($view) {

    case "ubicaciones":
        // to handle REST Url /autocomplete/ubicaciones/?<desc>
        $id = isset($_GET["id"]) ? $_GET["id"] : (isset($_GET["padre_id"]) ? $_GET["padre_id"] : null);
        $desc = isset($_GET["term"]) ? $_GET["term"] : (isset($_GET["desc"]) ? $_GET["desc"] : null);
        $params = array(
            'padre_id' => $id,
            'desc' => $desc
        );
        $catalogoRestHandler = new CatalogoRestHandler();
        $catalogoRestHandler->ubicacionesAutocomplete($params);
        break;

    case "":
        //404 - not found;
        break;
}
?>
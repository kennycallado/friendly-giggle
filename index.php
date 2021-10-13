<?php

/* inyecta dependencia controller */
include_once("controllers/Controller.php");
/* carga controlador */
$controller = new Controller();

/* Gestiona endpoints relacionados con marca */
/* Guarda marca desde la ruta */
$marca = isset($_GET["marca"]) ? $_GET["marca"] : "";
if ($marca) {
  /* muestra la vista para detalle */
  $controller->visualizar_detalle($marca);
} else {
  /* muestra la vista para lista */
  $controller->visualizar_lista();
}

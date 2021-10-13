<?php

class Controller
{
  public $repository;

  public function __construct()
  {
    include_once("models/CervezaRepository.php");

    $this->repository = new CervezaRepository();
  } // __construct()

  public function visualizar_lista()
  {
    /* Al declarar esta variable la hago accesible en la vista */
    $cervezas = $this->repository->get_ListaCervezas();

    include_once("views/listadocervezas.php");
  } // visualizar_lista()

  public function visualizar_detalle($marca)
  {
    /* Al declarar esta variable la hago accesible en la vista */
    $cerveza = $this->repository->get_Cerveza($marca);

    include_once("views/datoscerveza.php");
  } // visualizar_detalle()
}

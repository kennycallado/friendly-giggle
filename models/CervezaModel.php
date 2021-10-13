<?php

class CervezaModel
{
  public $marca;
  public $graduacion;
  public $color;
  public $composicion;
  public $ano_lanz;
  public $pais_orig;

  public $create_at;

  public function __construct($marca, $graduacion, $color, $composicion, $ano_lanz, $pais_orig)
  {
    $this->marca = $marca;
    $this->graduacion = $graduacion;
    $this->color = $color;
    $this->composicion = $composicion;
    $this->ano_lanz = $ano_lanz;
    $this->pais_orig = $pais_orig;

    $this->create_at = date("Y-m-d H:i:s");
  }
}

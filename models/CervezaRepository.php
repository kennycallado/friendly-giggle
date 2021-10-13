<?php
/* Inyecta modelo */
include_once("models/CervezaModel.php");

/* Injecta clase bbdd */
include_once("Database.php");

class CervezaRepository
{
  public $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  /* repositorio de cervezas */
  public function get_ListaCervezas()
  {
    $result = [];

    $dbh = $this->db->conn;

    try {
      /* Prepara la petición y la ejecuta */
      $query = $dbh->prepare("SELECT * FROM t_cerveza");
      $query->execute();


      while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        array_push($result, new CervezaModel(
          $row->cer_marca,
          $row->cer_graduacion,
          $row->cer_color,
          $row->cer_composicion,
          $row->cer_ano_lanza,
          $row->cer_pais_orig
        ));
      }
    } catch (PDOException $e) {
      echo "Error: $e->getMessage()";
      die("error: Problemas petición get_ListaCervezas.");
    }

    /* cierra la instancia a la base de datos */
    $dbh = null;

    return $result;
  }

  /* detalle cerveza */
  public function get_Cerveza($marca)
  {
    /* $dbh = $this->connect_db(); */
    $dbh = $this->db->conn;

    try {
      /* Prepara la petición y la ejecuta */
      $query = $dbh->prepare("SELECT * FROM t_cerveza WHERE cer_marca = '$marca'");
      $query->execute();

      $row = $query->fetch(PDO::FETCH_OBJ);

      /* Construye objeto apartir de la clase CervezaModel */
      $result = new CervezaModel(
        $row->cer_marca,
        $row->cer_graduacion,
        $row->cer_color,
        $row->cer_composicion,
        $row->cer_ano_lanza,
        $row->cer_pais_orig
      );
    } catch (PDOException $e) {
      echo "Error: $e->getMessage()";
      die("error: Problemas petición get_Cerveza.");
    }

    /* cierra la instancia a la base de datos */
    $dbh = null;

    return $result;
  } // get_Cerveza()
}

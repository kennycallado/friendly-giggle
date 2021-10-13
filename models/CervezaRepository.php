<?php
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
    $dbh = $this->db->conn;
    /* $dbh = $this->connect_db(); */

    try {
      /* Prepara la petición y la ejecuta */
      $query = $dbh->prepare("SELECT * FROM t_cerveza");
      $query->execute();

      $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error: $e->getMessage()";
      die("error: Problemas petición get_ListaCervezas.");
    }

    /* cierra la instancia a la base de datos */
    $dbh = null;

    return $rows;
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

      $row = $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error: $e->getMessage()";
      die("error: Problemas petición get_Cerveza.");
    }

    /* cierra la instancia a la base de datos */
    $dbh = null;

    return $row;
  } // get_Cerveza()
}

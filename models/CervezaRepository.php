<?php
include_once("Database.php");

class CervezaRepository
{
  public $db;

  public function __construct()
  {
    /* Crea instancia de Database */
    /* esto crea la conexión */
    $this->db = new Database();
  }

  /* repositorio de cervezas */
  public function get_ListaCervezas()
  {
    /* Copia conexión de base de datos */
    $dbh = $this->db->conn;

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
    /* Copia conexión de base de datos */
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

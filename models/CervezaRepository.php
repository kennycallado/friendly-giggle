<?php
include_once("model/cerveza.php");

class CervezaRepository
{
  private function connect_db()
  {
    /* Datos conexión base de datos; */
    $host = "localhost";
    $user = "root";
    $pass = "toor";
    $db   = "cerveceria";
    $dsn  = "mysql:dbname=$db;host=$host";

    try {
      /* Crea conexión con base de datos */
      $dbh = new PDO($dsn, $user, $pass);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      /* Manejo de errores */
      echo "Error: $e->getMessage()";
      die("error: Problemas con la conexión.");
    }

    return $dbh;
  } // connect_db()

  /* repositorio de cervezas */
  public function get_ListaCervezas()
  {
    $dbh = $this->connect_db();

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
    $dbh = $this->connect_db();

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

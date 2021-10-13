<?php

class Database
{
  public $conn;

  function __construct()
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

    $this->conn = $dbh;
  } // __construct()

  function __destruct()
  {
    $this->conn = null;
  } // __destruct()
}

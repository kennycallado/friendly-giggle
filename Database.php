<?php

class Database
{
  public $conn;

  function __construct()
  {
    /* Datos conexión base de datos; */
    $host = "localhost";
    $user = "root";
    $pass = "";
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

    /* Comprobar que existe la tabla */
    $this->tableCehecker($dbh);

    $this->conn = $dbh;
  } // __construct()

  function __destruct()
  {
    $this->conn = null;
  } // __destruct()

  /* Comprueba que existe la tabla necesaria */
  /* si no existe la crea */
  function tableCehecker($dbh)
  {
    try {
      $query = $dbh->prepare("SHOW TABLES like 't_cerveza';");
      $query->execute();

      /* OJO: cambiar != por == */
      if ($query->rowCount() == 0) {
        /* Accede a cerveceria.sql y guarda contenido */
        $puntero = fopen("cerveceria.sql", "r");
        $contenido = "";
        if ($puntero) {
          $contenido = fread($puntero, filesize("cerveceria.sql"));

          fclose($puntero);
        } else {
          die("Problemas al acceder a cerveceria.sql");
        }

        /* Prepara y ejecuta nueva consulta */
        $query = $dbh->prepare($contenido);
        $query->execute();
      }
    } catch (PDOException $e) {
      echo "Error: $e->getMessage()";
      die("error: algun problema al insertar datos iniciales.");
    }
  } // tableCehecker()
}

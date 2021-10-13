<!DOCTYPE html>
<html lang="es">

<head>
  <title>Detalle cerveza</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

  <a style="font-size: 3rem;" href="index.php">Back</a>

  <h1>Detalles de la cerveza <?= $cerveza["marca"] ?></h1>
  <table border="true">
    <thead>
      <tr>
        <th>Marca</th>
        <th>Graduación</th>
        <th>Color</th>
        <th>Composición</th>
        <th>Año lanza</th>
        <th>País origen</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
        foreach ($cerveza as $key => $value) {
          /* esto será assoc */
          echo "<td>" . $value . "</td>";
        }
        ?>
      </tr>
    </tbody>
  </table>

</body>

</html>

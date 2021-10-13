<!DOCTYPE html>
<html lang="es">

<head>
  <title>Lista de cervezas</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

  <h1>Disfrute de las mejores marcas</h1>
  <table style="margin: auto; text-align: center;">
    <thead>
      <tr>
        <th>Marcas</th>
      </tr>
    </thead>

    <tbody>
      <?php

      foreach ($cervezas as $key => $value) {
        echo "<tr>";

        echo "<td><a href='index.php?marca=" . $value["cer_marca"] . "'>$value[cer_marca]</a></td>";

        echo "</tr>";
      }

      ?>
    </tbody>
  </table>

</body>

</html>

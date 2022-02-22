<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <style>
    th{
      width: 8rem;
      text-align: left;
      border-bottom: 1px solid black;
    }
    td{
      width: 8rem;
    }
  </style>

  <h1>Ejemplo 5: Listado de coches</h1>
  <table>
    <tr>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Color</th>
      <th>Propietario</th>
    </tr>
    <?php foreach ($rowset as $row): ?>
      <tr>
        <td><?php echo $row->marca ?></td>
        <td><?php echo $row->modelo ?></td>
        <td><?php echo $row->color ?></td>
        <d><?php echo $row->propietario ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
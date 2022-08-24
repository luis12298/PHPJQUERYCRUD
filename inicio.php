<?php
session_start();
// if (!isset($_SESSION['user'])) {
//    header("Location: login.php");
// }
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lista</title>
   <style>
      #fila:hover {
         background-color: #ddd;
         cursor: pointer;
      }

      a {
         text-decoration: none;
         border-radius: 4px;
         border: solid 1px #20538D;
         background: #ECE9D8;
         padding: 1px 2px;
         color: black;
      }
   </style>
</head>

<body>
   <h1>Listado de usuarios</h1>

   <div>
      <?php
      $user = $_SESSION['user'];
      ?>
   </div>

   <h3>Bienvenido: <?php echo $user; ?></h3>
   <br>
   <a href="salir.php">Salir</a>
   <br>
   <br>
   <input type="search" name="txtbuscar" id="txtbuscar" placeholder="Texto a buscar"><br><br>
   <input type="hidden" name="" id="txtvalor" value="">
   <table id="dgvDatos" style="border-collapse: collapse;
         width: 35%;">
   </table>
   <br>
   <button id="btn1">Agregar Nuevo</button>
   <a href="" id="url1" onclick="editar();">Editar</a>
   <a href="" onclick="eliminar();" id="url2">Eliminar</a>
   <script src=" https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="main.js"></script>

</body>

</html>
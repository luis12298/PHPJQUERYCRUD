<?php
include "Conexion/Conexion.php";
session_start();
if (!isset($_SESSION['user'])) {
   header("Location: login.php");
}
$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM Usuarios WHERE IdUsuario = ?");
$query->execute(array($id));
$data = $query->fetchAll(PDO::FETCH_OBJ);
foreach ($data as $dato) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Nuevo Usuario</title>
</head>

<body style="text-align: center;">
   <form id="Editar" method="POST">
      <div>
         <?php

         ?>
      </div>
      <table>
         <td colspan="2" style="text-align: center;">
            <h3>Ingresar nuevo usuario</h3>
         </td>
         <tr>
            <td>Id Usuario:</td>
            <td><input type="text" name="txtidusuario" id="txtidusuario" placeholder="Usuario" readonly value="<?php echo $dato->IdUsuario; ?>"></td>
         </tr>
         <tr>
            <td>Nuevo Usuario:</td>
            <td><input type="text" name="txtusuario" id="txtusuario" placeholder="Usuario" value="<?php echo $dato->NombreUsuario; ?>"></td>
         </tr>
         <tr>
            <td>Nueva Contraseña:</td>
            <td><input type="text" name="txtpass" id="txtpass" placeholder="Contraseña" value="<?php echo $dato->Contrasena; ?>"></td>
         </tr>
         <tr>
            <input type="text" style="display: none;" name="indicador" id="indicador" value="2">
            <td colspan="2" style="text-align: center;"><input type="submit" name="btnguardar" value="Actualizar Registro" class="submit" /></td>
         </tr>

   </form>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="main.js"></script>

</body>

</html>
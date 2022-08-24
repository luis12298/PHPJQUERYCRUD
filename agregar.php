<?php
include "Conexion/Conexion.php";
session_start();
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
   <form id="Guardar" method="POST">
      <table>
         <td colspan="2" style="text-align: center;">
            <h3>Ingresar nuevo usuario</h3>
         </td>
         <tr>
            <td>Nuevo Usuario:</td>
            <td><input type="text" name="txtusuario" id="txtusuario" placeholder="Usuario"></td>
         </tr>
         <tr>
            <td>Nueva Contraseña:</td>
            <td><input type="password" name="txtpass" id="txtpass" placeholder="Contraseña"></td>
         </tr>
         <tr>
            <input type="text" style="display: none;" name="indicador" id="indicador" value="1">
            <td colspan="2" style="text-align: center;"><input type="submit" name="btnguardar" value="Guardar Registro" class="submit" /></td>
         </tr>
      </table>
   </form>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="main.js"></script>

</body>

</html>
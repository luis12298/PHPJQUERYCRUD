<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <style>

   </style>
</head>

<body>
   <center>
      <form id="form" method="post">
         <div>
            <?php
            if (isset($_GET['close'])) {
               session_destroy();
               echo '<script>alert("Se acaba de cerrar una session");</script>';
            }
            ?>
         </div>
         <h2>Inicio de sesion</h2>
         <table>
            <tr>
               <td>Usuario:</td>
               <td><input type="text" name="txtusuario" placeholder="Usuario" id="txtusuario"></td>
            </tr>
            <tr>
               <td>Contraseña:</td>
               <td><input type="password" name="txtpass" id="txtpass" placeholder="Contraseña"></td>
            </tr>
            <tr>
               <td colspan="2" style="text-align: center;"><input type="submit" name="btniniciar" value="Ingresar"></td>
            </tr>
         </table>
         <input style="display: none;" type="text" name="indicador" id="indicador" value="3">
      </form>
   </center>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="main.js"></script>
</body>

</html>
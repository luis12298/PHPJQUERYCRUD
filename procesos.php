<?php
function login($post)
{
   include "Conexion/Conexion.php";
   session_start();

   $usuario = $_POST["txtusuario"];
   $cont = $_POST["txtpass"];
   $cmd = $conn->prepare("SELECT * FROM Usuarios WHERE NombreUsuario =:par1 and Contrasena =:par2");
   $cmd->bindParam("par1", $usuario, PDO::PARAM_STR);
   $cmd->bindParam("par2", $cont, PDO::PARAM_STR);
   $cmd->execute();
   $fila = $cmd->rowCount();

   if ($fila) {
      $_SESSION['user'] = $usuario;
      echo json_encode(['status' => 'success']);
      $conn = null;
   } else {
      echo json_encode(['status' => 'error']);
      $conn = null;
   }
}
function agregar($post)
{
   include "Conexion/Conexion.php";

   $usuario = $_POST['txtusuario'];
   $cont = $_POST['txtpass'];
   $query = $conn->prepare("SELECT ISNULL((select max(IdUsuario) FROM Usuarios),0)+1");
   $query->execute();
   $data = $query->fetch();
   $Id = $data[0];
   $query = "INSERT INTO Usuarios(IdUsuario,NombreUsuario,Contrasena)VALUES(:id,:usuario,:pass)";
   $cmd = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1));
   $cmd->execute(array(':id' => $Id, ':usuario' => $usuario, ':pass' => $cont));
   if ($cmd) {
      echo json_encode(['status' => 'success']);
      $conn = null;
   } else {
      echo json_encode(['status' => 'error']);
      $conn = null;
   }
}
function actualizar($post)
{
   include "Conexion/Conexion.php";
   $idusuario = $_POST['txtidusuario'];
   $usuario = $_POST['txtusuario'];
   $cont = $_POST['txtpass'];

   $query = "UPDATE Usuarios SET NombreUsuario = :usuario, Contrasena = :pass WHERE IdUSuario  = :id";
   $cmd = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1));
   $cmd->execute(array(':usuario' => $usuario, ':pass' => $cont, ':id' => $idusuario,));
   if ($cmd) {
      echo json_encode(['status' => 'success']);
      $conn = null;
   } else {
      echo json_encode(['status' => 'error']);
      $conn = null;
   }
}
function eliminar($get)
{
   include "Conexion/Conexion.php";
   $id = $get;
   $query = "DELETE Usuarios WHERE IdUSuario  = ?";
   $cmd = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1));
   $cmd->execute(array($id));

   if ($id > 0) {
      echo json_encode(['status' => 'success']);
      $conn = null;
   } else {
      echo json_encode(['status' => 'error']);
      $conn = null;
   }
}
function controller($post)
{
   $action = ($_POST['indicador']);
   if ($action == 1) {
      agregar($_POST);
   } elseif ($action == 2) {
      actualizar($_POST);
   } elseif ($action == 3) {
      login($_POST);
   }
}
if ($_POST) {
   controller($_POST);
} else {
   //para eliminar un registro
   //
   if (isset($_GET['me'])) {
      $v = $_GET['me'];
      eliminar($v);
   }
}

<?php
function buscar($post)
{
   include_once('Conexion/Conexion.php');
   $return = '';

   if (isset($_POST['query'])) {
      $buscar = $_POST['query'];

      $query = $conn->prepare("SELECT * FROM Usuarios WHERE IdUsuario LIKE '%" . $buscar . "%'
OR NombreUsuario LIKE '%" . $buscar . "%'
OR Contrasena LIKE '%" . $buscar . "%'
");
   } else {
      $query = $conn->prepare("SELECT * FROM Usuarios");
   }
   $query->execute();

   if ($query) {
      $return .= '
      <thead>
         <tr>
            <th>Id Usuario</th>
            <th>Nombre Usuario</th>
            <th>Contrasena</th>
         </tr>
      </thead>';
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
         $return .= '
      <tbody id="datos">
		<tr id="fila">
		<td>' . $row["IdUsuario"] . '</td>
		<td>' . $row["NombreUsuario"] . '</td>
		<td>' . $row["Contrasena"] . '</td>
		</tr>
      </tbody>';
      }
      echo $return;
   } else {
      echo "No se encontraon resultados";
   }
}
buscar($_POST);

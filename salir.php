<?php
include "Conexion/Conexion.php";
$conn = null;
session_start();
session_destroy();
header("Location: login.php");

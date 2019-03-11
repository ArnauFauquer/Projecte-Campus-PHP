<?php

session_start();
if(!isset($_SESSION['profesor']))
    {
    header("location:login.html");
    }else{

  $conexion=new mysqli('localhost','root','','asix2m') or die ("sin conexion db");
  $tabla_usu=$conexion->query("select * from usuarios");
  echo "<table border=1>
  <tr>
	<th>dni</th>
    <th>nombre</th>
    <th>apellido</th>
    <th>login</th>
    <th>password</th>
  </tr>";  
  while($fila_usu=$tabla_usu->fetch_object())
      {
	echo '<td>' .$fila_usu->dni_usu. '</td>';
    echo '<td>' .$fila_usu->nombre. '</td>';
    echo '<td>' .$fila_usu->apellido. '</td>';
    echo '<td>' .$fila_usu->login. '</td>';      
    echo '<td>' .$fila_usu->password. '</td></tr>';
  }
    echo "<table>";

	$tabla_asi=$conexion->query("select * from asignaturas");
  echo "<table border=1>
  <tr>
    <th>id_asignaturas</th>
    <th>nombre</th>
  </tr>";  
  while($fila_asi=$tabla_asi->fetch_object())
      {
	echo '<td>' .$fila_asi->id_asignaturas. '</td>';
    echo '<td>' .$fila_asi->nombre. '</td></tr>';
  }
    echo "<table>";

	$tabla_not=$conexion->query("select * from notas");
  echo "<table border=1>
  <tr>
    <th>id_asignaturas</th>
    <th>dni</th>
    <th>nota_1</th>
    <th>nota_2</th>
	<th>nota_Final</th>
  </tr>";  
  while($fila_usu=$tabla_usu->fetch_object())
      {
	echo '<td>' .$fila_not->id_asignaturas. '</td>';
    echo '<td>' .$fila_not->dni. '</td>';
    echo '<td>' .$fila_not->nota_1. '</td>';
    echo '<td>' .$fila_not->nota_2. '</td>';      
    echo '<td>' .$fila_not->nota_Final. '</td></tr>';
  }
    echo "<table>";
}
?>
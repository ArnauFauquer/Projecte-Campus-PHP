<!DOCTYPE html>

<?php
session_start();
$dd=$_SESSION['alumno'];
if(!isset($_SESSION['alumno']))
    {
    header("location:login_error.html");
    }
    else{
?>

<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="all.css">
    </head>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="alu_home.php">Alumno</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="alu_home.php">Home</a></li>
        <li><a href="logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>
<br>

<div class="center">
<?php

  $conexion=new mysqli('localhost','root','','asix2m') or die ("sin conexion db");
  #echo "SELECT * FROM notas WHERE alu_login='".$_SESSION['alumno']."'";
        
	$tabla_not=$conexion->query("SELECT * FROM notas WHERE alu_login='".$_SESSION['alumno']."'");
  echo "<table>
  <tr>
    <th>Asignaturas</th>
    <th>Nota Trimestre 1</th>
    <th>Nota Trimestre 2</th>
	<th>Nota Trimestre Final</th>
  </tr>";
        
  while($fila_not=$tabla_not->fetch_object())
      {
	echo '<td>M' .$fila_not->id_asignaturas. '</td>';
    #echo '<td>' .$fila_not->alu_login. '</td>';
    echo '<td>' .$fila_not->nota_1. '</td>';
    echo '<td>' .$fila_not->nota_2. '</td>';      
    echo '<td>' .$fila_not->nota_Final. '</td></tr>';
  }
    echo "</table>";

?>
</div>
    
</body>
</html>
     
<?php }?>
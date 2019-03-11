<!DOCTYPE html>

<?php
session_start();
if(!isset($_SESSION['profesor']))
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
    <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="profe_home.php">Profesor</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="profe_notas.php">Poner Notas</a></li>
            <li><a href="profe_vis_alu.php">Ver Notas</a></li>
            <li><a href="profe_altas.php">Dar de Alta</a></li>
            <li><a href="profe_bajas.php">Dar de Baja</a></li>
            <li><a href="logout.php" style="color: red">Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
        
  $conexion=new mysqli('localhost','root','','asix2m') or die ("sin conexion db");
  #echo "SELECT * FROM notas WHERE alu_login='".$_SESSION['alumno']."'";
        
	$tabla_not=$conexion->query("SELECT * FROM notas order by alu_login asc ");
  echo "<table>
  <tr>
    <th>Asignaturas</th>
    <th>Alumne</th>
    <th>Nota Trimestre 1</th>
    <th>Nota Trimestre 2</th>
	<th>Nota Trimestre Final</th>
  </tr>";
        
  while($fila_not=$tabla_not->fetch_object())
      {
	echo '<td>M' .$fila_not->id_asignaturas. '</td>';
    echo '<td>' .$fila_not->alu_login. '</td>';
    echo '<td>' .$fila_not->nota_1. '</td>';
    echo '<td>' .$fila_not->nota_2. '</td>';      
    echo '<td>' .$fila_not->nota_Final. '</td></tr>';
  }
    echo "</table>";

    ?>
    
    <div class='form'>
        <form class='msg' action="profe_notas1.php" method="post">
            <div><label>Asignatura: </label><input type='text' name='asignatura'></div>
            <div><label>Login: </label><input type='text' name='login'></div>
            <div><label>nota_1: </label><input type='number' min="0" max="10" name='nota_1'></div>
            <div><label>nota_2: </label><input type='number' min="0" max="10" name='nota_2'></div>
            <div><label>nota_3: </label><input type='number' min="0" max="10" name='nota_3'></div>
            <div><input type='submit'  value='Enviar'></div>   
        </form>
    </div>
       
                
    </body>
</html>
     
<?php }?>
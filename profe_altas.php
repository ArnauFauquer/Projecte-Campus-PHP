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
     $tabla_usu=$conexion->query("SELECT * FROM usuarios where categoria=5 ");
    echo "<table>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Login</th>
      </tr>";  
      while($fila_usu=$tabla_usu->fetch_object())
          {
        echo '<td>' .$fila_usu->nombre. '</td>';
        echo '<td>' .$fila_usu->apellido. '</td>';
        echo '<td>' .$fila_usu->login. '</td></tr>';      
      }
        echo "</table>";
    ?>
    
        <div class='form'>
            <form class='msg' action="profe_altas1.php" method="post">
                <div><label>Login: </label><input type='text' name='login'></div>
                <div><label>Password:</label><input type='text' name='password' ></div>
                <div><label>Nombre: </label><input type='text' name='nombre'></div>
                <div><label>Apellido:</label><input type='text' name='apellido'></div>
                <div><input type='submit'  value='Enviar'></div>   
            </form>
        </div>
    
                
    </body>
</html>
     
<?php }?>
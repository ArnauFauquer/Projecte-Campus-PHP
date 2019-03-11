<?php
session_start();
if(!isset($_SESSION['profesor']))
    {
    header("location:login_error.html");
    }else{
?>

<!DOCTYPE html>
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
        <li><a href="profe_altas.php">Dar de Alta</a></li>
        <li><a href="profe_bajas.php">Dar de Baja</a></li>
        <li><a href="profe_vis_alu.php">Ver Notas</a></li>
        <li><a href="logout.php" style="color: red">Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>
<br>

<div class="center">
<h1>Bienvenido <?php echo $_SESSION['profesor']; ?> </h1>
       <p>Estimada o estimado Usuario,</p> 
       <br>
       <p> Me complace darle la más cordial bienvenida al sitio web de las Notas.Este portal le informa sobre las actividades y las notas de su Centro Educativo,</p>
        
       <p>En la parte superior encontrará las operaciones concevidas.</p>    
</div>
        
</body>
</html>


<?php       
}
?>
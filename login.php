<?php

session_start();

$password=$_POST['password'];
$login=$_POST['login'];

echo "$login $password";
echo "<br>";
    
$conexion=new mysqli('localhost','root','','asix2m') or die ("sin conexion db");
$ssql="select * from usuarios where login='$login' and password='$password'";

$usucntra=$conexion->query($ssql);

$numrw=mysqli_num_rows($usucntra);
if($numrw==1){
    $registro=$usucntra->fetch_object();
    
    switch($registro->categoria){
        case 0:
            
            $_SESSION['profesor']=$registro->login;
			echo "profesor";
            echo $registro->login;
            echo $numrw==1;
            header("location:profe_home.php");
			break;

        case 5:
            
            $_SESSION['alumno']=$registro->login;
			echo "alumno";
            echo $registro->login;
            header("location:alu_home.php");
			break;
    }
}else{
  header("location:login_error.html");
}
 
$conexion->close();
?>
<?php 
session_start();

$login=$_POST['login'];
$password=$_POST['password'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];

if(!isset($_SESSION['profesor']))
    {
    header("location:login.html");
    }else{

$conexion=new mysqli('localhost','root','','asix2m') or die ("sin conexion db");
$hola=$conexion->query("INSERT INTO `usuarios` (`nombre`, `apellido`, `login`, `password`, `categoria`) VALUES ('$nombre', '$apellido', '$login', '$password', '5')");
    header("location:profe_altas.php");
    echo $hola;
    echo $login;
    echo $password;
    echo $nombre;
    echo $apellido;
}
?>
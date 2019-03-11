<?php 
session_start();

$login=$_POST['login'];

if(!isset($_SESSION['profesor']))
    {
    header("location:login.html");
    }else{

$conexion=new mysqli('localhost','root','','asix2m') or die ("sin conexion db");
$hola=$conexion->query("DELETE FROM usuarios WHERE login = '$login'");
                        
    header("location:profe_bajas.php");
    echo $hola;
    echo $login;
}
?>
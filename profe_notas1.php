<?php 
session_start();

$asignatura=$_POST['asignatura'];
$login=$_POST['login'];
$nota_1=$_POST['nota_1'];
$nota_2=$_POST['nota_2'];
$nota_3=$_POST['nota_3'];

if(!isset($_SESSION['profesor']))
    {
        header("location:login.html");
    }else{
    
        $conexion=new mysqli('localhost','root','','asix2m') or die ("sin conexion db");
    
        $result=$conexion->query("SELECT * FROM notas where id_asignaturas= $asignatura and alu_login='$login' ");
        $num_rows =mysqli_num_rows($result);
    
        if ($num_rows==0){
            $conexion->query("INSERT INTO `notas`(`id_asignaturas`, `alu_login`, `nota_1`, `nota_2`, `nota_Final`) VALUES ($asignatura,'$login',$nota_1,$nota_2,$nota_3)");
        }else{
            $conexion->query("UPDATE `notas` SET id_asignaturas= $asignatura,alu_login='$login',nota_1= $nota_1,nota_2= $nota_2,nota_Final= $nota_3 where id_asignaturas= $asignatura and alu_login='$login'");
        }
    
    header("location:profe_notas.php");
}
?> 
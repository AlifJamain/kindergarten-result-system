<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['gurulogin'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['id_pelajar']))
{
$id_pelajar=$_GET['id_pelajar'];
$sql = "delete from  tblpelajar  WHERE id_pelajar=:id_pelajar";
$query = $dbh->prepare($sql);
$query -> bindParam(':id_pelajar',$id_pelajar, PDO::PARAM_STR);
$query -> execute();
header('location:pelajar_papar.php');
}
}
?>
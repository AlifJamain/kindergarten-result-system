<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['id_guru']))
{
$id_guru=$_GET['id_guru'];
$sql = "delete from  tblguru  WHERE id_guru=:id_guru";
$query = $dbh->prepare($sql);
$query -> bindParam(':id_guru',$id_guru, PDO::PARAM_STR);
$query -> execute();
header('location:guru_papar.php');
}
}
?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['add']))
{
$emel_guru=$_POST['emel_guru'];   
$katalaluan_guru=($_POST['katalaluan_guru']);
$nama_guru=$_POST['nama_guru'];

$status=1;

$sql="INSERT INTO tblguru (emel_guru, katalaluan_guru, nama_guru,  status) VALUES(:emel_guru,:katalaluan_guru, :nama_guru, :status)";
$query = $dbh->prepare($sql);
$query->bindParam(':emel_guru',$emel_guru,PDO::PARAM_STR);
$query->bindParam(':katalaluan_guru',$katalaluan_guru,PDO::PARAM_STR);
$query->bindParam(':nama_guru',$nama_guru,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
header('location:index.php');
}
else 
{
$error="Something went wrong. Please try again";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/header.php"; ?>
<style type="text/css">
    body{
    	padding-top: 30px;
    }
	.login-form {
		width: 340px;
    	margin: auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
        background-color: #990099;
    }
    .btn:hover {
    opacity: 1;
    }
</style>

</head>
<body>
<div class="container">
	
	<div class="row">
		<div class="col-xs-12">
             <center> <a href="index.php"><img src="logo4.png" style="width:100;"> </a></center> 
			
            <div class="login-form">
    <form method="post">
        <h2 class="text-center">Daftar Pengguna</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="nama_guru" placeholder="Nama Penuh Pengguna" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="emel_guru" placeholder="Emel Pengguna" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="katalaluan_guru" placeholder="Kata Laluan" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="add">Daftar</button>
        </div>     
    </form>
    <p class="text-center"><a href="index.php">Log Masuk</a></p>
</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<footer>
                <?php include "includes/footer.php"; ?>
			</footer>
		</div>
	</div>
</div>
</body>
</html>                            
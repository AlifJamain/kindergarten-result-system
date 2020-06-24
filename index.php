<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['login']))
{
$emel_guru=$_POST['emel_guru'];
$katalaluan_guru=$_POST['katalaluan_guru'];
$sql ="SELECT emel_guru,katalaluan_guru,status,id_guru FROM tblguru WHERE emel_guru=:emel_guru and katalaluan_guru=:katalaluan_guru";
$query= $dbh -> prepare($sql);
$query-> bindParam(':emel_guru', $emel_guru, PDO::PARAM_STR);
$query-> bindParam(':katalaluan_guru', $katalaluan_guru, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->status;
    $_SESSION['gid']=$result->id_guru;
  } 
if($status==0)
{
$msg="Your account is Inactive. Please contact admin";
} else{
$_SESSION['gurulogin']=$_POST['emel_guru'];
echo "<script type='text/javascript'> document.location = 'guru_info.php'; </script>";
} }

else{
  
  echo "<script>alert('Invalid Details');</script>";

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
    .container img {vertical-align: middle;}
    
    .container {
        width: 100;
        height: 100;
    }

    
    .mySlides {display:none;}
</style>

</head>
<body>
<div class="container">

    <div class="row">
		<div class="col-xs-4">
            
            <center> <a href="index.php"><img src="logo4.png" style="width:100;"> </a></center> 
			
            <div class="login-form">
    <form method="post">
        <h2 class="text-center">Log Masuk</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="emel_guru" placeholder="E-mel Pengguna" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="katalaluan_guru" placeholder="Kata Laluan" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="login">Log Masuk</button>
        </div>     
    </form>
    <p class="text-center"><a href="daftar_pengguna.php">Daftar Pengguna</a> | <a href="admin/index.php"> Pentadbir</a></p>
</div>
		</div>
		<div class="col-xs-8">
            
			<div class="container">
                <h1></h1>
  <img class="mySlides" src="img/kayuhan.jpg" style="width:63%; height:70%; top:0;">
  <img class="mySlides" src="img/kayuhan2.jpg" style="width:63%; height:70%; top:0;">
  <img class="mySlides" src="img/raya.jpg" style="width:63%; height:70%; top:0;">
  <img class="mySlides" src="img/raya2.jpg" style="width:63%; height:70%; top:0;">
  <img class="mySlides" src="img/raya3.jpg" style="width:63%; height:70%; top:0;">
    
    <script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 3 seconds
}
    </script>
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
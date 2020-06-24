
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
    if(isset($_POST['update']))
{

$nama_notifikasi=$_POST['nama_notifikasi']; 
$sql="update tblnotifikasi set nama_notifikasi=:nama_notifikasi, tarikh_notifikasi=:tarikh_notifikasi";
$query = $dbh->prepare($sql);
$query->bindParam(':nama_notifikasi',$nama_notifikasi,PDO::PARAM_STR);
$query->bindParam(':tarikh_notifikasi',$tarikh_notifikasi,PDO::PARAM_STR);
$query->execute();
$msg="Maklumat Berjaya Dikemaskini";
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
        background-color: purple;
    }
    
</style>

</head>
<body>

    <center> <a href="dashboard.php"><img src="logo4.png" style="width:100;"> </a></center>
    <h1></h1>
    
<div class="container">
    
	<div class="row">
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
				<div class="col-xs-8">
			 <form method="post">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Makluman Kepada Guru</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                           <?php 
                                $sql = "SELECT * from  tblnotifikasi";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $result)
                                {
                           ?> 
                          <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Makluman</label>
                                <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><textarea id="nama_notifikasi" name="nama_notifikasi" class="form-control" required="true" type="text"><?php echo htmlentities($result->nama_notifikasi);?></textarea></span></div>
                                </div>
                             
                              <label class="col-md-4 control-label">Tarikh</label>
                                <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><input type="datetime-local" id="tarikh_notifikasi" name="tarikh_notifikasi" class="form-control" required="true" value="<?php echo htmlentities($result->tarikh_notifikasi);?>"></span></div>
                                </div>
                             </div>
                          </fieldset>
                    </td>
                 </tr>
              </tbody>
           </table>
                </fieldset>
                                     <?php }}?>  
                 <center>                <button class="btn btn-primary" type="submit" name="update">Kemaskini</button> 
</center>
            </form>
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
<?php } ?>
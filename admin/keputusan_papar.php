<?php
session_start();
error_reporting(0);
include('includes/config.php');
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
             <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Perkembangan Pelajar</legend>
                    <table class="table table-striped">
            
    <form method="post" action="keputusan.php">     
        <div class="form-group">
            <input type="text" class="form-control" id="nama_pelajar" placeholder="Sila masukkan nama penuh pelajar" autocomplete="off" name="nama_pelajar">
        </div>
        <div class="form-group">
             <select name="kelas" class="form-control" id="default" required="required">
<option value="">---Pilih Kelas---</option>
<?php $sql = "SELECT * from tblkelas";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->nama_kelas); ?></option>
<?php }} ?>
 </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Cari</button>
        </div>     
    </form>

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
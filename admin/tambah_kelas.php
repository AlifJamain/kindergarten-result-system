<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0    )
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
$nama_kelas=$_POST['nama_kelas'];
$id_guru=$_POST['nama_guru'];
$sql="INSERT INTO  tblkelas(nama_kelas, empid) VALUES(:nama_kelas, :id_guru)";
$query = $dbh->prepare($sql);
$query->bindParam(':nama_kelas',$nama_kelas,PDO::PARAM_STR);
$query->bindParam(':id_guru',$id_guru,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Class Created successfully";
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

fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
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
	<div class="jumbotron">
		<h1><center>Tambah Kelas</center></h1>
	</div>
	<div class="row">
          <?php if($error){?><div class="errorWrap"><strong>Gagal </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>Berjaya</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
            <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Tambah Kelas</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                       <form method="post"> 
<div class="form-group">
                                <label class="col-md-4 control-label">Nama Kelas</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input type="text" name="nama_kelas" class="form-control" required="required" id="success">
</span></div>
                                </div>
                             </div>
                           <div class="form-group">
                                <label class="col-md-4 control-label">Nama Guru</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><select name="nama_guru" class="form-control" required="required">
                                            <option value="">---Pilih Guru---</option>
<?php 
$sql = "SELECT * from tblguru";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id_guru); ?>"><?php echo htmlentities($result->nama_guru); ?></option>
<?php }} ?>
 </select>
</span></div>
                                </div>
                             </div>
<div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-labeled">Tambah<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
</div>

                        </form>
                    </td>
                  </tr>
              </tbody>
           </table>
        </fieldset>
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
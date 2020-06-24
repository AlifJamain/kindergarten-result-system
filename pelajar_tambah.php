<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['gurulogin'])=="")
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
    
$empid=$_SESSION['gid'];
$nama_pelajar=$_POST['nama_pelajar'];
$mykid_pelajar=$_POST['mykid_pelajar']; 
$tarikh_lahir_pelajar=$_POST['tarikh_lahir_pelajar']; 
$tarikh_daftar_tadika=$_POST['tarikh_daftar_tadika']; 
$id_kelas=$_POST['kelas'];  
$jantina_pelajar=$_POST['jantina_pelajar'];
$alamat_pelajar=$_POST['alamat_pelajar'];  
$nama_penjaga=$_POST['nama_penjaga'];  
$hubungan_penjaga=$_POST['hubungan_penjaga'];
$no_tel_penjaga=$_POST['no_tel_penjaga']; 
$alamat_penjaga=$_POST['alamat_penjaga'];  
$sql="INSERT INTO tblpelajar(nama_pelajar,mykid_pelajar,tarikh_lahir_pelajar,tarikh_daftar_tadika,id_kelas,jantina_pelajar,alamat_pelajar,nama_penjaga,hubungan_penjaga,no_tel_penjaga,alamat_penjaga,empid) VALUES(:nama_pelajar, :mykid_pelajar, :tarikh_lahir_pelajar,:tarikh_daftar_tadika, :id_kelas, :jantina_pelajar, :alamat_pelajar, :nama_penjaga, :hubungan_penjaga, :no_tel_penjaga, :alamat_penjaga, :empid)";
$query = $dbh->prepare($sql);
$query->bindParam(':nama_pelajar',$nama_pelajar,PDO::PARAM_STR);
$query->bindParam(':mykid_pelajar',$mykid_pelajar,PDO::PARAM_STR);
$query->bindParam(':tarikh_lahir_pelajar',$tarikh_lahir_pelajar,PDO::PARAM_STR);
$query->bindParam(':tarikh_daftar_tadika',$tarikh_daftar_tadika,PDO::PARAM_STR);
$query->bindParam(':id_kelas',$id_kelas,PDO::PARAM_STR);
$query->bindParam(':jantina_pelajar',$jantina_pelajar,PDO::PARAM_STR);
$query->bindParam(':alamat_pelajar',$alamat_pelajar,PDO::PARAM_STR);
$query->bindParam(':nama_penjaga',$nama_penjaga,PDO::PARAM_STR);
$query->bindParam(':hubungan_penjaga',$hubungan_penjaga,PDO::PARAM_STR);
$query->bindParam(':no_tel_penjaga',$no_tel_penjaga,PDO::PARAM_STR);
$query->bindParam(':alamat_penjaga',$alamat_penjaga,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Leave applied successfully";
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
        color:white;
    }
    .btn:hover {
    opacity: 1;
    }
</style>
</head>
    
<body>
    <center> <a href="dashboard.php"><img src="logo4.png" style="width:100;"> </a></center>
    <h1></h1>
    
<div class="container">
	
	<div class="row">
          <?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
            <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Tambah Maklumat Pelajar</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                       <form method="post">
                          <fieldset>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Nama Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="nama_pelajar" name="nama_pelajar" class="form-control" required="true" value="<?php echo htmlentities($result->nama_pelajar);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Mykid Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="mykid_pelajar" name="mykid_pelajar" class="form-control" required="true" value="<?php echo htmlentities($result->mykid_pelajar);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Tarikh Lahir Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input type="date" id="tarikh_lahir_pelajar" name="tarikh_lahir_pelajar" class="form-control" required="true" value="<?php echo htmlentities($result->tarikh_lahir_pelajar);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Tarikh Daftar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input type="date" id="tarikh_daftar_tadika" name="tarikh_daftar_tadika" class="form-control" required="true" value="<?php echo htmlentities($result->tarikh_daftar_tadika);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Kelas Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon">
                                       <select name="kelas" class="form-control" id="kelas" required="required">
<option value="">-Pilih Kelas---</option>
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
 </select></span>
                                    </div>
                                </div>
                             </div>
                               <div class="form-group">
                                <label class="col-md-4 control-label">Jantina Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><select name="jantina_pelajar" required>
            <option value="<?php echo htmlentities($result->jantina_pelajar);?>"><?php echo htmlentities($result->jantina_pelajar);?></option>                   
            <option value="Lelaki">Lelaki</option>
            <option value="Perempuan">Perempuan</option>
                           </select></span></div>
                            </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Alamat Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="alamat_pelajar" name="alamat_pelajar" class="form-control" required="true" value="<?php echo htmlentities($result->alamat_pelajar);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Nama Penjaga</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="nama_penjaga" name="nama_penjaga" class="form-control" required="true" value="<?php echo htmlentities($result->nama_penjaga);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Hubungan Penjaga</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><select name="hubungan_penjaga" required>
            <option value="<?php echo htmlentities($result->hubungan_penjaga);?>"><?php echo htmlentities($result->hubungan_penjaga);?></option>                   
            <option value="Ibu">Ibu</option>
            <option value="Bapa">Bapa</option>
            <option value="Penjaga">Penjaga</option>
                                       </select></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">No. Telefon Penjaga</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="no_tel_penjaga" name="no_tel_penjaga" class="form-control" required="true" value="<?php echo htmlentities($result->no_tel_penjaga);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Alamat Penjaga</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="alamat_penjaga" name="alamat_penjaga" class="form-control" required="true" value="<?php echo htmlentities($result->alamat_penjaga);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div></div>
                              <div class="form-group">
                                  <button class="btn btn-primary" type="submit" name="add" onclick="myFunction()">Tambah</button>&nbsp;<a href='pelajar_papar.php' class='btn btn-danger'>Balik</a>
    <script>
function myFunction() {
  alert("Maklumat berjaya ditambah");
}
                                      </script>
                             </div>
                          </fieldset>
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
<?php }?> 
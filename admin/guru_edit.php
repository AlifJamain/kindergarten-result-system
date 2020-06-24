<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
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
    
    <center> <a href="dashboard.php"><img src="logo4.png" style="width:100;"> </a></center>
    <h1></h1>
    
<div class="container">
	
	<div class="row">
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
    
            <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Maklumat Guru</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                       <form method="post">
<?php 
$id_guru=intval($_GET['id_guru']);
$sql = "SELECT * from tblguru where id_guru=:id_guru";

//$sql = "SELECT pelajar.id as lid,guru.nama_guru, pelajar.nama_pelajar from pelajar join guru on pelajar.empid=guru.id where tblleaves.id=:lid";
$query = $dbh -> prepare($sql);
$query->bindParam(':id_guru',$id_guru,PDO::PARAM_STR);
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
                                <label class="col-md-4 control-label">Nama Guru</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="nama_guru" name="nama_guru" class="form-control" required="true" value="<?php echo htmlentities($result->nama_guru);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">No. Kad Pengenalan</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="kp_guru" name="kp_guru" class="form-control" required="true" value="<?php echo htmlentities($result->kp_guru);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Tarikh Lahir Guru</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="tarikh_lahir_guru" name="tarikh_lahir_guru" class="form-control" required="true" value="<?php echo htmlentities($result->tarikh_lahir_guru);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Status Perkahwinan</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="status_perkahwinan" name="status_perkahwinan" class="form-control" required="true" value="<?php echo htmlentities($result->status_perkahwinan);?>" type="text"></span></div>
                                </div>
                             </div>
                                                            <div class="form-group">
                                <label class="col-md-4 control-label">Alamat Guru</label>
                                <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><textarea readonly id="alamat_guru" name="alamat_guru" class="form-control" required="true" type="text"><?php echo htmlentities($result->alamat_guru);?></textarea></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Tahap Pendidikan</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="tahap_pendidikan" name="tahap_pendidikan" class="form-control" required="true" value="<?php echo htmlentities($result->tahap_pendidikan);?>" type="text"></span></div>
                                </div>
                             </div>
                               <div class="form-group">
                                <label class="col-md-4 control-label">Tarikh Mula Berkhidmat</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="tarikh_mula_bekerja" name="tarikh_mula_bekerja" class="form-control" required="true" value="<?php echo htmlentities($result->tarikh_mula_bekerja);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Nama Bank</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="nama_bank" name="nama_bank" class="form-control" required="true" value="<?php echo htmlentities($result->nama_bank);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">No. Akaun Bank</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="no_acc_bank" name="no_acc_bank" class="form-control" required="true" value="<?php echo htmlentities($result->no_acc_bank);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Nama Waris</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="nama_waris" name="nama_waris" class="form-control" required="true" value="<?php echo htmlentities($result->nama_waris);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Hubungan Waris</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="hubungan_waris" name="hubungan_waris" class="form-control" required="true" value="<?php echo htmlentities($result->hubungan_waris);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">No. Telefon Waris</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="no_tel_waris" name="no_tel_waris" class="form-control" required="true" value="<?php echo htmlentities($result->no_tel_waris);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Alamat Waris</label>
                                <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><textarea readonly id="alamat_waris" name="alamat_waris" class="form-control" required="true" type="text"><?php echo htmlentities($result->alamat_waris);?></textarea></span></div>
                                </div>
                             </div>
                          </fieldset><div class="form-group">

                           <a href='guru_papar.php' class='btn btn-danger'>Balik</a>
</div>
                           <?php }}?>

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
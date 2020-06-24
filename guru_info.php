<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['gurulogin'])==0)
    {   
header('location:index.php');
}
else{
$gid=$_SESSION['gurulogin'];
if(isset($_POST['update']))
{

$kp_guru=$_POST['kp_guru']; 
$tarikh_lahir_guru=$_POST['tarikh_lahir_guru']; 
$status_perkahwinan=$_POST['status_perkahwinan']; 
$alamat_guru=$_POST['alamat_guru']; 
$tahap_pendidikan=$_POST['tahap_pendidikan']; 
$tarikh_mula_bekerja=$_POST['tarikh_mula_bekerja']; 
$nama_bank=$_POST['nama_bank']; 
$no_acc_bank=$_POST['no_acc_bank']; 
$nama_waris=$_POST['nama_waris']; 
$hubungan_waris=$_POST['hubungan_waris']; 
$no_tel_waris=$_POST['no_tel_waris']; 
$alamat_waris=$_POST['alamat_waris']; 
$sql="update tblguru set kp_guru=:kp_guru,tarikh_lahir_guru=:tarikh_lahir_guru, status_perkahwinan=:status_perkahwinan, alamat_guru=:alamat_guru, tahap_pendidikan=:tahap_pendidikan, tarikh_mula_bekerja=:tarikh_mula_bekerja, nama_bank=:nama_bank, no_acc_bank=:no_acc_bank, nama_waris=:nama_waris, hubungan_waris=:hubungan_waris, no_tel_waris=:no_tel_waris, alamat_waris=:alamat_waris where emel_guru=:gid";
$query = $dbh->prepare($sql);
$query->bindParam(':kp_guru',$kp_guru,PDO::PARAM_STR);
$query->bindParam(':tarikh_lahir_guru',$tarikh_lahir_guru,PDO::PARAM_STR);
$query->bindParam(':status_perkahwinan',$status_perkahwinan,PDO::PARAM_STR);
$query->bindParam(':alamat_guru',$alamat_guru,PDO::PARAM_STR);
$query->bindParam(':tahap_pendidikan',$tahap_pendidikan,PDO::PARAM_STR);
$query->bindParam(':tarikh_mula_bekerja',$tarikh_mula_bekerja,PDO::PARAM_STR);
$query->bindParam(':nama_bank',$nama_bank,PDO::PARAM_STR);
$query->bindParam(':no_acc_bank',$no_acc_bank,PDO::PARAM_STR);
$query->bindParam(':nama_waris',$nama_waris,PDO::PARAM_STR);
$query->bindParam(':hubungan_waris',$hubungan_waris,PDO::PARAM_STR);
$query->bindParam(':no_tel_waris',$no_tel_waris,PDO::PARAM_STR);
$query->bindParam(':alamat_waris',$alamat_waris,PDO::PARAM_STR);
$query->bindParam(':gid',$gid,PDO::PARAM_STR);
$query->execute();
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
    
    <center> <a href="dashboard.php"><img src="logo4.png" style="width:100;"> </a></center>
    <h1></h1>
            
<div class="container">
	
	<div class="row">
                  <?php if($error){?><div class="errorWrap"><strong>Gagal </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>Berjaya</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
            <form method="post">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Maklumat Pengguna</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                           <?php 
                                $gid=$_SESSION['gurulogin'];
                                $sql = "SELECT * from  tblguru where emel_guru=:gid";
                                $query = $dbh -> prepare($sql);
                                $query -> bindParam(':gid',$gid, PDO::PARAM_STR);
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
                                <label class="col-md-4 control-label">E-mel</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="emel_guru" name="emel_guru" class="form-control" required="true" value="<?php echo htmlentities($result->emel_guru);?>" type="email"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">No. Kad Pengenalan</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="kp_guru" name="kp_guru"  class="form-control" required="true" value="<?php echo htmlentities($result->kp_guru);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Tarikh Lahir</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input type="date" id="tarikh_lahir_guru" name="tarikh_lahir_guru"  class="form-control" required="true" value="<?php echo htmlentities($result->tarikh_lahir_guru);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Status Perkahwinan</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><select name="status_perkahwinan" required>
            <option value="<?php echo htmlentities($result->status_perkahwinan);?>"><?php echo htmlentities($result->status_perkahwinan);?></option>                   
            <option value="Bujang">Bujang</option>
            <option value="Berkahwin">Berkahwin</option>
            <option value="Bercerai">Bercerai</option>
            <option value="IbuBapa_Tunggal">IbuBapa Tunggal</option>
          </select></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Alamat</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="alamat_guru" name="alamat_guru" class="form-control" required="true" value="<?php echo htmlentities($result->alamat_guru);?>" type="text"></span></div>
                                </div>
                             </div>
                          </fieldset>
                    </td>
                 </tr>
              </tbody>
           </table>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Maklumat Kerjaya</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                          <fieldset>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Tahap Pendidikan</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><select name="tahap_pendidikan" required>
            <option value="<?php echo htmlentities($result->tahap_pendidikan);?>"><?php echo htmlentities($result->tahap_pendidikan);?></option>                   
            <option value="SPM">SPM</option>
            <option value="Diploma">Diploma</option>
            <option value="Ijazah Sarjana Muda">Ijazah Sarjana Muda</option>
            <option value="Sarjana Muda">Sarjana Muda</option>
          </select></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Tarikh Berkhidmat</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input type="date" id="tarikh_mula_bekerja" name="tarikh_mula_bekerja"  class="form-control" required="true" class="datepicker" value="<?php echo htmlentities($result->tarikh_mula_bekerja);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Nama Bank</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><select name="nama_bank" required>
            <option value="<?php echo htmlentities($result->nama_bank);?>"><?php echo htmlentities($result->nama_bank);?></option>                   
            <option value="CIMB">CIMB</option>
            <option value="MayBank">MayBank</option>
            <option value="Muamalat">Muamalat</option>
            <option value="BSN">BSN</option>
          </select></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">No. Akaun</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="no_acc_bank" name="no_acc_bank" class="form-control" required="true" value="<?php echo htmlentities($result->no_acc_bank);?>" type="text"></span></div>
                                </div>
                             </div>
                          </fieldset>
                    </td>
                 </tr>
              </tbody>
           </table>
                </fieldset>
            <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Maklumat Waris</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                          <fieldset>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Nama Waris</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="nama_waris" name="nama_waris" class="form-control" required="true" value="<?php echo htmlentities($result->nama_waris);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Hubungan Waris</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><select name="hubungan_waris" required>
            <option value="<?php echo htmlentities($result->hubungan_waris);?>"><?php echo htmlentities($result->hubungan_waris);?></option>                   
            <option value="Isteri/Suami">Isteri/Suami</option>
            <option value="Ibu">Ibu</option>
            <option value="Bapa">Bapa</option>
            <option value="Anak">Anak</option>
          </select></span></div>
                                </div>
                             </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">No. Telefon Waris</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="no_tel_waris" name="no_tel_waris" class="form-control" required="true" value="<?php echo htmlentities($result->no_tel_waris);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Alamat Waris</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="alamat_waris" name="alamat_waris" class="form-control" required="true" value="<?php echo htmlentities($result->alamat_waris);?>" type="text"></span></div>
                                </div>
                             </div>
                          </fieldset>
                        <?php }}?>                                        
                    </td>
                 </tr>
              </tbody>
           </table>
    </fieldset>
<center>                <button class="btn btn-primary" type="submit" name="update" onclick="myFunction()">Kemaskini</button>
    <script>
function myFunction() {
  alert("Maklumat berjaya dikemaskini");
}
</script>
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
<?php }?> 
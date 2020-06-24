<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['gurulogin'])==0)
    {   
header('location:index.php');
}
else{
$stid=intval($_GET['stid']);
$gid=$_SESSION['gid'];
if(isset($_POST['update']))
{ 
$rowid=$_POST['id'];
$marks=$_POST['marks']; 

foreach($_POST['id'] as $count => $id){
$mrks=$marks[$count];
$iid=$rowid[$count];
for($i=0;$i<=$count;$i++) {

$sql="update tblkeputusan  set marks=:mrks where id=:iid ";
$query = $dbh->prepare($sql);
$query->bindParam(':mrks',$mrks,PDO::PARAM_STR);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();

$msg="Result info updated successfully";
}
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
</style>
</head>
    
<body>
<div class="container">
	<div class="jumbotron">
		<h1><center>Kemaskini Pelajar</center></h1>
	</div>
	<div class="row">
          <?php if($error){?><div class="errorWrap"><strong>Gagal </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>Berjaya</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
            <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Edit Pelajar</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                       <form method="post">
<?php 
$gid=$_SESSION['gid'];
$stid=intval($_GET['stid']);
//$sql = "SELECT * from tblpelajar where tblpelajar.id_pelajar=:lid";
$ret = "SELECT tblpelajar.nama_pelajar,tblkelas.nama_kelas from tblkeputusan join tblpelajar on tblkeputusan.id_pelajar=tblkeputusan.id_pelajar join tblsubjek on tblsubjek.id=tblkeputusan.id_subjek join tblkelas on tblkelas.id=tblpelajar.id_kelas where tblpelajar.id_pelajar=:stid limit 1";
$stmt = $dbh->prepare($ret);
$stmt->bindParam(':stid',$stid,PDO::PARAM_STR);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($result as $row)
{  ?>  
<div class="form-group">
                                <label class="col-md-4 control-label">Nama Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><?php echo htmlentities($row->nama_pelajar);?>
</span></div>
                                </div>
                             </div>
                           <div class="form-group">
                                <label class="col-md-4 control-label">Kelas</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><?php echo htmlentities($row->nama_kelas);?>
</span></div>
                                </div>
                             </div>
<?php } }?>
<?php 
$sql = "SELECT distinct tblpelajar.nama_pelajar,tblpelajar.id_pelajar,tblkelas.nama_kelas,tblsubjek.nama_subjek,tblkeputusan.marks,tblkeputusan.id as resultid from tblkeputusan join tblpelajar on tblpelajar.id_pelajar=tblkeputusan.id_pelajar join tblsubjek on tblsubjek.id=tblkeputusan.id_subjek join tblkelas on tblkelas.id=tblpelajar.id_kelas where tblpelajar.id_pelajar=:stid ";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
<div class="form-group">
                                <label class="col-md-4 control-label"><?php echo htmlentities($result->nama_subjek)?></label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group">
                                       <span class="input-group-addon">
<input type="hidden" name="id[]" value="<?php echo htmlentities($result->resultid)?>">
<input type="text" name="marks[]" class="form-control" id="marks" value="<?php echo htmlentities($result->marks)?>" maxlength="5" required="required" autocomplete="off">

</span></div>
                                </div>
                             </div>
<?php }} ?> 
<div class="form-group">
            <button class="btn btn-primary" type="submit" name="update">Kemaskini</button>&nbsp;<a href='kognitif_papar.php' class='btn btn-danger'>Balik</a>
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
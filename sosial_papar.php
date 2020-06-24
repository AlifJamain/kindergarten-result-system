<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['gurulogin'])==0)
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
                    <legend class="scheduler-border">Penilaian Sosial</legend>
                    <table class="table table-striped">
            <?php  echo "<a href='sosial_tambah.php' class='btn btn-primary m-b-1em'>Tambah Keputusan</a>";  ?>                         
            <table id="example" class="table table-condensed">
                                    <thead>
                                        <tr>
                                                            <th>#</th>
                                                            <th>Nama Pelajar</th>
                                                            <th>Kelas</th>
                                                            <th>Tarikh Daftar</th>
                                                            <th>Action</th>
                                                        </tr>
                                    </thead>
                                    <tbody>
                       <form method="post">
                           
<?php 
$gid=$_SESSION['gid'];
$sql = "SELECT  distinct tblpelajar.nama_pelajar,tblpelajar.tarikh_daftar_tadika, tblpelajar.empid, tblpelajar.id_pelajar, tblkelas.nama_kelas from tblkeputusan3 join tblpelajar on tblpelajar.id_pelajar=tblkeputusan3.id_pelajar  join tblkelas on tblkelas.id=tblkeputusan3.id_kelas where tblkeputusan3.empid=:gid";
$query = $dbh->prepare($sql);
$query -> bindParam(':gid',$gid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>   
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            <td><?php echo htmlentities($result->nama_pelajar);?></td>
                                                            <td><?php echo htmlentities($result->nama_kelas);?></td>
                                                            <td><?php echo htmlentities($result->tarikh_daftar_tadika);?></td>
                                                             
<td>
<a class="btn btn-primary" href="sosial_edit.php?stid=<?php echo htmlentities($result->id_pelajar);?>">Edit</a> 

</td>
</tr>
<?php $cnt=$cnt+1;}} ?>
</tbody>
</table>
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
</div>
</body>
</html> 
<?php } ?>
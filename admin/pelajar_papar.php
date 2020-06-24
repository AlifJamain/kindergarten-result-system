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
                    <legend class="scheduler-border">Senarai Pelajar</legend>
                    <table class="table table-striped">
            <table id="example" class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="55%">Nama Pelajar</th>
                                            <th width="40%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                       <form method="post">
                           
<?php 
$sql = "SELECT * from tblpelajar";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>    
 <tr>
     <td><b><?php echo htmlentities($cnt);?></b></td>
      <td><?php echo htmlentities($result->nama_pelajar);?></td>
     <td><a href="pelajar_edit.php?stid=<?php echo htmlentities($result->id_pelajar);?>" class="btn btn-primary" >Papar</a></td>
</tr>
<?php $cnt++;} }?>
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
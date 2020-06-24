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
<html lang="en">
<head>
    <?php include "includes/header.php"; ?>
    <style>
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
        @media print {
  #printPageButton {
    display: none;
  }
}
    </style>
</head>
    
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h3><center>Sistem Tadika</center></h3>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Maklumat Pelajar</strong></h3>
    			</div>
    			<div class="panel-body">
                    <?php 
$lid=intval($_GET['stdid']);
$sql = "SELECT * from pelajar where pelajar.id=:lid";

//$sql = "SELECT pelajar.id as lid,guru.nama_guru, pelajar.nama_pelajar from pelajar join guru on pelajar.empid=guru.id where tblleaves.id=:lid";
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>   
    				<div class="table-responsive">
    					<table class="table table-bordered">
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td width="30%">Nama Pelajar</td>
    								<td width="70%"><?php echo htmlentities($result->nama_pelajar);?></td>
    							</tr>
                                <tr>
        							<td>Mykid Pelajar</td>
    								<td><?php echo htmlentities($result->mykid_pelajar);?></td>
    							</tr>
                                <tr>
        							<td>Kelas Pelajar</td>
    								<td><?php echo htmlentities($result->kelas_pelajar);?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
                    <?php }} ?>
    			</div>
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Penilian Kognitif</strong></h3>
    			</div>
    			<div class="panel-body">
                    <?php 
$lid=intval($_GET['stdid']);
$sql = "SELECT * from kognitif where kognitif.id=:lid";

//$sql = "SELECT pelajar.id as lid,guru.nama_guru, pelajar.nama_pelajar from pelajar join guru on pelajar.empid=guru.id where tblleaves.id=:lid";
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>   
    				<div class="table-responsive">
    					<table class="table table-bordered">
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td width="30%">Bahasa Melayu</td>
    								<td width="70%"><?php echo htmlentities($result->bahasa_melayu);?></td>
    							</tr>
                                <tr>
        							<td>Bahasa Inggeris</td>
    								<td><?php echo htmlentities($result->bahasa_inggeris);?></td>
    							</tr>
                                <tr>
        							<td>Bahasa Arab</td>
    								<td><?php echo htmlentities($result->bahasa_arab);?></td>
    							</tr>
                                <tr>
        							<td>Matematik</td>
    								<td><?php echo htmlentities($result->matematik);?></td>
    							</tr>
                                <tr>
        							<td>Sains</td>
    								<td><?php echo htmlentities($result->sains);?></td>
    							</tr>
                                <tr>
        							<td>Pendidikan Islam</td>
    								<td><?php echo htmlentities($result->pendidikan_islam);?></td>
    							</tr>
                                <tr>
        							<td>Pendidikan Jawi</td>
    								<td><?php echo htmlentities($result->pendidikan_jawi);?></td>
    							</tr>
                                <tr>
        							<td>Pendidikan Seni</td>
    								<td><?php echo htmlentities($result->pendidikan_seni);?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
                    <?php }} ?>
    			</div>
            <div class="panel-heading">
    				<h3 class="panel-title"><strong>Penilian Psikomotor</strong></h3>
    			</div>    			
            <div class="panel-body">
                    <?php 
$lid=intval($_GET['stdid']);
$sql = "SELECT * from psikomotor where psikomotor.id=:lid";

//$sql = "SELECT pelajar.id as lid,guru.nama_guru, pelajar.nama_pelajar from pelajar join guru on pelajar.empid=guru.id where tblleaves.id=:lid";
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>   
    				<div class="table-responsive">
    					<table class="table table-bordered">
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td width="30%">Kenalpasti</td>
    								<td width="70%"><?php echo htmlentities($result->kenalpasti);?></td>
    							</tr>
                                <tr>
        							<td>Kemahiran</td>
    								<td><?php echo htmlentities($result->kemahiran);?></td>
    							</tr>
                                <tr>
        							<td>Senaman</td>
    								<td><?php echo htmlentities($result->senaman);?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
                    <?php }} ?>
    			</div>
            <div class="panel-heading">
    				<h3 class="panel-title"><strong>Penilian Sosial</strong></h3>
    			</div>    			
            <div class="panel-body">
                    <?php 
$lid=intval($_GET['stdid']);
$sql = "SELECT * from sosial where sosial.id=:lid";

//$sql = "SELECT pelajar.id as lid,guru.nama_guru, pelajar.nama_pelajar from pelajar join guru on pelajar.empid=guru.id where tblleaves.id=:lid";
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>   
    				<div class="table-responsive">
    					<table class="table table-bordered">
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td width="30%">Pergaulan</td>
    								<td width="70%"><?php echo htmlentities($result->pergaulan);?></td>
    							</tr>
                                <tr>
        							<td>Emosi</td>
    								<td><?php echo htmlentities($result->emosi);?></td>
    							</tr>
                                <tr>
        							<td>Disiplin</td>
    								<td><?php echo htmlentities($result->disiplin);?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
                    <?php }} ?>
    			</div>
    	</div>
        <center>                <button id="printPageButton" class="btn btn-primary" onClick="window.print();">Cetak</button>&nbsp;
            <button onclick="location.href = 'pelajar_papar.php';" id="printPageButton" class="btn btn-danger" >Balik</button>
</center>
    </div>
</div>
</body>
</html> 
<?php } ?>
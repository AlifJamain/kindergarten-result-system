<?php
session_start();
error_reporting(0);
include('includes/config.php');
$con = mysqli_connect('localhost','root','','tadika');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Result Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['id','marks'],
 <?php 
			$query = "SELECT * from tblkeputusan2 ";

			 $exec = mysqli_query($con,$query);
			 while($row = mysqli_fetch_array($exec)){

			 echo "['".$row['id']."',".$row['marks']."],";
			 }
			 ?> 
 
 ]);

 var options = {
 title: 'Peningkatan Pelajar',
  pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart12"));
 chart.draw(data, options);
 }
	
    </script>
        <style>
        @media print {
  #printPageButton {
    display: none;
  }
}
    </style>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title" align="center">Sistem Tadika</h2>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section" id="exampl">
                            <div class="container-fluid">

                                <div class="row">
                              
                             

                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h3 align="center">Keputusan Pelajar</h3>
                                                    <hr />
<?php
// code Student Data
$nama_pelajar=$_POST['nama_pelajar'];
$id_kelas=$_POST['kelas'];
$_SESSION['nama_pelajar']=$nama_pelajar;
$_SESSION['id_kelas']=$id_kelas;
$qery = "SELECT   tblpelajar.nama_pelajar, tblpelajar.id_pelajar,tblkelas.nama_kelas from tblpelajar join tblkelas on tblkelas.id=tblpelajar.id_kelas where tblpelajar.nama_pelajar=:nama_pelajar and tblpelajar.id_kelas=:id_kelas ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':nama_pelajar',$nama_pelajar,PDO::PARAM_STR);
$stmt->bindParam(':id_kelas',$id_kelas,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>   
<p><b>Nama Pelajar :</b> <?php echo htmlentities($row->nama_pelajar);?></p>
<p><b>Kelas :</b> <?php echo htmlentities($row->nama_kelas);?></p>
<?php }?>
                                            </div>
                                            <div class="panel-body p-20">







                                                <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                        <tr style="text-align: center">
                                                            <th style="text-align: center">#</th>
                                                            <th style="text-align: center"> Psikomotor</th>    
                                                            <th style="text-align: center">Markah</th>
                                                        </tr>
                                               </thead>
                    <tbody>
<?php                                              
// Code for result
 $query ="select t.nama_pelajar,t.id_kelas,t.marks,id_psikomotor,tblpsikomotor.nama_psikomotor from (select sts.nama_pelajar,sts.id_kelas,tr.marks,id_psikomotor from tblpelajar as sts join  tblkeputusan2 as tr on tr.id_pelajar=sts.id_pelajar) as t join tblpsikomotor on tblpsikomotor.id=t.id_psikomotor where (t.nama_pelajar=:nama_pelajar and t.id_kelas=:id_kelas)";
$query= $dbh -> prepare($query);
$query->bindParam(':nama_pelajar',$nama_pelajar,PDO::PARAM_STR);
$query->bindParam(':id_kelas',$id_kelas,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 
foreach($results as $result){

    ?>

                                                		<tr>
<th scope="row" style="text-align: center"><?php echo htmlentities($cnt);?></th>
<td style="text-align: center"><?php echo htmlentities($result->nama_psikomotor);?></td>
<td style="text-align: center"><?php echo htmlentities($totalmarks=$result->marks);?></td>
                                                		</tr>
<?php 
$totlcount+=$totalmarks;
$cnt++;}
?>
<tr>
<th scope="row" colspan="2" style="text-align: center">Markah Keseluruhan</th>
<td style="text-align: center"><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b></td>
                                                        </tr>
<tr>
<th scope="row" colspan="2" style="text-align: center">Peratus</th>           
<td style="text-align: center"><b><?php echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
</tr>

<tr>
                                                                                           </tr>

 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
                                        </div>
 <?php 
 }
?>

<td colspan="3" align="center"><button id="printPageButton" class="btn btn-primary" onClick="window.print();">Cetak</button>&nbsp;<button onclick="location.href = 'keputusan_papar_psikomotor.php';" id="printPageButton" class="btn btn-danger" >Balik</button></td>

                                        </div>



                                                	</tbody>
                                                </table>

                                            </div>
                                        </div>
                                    <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                  
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
	<script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {

            });


            function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>

        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>

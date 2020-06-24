<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['gurulogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['add']))
{
$empid=$_SESSION['gid'];
$marks=array();
$class=$_POST['class'];
$studentid=$_POST['studentid']; 
$mark=$_POST['marks'];

 $stmt = $dbh->prepare("SELECT tblsosial.nama_sosial,tblsosial.id FROM tblgabung3 join  tblsosial on  tblsosial.id=tblgabung3.id_sosial WHERE tblgabung3.id_kelas=:cid order by tblsosial.nama_sosial");
 $stmt->execute(array(':cid' => $class));
  $sid1=array();
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {

array_push($sid1,$row['id']);
   } 
  
for($i=0;$i<count($mark);$i++){
    $mar=$mark[$i];
  $sid=$sid1[$i];
$sql="INSERT INTO  tblkeputusan3(id_pelajar,id_kelas,id_sosial,marks, empid) VALUES(:studentid,:class,:sid,:marks, :empid)";
$query = $dbh->prepare($sql);
$query->bindParam(':studentid',$studentid,PDO::PARAM_STR);
$query->bindParam(':class',$class,PDO::PARAM_STR);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':marks',$mar,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Result info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
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
      .btn {        
        font-size: 15px;
        font-weight: bold;
        background-color: #990099;
    }
    .btn:hover {
    opacity: 1;
    }
    
</style>
        <script>
function getStudent(val) {
    $.ajax({
    type: "POST",
    url: "get_student3.php",
    data:'classid='+val,
    success: function(data){
        $("#studentid").html(data);
        
    }
    });
$.ajax({
        type: "POST",
        url: "get_student3.php",
        data:'classid1='+val,
        success: function(data){
            $("#subject").html(data);
            
        }
        });
}
    </script>
<script>

function getresult(val,clid) 
{   
    
var clid=$(".clid").val();
var val=$(".stid").val();;
var abh=clid+'$'+val;
//alert(abh);
    $.ajax({
        type: "POST",
        url: "get_student3.php",
        data:'studclass='+abh,
        success: function(data){
            $("#reslt").html(data);
            
        }
        });
}
</script>
<script>
// we used jQuery 'keyup' to trigger the computation as the user type
$('.price').keyup(function () {
 
    // initialize the sum (total price) to zero
    var sum = 0;
     
    // we use jQuery each() to loop through all the textbox with 'price' class
    // and compute the sum for each loop
    $('.price').each(function() {
        sum += Number($(this).val());
    });
     
    // set the computed value to 'totalPrice' textbox
    $('#totalPrice').val(sum);
     
});
</script>
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
                    <legend class="scheduler-border">Penilaian Sosial</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                        <div class="form-group">
                                <label class="col-md-4 control-label">Kelas</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"> 
                                       <select name="class" class="form-control clid" id="classid" onChange="getStudent(this.value);" required="required">
                                            <option value="">Pilih Kelas</option>
<?php 
$gid=$_SESSION['gid'];
$sql = "SELECT * from tblkelas where empid=:gid";
$query = $dbh->prepare($sql);
$query -> bindParam(':gid',$gid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->nama_kelas); ?></option>
<?php }} ?>
 </select></span></div>
                                </div>
                             </div> 
                              <div class="form-group">
                                <label class="col-md-4 control-label">Nama Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><select name="studentid" class="form-control stid" id="studentid" required="required" onChange="getresult(this.value);">
                                                    </select></span></div>
                                </div>
                             </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><div  id="reslt">
                                                    </div></span></div>
                                </div>
                             </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><div  id="subject">
                                                    </div></span></div>
                                </div>
                             </div>
                    </td>
                  </tr>
              </tbody>
           </table>
                <div class="form-group">
            <button class="btn btn-primary" type="submit" name="add" onclick="myFunction()">Tambah</button>&nbsp;<a href='sosial_papar.php' class='btn btn-danger'>Balik</a>
    <script>
function myFunction() {
  alert("Maklumat berjaya ditambah");
}
                                      </script>
</div>
        </fieldset>
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
<?php } ?>
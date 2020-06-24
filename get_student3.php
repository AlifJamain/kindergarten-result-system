<?php
include('includes/config.php');
if(!empty($_POST["classid"])) 
{
 $cid=intval($_POST['classid']);
 if(!is_numeric($cid)){
 
 	echo htmlentities("invalid Class");exit;
 }
 else{

 $stmt = $dbh->prepare("SELECT * FROM tblpelajar WHERE id_kelas= :id  order by nama_pelajar");
     $stmt->execute(array(':id' => $cid));
 ?><option value="">---Nama Pelajar---</option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
  <option value="<?php echo htmlentities($row['id_pelajar']); ?>"><?php echo htmlentities($row['nama_pelajar']); ?></option>
  <?php
 }
}

}
// Code for Subjects
if(!empty($_POST["classid1"])) 
{
 $cid1=intval($_POST['classid1']);
 if(!is_numeric($cid1)){
 
  echo htmlentities("invalid Class");exit;
 }
 else{
 $status=0;	
 $stmt = $dbh->prepare("SELECT tblsosial.nama_sosial, tblsosial.id FROM tblgabung3 join tblsosial on  tblsosial.id=tblgabung3.id_sosial WHERE tblgabung3.id_kelas=:cid and tblgabung3.status!=:stts");
 $stmt->execute(array(':cid' => $cid1,':stts' => $status));
 
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {?>
      <div class="form-group">
          <label class="col-md-4 control-label"><?php echo htmlentities($row['nama_sosial']); ?></label>
          <div class="col-md-8 inputGroupContainer">
              <div class="input-group">
                  <span class="input-group-addon">
                      <input type="text"  name="marks[]" value="" class="form-control" required="" placeholder="Markah Per 100" autocomplete="off">
                  </span>
              </div>
                                
          </div>
                             
</div>
  
<?php  }
}
}


?>

<?php

if(!empty($_POST["studclass"])) 
{
 $id= $_POST['studclass'];
 $dta=explode("$",$id);
$id=$dta[0];
$id1=$dta[1];
 $query = $dbh->prepare("SELECT id_sosial,id_kelas FROM tblkeputusan3 WHERE id_pelajar=:id1 and id_kelas=:id ");
//$query= $dbh -> prepare($sql);
$query-> bindParam(':id1', $id1, PDO::PARAM_STR);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{ ?>
<p>
<?php
echo "<span style='color:red'> Keputusan Sudah Di-berikan .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
 ?></p>
<?php }


  }?>



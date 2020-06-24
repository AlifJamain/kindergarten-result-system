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
</style>
</head>
    
<body>
<div class="container">
	<div class="jumbotron">
		<h1><center>Kemaskini Maklumat</center></h1>
	</div>
	<div class="row">
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Maklumat Pengguna</legend>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                    </td>
                 </tr>
              </tbody>
           </table>
                </fieldset>
            <button class="btn btn-primary" type="submit" name="update">Kemaskini</button> 
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
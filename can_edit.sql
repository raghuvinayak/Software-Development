<?php
include_once('include/header.php');
	//insert into database
if($_SERVER['REQUEST_METHOD']=='POST')	
{    
    $file=$_POST['file'];
	$sender=$_POST['sender'];
	$reciver_name=$_POST['reciver_name'];
	$sender_name=$_POST['sender_name'];
	
		if(!empty($file)&&!empty($sender))
		{
			
			$SQL ="INSERT INTO can_edit (sender,sender_name,reciver,reciver_name,file_id) VALUES ('$userId','$sender_name','$sender','$reciver_name','$file')";
				mysql_real_escape_string($SQL);
				$result = mysql_query($SQL) or die (mysql_error());
			
		}
		
}

?>

	</div>
		<br>
	<br>
	<div class="container-fluid">
  <h2>Can Edit</h2>
</div
	
	><div class="container-fluid">
<div class="col-md-4">
<form   method="POST" action="canedit.php">
		
<?php
  $query = "SELECT * from users where userId!=$userId";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");?>
<div class="form-group">
<label> Reciver</label>
    <select class="form-control" name='sender'>
<?php while ($row = mysql_fetch_array($result)){
?>
   <option value="<?php echo $row['userId'];?>">
     <?php echo $row['userName']; ?>
    </option>
<?php
}
?>       
</select>

 </div>
 <?php
  $query = "SELECT * from users where userId!=$userId";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");?>
	<div class="form-group">
<label>Confirm Reciver</label>
 <select class="form-control" name='reciver_name'>
<?php while ($row = mysql_fetch_array($result)){
?>
   <option value="<?php echo $row['userName'];?>">
     <?php echo $row['userName']; ?>
    </option>
<?php
}
?>        
</select>
</div>

 <?php
  $query = "SELECT * from users where userId=$userId";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");?>
	<div class="form-group">
<label>Sender</label>
 <select class="form-control" name='sender_name'>
<?php while ($row = mysql_fetch_array($result)){
?>
   <option value="<?php echo $row['userName'];?>">
     <?php echo $row['userName']; ?>
    </option>
<?php
}
?>        
</select>
</div>
 
 <?php
  $query = "SELECT * from tbl_uploads where userId=$userId";
  $result = mysql_query($query) or die(mysql_error()."[".$query."]");?>
<div class="form-group">
<label>Select File</label>
    <select class="form-control" name="file" >
<?php while ($row = mysql_fetch_array($result)){
?>
   <option value="<?php echo $row['file'];?>">
     <?php echo $row['file'];?>
    </option>
<?php
}
?>        
</select>

<br>
  <input class="form-control" type="submit" value="submit" >
</form>

 </div>
 </div>
 
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>


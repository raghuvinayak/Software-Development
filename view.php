<?php include_once('include/header.php');
$error='';
if($_POST['act']=='movefile' && !empty($_POST['dir_name'])){
  $fileid=$_POST['chk'];
  $location_id=$_POST['dir_name'];
  
  foreach($fileid as $k=>$v){
    $sql="SELECT * FROM tbl_uploads INNER JOIN tbl_directory ON tbl_directory.dir_id=tbl_uploads.file_dir_id where tbl_uploads.userId=$userId and id='$v'";
	$result_set=mysql_query($sql);
	if(mysql_num_rows($result_set)>0){
	  $rows=mysql_fetch_assoc($result_set);
	  $sqlNewlocation="SELECT * FROM tbl_directory where dir_userId=$userId and dir_id='$location_id'";
	  $rsNewlocation=mysql_query($sqlNewlocation) or die($sqlNewlocation.' '.mysql_error());	
	  $new_path=mysql_fetch_assoc($rsNewlocation);
	  $error='File has been moved successfully.';
	     if($rows['dir_id']==$location_id){
	    
		 }
		 else{
		  $new_location="uploads/".$userRow['userFoldername'].'/'.strtolower($new_path['dir_name']).'/'.$rows['file'];
		  $old_location="uploads/".$userRow['userFoldername'].'/'.strtolower($rows['dir_name']).'/'.$rows['file'];
		  copy($old_location, $new_location);
		  unlink($old_location);
		  $Update="UPDATE tbl_uploads SET file_dir_id='".$new_path['dir_id']."' where userId=$userId and id='".$rows['id']."'";
		  mysql_query($Update) or die($Update.' '.mysql_error());
		  }
	 }
  }
  echo"<script>alert('$error');</script>";
  echo"<script>window.location='view.php';</script>";
}


if($_POST['act']=='copyfile' && !empty($_POST['dir_name'])){
  $fileid=$_POST['chk'];
  $location_id=$_POST['dir_name'];
  foreach($fileid as $k=>$v){
    $sql="SELECT * FROM tbl_uploads INNER JOIN tbl_directory ON tbl_directory.dir_id=tbl_uploads.file_dir_id where tbl_uploads.userId=$userId and id='$v'";
	$result_set=mysql_query($sql);
	if(mysql_num_rows($result_set)>0){
	  $rows=mysql_fetch_assoc($result_set);
	  $sqlNewlocation="SELECT * FROM tbl_directory where dir_userId=$userId and dir_id='$location_id'";
	  $rsNewlocation=mysql_query($sqlNewlocation) or die($sqlNewlocation.' '.mysql_error());	
	  $new_path=mysql_fetch_assoc($rsNewlocation);
	  $error='File has been copied successfully.';
	     if($rows['dir_id']==$location_id){
	    
		 }
		 else{
		  $new_location="uploads/".$userRow['userFoldername'].'/'.strtolower($new_path['dir_name']).'/'.$rows['file'];
		  $old_location="uploads/".$userRow['userFoldername'].'/'.strtolower($rows['dir_name']).'/'.$rows['file'];
		  copy($old_location, $new_location);
		  // unlink($old_location);
		  $sqlInsert="INSERT INTO tbl_uploads SET file='".$rows['file']."',type='".$rows['type']."',size='".$rows['size']."',userId='$userId',file_status='".$rows['file_status']."',f_current_time='".$rows['f_current_time']."',file_dir_id='".$new_path['dir_id']."'";
		  mysql_query($sqlInsert) or die($sqlInsert.' '.mysql_error());
		  }
	 }
  }
  echo"<script>alert('$error');</script>";
  echo"<script>window.location='view.php';</script>";
}

?>
<script>
function validate(frm){

  if(frm.dir_name.value==''){
    alert('Please select folder name..');
	frm.dir_name.focus();
	return false;
  }
 
  var l=frm.elements.length;
  var el=frm.elements;
  var f=0;
  for(i=0;i<l;i++)
  {
    if(el[i].type=="checkbox" && el[i].name=="chk[]" && el[i].checked==true)
	{
	  f=1;
	}
  }
  if(f==0){
    alert('Please select file which you want to move.');
	return false;
  }
  else{
    frm.act.value='movefile';
    frm.submit();
  }
}
</script>
</div>


<br>
<br>
<div class="table-responsive">
 <form name="view" id="view" method="post" action="view.php" enctype="multipart/form-data" onsubmit="return validate(this)">

	<input type="hidden" name="act" id="act" value="movefile" />	
	<table class="table table-striped">
   
    <tr>
      <td><input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)" /></td>
      <td>Move on</td>
      <td><select name="dir_name" id="dir_name" class="form-control">
        <option value="">-Select Folder-</option>
        <?php
		    $sqlQuery="select * from tbl_directory where dir_status='1' and dir_userId='$userId' and dir_type!='root'  ORDER BY dir_name ASC";
			$rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
			while($rows= mysql_fetch_assoc($rsQuery)){
			?>
        <option value="<?php echo $rows['dir_id'];?>"><?php echo $rows['dir_name'];?></option>
        <?php
			}
		  ?>
      </select></td>
	   <td>&nbsp;</td>
      <td><button class="btn btn-default" type="submit" name="move">Move Files</button></td>
	  <td><button class="btn btn-default" type="button" name="copy" id="btn-copy" onclick="validate(this.document.view)">Copy Files</button></td>
      <td><a class="btn btn-primary" href="index.php" role="button">Upload new files</a></td>
     
      <td>&nbsp;</td>
      <td>&nbsp;</td>
     
    </tr>
    <tr>
	<td><strong>#</strong></td>
    <td><strong>File Name</strong></td>
	<td><strong>Folder Name</strong></td>
    <td><strong>File Type</strong></td>
    <td><strong>File Size(KB)</strong></td>
    <td><strong>View</strong></td>
	<td><strong>delete</strong></td>
	<td><strong>can view</strong></td>
	<td><strong>can edit</strong></td>
    </tr>
    <?php
	$userId=$_SESSION['user'];
	$sql="SELECT * FROM tbl_uploads where userId=$userId";
	$result_set=mysql_query($sql);
	if(mysql_num_rows($result_set)>0){
	while($row=mysql_fetch_array($result_set))
	{
	   $dir_id=$row['file_dir_id'];
	   $sqlQuery="select * from tbl_directory where dir_status='1' and dir_userId='$userId' and dir_id='$dir_id' ORDER BY dir_name ASC";
	  $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
	  if(mysql_num_rows($rsQuery)>0){
	     $results=mysql_fetch_assoc($rsQuery);
		 if(strtolower($results['dir_name'])==$directory_name)
		 $path="uploads/".$userRow['userFoldername'].'/';
		 else
		  $path="uploads/".$userRow['userFoldername'].'/'.strtolower($results['dir_name']).'/';
	  }
	  else{
	     $path="uploads/".$directory_name.'/';
	  }
		?>
			
        <tr>
		<td><input type="checkbox" name="chk[]" value="<?php echo $row['id'];?>" />	</td>
        <td><?php echo $row['file'] ?></td>
		<td><?php 
		if else
		  echo $results['dir_name'];
		  ?>		</td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="<?php echo $path.$row['file'] ?>"target="_blank">view file</a></td>
		<td><a href="delete.php?id=<?php echo $row['id'];?>" target="_self">Delete</a></td>
		<td><a href="canview.php" target="_blank">can view</a></td>
		<td><a href="canedit.php" target="_blank">can edit</a></td>
        </tr>
        <?php
	}
	}	
	  }
	else{
	?>
	 <tr>
        <td colspan="7"><a href="uploads/<?php echo $row['file'] ?>"target="_blank"></a><a href="canview.php" target="_blank"></a><a href="canedit.php" target="_blank">There is no record .!!!!!!!!!!!!! </a></td>
      </tr>
	<?php
	}
	?>
    </table>
 </form>   
</div>
 
<script src="assets/jquery-1.11.3-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
function checkAll(obj)
{
  var l=document.view.elements.length;
  var el=document.view.elements;
  var f=0;
  for(i=0;i<l;i++)
  {
    if(el[i].type=="checkbox" && el[i].name=="chk[]" && el[i].checked==true)
	el[i].checked=false;
	else
	el[i].checked=obj.checked;
  }
}

$('#btn-copy').click(function(e){
   e.preventDefault();
   var obj=document.view;
   var el=obj.elements;
   var l=obj.elements.length;
  
   if(obj.dir_name.value==''){
    alert('Please select folder name..');
	obj.dir_name.focus();
	return false;
  }
 
 //alert(obj);
  var f=0;
  for(i=0;i<l;i++)
  {
    if(el[i].type=="checkbox" && el[i].name=="chk[]" && el[i].checked==true)
	{
	  f=1;
	}
  }
  if(f==0){
    alert('Please select file which you want to move.');
	return false;
  }
  else{
    obj.act.value='copyfile';
    obj.submit();
  }
   
   
});
</script>
</body>
</html>
  
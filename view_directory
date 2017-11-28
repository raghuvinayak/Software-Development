<?php include_once('include/header.php');
$error = false;
function unlinkr($dir, $pattern = "*") {
        // find all files and folders matching pattern
         $files = glob($dir . "/$pattern"); 
		
        //interate thorugh the files and folders
        foreach($files as $file){ 
		
            //if it is a directory then re-call unlinkr function to delete files inside this directory     
            if (is_dir($file) and !in_array($file, array('..', '.')))  {
                unlinkr($file, $pattern);
			
                //remove the directory itself
                rmdir($file);
                } else if(is_file($file) and ($file != __FILE__)) {
				
                // make sure you don't delete the current script
                unlink($file); 
            }
        }
        //rmdir($dir);
 }
 
if($_GET['act']=='deleteDirectory' && $_GET['dir_id']!=''){
$dir_id=$_GET['dir_id'];
    $sqlQuery="select * from tbl_directory where dir_id='$dir_id'";
	$rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
	if(mysql_num_rows($rsQuery)>0){
		 $result=mysql_fetch_assoc($rsQuery);
		 $oldFoldername=$result['dir_name'];
		 $sqlDelete="DELETE from tbl_uploads where userId='$userId' and file_dir_id='$dir_id'";
		 $resDelete=mysql_query($sqlDelete) or die($sqlDelete.' '.mysql_error());
		 
		 if(is_dir($base_path.'/'.$directory_name.'/'.$oldFoldername)){
		  $dir = $base_path.'/'.$directory_name.'/'.$oldFoldername; 
		  unlinkr($dir);
		  rmdir($base_path.'/'.$directory_name.'/'.$oldFoldername);
		 }
		 $sqlInsert="DELETE from tbl_directory where dir_id='$dir_id'";
		 $res=mysql_query($sqlInsert) or die($sqlInsert.' '.mysql_error());
		    $error = true;
			$errTyp = "danger";
			$errMSG = "Directory has been deleted successfully.";
	}
}
if($_GET['act']=='update_status' && $_GET['edit_id']!='' && $_GET['current_status']!=''){
$edit_id=$_GET['edit_id'];
if($_GET['current_status']==1)
$status=0;
else if($_GET['current_status']==0)
$status=1;
	$sqlQuery="select * from tbl_directory where dir_id='$edit_id'";
	$rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
	if(mysql_num_rows($rsQuery)>0){
		$sqlInsert="UPDATE tbl_directory SET dir_status='$status' where dir_id='$edit_id'";
		$res=mysql_query($sqlInsert) or die($sqlInsert.' '.mysql_error());
		    $error = true;
			$errTyp = "danger";
			$errMSG = "Directory status has been updated successfully.";
	}
}

?>
</div>


<br>
<br>
<div class="container-fluid">
<?php

		if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
</div>
	<div class="table-responsive">
	<div align="right"><a class="btn btn-primary" href="create_directory.php" role="button">Create New Folder</a></div>
	<table class="table table-striped">
    
    <tr>
	<td><strong>#</strong></td>
     <td><strong>Directory Name</strong></td>
	 <td><strong>Number of files </strong></td>	 
	 <td><strong>Status</strong></td>
     <td><strong>Date</strong></td>
	 <td><strong>Action</strong></td>
    </tr>
    <?php
	$sql="SELECT * FROM tbl_directory where dir_userId=$userId and dir_type!='root'";
	$result_set=mysql_query($sql);
	$sr=1;
	while($row=mysql_fetch_array($result_set))
	{
	 $counter=0;
	 $dir=$base_path.'/'.$directory_name.'/'.$row['dir_name'];
		?>
			
        <tr>
        <td><?php echo $sr++; ?></td>
        <td><a href="file_list.php?dir_id=<?php echo $row['dir_id'];?>"><?php echo $row['dir_name']; ?></a> </td>
        <td> <?php  file_count($dir,'/*',$counter);
		echo $counter;
		?> </td>
		
        <td><?php 
		if($row['dir_status']==1)
		$status='Active';
		else
		$status='De-Active';
		?>
		<a href="view_directory.php?act=update_status&edit_id=<?php echo $row['dir_id'];?>&current_status=<?php echo $row['dir_status'];?>"><?php echo $status;?></a>		</td>
		 <td><?php echo $row['dir_created_date']; ?></td>
		<td><a href="create_directory.php?act=edit&edit_id=<?php echo $row['dir_id'];?>">Edit</a> | <a href="Javascript:deleteDirectory(<?php echo $row['dir_id'];?>)">Delete</a></td>
        </tr>
        <?php
	}
	?>
    </table>
    
</div>
 
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script>
	 function deleteDirectory(dir_id){
	  if(confirm('Do you want to delete')){
	    window.location='view_directory.php?act=deleteDirectory&dir_id='+dir_id;
	  }
	 }
	</script>
</body>
</html>

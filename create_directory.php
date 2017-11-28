include_once('include/header.php');
$error = false;
################################# Create New directory
if ( isset($_POST['submit']) && $_POST['dir_id']=='')
   {
        $name = trim($_POST['user_directoryname']);
		
		$name = strip_tags($name);
		$name = htmlspecialchars($name); 
		$dir_size = '';
		if (!preg_match("/^[a-zA-Z0-9 ]+$/",$name)) {
			$error = true;
			$errTyp = "danger";
			$errMSG = "Directory Name must contain alphabets and space.";
		}
		else if( !$error ) {
		
		        if(is_dir($base_path.'/'.$directory_name)){
		            $userFoldername=strtolower($name);
					$sqlQuery="select * from tbl_directory where dir_userId='$userId' and dir_name='$name'";
					$rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
					if(mysql_num_rows($rsQuery)<1){
					mkdir($base_path.'/'.$directory_name.'/'.$userFoldername, 0777, true);
					$sqlInsert="INSERT INTO tbl_directory SET dir_userId='$userId',dir_name='$name',dir_status='1',dir_size='$dir_size'";
					$res=mysql_query($sqlInsert) or die($sqlInsert.' '.mysql_error());
					$errTyp = "success";
					$errMSG = "Directory created Successfully ";
					 unset($name); 
					 echo"<script>window.location='view_directory.php';</script>";
			     }
				 else{
				  $errTyp = "danger";
				  $errMSG = "Directory Name allready exists.";
				 }
				}
				else{
				$errTyp = "danger";
				$errMSG = "There is no root Directory exists.";
				} 
			 }			
		    else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}			
	}
	################################# End of Create New directory
################################# Rename directory
if ( isset($_POST['update-directory']) )
   {
        $name = trim($_POST['user_directoryname']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name); 
		$dir_size = '';
		if (!preg_match("/^[a-zA-Z0-9 ]+$/",$name)) {
			$error = true;
			$errTyp = "danger";
			$errMSG = "Directory Name must contain alphabets and space.";
		}
		
			     }
			     else{
				  $errTyp = "danger";
				  $errMSG = "Directory Name allready exists.";
				 }
				}
				else{
				$errTyp = "danger";
				$errMSG = "There is no root Directory exists.";
				} 
			 }			
		    else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}			
	}
	
	################################# End of rename directory
	
	if($_GET['act']=='edit' && $_GET['edit_id']!=''){
	        $edit_id=$_GET['edit_id'];
	        $sqlQuery="select * from tbl_directory where dir_userId='$userId' and dir_id='$edit_id'";
			$rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
			if(mysql_num_rows($rsQuery)>0){
			  $row=mysql_fetch_assoc($rsQuery);
			  $name=$row['dir_name'];
			  $dir_id=$row['dir_id'];
			  $dir_status=$row['dir_status'];
			  $dir_size=$row['dir_size'];
			}
			else{
			    $errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}
	}

?>
	</div>
	<br>
	<br>
	<br>
	<div class="container-fluid">
  <h2>Create New Directory / Folder</h2>
</div
	
	>
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
<div class="col-md-4">
<form  method="POST" action="create_directory.php" enctype="multipart/form-data">
		

<div class="form-group">
<label> New Directory Name (*)</label>
   <input type="text" name="user_directoryname" id="user_directoryname" class="form-control" placeholder='Type directory name' value="<?php echo $name;?>" required/>
</div>
<!--<div class="form-group">
<label> Directory Size (* In MB)</label>
   <input type="text" name="dir_size" id="dir_size" class="form-control" placeholder='Directory Size in MB' value="<?php //echo $dir_size;?>" required onKeypress="goods='0123456789'; return limitchar(event)"/>
</div>
 -->
 
<div class="form-group">
  <?php if($dir_id!=''){?>
   <input class="form-control" type="submit" value="submit" name="update-directory" >
   <input type="hidden" name="dir_id" id="dir_id" value="<?php echo $dir_id;?>" />
   <input type="hidden" name="oldFoldername" id="oldFoldername" value="<?php echo $name;?>" />
  <?php
  }
  else{
  ?>
  <input class="form-control" type="submit" value="submit" name="submit" >
  <?php
  }
  ?>
</form>

 </div>
 </div>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>


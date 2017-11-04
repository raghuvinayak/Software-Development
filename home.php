<?php
include_once("include/header.php");
?>
	
	<div class="jumbotron">
	 <div class="container">
	 <div class="col-md-3">
<h2>Drop Your Files!</h2>
<img src="assets/images/upload.png">
<p><a class="btn btn-primary btn-lg" href="home.php" role="button">Upload</a></p>
</div>


<div class="col-md-3">
 
  <h2>View Files!</h2>
  <img src="assets/images/view.png" >
  
  <p><a class="btn btn-primary btn-lg" href="view.php" role="button">View</a></p>
</div>


<div class="col-md-3">
  <h2>Share Files</h2>
   <img src="assets/images/share.png">
   <p><a class="btn btn-primary btn-lg" href="view.php" role="button">share</a></p>
</div>

<div class="col-md-3">
  <h2>Create Folder</h2>
   <img src="assets/images/folder.png">
   <p><a class="btn btn-primary btn-lg" href="view_directory.php" role="button">Folder</a></p>
</div>
</div>
</div>


    <div class="container">
	<h1>Drop Your Files Here !</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
		<?php
		 $sqlQuery="select * from tbl_directory where dir_status='1' and dir_userId='$userId' and dir_type!='root' ORDER BY dir_name ASC";
		$rsQuery=mysql_query($sqlQuery) or die($sqlQuery.' '.mysql_error());
		if(mysql_num_rows($rsQuery)>0){
		?>
		<div class="form-group">
		<label> Select Folder</label><br />
		<select name="dir_name" id="dir_name" class="form-control" style="width:200px;">
		  <?php
		   
			while($rows= mysql_fetch_assoc($rsQuery)){
			?>
			<option value="<?php echo $rows['dir_id'];?>"><?php echo $rows['dir_name'];?></option>
			<?php
			}
		  ?>
		</select>
		</div>
		<?php
		}
		?>
		<div class="form-group">
		<label> File input</label>
		<input type="file" name="file" />
		</div>
		<div class="form-group">
		<label>Uplode</label><br>
		<button class="btn btn-default" type="submit" name="btn-upload">upload</button>
		</div>
		</form>
    
    </div>
  </div>
  <div class="container">
 <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        <label>Upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        <?php
 }
 ?>
	 </div>
</div>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>

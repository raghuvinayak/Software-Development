<?php include_once('include/header.php');?>
</div>

<br>
<br>
	<div class="table-responsive">
	<table class="table table-striped">

    <tr>
     <td>File Name</td>
	 <td>reciver</td>
     <td>View</td>
	
    </tr>
    <?php
	$userId=$_SESSION['user'];
	$sql="SELECT * FROM can_view where sender=$userId";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))
	{
		?>
			
        <tr>
        <td><?php echo $row['file_id'] ?></td>
        <td><?php echo $row['reciver_name'] ?></td>
        <td><a href="uploads/<?php echo $row['file_id']?>" target="_blank">view file</a></td>
		
        </tr>
        <?php
	}
	?>
    </table>
    
</div>
 
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

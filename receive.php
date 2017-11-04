<?php include_once('include/header.php');?>
</div>
<div class='container'>

<br>
<br>
	<table width="80%" border="1">
    <tr>
    <th colspan="8">your uploads...<label><a href="index.php">upload new files...</a></label></th>
    </tr>
    <tr>
     <td>File Name</td>
	 <td>reciver</td>
     <td>View</td>
    </tr>
    <?php
	$userId=$_SESSION['user'];
	$sql="SELECT * FROM can_edit where reciver=$userId";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))
	{
		?>
			
        <tr>
        <td><?php echo $row['file_id'] ?></td>
        <td><?php echo $row['sender'] ?></td>
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

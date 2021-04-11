<?php

	include('extra/meta.php');
    include('extra/header.php');
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    // if($result) {
    // 	// while ($row = mysqli_fetch_array($result)) {
    // 	// 	# code...
    // 	// 	echo $row['u_id'] . ' ' . $row['name'];
    // 	// }
    	
    // 	// $fetch = mysqli_fetch_object($result);
    // }

?>
    <div class="content">
	    <div class="left-side"><h1>LEFT SIDE</h1></div>
	    <div class="middle"> 
	    	<table>
	    		<tr>
	    			<td> <b> User ID </b> </td>
	    			<td> <b> Name </b> </td>
	    			<td> <b> Address </b> </td>
	    			<td> <b> Email </b> </td>
	    		</tr>
	    		<?php while($fetch = mysqli_fetch_object($result)) { ?>
	    		<tr>
	    			<td> <?php echo $fetch->u_id; ?> </td>
	    			<td> <?php echo $fetch->name; ?> </td>
	    			<td> <?php echo $fetch->address; ?> </td>
	    			<td> <?php echo $fetch->email; ?> </td>
	    		</tr>
	    		<?php } ?>
	    	</table>
	    </div>
	    <div class="right-side"><h1>RIGHT SIDE</h1></div>
	</div>
        
<?php
    include('extra/footer.php');
?>

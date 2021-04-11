<?php
	include('extra/connection.php');

	if(isset($_POST['insert'])) {
		$query = "insert into users set name='" . $_POST['name'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "'";
		mysqli_query($con, $query);
	}
    
    else if(isset($_POST['update'])) {
        $query = "update users set name='" . $_POST['name'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "' where u_id ='" . $_POST['id'] . "'";
        mysqli_query($con, $query);
    }

	$query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);
    
	include('extra/meta.php');
    include('extra/header.php');
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
                <td> <b> Action </b> </td>
    		</tr>
    		<?php while($fetch = mysqli_fetch_object($result)) { ?>
    		<tr>
    			<td> <?php echo $fetch->u_id; ?> </td>
    			<td> <?php echo $fetch->name; ?> </td>
    			<td> <?php echo $fetch->address; ?> </td>
    			<td> <?php echo $fetch->email; ?> </td>
                <td><a href="edit.php?id=<?php echo $fetch->u_id; ?>">Edit</a></td>
    		</tr>
    		<?php } ?>
    	</table>
    </div>
    <div class="right-side"><h1>RIGHT SIDE</h1></div>
</div>
        
<?php
    include('extra/footer.php');
?>
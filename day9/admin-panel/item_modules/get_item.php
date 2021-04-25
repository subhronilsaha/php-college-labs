<?php
    include('../extra/connection_h.php');
    //ini_set('display_errors', 1);

	$query = "SELECT * FROM items";
    $result = mysqli_query($con, $query);
    
    if(isset($_REQUEST['del'])) {
        $query = "delete from items where id = '" . $_REQUEST['del'] . "'";
        mysqli_query($con, $query);
        header("location: get_item.php");
    }

	include('../extra/meta.php');
    include('../extra/header_item.php');
?>

<div class="content">
    <div class="left-side"></div>
	<div class="middle"> 
        <h2> All Items </h2>
        <br>
    	<table>
    		<tr>
    			<td> <b> ID  </b> </td>
                <td> <b> Photo        </b> </td>
    			<td> <b> Name         </b> </td>
				<td> <b> Price       </b> </td>
                <td> <b> Quantity       </b> </td>
				<td> <b> Category   </b> </td>
                <td> <b> Action       </b> </td>
    		</tr>
    		<?php while($fetch = mysqli_fetch_object($result)) { ?>
    		<tr>
    			<td> <?php echo $fetch->id; ?> </td>
                <td> 
                    <img 
                    src="item_images/<?php echo $fetch->image_name; ?>" 
                    width=50 
                    height=50>
                </td>
    			<td> <?php echo $fetch->name; ?> </td>
				<td> <?php echo $fetch->price; ?> </td>
    			<td> <?php echo $fetch->qty; ?> </td>
				<?php 
					$query1 = "select c_name from categories where c_id = '" . $fetch->c_id . "'";
					$result1 = mysqli_query($con, $query1);
					$fetch1 = mysqli_fetch_object($result1);
				?>
				<td> <?php echo $fetch1->c_name; ?> </td>
                <td>
					<a 
					href="edit_item.php?id=<?php echo $fetch->id; ?>">
						Edit
					</a>
				</td>
                <td><a href="get_item.php?del=<?php echo $fetch->id; ?>">Delete</a></td>
    		</tr>
    		<?php } ?>
    	</table>
    </div>
    <div class="right-side"></div>
</div>
        
<?php
    // include('../extra/footer.php');
?>
<?php
	include('../extra/connection.php');
    //ini_set('display_errors', 1);

	$query = "SELECT * FROM course";
    $result = mysqli_query($con, $query);
    
    if(isset($_REQUEST['del'])) {
        $query = "delete from course where c_id = '" . $_REQUEST['del'] . "'";
        mysqli_query($con, $query);
        header("location: get_courses.php");
    }

	include('../extra/meta.php');
    include('../extra/header_course.php');
?>

<div class="content">
    <div class="left-side"><h1>LEFT SIDE</h1></div>
	<div class="middle"> 
        <h2> All Departments </h2>
        <br>
    	<table>
    		<tr>
    			<td> <b> Department ID </b> </td>
    			<td> <b> Department Name </b> </td>
                <td> <b> Action </b> </td>
    		</tr>
    		<?php while($fetch = mysqli_fetch_object($result)) { ?>
    		<tr>
    			<td> <?php echo $fetch->c_id; ?> </td>
    			<td> <?php echo $fetch->c_name; ?> </td>
                <td><a href="edit_course.php?id=<?php echo $fetch->c_id; ?>">Edit</a></td>
                <td><a href="get_courses.php?del=<?php echo $fetch->c_id; ?>">Delete</a></td>
    		</tr>
    		<?php } ?>
    	</table>
    </div>
    <div class="right-side"><h1>RIGHT SIDE</h1></div>
</div>
        
<?php
    include('../extra/footer.php');
?>
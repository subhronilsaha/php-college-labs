<?php
    include('../extra/connection.php');
	include('../extra/meta.php');
    include('../extra/header_course.php');

    if(isset($_POST['insert_course'])) {
        $query = "insert into course set c_name='" . $_POST['c_name'] . "'";
        mysqli_query($con, $query);
        header("location: get_courses.php");
    }

?>

<div class="content">
    <div class="left-side"><h1>LEFT SIDE</h1></div>
    <div class="middle"> 
    	<form method="post" action="">
    	<table>
    		<tr>
    			<td>Course Name</td>
    			<td><input type="text" name="c_name" value=""></td>
    		</tr>
    		<tr>
    			<td> <input type="submit" name="insert_course" value="Insert"></td>
    		</tr>
    	</table>
    </form>
    </div>
    <div class="right-side"><h1>RIGHT SIDE</h1></div>
</div>
        
<?php
    include('../extra/footer.php');
?>

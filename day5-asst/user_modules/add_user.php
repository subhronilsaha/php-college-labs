<?php
    include('../extra/connection.php');
	include('../extra/meta.php');
    include('../extra/header_user.php');

	//echo exec('whoami');

    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

 	//echo "hello";

	// CHECK FOR ADD USER BUTTON CLICK
    if(isset($_POST['insert'])) {
    	
    	// FILE UPLOAD
    	$fileName = $_FILES['file']['name'];
		$target_dir = "user_images/";
		
		//echo $fileName . " " . $target_dir;

		if($fileName != '') {
			
			$target_file = $target_dir.basename($_FILES['file']['name']);
			
			// Extension
			$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			
			// Valid file extensions
			$extensionsArr = array("jpg", "jpeg", "png", "gif");

			//echo $fileName;

			if(in_array($extension, $extensionsArr)) {
				
				// Convert to base64
				$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
				$image = "data::image/" . $extension . ";base64," . $image_base64;

				//echo $image . " " . $image_base64;
				$val = explode('.', $_FILES['file']['name']);
				$upload_ext = end($val);
				$ran = md5(time().rand());
				$file = $ran . '.' . $upload_ext;

				// Store image to upload folder
				if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {

					//echo "inserting record";

					// Insert record
					$query = "insert into users set name='" . $_POST['name'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "', c_id='" . $_POST['courses'] . "', p_image='" . $image . "', p_image_name='" . $fileName . "'";
        			mysqli_query($con, $query);

        			//echo "inserted";
				} else {

				}
			}
		} 
		else {

			// Insert record
			//echo "No file name";

			$query = "insert into users set name='" . $_POST['name'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "', c_id='" . $_POST['courses'] . "', p_image='', p_image_name='' ";
			mysqli_query($con, $query);
		}

		header("location: get_users.php");
	}

	// FETCH COURSE DATA
	$query = "select * from course";
	$result = mysqli_query($con, $query);

?>

<div class="content">
    <div class="left-side"><h1>LEFT SIDE</h1></div>
    <div class="middle"> 
    	<h2> Add a New Employee </h2>
        <br>
    	<form method="post" action="" enctype="multipart/form-data">
    	<table>
    		<tr>
    			<td>Name</td>
    			<td><input type="text" name="name" value=""></td>
    		</tr>
			<tr>
    			<td>Select Department</td>
    			<td>
					<select name="courses" id="courses">
						<?php while($fetch = mysqli_fetch_object($result)) { ?>
							<option value="<?php echo $fetch->c_id; ?>"><?php echo $fetch->c_name; ?></option>
						<?php } ?>
					</select>
				</td>
    		</tr>
    		<tr>
    			<td>Address</td>
    			<td><input type="text" name="address" value=""></td>
    		</tr>
    		<tr>
    			<td>Email ID</td>
    			<td><input type="text" name="email" value=""></td>
    		</tr>
			<tr>
    			<td>Profile Picture</td>
    			<td><input type="file" name="file" id="file"></td>
    		</tr>
    		<tr>
    			<td> 
    				<input type="submit" name="insert" value="INSERT">
    			</td>
    		</tr>
    	</table>
    </form>
    </div>
    <div class="right-side"><h1>RIGHT SIDE</h1></div>
</div>
        
<?php
    include('../extra/footer.php');
?>

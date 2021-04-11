<?php
    include('../extra/connection.php');
	include('../extra/meta.php');
    include('../extra/header_user.php');

	// FILE UPLOAD
	$file = "";
	if (isset($_FILES['file'])) {
		$folder = "user_images";
		// uploading
		$file_exts = array("jpg", "JPG", "JPEG", "bmp", "jpeg", "gif", "png", "doc", "docx", "pdf");
		$value = explode(".", $_FILES['file']['name']);
		$upload_exts = end($value);
		if (($_FILES['file']['type'] == "image/gif")
			|| ($_FILES['file']['type'] == "image/jpeg")
			|| ($_FILES['file']['type'] == "image/jpg")
			|| ($_FILES['file']['type'] == "image/JPG")
			|| ($_FILES['file']['type'] == "image/JPEG")
			|| ($_FILES['file']['type'] == "image/png")
			|| ($_FILES['file']['type'] == "image/pjpeg")
			|| ($_FILES['file']['type'] == "application/msword")
			|| ($_FILES['file']['type'] == "application/pdf")
			&& ($_FILES['file']['size'] < 2000000000)
			&& in_array($upload_exts, $file_exts)) 
		{
			if($_FILES['file']['error'] > 0) {
				echo "Error uploading file";
			} else {
				// Enter your path to <span>
				if (file_exists("$folder/" . $_FILES['file']['name'])) {
					echo "Error";
				} else {
					$ran = md5(time().rand());
					$file = $ran . "." . $upload_exts;
					move_uploaded_file($_FILES[file]['tmp_name'] . "$folder/" . $file);
				}
			}
		}
	}

	// CHECK FOR ADD USER BUTTON CLICK
    if(isset($_POST['insert'])) {
        $query = "insert into users set name='" . $_POST['name'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "', c_id='" . $_POST['courses'] . "', p_image='" . $file . "'";
        mysqli_query($con, $query);
        header("location: get_users.php");
	}

	// FETCH COURSE DATA
	$query = "select * from course";
	$result = mysqli_query($con, $query);

?>

<div class="content">
    <div class="left-side"><h1>LEFT SIDE</h1></div>
    <div class="middle"> 
    	<form method="post" action="" enctype="multipart/form-data">
    	<table>
    		<tr>
    			<td>Name</td>
    			<td><input type="text" name="name" value=""></td>
    		</tr>
			<tr>
    			<td>Select Course</td>
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
    			<td> <input type="submit" name="insert" value="Insert"></td>
    		</tr>
    	</table>
    </form>
    </div>
    <div class="right-side"><h1>RIGHT SIDE</h1></div>
</div>
        
<?php
    include('../extra/footer.php');
?>

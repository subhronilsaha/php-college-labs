<?php
	include('../extra/connection.php');

	$query = "SELECT * FROM users WHERE u_id = '" . $_REQUEST['id'] . "'";
    $result = mysqli_query($con, $query);
    $fetch = mysqli_fetch_object($result);

    $query1 = "select * from course";
    $result1 = mysqli_query($con, $query1);

    if(isset($_POST['update'])) {
        $query = "update users set name='" . $_POST['name'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "', c_id='" . $_POST['courses'] . "' where u_id ='" . $_REQUEST['id'] . "'";
        mysqli_query($con, $query);
        header("location: get_users.php");
    }
    
	include('../extra/meta.php');
    include('../extra/header_user.php');
?>

<div class="content">
    <div class="left-side"><h1>LEFT SIDE</h1></div>
    <div class="middle"> 
        <form method="post" action="">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?php echo $fetch->name; ?>"></td>
                </tr>
                <tr>
                    <td>Select Course</td>
                    <td>
                        <select name="courses" id="courses">
                            <?php while($fetch1 = mysqli_fetch_object($result1)) { ?>
                                <option 
                                    value="<?php echo $fetch1->c_id; ?>" 
                                    <?php if($fetch1->c_id == $fetch->c_id) { ?>
                                    selected = "selected"
                                    <?php } ?>
                                >
                                    <?php echo $fetch1->c_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" value="<?php echo $fetch->address; ?>"></td>
                </tr>
                <tr>
                    <td>Email ID</td>
                    <td><input type="text" name="email" value="<?php echo $fetch->email; ?>"></td>
                    <td><input type="hidden" name="id" value="<?php echo $fetch->u_id; ?>"></td>
                </tr>
                <tr>
                    <td>Profile Picture</td>
                    <td><input type="file" name="file" id="file"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="update" value="UPDATE"></td>
                </tr>
            </table>
    </form>
    </div>
    <div class="right-side"><h1>RIGHT SIDE</h1></div>
</div>
        
<?php
    include('../extra/footer.php');
?>
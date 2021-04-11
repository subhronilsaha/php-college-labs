<?php
	include('extra/connection.php');

	$query = "SELECT * FROM users WHERE u_id = '" . $_REQUEST['id'] . "'";
    $result = mysqli_query($con, $query);
    $fetch = mysqli_fetch_object($result);
    
	include('extra/meta.php');
    include('extra/header.php');
?>

<div class="content">
    <div class="left-side"><h1>LEFT SIDE</h1></div>
    <div class="middle"> 
        <form method="post" action="result.php">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?php echo $fetch->name; ?>"></td>
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
                    <td><input type="submit" name="update" value="UPDATE"></td>

                </tr>
            </table>
    </form>
    </div>
    <div class="right-side"><h1>RIGHT SIDE</h1></div>
</div>
        
<?php
    include('extra/footer.php');
?>
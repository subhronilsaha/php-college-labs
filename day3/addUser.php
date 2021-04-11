<?php
    include('extra/connection.php');
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
    			<td><input type="text" name="name" value=""></td>
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
    			<td> <input type="submit" name="insert" value="Insert"></td>

    		</tr>
    	</table>
    </form>
    </div>
    <div class="right-side"><h1>RIGHT SIDE</h1></div>
</div>
        
<?php
    include('extra/footer.php');
?>

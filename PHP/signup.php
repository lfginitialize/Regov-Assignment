<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Sign Up";
 
// include login checker
$require_login='false';
 
// include page header HTML
include_once "layout_head.php";
 
echo "<div class='col-md-12'>";

$errors = array();
$email = "";
$fname ="";
$ic= "";
$cnum= ""; 
 
include_once "config/connect_database.php";

if(isset($_SESSION['username']) or isset($_SESSION['email'])){
		echo 'You are already logged in as '.$_SESSION['username'].'';
		exit();
	}

if (isset($_POST['signupp'])){
	$email = $_POST['email'];
	$fname =$_POST['fullname'];
	$ic= $_POST['ic'];
	$cnum= $_POST['contact_num']; 
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "<p style='border-style:solid;border-color:red;'>Email address is invalid, try again.</p>";
	}
	
	else{
	$emailQuery ="SELECT * FROM user WHERE user_email=? LIMIT 1";
	$stmt = $conn->prepare($emailQuery);
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$userCount = $result->num_rows;
	if ($userCount > 0){
		echo "Email already exists try again <a href='signup.php'>Click Here</a>";
						}
	else{	
		$sql = "INSERT INTO user (user_accesslvl, user_fname, user_ic, user_contact, 
		user_email, user_gender, user_password)
		VALUES ('$_POST[acctype]','$_POST[fullname]','$_POST[ic]','$_POST[contact_num]','$_POST[email]','$_POST[gender]','$_POST[password]')";
		if (mysqli_query($conn, $sql)) {
		echo "Congratulations! New account created successfully";
			} else {
				echo "Sorry, please fill in all the information , try again <a href='signup.php'>Click Here</a>". mysqli_error($conn);
					}		
			}	
	}
}
?>
<h2>Sign Up</h2><br>

<form action='signup.php' method='post' id='signup'>
 
    <table class='table table-responsive'>

		<tr>
			<td>Account Type</td>
			<td><select name="acctype" form=signup>
				<option value="User">User</option>
				<option value="Staff">Staff</option>
				</select></td>
		</tr>

        <tr>
            <td class='width-30-percent'>Full Name</td>
            <td><input type='text' name='fullname' class='form-control'></td>
        </tr>
 
        <tr>
            <td>IC</td>
            <td><input type='number' name='ic' class='form-control'></td>
        </tr>
 
        <tr>
            <td>Contact Number</td>
            <td><input type='number' name='contact_num' class='form-control'></td>
        </tr>
 
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' class='form-control'></td>
        </tr>
 
        <tr>
            <td>Gender</td>
			<td><select name="gender" form=signup>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select></td>
        </tr>
 
        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control'></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary" name='signupp'>
                    <span class="glyphicon glyphicon-plus"></span> Register
                </button>
            </td>
        </tr>
 
    </table>
</form>
<?php
 
echo "</div>";
 
// include page footer HTML
include_once "layout_foot.php";
?>

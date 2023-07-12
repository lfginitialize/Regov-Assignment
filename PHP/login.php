<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Login";

include_once "layout_head.php";
 
// default to false
$access_denied=false;

$email = "";

if(isset($_SESSION['username']) or isset($_SESSION['email'])){
		header("location: homepage.php?logged_in");
	}

if (isset($_POST["login"])){
//if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["acctype"])) {

	$email = $_POST["email"];
    $password = $_POST["passwords"];

include_once "config/connect_database.php";

$sql = "SELECT * FROM user WHERE user_email='$email' AND user_password='$password'";
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_NUM);
		$count = mysqli_num_rows($result);
      	
      if($count == 1) { 
		 $_SESSION["email"] = $email;
		 $_SESSION["password"] = $password;

         $sql2 = mysqli_query($conn, $sql);
		$accountFound= mysqli_num_rows($sql2);
		if($accountFound>0){
			    while($info = mysqli_fetch_array($sql2, MYSQLI_ASSOC)){
					$_SESSION["uid"] = $info['user_id'];
					$_SESSION["fname"] = $info['user_fname'];
				}
				}

         
         header("location: homepage.php?logged_in");
      }else {
         //echo 'That information is incorrect, try again <a href="login.php">Click Here</a>';
		 echo "<p style='text-align:center;'>Sorry, please fill in all the information correctly.</p>";
        }
   }


?>
<div class='col-sm-6 col-md-4 col-md-offset-4'>
   <div class='account-wall'>
       <div id='my-tab-content' class='tab-content'>
           <div class='tab-pane active' id='login'>
                <img class='profile-img' src='images/login-icon.png'>
                <form class='form-signin' method='post' action='login.php' id='login'>
					<input type='text' name='email' class='form-control' value='<?php echo $email;?>' placeholder='Email' required autofocus />
                    <input type='password' name='passwords' class='form-control' placeholder='Password' required />
                    <input type='submit' class='btn btn-lg btn-primary btn-block' name='login' value='Log In' />
					<br><center><p style="float:center";>Havent Register? <a href="signup.php">Sign Up</a></p></center>
			   </form>
            </div>
        </div>
    </div>
 
</div>
<?php 
include_once "layout_foot.php";
?>

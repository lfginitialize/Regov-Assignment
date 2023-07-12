<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "View Profile";
 
// include login checker
$require_login=false;
//include_once "login_checker.php";
 
include_once "layout_head.php";


include_once "config/connect_database.php";

echo "<div class='col-md-12'>";

?>
<form action='editProfile.php' method='post' id='editProfile' enctype="multipart/form-data">
<h2 style="text-align:center;">Your Profile&nbsp;&nbsp;
<button type='submit' class='btn btn-primary'>Edit
</button>
</h2>
<br>
</form>

<table class='tableviewP'>
<?php
                $uid = $_SESSION['uid'];
                $sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$uid'");
	            $row= mysqli_num_rows($sql);
	            if($row>0){
			            while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
				echo"
                    <tr>
                        <td class='viewP1'>Full Name</td>
                        <td class='viewP'>{$row['user_fname']}</td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>Access Level</td>
                        <td class='viewP'>{$row['user_accesslvl']}</td>
                    </tr>

                    <tr>
                        <td class='viewP1'>Email</td>
                        <td class='viewP'>{$row['user_email']}</td>
                    </tr>

                    		
	                <tr>
                        <td class='viewP1'>Password</td>
                        <td class='viewP'>{$row['user_password']}</td>
                    </tr>

 
                    <tr>
                        <td class='viewP1'>Contact No</td>
                        <td class='viewP'>{$row['user_contact']}</td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>Gender</td>
                        <td class='viewP'>{$row['user_gender']}</td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>Home Address</td>
                        <td class='viewP'>{$row['user_address']}</td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>City</td>
                        <td class='viewP'>{$row['user_city']}</td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>Postal Code</td>
                        <td class='viewP'>{$row['user_postal']}</td>
                    </tr>

                    <tr>
                        <td class='viewP1'>About Me</td>
                        <td class='viewP'>{$row['about_me']}</td>
                    </tr>
 
                    </table><br><br>";
			        }
                }

// include page footer HTML
include_once "layout_foot.php";
?>
<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Edit Profile";
 
// include login checker
$require_login=false;
//include_once "login_checker.php";
 
include_once "layout_head.php";


include_once "config/connect_database.php";

if (isset($_POST["editP"])){
        $uid = $_SESSION['uid'];
        $sql2 = "UPDATE user 
		SET 
        user_fname='$_POST[fullname]', 
        user_email='$_POST[usremail]', 
        user_password='$_POST[usrpass]',  
        user_contact='$_POST[contact_num]', 
		user_gender='$_POST[gender]', 
        user_address='$_POST[address]',
        user_city='$_POST[city]',
        user_postal='$_POST[postal]',
        user_bankacc='".$_POST[aboutme]."'
		WHERE user_id='$uid'";

            if (mysqli_query($conn, $sql2)) {
                header('Location: ViewProfile.php');
                                        } 
             else {
                echo "Sorry, please fill in all the information." . $sql2 . "<br>" . mysqli_error($conn);
                   }
            }           
?>
<form action='editProfile.php' method='post' id='editAcc' enctype="multipart/form-data">
<h2 style="text-align:center;">Your Profile&nbsp;&nbsp;
<button type='submit' name='editP' class='btn btn-primary'>Confirm
</button>
</h2>
<br>

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
                        <td class='viewP'><input type='text' name='fullname' class='form-control' value='".$row['user_fname']."'></td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>Access Level</td>
                        <td class='viewP'>{$row['user_accesslvl']}</td>
                    </tr>

                    <tr>
                        <td class='viewP1'>Email</td>
                        <td class='viewP'><input type='text' name='usremail' class='form-control' value='".$row['user_email']."'></td>
                    </tr>

                    		
	                <tr>
                        <td class='viewP1'>Password</td>
                        <td class='viewP'><input type='text' name='usrpass' class='form-control' value='".$row['user_password']."'></td>
                    </tr>

                    <tr>
                        <td class='viewP1'>Identification Card No</td>
                        <td class='viewP'><input type='number' name='ic' class='form-control' value='".$row['user_ic']."'></td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>Contact No</td>
                        <td class='viewP'><input type='number' name='contact_num' class='form-control' value='".$row['user_contact']."'></td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>Gender</td>
                        <td class='viewP'>
                            <select name='gender' form=editAcc>
				                <option value='Male'>Male</option>
				                <option value='Female'>Female</option>
				            </select>
                            </td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>Home Address</td>
                        <td class='viewP'><input type='text' name='address' class='form-control' value='".$row['user_address']."'></td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>City</td>
                        <td class='viewP'><input type='text' name='city' class='form-control' value='".$row['user_city']."'></td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>Postal Code</td>
                        <td class='viewP'><input type='number' name='postal' class='form-control' value='".$row['user_postal']."'></td>
                    </tr>
 
                    <tr>
                        <td class='viewP1'>About Me</td>
                        <td class='viewP'><input type='text' name='bname' class='form-control' value='".$row['aboutme']."'></td>
                    </tr>
	
                    </table><br><br>
                    </form>";
			        }
                }

// include page footer HTML
include_once "layout_foot.php";
?>
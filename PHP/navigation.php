<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container-fluid">
			<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo $home_url; ?>">Website</a>
		</div>
			<div class="nav navbar-nav">
				<li class="active"><a href="<?php echo $home_url; ?>Homepage.php">Home</a></li>
				<li><a href="<?php echo $home_url; ?>one.php">One</a></li>
				<li><a href="<?php echo $home_url; ?>two.php">Two</a></li>
				<li><a href="<?php echo $home_url; ?>three.php">Three</a></li>
                <div class="search-container" style="display:inline-block">
					<form action="search.php" method='post' id='searc' enctype="multipart/form-data">
					<input type="text" placeholder="Search.." name="skeyword" style="float:center;padding:6px;
						margin-top: 6px;
						font-size: 17px;
						border: none;">
					<button type="submit" name="search"><i class="glyphicon glyphicon-search" style="float:center;
						background: #ddd;
						font-size: 17px;
						border: none;
						cursor: pointer;">
					</i></button>
					</form>
				</div>
			</div>
<?php		if(isset($_SESSION['username'])){	
?>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						&nbsp;&nbsp;
						&nbsp;&nbsp;<span class="caret"></span>
					</a>
			
					<ul class="dropdown-menu" role="menu">
						<?php
						echo '<li><a href="'.$home_url.'viewProfile.php">Manage Profile</a></li>
								<li><a href="'.$home_url.'logout.php">Logout</a></li>';
						?>

					</ul>
				</li>
			</ul>
			<?php } ?>

		<ul class="nav navbar-nav navbar-right">

		<?php
		if(!isset($_SESSION['user_email'])){	

		echo'<li>
				<a href="'.$home_url.'login.php">
					<span class="glyphicon glyphicon-log-in"></span> Log In
				</a>
			</li>
 
			<li>
				<a href="'.$home_url.'signup.php">
					<span class="glyphicon glyphicon-check"></span> Sign Up
				</a>
			</li>
		}

		

			<li>';
				if(isset($_SESSION['fname'])){
				echo "<p>". $_SESSION['fname'] . "</p>";
				}
				}
				?>
			</li>
		</ul>
            
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->
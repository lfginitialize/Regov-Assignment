<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Homepage";
 
// include login checker
$require_login=false;

// include page header HTML
include_once "layout_head.php";
?>		<br>
		<div class="divCat">
		<div class="divCatBody">
		<div class="divCatRow">
		<div class="divCatHead"><a href="Category.php?lcat=CPU"><img class='cat' src='images/cp.png'>&nbsp;&nbsp;CPU</a></div>
		<div class="divCatCell"><a href="Category.php?lcat=GPU"><img class='cat' src='images/gp.png'>&nbsp;&nbsp;GPU</a></div>
		<div class="divCatCell"><a href="Category.php?lcat=RAM"><img class='cat' src='images/ra.png'>&nbsp;&nbsp;RAM</a></div>
		</div>
		</div>
		</div>&nbsp;

		<h2 style='padding-left:40px;'>Latest Listing</h2>
<?php

include_once "config/connect_database.php";

	$sql = mysqli_query($conn, "SELECT * FROM listing ORDER BY listing_id DESC");
	
	// Create the table head:
echo '<table class="center" border="0" width="90%" cellspacing="3" cellpadding="3" align="center">
<tr>
    <td align="left" width="50%"><b></b></td>
    <td align="right" width="50%"><b></b></td>
</tr>';
	
	$row_count = 0;
	// Display all the prints, linked to URLs:
	while ($row = mysqli_fetch_array ($sql, MYSQLI_ASSOC)) {
	$row_count++;
	if ($row_count==1) echo "<tr>";
	// Display each record:
	//image
	$image_name = $row['listing_image'];
echo"
    <td class='limage'>
		<a href=\"product_page.php?lid={$row['listing_id']}&lcat={$row['listing_categ']}&id={$row['listing_model']}&sid={$row['user_id']}\"><img class='catalog' src=$image_name></a><br>
		<a href=\"product_page.php?lid={$row['listing_id']}&lcat={$row['listing_categ']}&id={$row['listing_model']}&sid={$row['user_id']}\">{$row['listing_name']}
		<br>RM {$row['listing_price']}
	</td>
";	

    if ($row_count==4) {
         echo "</tr>";
         $row_count=0;
    }
} // End of while loop.

if ($row_count>0) echo "</tr>
						</table>
						";
 
// include page footer HTML
include_once "layout_foot.php";
?>
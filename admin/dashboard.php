<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>
						
<?php
if (isset($_SESSION['msg'])) {
	echo '<div class="section white-text" style="background:black;">'.$_SESSION['msg'].'</div>';
	unset($_SESSION['msg']);
}
?>

<div class="section white-text center" style="background:black ; margin-top: 20px;">

	<h4>Dashboard</h4>
	
	<div class="row" style="padding: 50px;">
		<div class="col s12">

			<a class="dash-btn" href="food-list.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Foods</div></a>
			<a class="dash-btn" href="category-list.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Categories</div></a>
			<a class="dash-btn" href="order-list.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Orders</div></a>
            <a class="dash-btn" href="users-list.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Users</div></a>
			<a class="dash-btn" href="serverinfo-list.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Servers</div></a>
			<a class="dash-btn" href="tableinfo.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Table Info</div></a>
		    <a class="dash-btn" href="booking.php"><div class="sec white white-text" style="margin: 15px; padding: 40px;border: 2px solid white; border-radius: 20px; font-size: 20px; background: linear-gradient(to right, #AF6568, #FA797F);">Booking</div></a>
		</div>

	</div>

</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>
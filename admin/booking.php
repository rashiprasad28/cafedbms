
<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>


<?php

require('../backends/connection-pdo.php');

$sql = 'SELECT booking.bno, booking.tid, booking.tseats, booking.userid, booking.username
   FROM booking, table_info, users where booking.tid = table_info.table_id and booking.tseats = table_info.seats and booking.userid = users.id and  booking.username = users.name';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);



?>
						

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Bookings</h3>
	</div>

  <?php

    if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
        <div class="col s12">
            <h6>'.$_SESSION['msg'].'</h6>
            </div>
        </div></div>';
        unset($_SESSION['msg']);
    }

    ?>
	
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
              <th>Booking no</th>
              <th>Table id</th>
              <th>No of seats</th>
              <th>User id</th>
              <th>User name</th>
          </tr>
        </thead>

        <tbody>
          <?php

            foreach ($arr_all as $key) {   //associative array

          ?>
          <tr>
            <td><?php echo $key['bno']; ?></td>
            <td><?php echo $key['tid']; ?></td>
            <td><?php echo $key['tseats']; ?></td>
            <td><?php echo $key['userid']; ?></td>
            <td><?php echo $key['username']; ?></td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>
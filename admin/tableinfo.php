<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>


<?php

require('../backends/connection-pdo.php');

$sql = 'SELECT table_info.table_id, table_info.seats, table_info.ser_id , table_info.ser_name
   FROM table_info, serverinfo where  table_info.ser_id = serverinfo.s_id and table_info.ser_name = serverinfo.s_name';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);



?>
						

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Tables info</h3>
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
	<div class="section right" style="padding: 15px 25px;">
		<a href="table-add.php" class="waves-effect waves-light btn">Add New</a>
	</div>
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
              <th>Table number</th>
              <th>No of Seats</th>
              <th>Server id</th>
              <th>Server name</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr>
            <td><?php echo $key['table_id']; ?></td>
            <td><?php echo $key['seats']; ?></td>
            <td><?php echo $key['ser_id']; ?></td>
            <td><?php echo $key['ser_name']; ?></td>
            <td><a href="../backends/admin/table-delete.php?table_id=<?php echo $key['table_id']; ?>"><span class="new badge" data-badge-caption="">Delete</span></a></td>
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>
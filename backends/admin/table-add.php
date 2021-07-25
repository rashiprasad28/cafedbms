<?php


session_start();
try {

    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: ../../admin/tableinfo.php');

	exit();
	
}

if (!isset($_POST['seats']) || !isset($_POST['ser_id'])|| !isset($_POST['ser_name'])) {

	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';

	header('location: ../../admin/tableinfo.php');

	exit();
}

$regex = '/^[(A-Z)?(a-z)?(0-9)?\-?\_?\.?\s*]+$/';


if ( !preg_match($regex, $_POST['table_id']) || !preg_match($regex, $_POST['seats']) || !preg_match($regex, $_POST['ser_id']) || !preg_match($regex, $_POST['ser_name'])) {

	$_SESSION['msg'] = 'Whoa! Invalid Inputs!';

	header('location: ../../admin/tableinfo.php');

	exit();

} else {
    $table_id = $_POST['table_id'];
	$seats = $_POST['seats'];
	$ser_id = $_POST['ser_id'];
	$ser_name = $_POST['ser_name'];
	

	$sql = "INSERT INTO table_info(table_id,seats,ser_id, ser_name) VALUES(?,?,?,?)";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$table_id, $seats, $ser_id, $ser_name])) {

    	$_SESSION['msg'] = 'Table Added!';

		header('location: ../../admin/tableinfo.php');
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../../admin/tableinfo.php');

    }


}
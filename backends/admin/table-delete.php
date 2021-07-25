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

if (!isset($_REQUEST['table_id'])) {

	$_SESSION['msg'] = 'Invalid ID!';

	header('location: ../../admin/tableinfo.php');

	exit();
} 

	$table_id = $_REQUEST['table_id'];


	$sql = "DELETE FROM table_info WHERE table_id = ?";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$table_id])) {

    	$_SESSION['msg'] = 'Table Deleted!';

		header('location: ../../admin/tableinfo.php');
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../../admin/tableinfo.php');

    }


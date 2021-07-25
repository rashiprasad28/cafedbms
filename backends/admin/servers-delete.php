<?php

session_start();
try {

    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: ../../admin/serverinfo-list.php');

	exit();
	
}

if (!isset($_REQUEST['s_id'])) {

	$_SESSION['msg'] = 'Invalid ID!';

	header('location: ../../admin/serverinfo-list.php');

	exit();
} 

	$s_id = $_REQUEST['s_id'];


	$sql = "DELETE FROM serverinfo WHERE s_id = ?";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$s_id])) {

    	$_SESSION['msg'] = 'Server Deleted!';

		header('location: ../../admin/serverinfo-list.php');
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../../admin/serverinfo-list.php');

    }


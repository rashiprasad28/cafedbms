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

if (!isset($_POST['s_name']) || !isset($_POST['s_age'])|| !isset($_POST['s_phone'])) {

	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';

	header('location: ../../admin/serverinfo-list.php');

	exit();
}

$regex = '/^[(A-Z)?(a-z)?(0-9)?\-?\_?\.?\s*]+$/';


if ( !preg_match($regex, $_POST['s_id']) || !preg_match($regex, $_POST['s_name']) || !preg_match($regex, $_POST['s_age']) || !preg_match($regex, $_POST['s_phone'])) {

	$_SESSION['msg'] = 'Whoa! Invalid Inputs!';

	header('location: ../../admin/serverinfo-list.php');

	exit();

} else {
    $s_id = $_POST['s_id'];
	$s_name = $_POST['s_name'];
	$s_age = $_POST['s_age'];
	$s_phone = $_POST['s_phone'];
	

	$sql = "INSERT INTO serverinfo(s_id,s_name,s_age, s_phone) VALUES(?,?,?,?)";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$s_id, $s_name, $s_age, $s_phone])) {

    	$_SESSION['msg'] = 'Server Added!';

		header('location: ../../admin/serverinfo-list.php');
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../../admin/serverinfo-list.php');

    }


}
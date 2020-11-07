<?php

	require_once ('autoload.php');
	$conn = BaseController::Conn();

	$response = [];

	if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
    	$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
    	$password = stripslashes($_REQUEST['password']);
    	$password = mysqli_real_escape_string($conn,$password);

		$response = AccountController::Login($username, $password);

		if($response['success']) {
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['user_id'] = $response['user_id'];
		} else {
			$response['message'];
		}

	} else {

		$response['message'] = 'Η διαδικασία σύνδεσης απέτυχε. Παρακαλούμε, προσπαθήστε ξανά.';

}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit();
<?php


    require_once ('autoload.php');
    $conn = BaseController::Conn();

//	require('inc/db_connect.php');
    session_start();

    $response = [];

    // If form submitted, insert values into the database.
    if (isset($_REQUEST['lname']) && isset($_REQUEST['fname']) && isset($_REQUEST['username']) && isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['srch_store'])){

        $lname = stripslashes($_REQUEST['lname']); // removes backslashes
		$lname = mysqli_real_escape_string($conn,$lname); //escapes special characters in a string
        $fname = stripslashes($_REQUEST['fname']); // removes backslashes
		$fname = mysqli_real_escape_string($conn,$fname); //escapes special characters in a string
        $username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($conn,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
        $store = stripslashes($_REQUEST['srch_store']); // removes backslashes
        $store = (int)$store;

        $post_data = [
          'lname' => $lname,
          'fname' => $fname,
          'username' => $username,
          'email' => $email,
          'password' => $password,
          'store_id' => $store
        ];

//        $response = AccountController::Register($post_data);


//        if($_REQUEST['password']!=$_REQUEST['confirm']) {
//
//
//   header("location: registration_fail.php?mssg=".urlencode("Οι κωδικοί που δώσατε είναι ανόμοιοι. Παρακαλώ, επαναλάβετε τη διαδικασία εγγραφής."));
//
//
//
//        } else {
//
//

//
//
//        $query_check = "SELECT username, email FROM users WHERE username='$username' OR email='$email'";
//        $result_check = mysqli_query($conn,$query_check);
//            if (mysqli_num_rows($result_check)>0) {
//
//            header("location: registration_success.php?mssg=".urlencode("Είστε ήδη εγγεγραμμένοι. "));
//
//        } else {
//
//
//        $query = "INSERT into users (id, username, password, lname, fname, email, id_store) VALUES (DEFAULT, '$username', '$password', '$lname', '$fname',  '$email', '$store')";
//        $result = mysqli_query($conn,$query);
//        if($result){
//
//            header("location: registration_success?mssg=".urlencode("Η εγγραφή σας πραγματοποιήθηκε με επιτυχία. "));
//        }
//
//        else {
//
//        header("location: registration_fail?mssg=".urlencode("Η εγγραφή σας δεν μπόρεσε να ολοκληρωθεί. Παρακαλώ, προσπαθήστε ξανά."));
//
//
//        }
//        }
//        }


        if($response['success']) {
            $response['message'];
        } else {
            $response['message'];
        }

    } else {
        $response['message'] = 'Παρουσιάστηκε σφάλμα κατά τη διαδικασία της εγγραφής. Παρακαλούμε, προσπαθήστε ξανά.';
    }

echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit();



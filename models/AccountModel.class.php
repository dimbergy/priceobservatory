<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 19/9/20
 * Time: 11:05 PM
 */

class AccountModel extends Database
{

    public function getLoggedUser($user_id)
    {

        $user = [];

        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT users.id_store AS store_id, users.username AS nickname, users.lname AS lastname, users.fname AS firstname, users.email AS useremail, suppliers.sup_name AS smname, suppliers.sup_logo AS smlogo, stores.address AS storeaddress, stores.zipcode AS storezipcode, stores.tel AS storetel, locations.loc_name AS storelocation FROM users INNER JOIN stores ON stores.id=users.id_store INNER JOIN suppliers ON suppliers.id=stores.id_sup INNER JOIN locations ON locations.id=stores.id_loc WHERE users.id = {$user_id}");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $user[] = $row;
            }
        }

        $stmt->close();

        return $user[0];
    }

    public function updateProductPrice($store_id, $product_id, $price)
    {
        $result = [];

        $conn = $this->connect();

        $stmt_update = $conn->prepare("UPDATE pricing SET up_date=0 WHERE id_store={$store_id} AND id_prod={$product_id}");
        $stmt_update->execute();
        $result_update = $stmt_update->affected_rows;

        $stmt_insert = $conn->prepare("INSERT into pricing (id, price, date_time, up_date, id_prod, id_store) VALUES (DEFAULT, {$price}, now(), 1, {$product_id}, {$store_id})");
        $stmt_insert->execute();
        $result_insert = $stmt_insert->affected_rows;

        if($result_update && $result_insert){
            $result['success'] = true;
            $result['message'] = 'Η τιμή του προϊόντος ανανεώθηκε με επτυχία.';
        } else {
            $result['success'] = false;
            $result['message'] = 'Η ανανέωση της τιμής του προϊόντος απέτυχε. Πρασπάθησε πάλι.';
        }

        $stmt_update->close();
        $stmt_insert->close();

        return $result;
    }

    public function login($username, $password)
    {
        $response = [];

        $conn = $this->connect();

        $stmt1 =  $conn->prepare("SELECT id, username, password FROM users WHERE username=?");
        $stmt1->bind_param('s', $username);
        $result1 = $stmt1->get_result();

        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username=? AND password=?");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1) {
            $response['success'] = true;
            $response['user_id'] = $result->fetch_object()->id;
        } else{
            $response['success'] = false;
            if($result1->num_rows == 1) {
                $response['message'] = 'O κωδικός χρήστη που καταχωρίσατε είναι λανθασμένος. Παρακαλώ, επαναλάβατε τη διαδικασία εισόδου.';
            } else {
                $response['message'] = 'Δεν είστε εγγεγραμμένος χρήστης. Παρακαλούμε, κάνετε εγγραφή.';
            }
        }

        $stmt->close();
        $stmt1->close();

        return $response;
    }

    public function register($post_data)
    {
        $response = [];

        $conn = $this->connect();

        $stmt1 =  $conn->prepare("SELECT username, email FROM users WHERE username=? OR email=?");
        $stmt1->bind_param('ss', $post_data['username'], $post_data['email']);
        $result1 = $stmt1->get_result();
        if($result1->num_rows > 0) {
            $response['message'] = 'Είστε ήδη εγγεγραμμένος χρήστης.';
        } else {
            $stmt =  $conn->prepare("INSERT INTO users (id, username, password, lname, fname, email, id_store) VALUES (DEFAULT, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssssi', $post_data['username'], $post_data['password'], $post_data['lname'], $post_data['fname'], $post_data['email'], $post_data['store_id']);
            $result = $stmt->get_result();

            if($result) {
                $response['success'] = true;
                $response['message'] = 'Η εγγραφή σας πραγματοποιήθηκε με επιτυχία.';
            } else {
                $response['success'] = false;
                $response['message'] = 'Η εγγραφή σας δεν μπόρεσε να ολοκληρωθεί. Παρακαλώ, προσπαθήστε ξανά.';
            }
            $stmt->close();
        }

        $stmt1->close();

        return $response;
    }
}
<?php
session_start();
include 'inc/functions.php';
  
$user= $_SESSION['username'];

if (isset($_POST['price']) && !empty($_POST['price'])) {
    

$price = $_POST['price'];
$product = $_POST['product'];


$sql_user="SELECT id_store FROM users WHERE username='".$user."'";
$result_user= mysqli_query($conn, $sql_user);
$row_user=mysqli_fetch_assoc($result_user);

$sql_prod="SELECT id FROM products WHERE id='".$product."'";
$result_prod= mysqli_query($conn, $sql_prod);
$row_prod=mysqli_fetch_assoc($result_prod);


$sql_update ="UPDATE pricing SET up_date=0 WHERE id_store='".$row_user['id_store']."' AND id_prod='".$row_prod['id']."'";
    $result_update = mysqli_query($conn,$sql_update);
    
$sql_price = "INSERT into pricing (id, price, date_time, up_date, id_prod, id_store) VALUES (DEFAULT, '$price', now(), 1, '".$row_prod['id']."', '".$row_user['id_store']."')";
        $result_price = mysqli_query($conn,$sql_price);
        if($result_price){ ?>
      
    <script language="javascript" type="text/javascript">
		alert('Η καταχώρισή σας για το προϊόν <?php echo $product ?> πραγματοποιήθηκε με επιτυχία. Μπορείτε να προχωρήσετε στην καταχώριση τιμής για επόμενο προϊόν.');
		window.location = 'dashboard.php#data-entering';
	</script>

            <?php } else { ?>
   
    <script language="javascript" type="text/javascript">
		alert('Η καταχώρισή σας για το προϊόν <?php echo $product ?> απέτυχε. Παρακαλώ, δοκιμάστε ξανά.');
		window.location = 'dashboard.php#data-entering';
	</script>  

           
        <?php } 
    
    
 
    
} else { ?>
    
    <script language="javascript" type="text/javascript">
		alert('Η καταχώρισή σας για το προϊόν <?php echo $product ?> απέτυχε. Παρακαλώ, δοκιμάστε ξανά.');
		window.location = 'dashboard.php#data-entering';
	</script>
    
 <?php   
}
?>
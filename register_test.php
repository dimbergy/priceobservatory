<?php require('inc/db_connect.php');
    session_start(); ?>

    <!DOCTYPE html>
    <html lang="en">

<?php include 'header.php'; ?>

<body class="productPage">

<?php  include 'navigation.php';
    

    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
        
        if($_REQUEST['password']!=$_REQUEST['confirm']) {
           

    ?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="https://farm3.staticflickr.com/2431/32856142165_039ed3f130_o_d.jpg" alt="account img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Διαχειριση</h2>
        <ol class="breadcrumb">
          <li><a>price</a></li>                   
          <li class="active">Observatory</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
                
  <span style="color: red"><h5>Οι κωδικοί που δώσατε είναι ανόμοιοι. Παρακαλώ, επαναλάβετε τη διαδικασία <a href="account.php">εγγραφής</a>.</h5></span><br />              
              
    
                </div>
              </div>
            </div>          
         </div>
       </div>


 </section>
 

 <?php

        session_destroy();
        include 'footer.php';
        include 'scripts.php';
        


?>
  

  </body>
</html>        
            
            
 <?php           

            
        } else {
           
      
    
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
		//$store = mysqli_real_escape_string($con,$srch_store); //escapes special characters in a string  

            
        $query_check = "SELECT username, password FROM users WHERE username='$username' OR password='".$password."'";
		$result_ckeck = mysqli_query($conn,$query_check) or die(mysql_error());
		$rows_check = mysqli_num_rows($result_check);
        if($rows_check==1){
			        
            
            
         echo "Είστε ήδη εγγεγραμμένος.";   
            
            
            
            
            
        } else {
	
        $query = "INSERT into users (id, username, password, lname, fname, email, id_store) VALUES (DEFAULT, '$username', '$password', '$lname', '$fname',  '$email', '$store')";
        $result = mysqli_query($conn,$query);
        if($result){
            
            header("location: registration_success.php");
        }
        
        else {
        


    ?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="https://farm3.staticflickr.com/2431/32856142165_039ed3f130_o_d.jpg" alt="login img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Διαχειριση</h2>
        <ol class="breadcrumb">
          <li><a>price</a></li>                   
          <li class="active">Observatory</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
                
  <span style="color: red"><h5>Η εγγραφή σας δεν μπόρεσε να ολοκληρωθεί. Παρακαλώ, <a href="account.php">προσπαθήστε ξανά</a>.</h5></span><br />              
              
    
                </div>
              </div>
            </div>          
         </div>
       </div>


 </section>
 

 <?php
            session_destroy();
        mysqli_close($conn); 
        include 'footer.php';
        include 'scripts.php';
        


?>
  

  </body>
</html>    

<?php
            
        }
        
        }
        
    }

    }
    ?>
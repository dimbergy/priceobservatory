<?php $page='registration';
require_once('inc/functions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php include ('inc/header.php'); ?>

<body class="productPage">

<?php include ('inc/navigation.php');
$message=$_GET['mssg']; ?>
 
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
 <section id="aa-myaccount" style="background:#f3e4eb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Είσοδος</h4>
                 <form action="login.php" method="post" class="aa-login-form" name="login">
                  <label for="">Username<span>*</span></label>
                   <input type="text" name="username" placeholder="Όνομα χρήστη">
                   <label for="">Password<span>*</span></label>
                    <input type="password" name="password" placeholder="Κωδικός πρόσβασης">
                    <button type="submit" name="submit" class="aa-browse-btn">Είσοδος</button>
                    
                   
                  </form>
                </div>
              </div>
<div class="col-md-6">
                <div class="aa-myaccount-register">
                    
                  <?php if (isset($_GET['mssg'])) { ?>
                    <span style="color: red"><h5><?php echo $message ?>Παρακαλώ, συμπληρώστε τα στοιχεία σας για να κάνετε εισαγωγή στη σελίδα καταχώρισης τιμών για τα προϊόντα.</h5></span><br />
                      <?php }  ?>   

                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>


 <?php
        mysqli_close($conn); 
        include ('inc/footer.php');
        include ('inc/scripts.php');
?>
  

  </body>
</html>
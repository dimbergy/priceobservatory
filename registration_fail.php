<!DOCTYPE html>
<html lang="en">

<?php include ('inc/header.php');
$stores = BaseController::Stores();
?>

<body class="productPage">

<?php include ('inc/navigation.php');
$message=$_GET['mssg']; ?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
     <img src="https://farm3.staticflickr.com/2431/32856142165_039ed3f130_o_d.jpg" alt="myaccount img">
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
                <?php if (isset($_GET['mssg'])) { ?>
                    <span style="color: red"><h5><?php echo $message ?></h5></span><br />
                      <?php }  ?> 
                </div>
              </div>
<div class="col-md-6">
                <div class="aa-myaccount-register">                
               <h4>Εγγραφή</h4>
                 <form action="register.php" method="post" name="register" class="aa-login-form">
                    <label for="lname">Επώνυμο<span>*</span></label>
                    <input type="text" name="lname" placeholder="Γράψε το επώνυμό σου" required>
                    <label for="fname">Όνομα<span>*</span></label>
                    <input type="text" name="fname" placeholder="Γράψε το όνομά σου" required>
                     <label for="username">Username<span>*</span></label>
                    <input type="text" name="username" placeholder="Όρισε όνομα χρήστη" required>
                    <label for="email">Email<span>*</span></label>
                      <input type="text" name="email" placeholder="Δώσε το email σου" required>
                    <label for="password">Password<span>*</span></label>
                    <input type="password" name="password" placeholder="Όρισε κωδικό πρόσβασης" required>
                     <label for="confirm">Επιβεβαίωση Password<span>*</span></label>
                    <input type="password" name="confirm" placeholder="Επανάλαβε τον κωδικό πρόσβασης" required>
                     <label for="srch_store">Επιλογή καταστήματος<span>*</span></label>
                     <select class="form-control" name="srch_store" id="srch_store" required>
                         <?php if(count($stores)) {
                           foreach ($stores as $store) { ?>
                               <option value="<?= $store->idstore ?>"><?= $store->supname . ' | ' . $store->locname . ' | ' . $store->addstore ?></option>
                           <?php }
                         } ?>
                     </select>
                    <button type="submit" class="aa-browse-btn">Εγγραφή</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

 <?php

        mysqli_close($conn); 
        include ('inc/footer.php');
        include ('inc/scripts.php');

?>
  

  </body>
</html>
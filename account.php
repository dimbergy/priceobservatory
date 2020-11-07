<!DOCTYPE html>
<html lang="en">

<?php include ('inc/header.php');
$stores = BaseController::Stores();
?>

<body id="account" class="productPage">

<?php include ('inc/navigation.php'); ?>
 
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
                <div class="aa-myaccount-login login_section">
                <h4>Είσοδος</h4>
                 <form id="accountLoginForm" action="" method="post" class="aa-login-form" name="login">
                     <div class="alert alert-danger hidden"></div>
                     <div class="input-container form-group">
                         <label for="">Username<span>*</span></label>
                         <input type="text" name="username" class="form-control input_required username_input" placeholder="Όνομα χρήστη" data-required="Το πεδίο είναι υποχρεωτικό">
                         <div class="invalid-feedback hidden"></div>
                     </div>
                     <div class="input-container form-group">
                         <label for="">Password<span>*</span></label>
                         <input type="password" name="password" class="form-control input_required password_input" placeholder="Κωδικός πρόσβασης" data-required="Το πεδίο είναι υποχρεωτικό">
                         <div class="invalid-feedback hidden"></div>
                     </div>
                     <div class="form-group">
                         <button type="button" class="aa-browse-btn login_btn">Είσοδος</button>
                     </div>
                  </form>
                </div>
              </div>
<div class="col-md-6">
                <div class="aa-myaccount-register register_section">
                 <h4>Εγγραφή</h4>
                 <form action="" method="post" name="register" class="aa-login-form">
                     <div class="alert alert-danger hidden"></div>
                     <div class="form-group input-container">
                         <label for="lname">Επώνυμο<span>*</span></label>
                         <input type="text" name="lname" class="input_required" placeholder="Γράψε το επώνυμό σου" data-required="Το πεδίο είναι υποχρεωτικό">
                         <div class="invalid-feedback hidden"></div>
                     </div>
                     <div class="form-group input-container">
                         <label for="fname">Όνομα<span>*</span></label>
                         <input type="text" name="fname" class="input_required" placeholder="Γράψε το όνομά σου" data-required="Το πεδίο είναι υποχρεωτικό">
                         <div class="invalid-feedback hidden"></div>
                     </div>
                     <div class="form-group input-container">
                         <label for="username">Username<span>*</span></label>
                         <input type="text" name="username" class="input_required" placeholder="Όρισε όνομα χρήστη" data-required="Το πεδίο είναι υποχρεωτικό">
                         <div class="invalid-feedback hidden"></div>
                     </div>
                     <div class="form-group input-container">
                         <label for="email">Email<span>*</span></label>
                         <input type="text" name="email" class="input_required" placeholder="Δώσε το email σου" pattern="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$" data-required="Το πεδίο είναι υποχρεωτικό" data-invalid="Το email που έδωσες δεν είναι έγκυρο">
                         <div class="invalid-feedback hidden"></div>
                     </div>
                     <div class="form-group input-container">
                         <label for="password">Password<span>*</span></label>
                         <input type="password" name="password" class="input_required input_password password_original" placeholder="Όρισε κωδικό πρόσβασης" data-required="Το πεδίο είναι υποχρεωτικό" data-length="Ο κωδικός πρέπει να αποτελείται από τουλάχιστον 6 χαρακτήρες">
                         <div class="invalid-feedback hidden"></div>
                     </div>
                     <div class="form-group input-container">
                         <label for="confirm">Επιβεβαίωση Password<span>*</span></label>
                         <input type="password" name="confirm" class="input_required password_confirm" placeholder="Επανάλαβε τον κωδικό πρόσβασης" data-required="Το πεδίο είναι υποχρεωτικό" data-password="Οι κωδικοί που έδωσες δεν ταιριάζουν">
                         <div class="invalid-feedback hidden"></div>
                     </div>
                     <div class="form-group input-container">
                         <label for="srch_store">Επιλογή καταστήματος<span>*</span></label>
                         <select class="form-control input_required" name="srch_store" id="srch_store" data-required="Το πεδίο είναι υποχρεωτικό">
                             <?php if(count($stores)) {
                                 foreach ($stores as $store) { ?>
                                     <option value="<?= $store->idstore ?>"><?= $store->supname . ' | ' . $store->locname . ' | ' . $store->addstore ?></option>
                                 <?php }
                             } ?>
                         </select>
                         <div class="invalid-feedback hidden"></div>
                     </div>
                     <div class="form-group">
                         <button type="button" class="aa-browse-btn register_btn">Εγγραφή</button>
                     </div>
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
    include ('inc/footer.php');
    include ('inc/scripts.php');
?>

  

  </body>
</html>
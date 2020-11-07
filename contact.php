<?php
session_start();
$page='contact';
?>

<!DOCTYPE html>
<html lang="en">

<?php include ('inc/header.php'); ?>

<body class="productPage">

<?php include ('inc/navigation.php'); ?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="https://farm3.staticflickr.com/2519/32814997016_5241b268b0_o_d.jpg" alt="contact img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Επικοινωνια</h2>
        <ol class="breadcrumb">
          <li><a>price</a></li>         
          <li class="active">Observatory</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
<!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>Στη διάθεσή σας για ό,τι χρειαστείτε...</h2>
             <p>Η βοήθειά σας είναι πολύτιμη για να μπορούμε να σας ενημερώνουμε σωστά και υπεύθυνα</p>
           </div>
           <!-- contact map -->
           <div class="aa-contact-map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3143.624838797255!2d23.80815431505539!3d38.00921027971745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a198532e2c0801%3A0x6d2f97897f3905f5!2sTerpsitheas+4%2C+Ag.+Paraskevi+153+41!5e0!3m2!1sen!2sgr!4v1485476031817" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
           <!-- Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="contact_form.php" method="post" name="contactform" required>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" name="lname" placeholder="Επώνυμο *" class="form-control" required data-error="Απαιτείται όνομα">
                             <div class="help-block with-errors"></div>
                        </div>
                      </div>
                     <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" name="fname" placeholder="Όνομα *" class="form-control" required data-error="Απαιτείται επώνυμο">
                             <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" name="email" placeholder="Email *" class="form-control" required data-error="Απαιτείται έγκυρο email">
                             <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" name="subject" placeholder="Θέμα *" class="form-control" required data-error="Απαιτείται θέμα">
                             <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" name="message" rows="3" placeholder="Μήνυμα *" required data-error="Απαιτείται μήνυμα"></textarea>
                         <div class="help-block with-errors"></div>
                    </div>
                    <button type="submit" name="sendform" class="aa-secondary-btn fa fa-send" ></button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>priceObservatory</h4>
                     <p>Το έγκυρο και υπεύθυνο Παρατηρητήριο Τιμών Προϊόντων Λιανεμπορίου</p>
                     <p><span class="fa fa-home"></span>Τερψιθέας 4Α, 153 41, Αγία Παρασκευή</p>
                     <p><span class="fa fa-phone"></span>+30 210 65 29 563</p>
                        <p><span class="fa fa-mobile"></span>+30 6945 370 529</p>
                     <p><span class="fa fa-envelope"></span>Email: dimbergy@gmail.com</p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>


<?php
    include ('inc/footer.php');
    include ('inc/scripts.php');
?>


 </body>
</html>

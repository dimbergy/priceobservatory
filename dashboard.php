<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<?php include ('inc/header.php');
$products = SearchController::Products();
?>

<body id="dashboard" class="productPage">

<?php include ('inc/navigation.php');

if(isset($_SESSION['user_id'])){

    $user = AccountController::LoggedUser($_SESSION['user_id']); ?>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="https://farm3.staticflickr.com/2608/32474985300_7bf0eaf60a_o_d.png" alt="login img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Εισαγωγη δεδομενων</h2>
        <ol class="breadcrumb">
          <li><a>price</a></li>         
          <li class="active">Observatory</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section class="aa-product-details" style="background: #ded5c9">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            
          <div  style="margin: 30px auto">
            <div class="col-md-6">
                <p class="aa-prod-category"><span class="aa-add-to-cart-btn" style="margin: 0 20px 0 10px">Διαχειριστης</span><?= $user->lastname . ' ' . $user->firstname ?></p>
              <p class="aa-prod-category"><span class="aa-add-to-cart-btn" style="margin: 0 20px 0 10px">Username</span><?= $user->nickname ?></p>
              <p class="aa-prod-category"><span class="aa-add-to-cart-btn" style="margin: 0 20px 0 10px">Email</span><?= $user->useremail ?></p>
                <p class="aa-prod-category"><span class="aa-add-to-cart-btn" style="margin: 0 20px 0 10px">Αλυσιδα Σ/Μ</span><img src="<?= $user->smlogo ?>" width="150px"/></p>
              </div>   
              
             <div class="col-md-6">
                <p class="aa-prod-category"><span class="aa-add-to-cart-btn" style="margin: 0 20px 0 10px">Περιοχη Καταστηματος</span><?= $user->storelocation ?></p>
              <p class="aa-prod-category"><span class="aa-add-to-cart-btn" style="margin: 0 20px 0 10px">Διευθυνση</span><?= $user->storeaddress ?></p>
                <p><span class="aa-add-to-cart-btn" style="margin: 0 20px 0 10px">TK</span><?= $user->storezipcode ?></p>
                 
              <p class="aa-prod-category"><span class="aa-add-to-cart-btn" style="margin: 0 20px 0 10px">Τηλεφωνο</span><?= $user->storetel ?></p>
              </div>    
            </div>  
             
                   
           <div class="aa-product-details-area" id="data-entering">     
            
             <div class="text-center" style="margin-top: 30px; margin-bottom:50px"><h2>Καταχώριση τιμής προϊόντος</h2>  <br />

                 <form class="aa-sort-form" name="multiselect" action="" method="post">
                     <div class="form-group row">
                         <label for="srch_prod" class="col-md-3 text-right">Προϊόν&nbsp;&nbsp;</label>
                         <div class="col-md-7">
                             <select name="srch_prod" id="srch_prod" class="form-control col-md-7">
                                 <option value="" selected disabled>Επιλογή Προϊόντος</option>
                                 <?php if(count($products)) {
                                     foreach ($products as $product) { ?>
                                         <option value="<?= $product->id ?>"><?= $product->prod_name ?></option>
                                     <?php }
                                 } ?>
                             </select>
                             <input type="hidden" id="store" name="store" value="<?= $user->store_id ?>">
                         </div>

<!--            <button class="btn fa fa-search col-md-2 text-left" type="submit" name="filter"></button>-->
                     </div>
                </form> 
            </div>



               <div class="aa-product-details-content insert_price_template hidden" style="margin-bottom:50px">
                   <div class="row">
                       <!-- Modal view slider -->
                       <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                           <img src="" width="150px" alt="" class="product_img">
                       </div>
                       <!-- Modal view content -->
                       <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="aa-product-view-content">
                               <h3 class="product_title"></h3>
                               <form id="price_form" class="comments-form contact-form" action="" method="post" name="price_form">
                                   <div class="form-inline form-group">
                                       <label for="price">Τιμή</label>
                                       <input type="number" id="price" name="price" class="form-control" step="0.01" style="margin-left:15px; width: 80px">
                                       <input type="hidden" id="product" name="product" value=""/>
                                       <input type="hidden" id="store_id" name="store_id" value=""/>
                                       <button class="btn fa fa-send" type="button" style="background:transparent; margin-left:5px"></button>
                                   </div>
                                       <div class="invalid-feedback text-danger hidden">Το πεδίο είναι υποχρεωτικό</div>
                                   <div class="alert alert-success hidden"></div>
                                   <div class="alert alert-danger hidden"></div>
                               </form>

                           </div>
                       </div>
                   </div>
               </div>

        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->

<?php }
    include ('inc/footer.php');
    include ('inc/scripts.php');
?>

</body>
</html>         
            
<!DOCTYPE html>
<html lang="en">

<?php include ('inc/header.php');
$suppliers = GrocersController::Suppliers();
?>

<body class="productPage">

<?php include ('inc/navigation.php'); ?>

  <section id="aa-catg-head-banner">
   <img src="https://farm3.staticflickr.com/2303/32702498382_179a87afda_o_d.jpg" alt="grocers img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>ΑΛΥΣΙΔΕΣ ΣΟΥΠΕΡ ΜΑΡΚΕΤ</h2>
        <ol class="breadcrumb">
          <li><a>price</a></li>         
          <li class="active">Observatory</li>
        </ol>
      </div>
     </div>
   </div>
  </section>

<?php
if(count($suppliers)) {
    foreach ($suppliers as $supplier) { ?>
        <section class="aa-product-details" style="background:#efe8b6">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-product-details-area">
                            <div class="aa-product-details-content">
                                <div class="row">
                                    <!-- Modal view slider -->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="aa-product-view-slider" style="background:#efe8b6">
                                            <div id="demo-1" class="simpleLens-gallery-container">
                                                <div class="simpleLens-container">
                                                    <div class="simpleLens-big-image-container">
                                                        <a data-lens-image="<?= $supplier->sup_img ?>" class="simpleLens-lens-image">
                                                            <img src="<?= $supplier->sup_img ?>" alt="<?= $supplier->sup_name ?>" class="simpleLens-big-image">
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal view content -->
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="aa-product-view-content">
                                            <h3 style="color: #ff6666"><?= $supplier->sup_name ?></h3>
                                            <br />
                                            <h4>Έδρα</h4>
                                            <p><?= $supplier->sup_base . ', ' . $supplier->sup_zipcode ?></p>
                                            <p><?= $supplier->sup_loc ?></p><br />
                                            <h4>Τηλέφωνο</h4>
                                            <p><?= $supplier->sup_tel ?></p><br />
                                            <p></p>
                                            <h4>Website</h4>
                                            <p><a href="<?= $supplier->sup_website ?>" target="_blank"><img src="<?= $supplier->sup_logo ?>" alt="<?= $supplier->sup_name ?>" width="150px"/></a></p>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aa-product-details-bottom" style="border-color: crimson">
                                <ul class="nav nav-tabs" id="myTab2" style="border-color: crimson">
                                    <li><a>Ιστορικό</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="description">
                                        <?= $supplier->sup_history ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }
}

include ('inc/footer.php');
include ('inc/scripts.php');

?>
</body>
</html>

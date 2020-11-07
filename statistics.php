<!DOCTYPE html>
<html lang="en">
<?php include ('inc/header.php');
$products = SearchController::Products();
$min_supplier = SearchController::RangeSupplier(true);
$max_supplier = SearchController::RangeSupplier(false);
$min_store = SearchController::RangeStore(true);
$max_store = SearchController::RangeStore(false);

?>
<body id="statistics" class="productPage">
 <?php include ('inc/navigation.php'); ?>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="https://farm1.staticflickr.com/492/32788395021_920e2de66a_o_d.jpg" alt="statistics img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>ΣΤΑΤΙΣΤΙΚΑ ΣΤΟΙΧΕΙΑ</h2>
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

<section id="product_price_section" class="aa-product-details">
    <div class="container">

        <div class="row">

            <div class="text-center">
                <h2 class="head_title">Τιμές προϊόντων</h2>

                <form class="aa-sort-form form-inline" name="multiselect">
                    <div class="form-group">
                        <label for="srch_prod">Προϊόν&nbsp;&nbsp;</label>
                        <select name="srch_prod" id="srch_prod" class="form-control">
                            <option value="" disabled selected>Επιλογή Προϊόντος</option>
                            <?php if(count($products)) {
                                foreach ($products as $product) { ?>
                                    <option value="<?= $product->id ?>"><?= $product->prod_name ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                </form> 
            </div>


            <div class="col-md-4 lowest_price hidden">
                <div class="aa-product-details-area">
                    <div class="aa-product-details-content">
                        <div class="low_heading">
                            <i class="fa fa-thumbs-up fa"></i>
                            <h3>Η φθηνότερη</h3>
                        </div>
                        <h4 class="price"></h4>
                        <div class="aa-product-view-content">
                            <div class="details_block">
                                <img src="" alt="" class="aa-logo">
                                <p class="address"><i class="fa fa-home"></i><span></span></p>
                                <p class="phone"><i class="fa fa-phone"></i><span></span></p>
                                <p class="area"><i class="fa fa-map-pin"></i><span></span></p>
                            </div>
                            <div class="google_map"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center product_section hidden">
                <div class="aa-product-details-area">
                    <div class="aa-product-details-content">
                        <h4 class="product_title"></h4>
                        <img src="" alt="" class="product_img">
                    </div>
                </div>
            </div>

            <div class="col-md-4 highest_price hidden">
                <div class="aa-product-details-area">
                    <div class="aa-product-details-content">
                        <i class="fa fa-thumbs-down fa"><h3>Η ακριβότερη</h3></i>
                        <h4 class="price"></h4>
                        <div class="aa-product-view-content">
                            <div class="details_block">
                                <img src="" alt="" class="aa-logo">
                                <p class="address"><i class="fa fa-home"></i><span></span></p>
                                <p class="phone"><i class="fa fa-phone"></i><span></span></p>
                                <p class="area"><i class="fa fa-map-pin"></i><span></span></p>
                            </div>
                            <div class="google_map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>  

<section id="suppliers_section" class="aa-product-details">
    <div class="container">
        <div class="row">
            <div class="text-center" style="margin-top: 30px"><h2 style="color: whitesmoke">Αλυσίδες σούπερ μάρκετ</h2></div>                  
            
          <div class="col-md-6">
            <div class="aa-product-details-area">
                <div class="aa-product-details-content">
                    <div style="color: whitesmoke"><i class="fa fa-thumbs-up fa"><h3>Η φθηνότερη</h3></i></div
                    <a href="<?= $min_supplier->website ?>" target="_blank"><h3><?= $min_supplier->sm ?></h3></a>
                    <a href="<?= $min_supplier->website ?>" target="_blank"><img src="<?= $min_supplier->img ?>" width="350px" style="padding-bottom:30px"></a>
                  <div class="aa-product-view-content">
                    <p><i class="fa fa-home fa" style="color: #004e7c; margin-right:10px"></i><?= $min_supplier->base . ', ' . $min_supplier->zipcode . ', '. $min_supplier->loc ?></p>
                    <p><i class="fa fa-phone fa" style="color: #004e7c; margin-right:10px"></i><?= $min_supplier->tel ?></p>
                    <p><i class="fa fa-link fa" style="color: #004e7c; margin-right:10px"></i><a href="<?= $min_supplier->website ?>" target="_blank"><img src="<?= $min_supplier->logo ?>" width="150px"/></a></p>
                </div>
              </div>
            </div>
           </div>

          <div class="col-md-6">
            <div class="aa-product-details-area">
                <div class="aa-product-details-content">
                    <i class="fa fa-thumbs-down fa"><h3>Η ακριβότερη</h3></i>
                    <a href="<?= $max_supplier->website ?>" target="_blank"><h3><?= $max_supplier->sm ?></h3></a>
                    <a href="<?= $max_supplier->website ?>" target="_blank"><img src="<?= $max_supplier->img ?>" width="350px" style="padding-bottom:30px"></a>
                  <div class="aa-product-view-content">
                    <p><i class="fa fa-home fa" style="color: #004e7c; margin-right:10px"></i><?= $max_supplier->base . ', ' . $max_supplier->zipcode . ', ' . $max_supplier->loc ?></p>
                    <p><i class="fa fa-phone fa" style="color: #004e7c; margin-right:10px"></i><?= $max_supplier->tel ?></p>
                    <p><i class="fa fa-link fa" style="color: #004e7c; margin-right:10px"></i><a href="<?= $max_supplier->website ?>" target="_blank"><img src="<?= $max_supplier->logo ?>" width="150px"/></a></p>
                </div>
              </div>
            </div>
           </div>
  
        </div>
    </div>
    </section>  
       
<section id="stores_section" class="aa-product-details">
    <div class="container">

        <div class="row">
            <div class="text-center" style="margin-top: 30px"><h2>Καταστήματα</h2></div>

          <div class="col-md-6">
            <div class="aa-product-details-area">
                <div class="aa-product-details-content">
                    <div style="color: #ff6666"><i class="fa fa-thumbs-up fa"><h3>Το φθηνότερο</h3></i></div>
                    <h3><a href="<?= $min_store->website ?>" target="_blank"><img src="<?= $min_store->logo ?>" width="150px"/></a></h3>
                    <div style="margin: 30px auto"><a href="<?= $min_store->website ?>" target="_blank"><?= $min_store->storemap ?></a>
                    </div>
                  <div class="aa-product-view-content">
                    <p><i class="fa fa-home fa" style="color: #ff6666; margin-right:10px"></i><?= $min_store->storeadd . ', ' . $min_store->storezipcode ?></p>
                    <p><i class="fa fa-phone fa" style="color: #ff6666; margin-right:10px"></i><?= $min_store->storetel ?></p>
                    <p style="font-weight:500"><i class="fa fa-map-pin fa" style="color: #ff6666; margin-right:15px"></i><?= $min_store->location ?></p>
                </div>
              </div>
            </div>
           </div>
            

          <div class="col-md-6">
            <div class="aa-product-details-area">
                <div class="aa-product-details-content">
                    <i class="fa fa-thumbs-down fa"><h3>Το ακριβότερο</h3></i>
                    <h3><a href="<?= $max_store->website ?>" target="_blank"><img src="<?= $max_store->logo ?>" width="150px"/></a></h3>
                    <div style="margin: 30px auto"><a href="<?= $max_store->website ?>" target="_blank"><?= $max_store->storemap ?></a>
                    </div>
                  <div class="aa-product-view-content">
                    <p><i class="fa fa-home fa" style="color: #ff6666; margin-right:10px"></i><?= $max_store->storeadd . ', ' . $max_store->storezipcode ?></p>
                    <p><i class="fa fa-phone fa" style="color: #ff6666; margin-right:10px"></i><?= $max_store->storetel ?></p>
                    <p style="font-weight:500"><i class="fa fa-map-pin fa" style="color: #ff6666; margin-right:15px"></i><?= $max_store->location ?></p>
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

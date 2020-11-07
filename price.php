<!DOCTYPE html>
<html lang="en">

<?php include ('inc/header.php');
$categories = SearchController::Categories();
$products = SearchController::Products();
$suppliers = GrocersController::Suppliers();
$locations = GrocersController::Locations();
?>

<body id="observatory" class="productPage">

<?php include ('inc/navigation.php'); ?>
<?php include ('inc/price_clones.php'); ?>

  <section id="aa-catg-head-banner">
   <img src="https://farm6.staticflickr.com/5676/32732320981_83bf20b603_o_d.jpg" alt="<?= $site ?>" data-src="https://farm6.staticflickr.com/5676/32732320981_83bf20b603_o_d.jpg" data-title="<?= $site ?>" class="banner_img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
          <h2 class="banner_title" data-title="τιμες προϊοντων">τιμες προϊοντων</h2>
        <ol class="breadcrumb">
          <li><a>price</a></li>         
          <li class="active">Observatory</li>
        </ol>
      </div>
     </div>
   </div>
  </section>

  <section id="aa-product-category" style="background:#9bd6d2">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head" style="background-color: #b8e1da">
              <div class="aa-product-catg-head-left">
                  <form class="aa-sort-form form-row" name="multiselect" action="" method="post">

                      <div class="form-group col-md-4">
                          <label for="srch_prod">Προϊόν</label>
                          <select name="srch_prod" id="srch_prod" class="form-control search_results" data-cat-id="all_products">
                              <option value="all_products" selected>Όλα τα προϊόντα&hellip;</option>
                              <?php if(count($products)) {
                                  foreach ($products as $product) { ?>
                                      <option value="<?= $product->id ?>"><?= $product->prod_name ?></option>
                                  <?php }
                              }
                              ?>
                          </select>
                      </div>

                        <div class="form-group col-md-4">
                            <label for="srch_sup">Σ/Μ</label>
                            <select id="srch_sup" name="srch_sup" class="form-control search_results">
                                <option value="all_suppliers" selected>Όλα τα Σ/Μ&hellip;</option>
                                <?php if(count($suppliers)) {
                                    foreach ($suppliers as $supplier) { ?>
                                        <option value="<?= $supplier->id ?>"><?= $supplier->sup_name ?></option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>

                  <div class="form-group col-md-4">
                      <label for="srch_loc">Περιοχή</label>
                      <select id="srch_loc" name="srch_loc" class="form-control search_results">
                          <option value="all_locations" selected>Όλες οι περιοχές&hellip;</option>
                          <?php if(count($locations)) {
                              foreach ($locations as $location) { ?>
                                  <option value="<?= $location->id ?>"><?= $location->loc_name ?></option>
                              <?php }
                          }
                          ?>
                      </select>
                  </div>
                </form>
              </div>
              
            </div>
            
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <div class="aa-sidebar-widget">
              <h3>Κατηγορία</h3>
              <form name="catselect" action="" method="post">

                  <div class="form-group">
                      <select name="srch_cat" id="srch_cat" class="form-control">
                          <option value="all_categories" selected>Όλες οι κατηγορίες&hellip;</option>
                          <?php if(count($categories)) {
                              foreach ($categories as $category) { ?>
                                  <option value="<?= $category->id ?>"><?= $category->cat_name ?></option>
                              <?php }
                          } ?>
                      </select>
                  </div>
              </form>
            </div>
          </aside>
        </div>
      </div>

        <div class="row">
            <div class="aa-product-catg-body col-md-12" style="margin-top: 10px"></div>
        </div>
    </div>
  </section>

<?php
    include('inc/footer.php');
    include('inc/scripts.php');
?>

 </body>
</html>


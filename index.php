<!DOCTYPE html>
<html lang="en">

<?php include('inc/header.php');
$banners = BaseController::Banners('home-banner');
$categories = HomeController::Categories();
?>

<body id="home" class="productPage">

<?php include ('inc/navigation.php'); ?>

<?php if(count($banners)) { ?>
 <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
         <ul class="seq-canvas">
             <?php foreach ($banners as $banner) { ?>
            <li>
              <div class="seq-model">
                <img data-seq src="<?= $banner->media ?>" alt="<?= $banner->zone . '-' . $banner->ordering ?>" />
              </div>
              <div class="seq-title">             
                <h2 data-seq style="font-weight:300"><?= $banner->title ?></h2>
              
                <a data-seq href="<?= $root . $banner->target_url?>" class="aa-shop-now-btn aa-secondary-btn"><?= $banner->button_title ?></a>
              </div>
            </li>
             <?php } ?>
          </ul>
      </div>
    </div>
  </section>
<?php } ?>
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              
              <div class="col-md-5 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="<?= $categories[0]->cat_banner ?>" alt="<?= $categories[0]->cat_name ?>">
                    <div class="aa-prom-content">
                      <h4><a><?= $categories[0]->cat_name ?></a></h4>
                    </div>
                  </div>
                </div>
              </div>
          
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                    <?php if(count($categories) > 1) {
                        foreach ($categories as $key => $category) {
                            if($key>0) { ?>
                                <div class="aa-single-promo-right">
                                    <div class="aa-promo-banner">
                                        <img src="<?= $category->cat_banner ?>" alt="<?= $category->cat_name ?>">
                                        <div class="aa-prom-content">
                                            <h4><a><?= $category->cat_name ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }
                    } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->

<?php
        include('inc/footer.php');
        include('inc/scripts.php');
?>

 </body>
</html>
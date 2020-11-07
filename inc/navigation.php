<?php
session_start();
$header_menu = BaseController::Menu('header', $_SESSION['user_id']);
?>

<!-- wpf loader Two -->
       <!-- wpf loader Two -->
    <div id="wpf-loader-two">
      <div class="wpf-loader-two-inner">
        <span>Περιμένετε</span>
      </div>
    </div>
    <!-- / wpf loader Two -->       
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="<?= $root ?>">
                  <span class="fa fa-shopping-cart"></span>
                  <p>price<strong>Observatory</strong> <span>ο οδηγος του καταναλωτη</span></p>
                </a>
                
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                  <a class="aa-cart-link" href="<?= $_SESSION['user_id'] ? 'logout' : '#' ?>" <?= $_SESSION['user_id'] ? '' : 'data-toggle="modal" data-target="#login-modal"' ?>>
                      <span class="fa <?= $_SESSION['user_id'] ? 'fa-sign-out' : 'fa-sign-in' ?>"></span>
                      <span class="aa-cart-title"><?= $_SESSION['user_id'] ? 'Αποσύνδεση' : 'Είσοδος' ?></span>
                  </a>
              </div>
              <!-- / cart box -->
                       
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
            <div class="navbar-collapse collapse">
                <?php if(count($header_menu)) { ?>
            <ul class="nav navbar-nav">
                <?php foreach ($header_menu as $menu) { ?>
              <li><a href="<?= $root . $menu['target_url']?>"><span class="fa <?= $menu['icon'] ?>"></span> <?= $menu['title'] ?></a></li>
                <?php } ?>
            </ul>
                <?php } ?>
          </div><!--/.nav-collapse -->
        </div>
      </div> 
      </div>
  </section>
 
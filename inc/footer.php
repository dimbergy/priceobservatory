<?php $footer_menu = BaseController::Menu('footer', $_SESSION['user_id']); ?>
<!-- footer -->
  <footer id="aa-footer" style="background-color: #adcde5">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                  <?php if(count($footer_menu)) { ?>
                <div class="aa-footer-widget">
                  <h3>Ευρετήριο</h3>
                  <ul class="aa-footer-nav">
                      <?php foreach ($footer_menu as $menu) { ?>
                    <li><a href="<?= $root . $menu['target_url'] ?>"><?= $menu['title'] ?></a></li>
                      <?php } ?>
                  </ul>
                </div>
                  <?php } ?>
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Επικοινωνία</h3>
                    <address>
                      <p><span class="fa fa-home"></span> Τερψιθέας 4Α, 153 41, Αθήνα GR</p>
                      <p><span class="fa fa-phone"></span>+30 210 65 29 563</p>
                        <p><span class="fa fa-mobile"></span>  +30 6945 370 529</p>
                        <p><span class="fa fa-envelope"></span><a href="mailto:dimbergy@gmail.com" style="color: #888"> dimbergy@gmail.com</a></p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="https://www.facebook.com/dimitris.vergados.98" target="_blank"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p style="font-weight: 400"><span class="fa fa-copyright"></span> Designed by<a href="mailto:dimbergy@gmail.com"> Dimitrios Vergados</a> | all rights reserved</p>
           <br /><br />
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  <!-- Login Modal -->  

<div class="modal fade login_section" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="font-weight: 400">Είσοδος ή Εγγραφή</h4>
          <form id="loginModalForm" class="aa-login-form row" action="" method="post" name="login">
              <div class="form-group input-container col-xs-12">
                  <label for="">Username<span>*</span></label>
                  <input type="text" name="username" placeholder="Όνομα χρήστη" class="form-control input_required username_input" data-required="Το πεδίο είναι υποχρεωτικό">
                  <div class="invalid-feedback hidden"></div>
              </div>
           <div class="form-group input-container col-xs-12">
               <label for="">Password<span>*</span></label>
               <input type="password" name="password" placeholder="Κωδικός πρόσβασης" class="form-control input_required password_input" data-required="Το πεδίο είναι υποχρεωτικό">
               <div class="invalid-feedback hidden"></div>
           </div>
              <div class="col-xs-12">
                  <button class="aa-browse-btn login_btn" type="button">Είσοδος</button>
              </div>
            <div class="aa-register-now col-xs-12">
                <div class="alert alert-danger hidden"></div>
                Αν δεν είστε εγγεγραμμένοι, κάντε<a href="<?= $root ?>account">Εγγραφή</a> τώρα!
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>



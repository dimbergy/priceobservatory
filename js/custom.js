/** 
  * Template Name: Daily Shop
  * Version: 1.1  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)
  14. TOP SLIDER (SLICK SLIDER)

  
**/


jQuery(function($){

    String.prototype.isEmpty = function () {
        return (this.length === 0 || !this.trim());
    };

    let statistics = $('#statistics'),
        observatory = $('#observatory'),
        dashboard = $('#dashboard'),
        product_template = $('.product_template.hidden'),
        insert_price_template = $('.insert_price_template.hidden'),
        results_template = $('.results_template.hidden'),
        validateForm = function (form) {

        var valid = true,
            inputs = form.find(':input.input_required');


        inputs.each(function () {

            var input = $(this),
                value = input.val(),
                error_required = input.data('required'),
                error_invalid = input.data('invalid'),
                error_length = input.data('length'),
                error_password = input.data('password'),
                pattern = input.attr('pattern'),
                isValid = true;


            if (value.isEmpty()) {

                input.closest('.input-container').find('.invalid-feedback').removeClass('hidden').text(error_required);
                isValid = valid = false;

            } else if (typeof pattern != "undefined") {

                pattern = new RegExp(pattern);

                if (!pattern.test(value)) {

                    input.closest('.input-container').find('.invalid-feedback').removeClass('hidden').text(error_invalid);
                    isValid = valid = false;
                }

            } else if (input.hasClass('form-check-input') && !input.is(':checked')) {

                input.closest('.input-container').find('.invalid-feedback').removeClass('hidden').text(error_required);
                isValid = valid = false;

            } else if (input.hasClass('input_password') && value.length < 6) {

                input.closest('.input-container').find('.invalid-feedback').removeClass('hidden').text(error_length);
                isValid = valid = false;

            }
            else if ((input.hasClass('password_original') || input.hasClass('password_confirm')) && (form.find('.password_original').val() !== form.find('.password_confirm').val())) {
                input.closest('.input-container').find('.invalid-feedback').removeClass('hidden').text(error_password);
                isValid = valid = false;
            }

            if (isValid) {
                input.closest('.input-container').find('.invalid-feedback').addClass('hidden').html('');
                input.removeClass('error-input');
            } else {
                input.addClass('error-input');

            }
        });

        return valid;
    };

    statistics
        .on('change', '#srch_prod', function () {

            $.post(path + 'request.php', {product_id: $(this).val().trim() , type:'statistics'}, function(response){

                let object = $.parseJSON(response);

                let lowest_price = statistics.find('.lowest_price'),
                    highest_price = statistics.find('.highest_price');

                lowest_price.removeClass('hidden');
                lowest_price.find('.price').text(object.lowest.timi);
                lowest_price.find('.aa-logo').attr('src', object.lowest.logo).attr('alt', object.lowest.sm);
                lowest_price.find('.address span').text(object.lowest.diefthinsi + ', ' + object.lowest.tk);
                lowest_price.find('.phone span').text(object.lowest.phone);
                lowest_price.find('.area span').text(object.lowest.periohi);
                lowest_price.find('.google_map').html(object.lowest.googlemap);


                statistics.find('.product_section').removeClass('hidden');
                statistics.find('.product_section').find('.product_title').text(object.lowest.proion);
                statistics.find('.product_section').find('.product_img').attr('src', object.lowest.image).attr('alt', object.lowest.proion);

                highest_price.removeClass('hidden');
                highest_price.find('.price').text(object.highest.timi);
                highest_price.find('.aa-logo').attr('src', object.highest.logo).attr('alt', object.highest.sm);
                highest_price.find('.address span').text(object.highest.diefthinsi + ', ' + object.highest.tk);
                highest_price.find('.phone span').text(object.highest.phone);
                highest_price.find('.area span').text(object.highest.periohi);
                highest_price.find('.google_map').html(object.highest.googlemap);
            });
        });


    observatory
        .on('change', '#srch_cat', function () {

            $.post(path + 'request.php', {category_id: $(this).val().trim() , type:'search_category'}, function(response){

                let object = $.parseJSON(response);

                console.log(object.category[0].id);

                let banner = $('#aa-catg-head-banner');

                if(object.category.length > 1) {
                    banner.find('.banner_img').attr('src', banner.find('.banner_img').data('src')).attr('alt', banner.find('.banner_img').data('title'));
                    banner.find('.banner_title').text(banner.find('.banner_title').data('title'));
                } else {
                    banner.find('.banner_img').attr('src', object.category[0].cat_img).attr('alt', object.category[0].cat_name);
                    banner.find('.banner_title').text(object.category[0].cat_name);
                }

                let search_products = $('#srch_prod');

                $('option', search_products).remove();

                search_products.append(new Option(object.category.length > 1 ? 'Όλα τα προϊόντα...' : 'Όλα τα προϊόντα της κατηγορίας...', 'all_products'));

                $.each(object.products, function (i) {
                    let product = object.products[i];
                    search_products.append(new Option(product.prod_name, product.prodid)).attr('data-cat-id', object.category.length > 1 ? 'all_categories' : product.catid);
                });
            });
        })
        .on('change', '.search_results', function () {

            $.post(path + 'request.php', {product: $('#srch_prod').val().trim(), category: $('#srch_prod').attr('data-cat-id'), supplier: $('#srch_sup').val().trim(), store: $('#srch_loc').val().trim(), type:'search_results'}, function(response){

                let object = $.parseJSON(response);

                observatory.find('.aa-product-catg-body').html('');


                $.each(object, function (i) {
                    let product = object[i],
                        productClone = product_template.clone();
                    productClone.removeClass('hidden');
                    productClone.find('.product_img').attr('src', product.img).attr('alt', product.prod_name);
                    productClone.find('.aa-product-title').html(product.prod_name);

                    $.each(product.data, function (j) {
                        let results = product.data[j],
                            resultsClone = results_template.clone();

                        resultsClone.removeClass('hidden');
                        resultsClone.find('.aa-product-price').html(results.timi);
                        if(j!=0) {
                            resultsClone.find('.aa-badge.aa-sold-out').remove();
                        }
                        resultsClone.find('.logo_img').attr('src', results.logo).attr('alt', results.sm);
                        resultsClone.find('.google_map').html(results.googlemap);
                        resultsClone.find('.address').html(results.diefthinsi + ', ' + results.tk);
                        resultsClone.find('.phone').html(results.phone);
                        resultsClone.find('.area').html(results.periohi);

                        resultsClone.appendTo(productClone);
                    });


                    productClone.appendTo(observatory.find('.aa-product-catg-body'));
                    // productTitleClone.appendTo(observatory.find('.aa-product-catg.list'));

                });

            });
        });

    dashboard
        .on('change', '#srch_prod', function () {

            $.post(path + 'request.php', {product_id: $(this).val().trim(), store_id: $('#store').val().trim(), type:'dashboard_product'}, function(response){

                let object = $.parseJSON(response);

                insert_price_template.removeClass('hidden');
                insert_price_template.find('.product_img').attr('src', object.product.img).attr('alt', object.product.prod_name);
                insert_price_template.find('.product_title').html(object.product.prod_name);
                insert_price_template.find('#product').val(object.product.id);
                insert_price_template.find('#store_id').val(object.store_id);
            });
        })
        .on('click', '#price_form .fa-send', function () {
            let _this = $(this),
                isValid = false,
                price = _this.closest('form').find('#price').val().trim(),
                store_id = _this.closest('form').find('#store_id').val().trim(),
                product_id = _this.closest('form').find('#product').val().trim();

            if(price != "") {
                if(!_this.closest('form').find('.invalid-feedback').hasClass('hidden')) {
                    _this.closest('form').find('.invalid-feedback').addClass('hidden');
                }
                isValid = true;

            } else {
                _this.closest('form').find('.invalid-feedback').removeClass('hidden');
            }


            if(isValid) {

                $.post(path + 'request.php', {product_id: product_id , price: price, store_id: store_id, type:'submit_price'}, function(response){

                    if(!$('#price_form').find('.alert.alert-success').hasClass('hidden')) {
                        $('#price_form').find('.alert.alert-success').addClass('hidden').html('');
                    }
                    if(!$('#price_form').find('.alert.alert-danger').hasClass('hidden')) {
                        $('#price_form').find('.alert.alert-danger').addClass('hidden').html('');
                    }
                    if(!$('#price_form').find('.invalid-feedback').hasClass('hidden')) {
                        $('#price_form').find('.invalid-feedback').addClass('hidden');
                    }

                    let object = $.parseJSON(response);

                    if(object.error) {
                        $('#price_form').find('.invalid-feedback').removeClass('hidden');
                    } else {
                        if(object.success) {
                            $('#price_form').find('.alert.alert-success').removeClass('hidden').html(object.message);
                        } else {
                            $('#price_form').find('.alert.alert-danger').removeClass('hidden').html(object.message);
                        }
                        $('#price').val('');
                    }
                });
            }
        });

    $('.login_section')
        .on('click', '.aa-browse-btn.login_btn', function () {

            let _this = $(this),
                form = _this.closest('form');

            if(!form.find('.alert-danger').hasClass('hidden')) {
                form.find('.alert-danger').addClass('hidden').text('');
            }

           if(validateForm(form)) {
               $.post(path + 'login.php', {username: form.find('.username_input').val().trim() , password: form.find('.password_input').val().trim()}, function(response){

                   let object = $.parseJSON(response);

                   if(object.success) {
                       window.location.href = path + 'dashboard';
                   } else {
                       form.find('.alert-danger').removeClass('hidden').text(object.message);
                        form[0].reset();
                   }

               });
           }

        });


    $('.register_section')
        .on('click', '.aa-browse-btn.register_btn', function () {

            let _this = $(this),
                form = _this.closest('form');

            if(!form.find('.alert-danger').hasClass('hidden')) {
                form.find('.alert-danger').addClass('hidden').text('');
            }

            if(validateForm(form)) {


                $.post(path + 'register.php', form.serialize(), function(response){

                    let object = $.parseJSON(response);

                    console.log(object);

                    // if(object.success) {
                    //     window.location.href = path + 'dashboard';
                    // } else {
                    //     form.find('.alert-danger').removeClass('hidden').text(object.message);
                    //     form[0].reset();
                    // }

                });
            }

        });


    /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */
    
     jQuery(".aa-cartbox").hover(function(){
      jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
    }
      ,function(){
          jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
      }
     );   
  
  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */    
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */    

    jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif'
    });

    jQuery('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-popular-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });

  
  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-featured-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });
    
  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      
    jQuery('.aa-latest-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */     
    
    jQuery('.aa-testimonial-slider').slick({
      dots: true,
      infinite: true,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */  

    jQuery('.aa-client-brand-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */        

    // jQuery(function(){
    //   if($('body').is('.productPage')){
    //    var skipSlider = document.getElementById('skipstep');
    //     noUiSlider.create(skipSlider, {
    //         range: {
    //             'min': 0,
    //             '10%': 10,
    //             '20%': 20,
    //             '30%': 30,
    //             '40%': 40,
    //             '50%': 50,
    //             '60%': 60,
    //             '70%': 70,
    //             '80%': 80,
    //             '90%': 90,
    //             'max': 100
    //         },
    //         snap: true,
    //         connect: true,
    //         start: [20, 70]
    //     });
    //     // for value print
    //     var skipValues = [
    //       document.getElementById('skip-value-lower'),
    //       document.getElementById('skip-value-upper')
    //     ];
    //
    //     skipSlider.noUiSlider.on('update', function( values, handle ) {
    //       skipValues[handle].innerHTML = values[handle];
    //     });
    //   }
    // });


    
  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

    jQuery(window).scroll(function(){
      if ($(this).scrollTop() > 300) {
        $('.scrollToTop').fadeIn();
      } else {
        $('.scrollToTop').fadeOut();
      }
    });
     
    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });
  
  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function() { // makes sure the whole site is loaded      
      jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
    })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-related-item-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
    
    /* ----------------------------------------------------------- */
	/*  14. TOP SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */     
    
    jQuery('.seq-canvas').slick({
		dots: false,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear'
    });


    
});


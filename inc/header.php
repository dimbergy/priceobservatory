<?php include('./config.php'); ?>
<?php $page = BaseController::Page('header', $_SESSION['user_id']); ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?= $page['identifier'] == 'home' ? $site . ' | ' . $page['title'] :  $page['title'] . ' | ' . $site ?></title>
    
    <!-- Font awesome -->
    <link href="<?= $path ?>css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?= $path ?>css/bootstrap.css" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="<?= $path ?>css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="<?= $path ?>css/jquery.simpleLens.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?= $path ?>css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?= $path ?>css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="<?= $path ?>css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="<?= $path ?>css/style.css" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="https://farm1.staticflickr.com/579/32856143275_420a8267b2_o_d.png"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .fa-search {
            
            background: transparent;
         
        }
      
         .fa-envelope, .fa-lock, .fa-phone, .fa-map-pin, .fa-unlock-alt, .fa-mobile {
            color: #ff6666; 
        }
            
        address .fa-home {
            
    color: #ff6666; 
        }
        
        
        .navbar-nav li a .fa-home:hover {
        color: white;
        }
    

        #menu .menu-area .navbar-default .navbar-nav li a:hover {
  color: #ff6666;
    background-color: #fff;
  font-size: 16px;
  padding: 10px 15px;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -ms-transition: all 0.5s;
  -o-transition: all 0.5s;
  transition: all 0.5s;
}
    
        #aa-slider .aa-slider-area .seq-title h2 {
	background-color: rgba(255, 255, 255, 0.6); 
	color: #333;
	display: inline-block;
	float: none;
	font-family: 'Roboto',sans-serif;
	font-size: 50px;
	font-weight: normal;
	margin-top: 20px;
	padding-bottom: 10px;
	padding-top: 10px;
	text-align: center;
	text-transform: uppercase;
	width: 100%;
}
    
      </style>  
      
      
  </head>
  <!-- !Important notice -->
  <!-- Only for product page body tag have to added .productPage class -->
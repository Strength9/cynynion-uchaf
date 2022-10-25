<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php wp_title('');  ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,200;0,300;0,400;0,900;1,100;1,300;1,400&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body <?php body_class();?>>
<header>
  
  <nav class="navigation-menu">
	  <label class="menuopen" aria-label="Open navigation menu" for="menu-toggle">
	  <i class="fa-light fa-bars"></i></label>
	  <input type="checkbox" id="menu-toggle" /> 
	  <?php wp_nav_menu( array(  'menu' => 'Main Navigation','container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 3 , 'items_wrap' => ' <ul class="main-navigation">  <div class="logo"><a href="'.home_url().'"><img src="/wp-content/themes/cynynion-uchaf/assets/img/svg/cyn-white.svg" alt="" /></a></div>  <label for="menu-toggle"  aria-label="Close navigation menu" class="menuclose"><i class="fa-thin fa-square-xmark"></i></label>%3$s</ul>' ) );?>  
</nav>
</header> 
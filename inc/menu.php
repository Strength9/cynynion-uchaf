<header>
	<nav class="navigation-menu">
	  	<label class="menuopen" aria-label="Open navigation menu" for="menu-toggle">
	  	<i class="fa-light fa-bars"></i></label>
	  	<input type="checkbox" id="menu-toggle" />
	  	<?php wp_nav_menu( array(  'menu' => 'MainMenu','container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 3 , 'items_wrap' => ' <ul class="main-navigation"><label for="menu-toggle"  aria-label="Close navigation menu" class="menuclose"><i class="fa-thin fa-square-xmark"></i></label>%3$s</ul>' ) );?>  
	</nav>
</header>
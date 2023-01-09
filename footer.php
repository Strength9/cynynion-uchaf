<?php
$email_address = ! empty( get_field('email_address','options') ) ? '<li class="email"><a href="mailto:'.get_field('email_address','options').'" title="email the team">'.get_field('email_address','options').'</a></li>' : '';

$telephone_number = ! empty( get_field('telephone_number','options') ) ? '<li class="phone"><a href="tel:'.get_field('telephone_number','options').'" title="call the team">'.get_field('telephone_number','options').'</a></li>' : '';
$address = ! empty( get_field('address','options') ) ? '<li class="address">'.get_field('address','options').'</li>' : '';




$facebook = ! empty( get_field('facebook','options') ) ? '<li><a href="'.get_field('facebook','options').'" title="Find us on Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>' : '';
$instagram = ! empty( get_field('instagram','options') ) ? '<li><a href="'.get_field('instagram','options').'" title="Meet us on Instagram"><i class="fa-brands fa-instagram"></i></a></li>' : '';
$linkedin = ! empty( get_field('linkedin','options') ) ? '<li><a href="'.get_field('linkedin','options').'" title="Connect on LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a></li>' : '';
$tiktok = ! empty( get_field('tiktok','options') ) ? '<li><a href="'.get_field('tiktok','options').'" title="Watch us on Tik tok"><i class="fa-brands fa-tiktok"></i></a></li>' : '';



?>
<section class="quotations">
	
	<div class="overlay">
		<div>
			<!-- <div class="slider">
				<div class="slidertext">
					<div class="slide">
						<div><span>D - October 2022</span></div>
						Had a lovely stay in this traditional old farmhouse. Perfect for a get together with our growing family. Very comfortable home in a stunning location.
						
					</div>
					<div class="slide">
						<div><span>Paul - September 2022</span></div>
						I stayed here in September 2022. A great place to stay, accommodation and facilities all excellent. Some good places to visit nearby. Thank you.
			
						
		
					</div>
					<div class="slide">
						<div><span>Mark - September 2022</span></div>
						We had a wonderful stay in this lovely Farmhouse which is extremely well hosted by Samantha. It was our first booking at the house and we couldn’t have asked for more. We hope to be back soon.
						
					</div>
				</div>
			</div> -->
			<div class="google"><?php echo do_shortcode['[trustindex no-registration=google]'];?></div>
		</div>
	</div>
</section>
<footer>
	<div class="wcp-columns">
		 <div class="wcp-column full"><?php echo do_shortcode('[wpforms id="160"]');?></div>
		 <div class="wcp-column">
			 <ul class="contacts">
				 <li class="title">Contact Us</li>
				<?php echo $email_address;?>
				<?php echo $telephone_number;?>
				<?php echo $address;?>
			 </ul>
		 </div>
		 <div class="wcp-column hidesmall">
			 <?php wp_nav_menu( array(  'menu' => 'Quick Links','container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 1 , 'items_wrap' => '<ul class="nm"><li class="title">Find Out More</li>%3$s</ul>' ) );?>  
		 </div>
		 <div class="wcp-column hidemedium">
	 		<?php wp_nav_menu( array(  'menu' => 'Legal Menu','container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 1 , 'items_wrap' => '<ul class="nm"><li class="title">Legal Menu</li>%3$s</ul>' ) );?>  
		 </div>
		 <div class="wcp-column full">
			<ul class="socialmedia">
				 <?php echo $facebook.$instagram.$linkedin.$tiktok; ?>
			 </ul>
		 </div>
	</div>
	
</footer>
<div class="copyrightbar">
	<div class="wcp-columns">
		 <div class="wcp-column copy">
			 <div class="copycontent">
			 &copy; Copyright 2022 Cynynion Uchaf. Design & Build by <a href="https://strength9.co.uk" title="Strength 9  The Creative Design Agency">Strength 9</a>
			 </div>
		 </div>
		 <div class="wcp-column payment">
			 <ul>
			<li> <img src="/wp-content/themes/cynynion-uchaf/assets/img/payments/banktransfer.png" alt="Cynynion Uchaf payment methods"/></li>
		<li><img src="/wp-content/themes/cynynion-uchaf/assets/img/payments/maestro.png" alt="Cynynion Uchaf payment methods"/></li>
		 <li><img src="/wp-content/themes/cynynion-uchaf/assets/img/payments/mastercard.png" alt="Cynynion Uchaf payment methods"/></li>
		 <li><img src="/wp-content/themes/cynynion-uchaf/assets/img/payments/paypal.png" alt="Cynynion Uchaf payment methods"/></li>
		 <li><img src="/wp-content/themes/cynynion-uchaf/assets/img/payments/visa.png" alt="Cynynion Uchaf payment methods"/></li>
		  </div>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>


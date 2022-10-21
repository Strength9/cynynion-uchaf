
<?php
$email_address = ! empty( get_field('email_address','options') ) ? '<li class="email"><a href="mailto:'.get_field('email_address','options').'" title="email the team">'.get_field('email_address','options').'</a></li>' : '';

$telephone_number = ! empty( get_field('telephone_number','options') ) ? '<li class="phone"><a href="tel:'.get_field('telephone_number','options').'" title="call the team">'.get_field('telephone_number','options').'</a></li>' : '';
$address = ! empty( get_field('address','options') ) ? '<li class="address">'.get_field('address','options').'</li>' : '';

?>
<section class="quotations">
	
	<div class="overlay">
		<div>
			<div class="slider">
				<div class="slidertext">
					<div class="slide">
						Had a lovely stay in this traditional old farmhouse. Perfect for a get together with our growing family. Very comfortable home in a stunning location.
						<span class="by">D</span>
						<span class="date">October 2022</span>
					</div>
					<div class="slide">
						Stayed here September 2022. A great place to stay, accommodation and facilities all excellent. Some good places to visit nearby. Thank you.
						<span class="by">Paul</span>
						<span class="date">July 2022</span>
						
		
					</div>
					<div class="slide">
						We had a wonderful stay in this lovely Farmhouse which is extremely well hosted by Samantha.
						It was out first AirB&B booking and we couldn’t of asked for more.
						We hope to be back soon.
						<span class="by">Mark</span>
						<span class="date">September 2022</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<footer>
	<div class="wcp-columns">
		 <div class="wcp-column full">Sign Up</div>
		 <div class="wcp-column">
			 <ul class="contacts">
				 <li class="title">Contact Us</li>
				<?php echo $email_address;?>
				<?php echo $telephone_number;?>
				<?php echo $address;?>
			 </ul>
		 </div>
		 <div class="wcp-column">
			 <ul class="contacts">
				  <li class="title">Contact Us</li>
				 <li><a href="#">Contact Us</a></li>
				 <li><a href="#">Contact Us</a></li>
				 <li><a href="#">Contact Us</a></li>
				 <li><a href="#">Contact Us</a></li>
			  </ul>
		 </div>
		 <div class="wcp-column">
			 <ul class="contacts">
				 <li class="title">Contact Us</li>
				  <li><a href="#">Contact Us</a></li>
				  <li><a href="#">Contact Us</a></li>
				  <li><a href="#">Contact Us</a></li>
				  <li><a href="#">Contact Us</a></li>
			  </ul>
		 </div>
		 <div class="wcp-column">
			 <ul class="contacts">
				<li class="title">Contact Us</li>
				 <li><a href="#">Contact Us</a></li>
				 <li><a href="#">Contact Us</a></li>
				 <li><a href="#">Contact Us</a></li>
				 <li><a href="#">Contact Us</a></li>
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


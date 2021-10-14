	 <div class="dev">
			<div class="container">
				<div class="dev__item">
					<a href="/" class="dev__link">Copyright © <?php echo date("Y"); ?> Get License Fast</a>
				</div>
			</div>
		</div>
	<script>
		
		// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					document.getElementById("myBtn").style.display = "block";
				} else {
					document.getElementById("myBtn").style.display = "none";
				}
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
				document.body.scrollTop = 0; // For Safari
				document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
			} 
			
			
	</script>
	
	<!--Start of Tawk.to Script-->
<script>
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ab370834b401e45400df312/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	
	<script src="assets/scripts/jquery-3.1.0.min.js"></script>
	<script src="assets/scripts/jquery.formstyler.js"></script>
	<script src="assets/scripts/jquery.magnific-popup.min.js"></script>
	<script src="assets/scripts/swiper.min.js"></script>
	<script src="assets/scripts/jquery.knob.js"></script>
	<script src="assets/scripts/rome.min.js"></script>
	<script src="assets/scripts/imagesloaded.min.js"></script>
	<script src="assets/scripts/isotope.pkgd.min.js"></script>
	<script src="assets/scripts/sweetAlert.js"></script>
	<script src="assets/scripts/app.js"></script>
	
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145190042-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145190042-1');
</script>


	<?php include("scripts/booking.php"); ?>
	<?php include("scripts/instructorAction.php"); ?>
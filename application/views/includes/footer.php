<footer id="footer" class="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row gy-4">
				<div class="col-lg-5 col-md-12 footer-info">
					<a href="<?php echo site_url();?>" class="logo d-flex align-items-center">
						<img src="<?php echo base_url('assets/images/cow-logo.png') ?>"  alt="">
					</a>
					<p>The vision of Livestock247.com is to mitigate the spread of zoonotic diseases through the provision of fit-for-slaughter and traceable
						livestock to our customers.</p><br>
					<p>Follow us on all our social media platform</p>
					<div class="social-links mt-3">
						<a href="https://www.youtube.com/channel/UCYSw3HTXyWbc1rFKhlifK8Q/videos" class="youtube"><i class="fa fa-youtube-play"></i></a>
						<!--<a href="https://twitter.com/livestock247ng" class="twitter"><i class="bi bi-twitter"></i></a>-->
						<a href="https://web.facebook.com/Livestock247ng/" class="facebook"><i class="fa fa-facebook-square"></i></a>
						<a href="https://www.instagram.com/livestock247ng/" class="instagram"><i class="fa fa-instagram"></i></a>
						<a href="https://www.linkedin.com/company/livestock247/" class="linkedin"><i class="fa fa-linkedin-square"></i></a>
					</div>
				</div>

				<div class="col-lg-2 col-6 footer-links">
					<h4>QUICKLINKS</h4>
					<ul>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.com/aboutus">About us</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.com/blog">Blog</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.comfaq">Faq</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.comcareer">Career</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.comterms_and_condition">Terms of service</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.comprivacy">Privacy policy</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.comsitemap" >Site map</a></li>
					</ul>
				</div>

				<div class="col-lg-2 col-6 footer-links">
					<h4>Our Services</h4>
					<ul>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.com/clinic">Clinic</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.com/xpress">LivestockXpress</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.com/hoina">Hoina</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.com/livestalk">LivesTalk</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://livestock247.com/meat247">Meat247</a></li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-12 footer-contact text-md-start">
					<h4>Contact Us</h4>
					<p>
						<i class="fa fa-map-marker"></i> : 4th Floor, Valley View Plaza,<br>
						99 Opebi Road, Ikeja, <br>
						Lagos-Nigeria. <br>
						<strong><i class="fa fa-phone"></i> :</strong> 0906-290-3550<br>
						<strong><i class="fa fa-envelope"></i> :</strong> <a href="mailto:support@livestock247.com">support@livestock247.com</a>
					</p>
				</div>

			</div>
		</div>
	</div>

	<div class="container">
		<div class="copyright">
			&copy; <?php echo date('Y') ?><strong> <span><a href="<?php echo site_url();?>"> Livestock247.com</a></span></strong>. All Rights Reserved
		</div>
		<div class="credits">
		</div>
	</div>
</footer><!-- End Footer -->

<!--<script type="text/javascript" src="--><?php //echo base_url().'assets/js/jquery-3.2.1.min.js';?><!--"></script>-->
<!--<script type="text/javascript" src="--><?php //echo base_url().'assets/js/bootstrap/js/bootstrap.min.js';?><!--"></script>-->
<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js')?>"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url('assets/js/main.js')?>"></script>
<script>
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>
<footer>

 </footer>


 <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-top"  style="background-image:url(images/pattern/pt15.png);">
            <div class="container">
                <div class="row">
					<div class="col-xl-4 col-lg-$ col-md-4 col-4 col-sm-6 footer-col-4 col-12">
                        <div class="widget widget_about border-0">
							<div class="footer-title">
								<h5 class="title text-white">ABOUT US</h5>
								<div class="dlab-separator-outer">
									<div class="dlab-separator bg-primary style-skew"></div>
								</div>
							</div>
                            <p class="mm-t5">We are specialised in the business of providing smart solution for Cutting Tools &
Lubricants...</p>
						<li><i class="ti-location-pin"></i><strong>Address :</strong> BG/Se/11/3 Nr Tele. Exelen., MIDC Bhosari, Pune- 411039<br>Mall id : <a href="mailto:sales@ptslubricants.com">sales@ptslubricants.com</a> & Contact : <a href="tel:8530307007">8530307007</a>
                        <li><i class="ti-email"></i><strong>Email</strong> <a href="mailto:isales@ptslubricants.com"> 	sales@ptslubricants.com</a></li>
								<li><i class="ti-mobile"></i><strong>Phone</strong> <a href="tel:8530307007"> 8530307007</a></li>
                            </ul>
                        </div>
                    </div>
					
					<div class="col-xl-4 col-lg-$ col-md-4 col-4 col-sm-6 footer-col-4 col-12">
                        <div class="widget widget_services border-0">
							<div class="footer-title">
								<h5 class="title text-white">COMPANY</h5>
								<div class="dlab-separator-outer">
									<div class="dlab-separator bg-primary style-skew"></div>
								</div>
							</div>
							<ul class="mm-t10">
								<li><a href="#about-us">About Us</a></li>
								<li><a href="#products">Products</a></li>
								<li><a href="#contact">Location </a></li>
							</ul>
						</div>
                    </div>
                    <div class="col-xl-4 col-lg-$ col-md-4 col-4 col-sm-6 footer-col-4 col-12">
                        <div class="widget">
							<div class="footer-title">
								<h5 class="title text-white">OPENING HOURS</h5>
								<div class="dlab-separator-outer">
									<div class="dlab-separator bg-primary style-skew"></div>
								</div>
							</div>
							<ul class="thsn-timelist-list mm-t5">
								<li><span class="thsn-timelist-li-title">Mon - Tue</span><span class="thsn-timelist-li-value">10:00 – 18:00</span></li>
								<li><span class="thsn-timelist-li-title">Wed - Thur</span><span class="thsn-timelist-li-value">10:00 – 17:00</span></li>
								<li><span class="thsn-timelist-li-title">Fri - Sat</span><span class="thsn-timelist-li-value">10:00 – 12:30</span></li>
								<li><span class="thsn-timelist-li-title">Saturday</span><span class="thsn-timelist-li-value">10:00 – 12:30</span></li>
								<li><span class="thsn-timelist-li-title">Sunday</span><span class="thsn-timelist-li-value">Closed</span></li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer bottom part -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 text-left "> <span><p>2022 &copy; Designed &amp; developed by  <a style="text-decoration: underline;" href="https://droptech.in/" target="_blank">Droptech Solution Pune</a></p></span> </div>
                    <div class="col-md-6 col-sm-6 text-right "> 
						<div class="widget-link"> 
							<ul>
								<li><a href="#about-us"> About</a></li> 
								<li><a href="#contact"> Contact Us</a></li> 
							</ul>
						</div>
					</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END-->
    <button class="scroltop style1 icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
    <input type="hidden" value="<?php echo OWNERWHATSAPPNUMBER;?>" id="whatsAppNumber"/> 
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="js/combining.js"></script><!-- Combining JS  -->
<!-- REVOLUTION JS FILES -->
<script src="plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="js/rev.slider.js"></script>
<script src="assets/droptech.js"></script>
<script>
jQuery(document).ready(function() {
	dz_rev_slider_4();
$(".at-expanding-share-button-toggle , .DZ-bt-support-now , .DZ-bt-buy-now").hide();
	setTimeout(function(){ 
		$(".at-expanding-share-button-toggle , .DZ-bt-support-now , .DZ-bt-buy-now").show();
		$(".DZ-bt-support-now").attr("href",'tel:+919890201014');
		$(".DZ-bt-support-now").html("<i class='fa fa-phone'>");
		$(".DZ-bt-buy-now").attr("href",'https://api.whatsapp.com/send/?phone=91'+$("#whatsAppNumber").val()+'&amp;text=Hi%20My%20name%20is%20Tushar,%20How%20may%20i%20help%20you?');
		$(".DZ-bt-buy-now").html("<i class='fa fa-whatsapp'>");
	}, 5000);
});	/*ready*/
</script>
</body>
</html>
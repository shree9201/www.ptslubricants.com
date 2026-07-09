<?php 
require_once 'service/constant.php';
require_once 'components/header.php'; 
?>


    <!-- Content -->
    <div class="page-content bg-white">
	<?php require_once 'components/hero.php';?>
        <!-- contact area -->
        <div class="content-block">
			<!-- Content Section -->
			<div class="section-full content-inner bg-white" id="about-us" style="background-image: url(images/pattern/pt13.png);">
				<div class="container">
				<?php require_once 'components/about.php';?>
				</div>
			</div>
			<?php require_once 'components/states.php';?>
			<?php require_once 'components/products.php';?>
			<?php require_once 'components/downlaod.php';?>
			<?php require_once 'components/team.php';?>
			<?php require_once 'components/testimonial.php';?>
			<?php require_once 'components/contact.php';?>
			<!-- Latest blog -->
			<!-- Blog -->
			<!-- Latest blog END -->
			<div class="section-full p-tb40 bg-primary construct-action text-white" style="background-image: url(images/pattern/pt5.png);">
				<div class="container">
					<div class="row spno">
						<div class="col-sm-6 col-6">
							<a href="mailto:<?php echo OWNEREMAIL;?>"><i class="las la-envelope-open"></i> <?php echo OWNEREMAIL;?></a>
						</div>
						<div class="col-sm-6 col-6 text-right">
							<a href="tel:<?php echo OWNERCONTACTNUMBER;?>">Support: <?php echo OWNERCONTACTNUMBER;?><i class="las la-phone-volume"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- contact area END -->
    </div>
    <!-- Content END -->
	<?php require_once 'components/footer.php';?>
<div class="section-full content-inner bg-white" id="products" style="background-image: url(images/pattern/pt13.png);">
				<div class="container">
					<div class="section-head text-center">
						<h5 class="title-small">Your Partner</h5>
						<div class="dlab-separator-outer">
							<div class="dlab-separator bg-primary style-skew"></div>
						</div>
						
					</div>
					<div class="row">
					<?php 
						//showItem('Turning Inserts','terningInserts.png','0.3s');
						//showItem('CBN & PCD Inserts','CBN-PCD-Inserts.png','0.6s');
						//showItem('External Turning','ExternalTurning.png','0.9s');
						//showItem('Small Tools','smallTools.jpg','1.2s');
						//showItem('Grooving','Grooving.png','1.5s');
						
						//showItem('Boring Bars','bb.png','1.8s');
						//showItem('Threading','Threading.png','2.1s');
						//showItem('HSK-T Tools','HSK.png','2.4s');
						
						
						//showItem('SolidEnd Mills / Exchangeable Head Ends Mills','solid.png','2.7s');
						//showItem('Milling Inserts','minsert.png','3.0s');
						//showItem('Milling','Milling.png','3.3s');
						//showItem('Drilling','Drilling.png','3.6s');
						
						
						
						
						
					?>
					</div>
				</div>
			</div>
			
			
			
<?php 
function showItem($title,$img,$delay){
	?>
	<div class="col-lg-4 col-md-6 col-sm-6 m-b30 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="<?php echo $delay;?>s">
							<div class="dlab-box service-box-3">
								<div class="dlab-media radius-sm dlab-img-overlay1 zoom dlab-img-effect"> 
									<a href="javascript:void(0);"><img width="700" height="500" src="assets/images/<?php echo $img;?>" alt="<?php echo $title;?>"></a> 
								</div>
								<div class="dlab-info">
									<div class="icon-bx-sm bg-white">
										<span class="icon-cell"><img src="assets/images/iconpin.png" width="60" height="60" alt=""/></span>
									</div>
									<h4 class="title"><a href="javascript:void(0);"><?php echo $title;?></a></h4>
								</div>
							</div>
						</div>
	<?php 
}
?>			
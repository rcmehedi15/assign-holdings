<?php
$this->load->view('frontend/header.php');
?>
<style>
@media screen and (max-width: 600px) {
	.commonbox1{
		left:0px !important;
		margin-left: -130px !important;
		width: 320px !important;
		word-wrap: break-word !important;
		white-space: initial !important;
		margin-top:-225px !important;
		font-size: 35px !important;
		line-height: 40px !important;
	}
	.commonbox2{
		left:0px !important;
		margin-left: -130px !important;
		width: 320px !important;
		word-wrap: break-word !important;
		white-space: initial !important;
		margin-top:-200px !important;
		
	}
}
</style>
        <div class="banner-slider-wrapper">
	<a href="#assign-holding-about-section" class="animate-scroll scroll-down">
			<img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/arrow-down.svg" alt="down arrow">
	</a>
	<div id="layerslider" class="fitvidsignore" style="width:100%; height:100%;">
				
				<?php
				$banners = $this->db->query("select *from banners where status='1'")->result();
				$sflag = 1;
				foreach($banners as $value){
					$boxone = "";
					$boxtwo = "";
					$backgroundone = "";
					$backgroundtwo = "";
					if($sflag == 1)
					{
						$boxone = "height:80px; width: 365px;left: 150px; top: 400px;";
						$boxtwo = "height:240px; width:400px;top: 450px; left: 150px;";
						//$backgroundone = "background: rgba(174, 238, 88, 0.7) none repeat scroll 0% 0%;";
						//$backgroundtwo = "background: rgba(0,0,0,.6) none repeat scroll 0% 0%;";
					}
					elseif($sflag == 2)
					{
						$boxone = "height:80px; width: 565px;left: 150px; top: 400px;";
						$boxtwo = "height:200px; width:400px;top: 450px; left: 150px;";
						//$backgroundone = "background: rgba(174, 238, 88, 0.7) none repeat scroll 0% 0%;";
						//$backgroundtwo = "background: rgba(0,0,0,.6) none repeat scroll 0% 0%;";
					}
					elseif($sflag == 3)
					{
						$boxone = "height:80px; width: 490px;left: 150px; top: 400px;";
						$boxtwo = "height:45px; width:390px;top: 450px; left: 150px;";
						//$backgroundone = "background: rgba(174, 238, 88, 0.7) none repeat scroll 0% 0%;";
						//$backgroundtwo = "background: rgba(0,0,0,.6) none repeat scroll 0% 0%;";
					}
					else
					{
						$boxone = "height:80px; width: 735px;left: 150px; top: 400px;";
						$boxtwo = "height:90px; width:420px;top: 450px; left: 150px;";
						//$backgroundone = "background: rgba(174, 238, 88, 0.7) none repeat scroll 0% 0%;";
						//$backgroundtwo = "background: rgba(0,0,0,.6) none repeat scroll 0% 0%;";
					}
				?>
				<div data-color="#AAA000" class="ls-slide banner-slider-item slider_topper" data-ls="slidedelay:5500;transition2d:12;">
						<img src="<?php echo base_url(); ?>asset/images/banners/<?php echo $value->image; ?>" class="ls-bg" alt="<?php echo SITE_NAME; ?>'s Slide">
						<div class="ls-wrapper ls-in-out" data-slide-index="<?php echo $sflag; ?>" style="z-index: 112; margin-left: 0px; margin-top: 0px; <?php echo $boxone; ?> transform: translate3d(0px, 0px, 0px); transform-origin: 0px 50% 0px; opacity: 1; display: none;"><p style="<?php echo $boxone; ?> padding: 0px 9.375px; font-family: DIN Next LT Pro, &quot;Open Sans&quot;, sans-serif; font-size: 45px; line-height: 80px; color: rgba(174, 238, 88); <?php echo $backgroundone; ?> border-radius: 4px; margin: 0px; z-index: auto; border-width: 0px; letter-spacing: 0px; filter: none;" class="ls-layer commonbox1" data-ls="offsetxin:80;durationin:1500;delayin:100;rotatein:20;rotatexin:30;scalexin:1.5;scaleyin:1.5;transformoriginin:left 50% 0;offsetxout:-80;durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left 50% 0;parallaxlevel:0;" data-ls-slidein="<?php echo $sflag; ?>" data-ls-slideout="<?php echo $sflag; ?>"><?php echo $value->title; ?></p></div>
						<div class="ls-wrapper ls-in-out" data-slide-index="<?php echo $sflag; ?>" style="z-index: 113; margin-left: 0px; margin-top: 0px; <?php echo $boxtwo; ?> transform: translate3d(0px, 0px, 0px); transform-origin: 25% 50% 0px; opacity: 1; display: none;"><p style="font-family: DIN Next LT Pro, &quot;Open Sans&quot;, sans-serif; font-size: 25px; color: white; <?php echo $backgroundtwo; ?> margin: 0px; z-index: auto; <?php echo $boxtwo; ?> border-radius: 4px; padding: 10px; border-width: 0px; border-radius: 4px; line-height: 40px; letter-spacing: 0px; filter: none;" class="ls-layer commonbox2" data-ls="durationin:1500;delayin:400;rotateyin:90;skewxin:60;transformoriginin:25% 50% 0;offsetxout:100;durationout:750;skewxout:60;parallaxlevel:0;" data-ls-slidein="<?php echo $sflag; ?>" data-ls-slideout="<?php echo $sflag; ?>"><?php echo $value->description; ?></p></div>
				</div>
				<?php
					$sflag++;
				}
				?>											
	</div>

	
</div>



<?php
					$content2 = $this->db->query("select *from contents where section_code='Home2'")->row();
					?>
    <section id="assign-holding-about-section" class="section-gap pt-100 bg-light-grey why-us pb-0 bg-cover-center parallax-container parallax-img" data-stellar-background-ratio="0.1" style="background-image: url(<?php echo base_url(); ?>asset/images/contents/<?php echo $content2->image; ?>);" data-image-src="<?php echo base_url(); ?>asset/images/contents/<?php echo $content2->image; ?>">
        <div class="container-fluid">
            <div class="mb-30 hide">
                <h2 class="heading-primary  text-green">
                    <?php echo $content2->title; ?>               </h2>
            </div>
            <div class="row pt-70 mobile-pt-0">
                <div class="col-sm-6 col-md-5 ">
									<h2 class="heading-primary  text-black">
											<?php echo $content2->title; ?> 									</h2>
									<div class="text-gray">
											<p><?php echo $content2->description; ?> </p>
									</div>
									<div class="mb-30">
											<a href="<?php echo base_url(); ?>aboutus/" class="hidden-xs button button-outline button-outline-black assign-about-segment-hover mtb-30">
													Explore
											</a>
									</div>

									<div class="image-box-holder flow-down hide">
											<div class="image-box  " style="background-image: url(<?php echo base_url(); ?>asset/images/contents/<?php echo $content2->image; ?>);">
													<div class="inner-content text-white text-bold">
															<p>
																	<?php echo $content2->description; ?>															</p>
															<a href="<?php echo base_url(); ?>aboutus/" class="button button-outline button-outline-white">
																	Explore
															</a>
													</div>
											</div>
									</div>
                </div>
                <div class="col-sm-6 col-md-6 col-md-offset-1 mb-70 mobile-mb-0">
                    <div class="bordered-tiles our-specility-lightbox-wrapper mobile-mb-0 stagger-wrapper mb-0">
                        <div class="row  parent">

                            <?php 
							$items = $this->db->query("select *from why where status='1'")->result();
							$cnt = 1;
							foreach($items as $value){
							?>
                                <div class="col-xs-4 col-sm-6 col-md-4 borderd-tile-item mb-30 no-border sm">
                                    <a href="#specility-lightbox-<?php echo $cnt; ?>" class="lbox-btn assign-home-about-circle">
                                        <div class="inner">
                                            <div class="content">
                                                <div class="table-all">
                                                    <span class="vertical-center">
                                                        <span class="tile-text">
                                                            <?php echo $value->title; ?>                                                      </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
							<?php
							$cnt++;
							}
							?>
                            

                        </div>
                        <div class="visible-xs ">
                            <a href="why-shanta-holdings.html" class="button button-outline button-outline-white mt-30 mb-100">
                                Explore
                            </a>
                        </div>
                        <div class="lightbox-content-wrapper">
                            <?php
							$cnt = 1;
							foreach($items as $value){ 
							?>
                                <div id="specility-lightbox-<?php echo $cnt; ?>" class="specility-lightbox-item text-left bg-white ">
                                    <a href="#" class="close-lightbox text-30">
                                        <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/global-menu-close-black.svg" alt="close">
                                    </a>
                                    <div class="inner">
                                        <h3 class="title text-18 mb-20"><?php echo $value->title; ?></h3>
                                        <div class="desc">
                                            <p>
											<?php echo $value->description; ?>
											</p>
                                        </div>
                                    </div>
                                </div>

                            <?php
							$cnt++;
							}
							?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
					$content1 = $this->db->query("select *from contents where section_code='Home1'")->row();
					?>
<section id="lands-to-landmark" class="section-gap parallax-container" data-stellar-background-ratio="0.1" style="background-image: url(<?php echo base_url(); ?>asset/images/contents/<?php echo $content1->image; ?>)" data-image-src="<?php echo base_url(); ?>asset/images/contents/<?php echo $content1->image; ?>">
    <div class="container-fluid assign-featured-home-project">
                    <div class="row mb-40">
                <div class="col-sm-7 col-md-12">
					
                    <h2 class="heading-primary style-1"><?php echo $content1->title; ?></h2>
                    <p class="text-white"><?php echo $content1->description; ?></p>
                </div>
            </div>
        
        
            <div class="row">
                <div class="col-xs-12">
                    <div class="carousel-wrapper has-shadow">
                        <div class="carousel-primary slick-theme">
                        <?php
						$projects = $this->db->query("select *from projects where display_at_home_page='1' order by sort_order asc")->result();
						
						foreach($projects  as $value){
						?>   
                                <div class="carousel-item">
                                    <div class="inner">
                                        <a href="<?php echo base_url(); ?>projects/details/<?php echo $value->id; ?>">
                                            <div class="image-thumb high-contrast assign-featured-home-project-image">
                                                <img src="<?php echo base_url(); ?>asset/images/projects/<?php echo $value->ataglance_image; ?>" alt="<?php echo $value->name; ?>" title="<?php echo $value->name; ?>" height="">
                                            </div>
                                          <h3 class="title text-green"><?php echo $value->name; ?></h3>
                                            <h5 class="text-white"><?php echo $value->address; ?></h5>
                                                                                            <span class="read-more">
                                                    <?php
													if($value->type==1)echo 'Residential';
													else if($value->type==1)echo 'Commercial';
													?>                                                </span>
                                            
                                        </a>
                                    </div>
                                </div>

                        <?php
						}
						?>   

						
                        </div>
                        <div class="carousel-nav">
                            <img class='prev slick-prev' src='<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/arrow_Dark_left.svg'  data-src='/themes/real_estate/assets/img/icons/arrow_colored_left.svg'  alt="Arrow left">
                            <img class='next slick-next' src='<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/arrow_Dark_right.svg' data-src='/themes/real_estate/assets/img/icons/arrow_colored_right.svg'  alt="Arrow right">
                        </div>
                    </div>
                </div>
            </div>

        
    </div>
</section>

<?php /*?>
<div class="msg_cont_wrap msg_closed">

	<div class="contact-form custom-select msg_form">
		<img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/global-menu-close-black.svg" class="close_btn">
		<h3 class="title mb-30 text-color-11">Send us a message</h3>
		






		<form id="question-general" class="dynamic_form form-primary" action="http://www.shantaholdings.com/site/dynamic_form" method="post" data-pjax="false">
<input type="hidden" name="_csrf-frontend" value="TlhwNGw1LWoIFRJkJQdrBS0JAVonWE8pYzUKUSAGfVMpPxhdFUJjJA==">
					<!-- form full -->
					<input type="hidden" id="question-general" class="form-control" name="form_id" value="question-general">

					

<div class="form-message-container success_wrapper hide success_wrapper_question-general">
    <div class="form-message-body">
        <div class="cross-popup" data-msg-close>
            X
        </div>
        <span class="success_container_question-general"></span>
        <div>
            <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
        </div>
    </div>
</div>
<div class="form-message-container error_wrapper hide error_wrapper_question-general">
    <div class="form-message-body">
        <div class="cross-popup" data-msg-close>
            X
        </div>
        <span class="error_container_question-general"></span>
        <div>
            <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
        </div>
    </div>
</div>
					
													<div class="form-group field-contact-name has-child-pad field-contact-name required">
     <input type="text" id="name" class="form-control" name="Dynamicform[name]" placeholder="Enter your name here">
<p class="help-block help-block-error"></p>
</div>							
					
													<div class="form-group field-contact-name has-child-pad field-contact-name required">
     <input type="text" id="email" class="form-control" name="Dynamicform[email]" placeholder="Enter your email here">
<p class="help-block help-block-error"></p>
</div>							
													<div class="form-group field-contact-message required">
	<textarea id="Message" class="form-control" name="Dynamicform[Message]" placeholder="Enter your feedback here"></textarea>
<p class="help-block help-block-error"></p>
</div>
					
					
					<div class="mt-20">
<button type="submit" class="btn text-bold no-bg no-radius no-border dynamic_submit_btn">Submit</button>
				</div>

							<!-- end of form full -->
		
		</form>



	</div>


		<div class="msg_cont">

		</div>
		<img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/feedback-icon.svg" class="msg_icon">
</div>
<?php */?>
<?php
$this->load->view('frontend/footer.php');
?>



<?php
$this->load->view('frontend/header.php');

?>  
<style>

	.featuresection{
		min-height:300px;
	}

</style>     
 
<div class="banner-slider-wrapper overflow-hidden">
		<a href="#feature_amenity" class="animate-scroll scroll-down">
				<img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/arrow-down.svg" alt="down arrow">
		</a>
		<div class="banner-bar">

		</div>
		<div class="section-gap project-detail-info fullscreen-content pb-0">
				<div class="overlay-layer" style="background-color: #231F20;"></div>
				<div class="container-fluid full-height full-height-sm">

						<div class="row full-height-sm project-title-row">
								<div class="col-sm-5 col-md-5 project-short-info full-height full-height-sm">
										<h2 class="heading-primary text-white">
												<?php echo $project_info->name; ?>										</h2>
										<span><?php echo $project_info->address; ?>
</span>
										<p class="mt-40"><?php echo $project_info->description; ?></p>
										<p>Contact : +88017300 62 128</p>
								</div>
						</div>
						<div class="row  full-height-sm project-info-row">
						</div>
				</div>
		</div>

		<div id="layerslider" class="fitvidsignore" style="width:100%; height:100%;">
					
					<?php
					$banners = unserialize($project_info->banner);
					foreach($banners as $val){
					?>
					<div data-color="#006b5f" class="ls-slide banner-slider-item slider_topper" data-ls="slidedelay:5500;transition2d:12;">
	 						<img src="<?php echo base_url(); ?>asset/images/projects/<?php echo $val; ?>" class="ls-bg" alt="Projects Slide">
	 				</div>
					<?php
					}
					?>
					
		</div>
</div>


<section id="at-a-glance" class=" our-background">
    <div class="clearfix">
        <div class="col-sm-6 no-pad parallax-holder col-sm-46-percent" style="background-image: url(<?php echo base_url(); ?>asset/images/projects/<?php echo $project_info->ataglance_image; ?>);">

        </div>
        <div class="col-sm-6 no-pad col-sm-push-6 col-sm-54-percent col-sm-push-46-percent">
            <div class="content-holder no-before-after bg-white section-gap">
                <h2 class="heading-primary style-1 mb-20" style="color: #000000 !important;">
                    At a Glance 
                </h2>
                <div class="feature-details-box-wrapper mb-50">
                  <div class="feature-details mt-20">
                    <?php echo $project_info->ataglance_content; ?>
                  </div>
					<a href="#" class="button button-outline button-outline-blackish mt-30 explore-btn">
                        Expand
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
					$content1 = $this->db->query("select *from contents where section_code='Home1'")->row();
					?>
<section id="features-n-amenities" class="section-gap section-gap-bottom-features_amenities features_amenities featuresection" style="background-image: url(<?php echo base_url(); ?>asset/images/contents/<?php echo $content1->image; ?>)" data-image-src="<?php echo base_url(); ?>asset/images/contents/<?php echo $content1->image; ?>">
    <div class="container-fluid">
        <div class="mb-5">
            <h2 class="heading-primary text-green" style="text-align: center;">
                Common Facilities
            </h2>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="feature-details-box-wrapper mb-50">
                  <div class="feature-details mt-20 text-white" style="text-align: center;">
                    <?php echo $project_info->features_content; ?>

                  </div>
              </div>
            </div>
        </div>
    </div>
</section>
<?php 
error_reporting(0);
$fimage = unserialize($project_info->features_image);
if($fimage && $project_info->status == 1)
{
	foreach($fimage as $fval){
?>
<section id="features-n-amenities" class="section-gap section-gap-bottom-features_amenities features_amenities" style="padding-top:0px !important; padding-bottom:0px !important; width:100%;" data-image-src="<?php echo base_url(); ?>asset/images/projects/<?php echo $fval; ?>">
<img style="width:100%" src="<?php echo base_url(); ?>asset/images/projects/<?php echo $fval; ?>" class=".img-responsive">
</section>
<?php
	}
}
?>
<?php 
if($project_info->status == 1)
{
?>
<section id="interior--exterior-gallery" class="project-gallery pb-70 pt-70">
    <div class="container-fluid">
      <div class="mb-50">
        <h1 class="style-1 text-black" style="text-align: center;">
          Gallery
        </h1>
      </div>
    </div>

    <div class="gallery-wrapper light-gallery">
        <div class="overflow-hidden">
		
		<?php
		$gallery = unserialize($project_info->gallery);
		foreach($gallery as $val){
		?>
                    <div class="col-xs-6 col-sm-4 col-md-4">
                      <div class="row">
                        <a href="<?php echo base_url(); ?>asset/images/projects/<?php echo $val; ?>"
                          data-sub-html="<h4>
                            Skymark                                                        </h4>">
                            <div class="gallery-image-container high-contrast">
                                <div class="image-thumb">
                                    <img src="<?php echo base_url(); ?>asset/images/projects/<?php echo $val; ?>" alt="">
                                </div>
                                <div class="gallery-image-hover">
                                                                  </div>
                            </div>
                        </a>
                      </div>
                    </div>

					
		<?php
		}
		?>		
						
		</div>
    </div>
</section>
<?php } ?>

<!-- <section id="map-location" class="location-map-wrapper">
	<div class="container-fluid">
		<div class="mb-50" <?php if($project_info->status == 3){ ?>style="padding-top: 50px;"<?php } ?>>
			<h1 class="style-1 text-black" style="text-align: center;">
				Location
			</h1>
		</div>
	</div>

		<div id="map" class="location-map-holder"></div>
</section> -->

<script>
		// -------------------------------
		function initMap() {
			var geocoder;
			var address ="<?php echo $project_info->address; ?>";
			//alert(address);
			//var mapLatitude = 23.78262222;
			//var mapLongitude = 90.41665556;
			//var latlong = {lat: mapLatitude, lng: mapLongitude};
			var latlong = null;
			geocoder = new google.maps.Geocoder();
			geocoder.geocode( { 'address': address}, function(results, status) {
				//alert(status);
				if (status == google.maps.GeocoderStatus.OK) {
				  if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
					  latlong = results[0].geometry.location;
				  }
				}
				//alert(latlong);
				var iconPath = "<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/map-pointer-main.svg";
				//alert(latlong);
				var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 15,
						scrollwheel: false,
						mapTypeControl: false,
						streetViewControl: false,
						center: latlong,
						styles: [
								  {
								   "featureType": "all",
								   "elementType": "all",
								   "stylers": [
									{
									 "visibility": "on"
									}
								   ]
								  },
								  {
								   "featureType": "all",
								   "elementType": "geometry.fill",
								   "stylers": [
									{
									 "weight": "2.00"
									},
									{
									 "visibility": "on"
									}
								   ]
								  },
								  {
								   "featureType": "all",
								   "elementType": "geometry.stroke",
								   "stylers": [
									{
									 "color": "#fc0000"
									}
								   ]
								  },
								  {
								   "featureType": "all",
								   "elementType": "labels.text",
								   "stylers": [
									{
									 "visibility": "on"
									}
								   ]
								  },
								  {
								   "featureType": "administrative.country",
								   "elementType": "geometry.fill",
								   "stylers": [
									{
									 "visibility": "on"
									}
								   ]
								  },
								  {
								   "featureType": "landscape",
								   "elementType": "all",
								   "stylers": [
									{
									 "color": "#f2f2f2"
									}
								   ]
								  },
								  {
								   "featureType": "landscape",
								   "elementType": "geometry.fill",
								   "stylers": [
									{
									 "color": "#ffffff"
									}
								   ]
								  },
								  {
								   "featureType": "landscape.man_made",
								   "elementType": "geometry.fill",
								   "stylers": [
									{
									 "color": "#ffffff"
									}
								   ]
								  },
								  {
								   "featureType": "poi",
								   "elementType": "all",
								   "stylers": [
									{
									 "visibility": "off"
									}
								   ]
								  },
								  {
								   "featureType": "road",
								   "elementType": "all",
								   "stylers": [
									{
									 "saturation": -100
									},
									{
									 "lightness": 45
									}
								   ]
								  },
								  {
								   "featureType": "road",
								   "elementType": "geometry.fill",
								   "stylers": [
									{
									 "color": "#eeeeee"
									}
								   ]
								  },
								  {
								   "featureType": "road",
								   "elementType": "labels.text.fill",
								   "stylers": [
									{
									 "color": "#7b7b7b"
									}
								   ]
								  },
								  {
								   "featureType": "road",
								   "elementType": "labels.text.stroke",
								   "stylers": [
									{
									 "color": "#ffffff"
									}
								   ]
								  },
								  {
								   "featureType": "road.highway",
								   "elementType": "all",
								   "stylers": [
									{
									 "visibility": "simplified"
									}
								   ]
								  },
								  {
								   "featureType": "road.arterial",
								   "elementType": "labels.icon",
								   "stylers": [
									{
									 "visibility": "off"
									}
								   ]
								  },
								  {
								   "featureType": "transit",
								   "elementType": "all",
								   "stylers": [
									{
									 "visibility": "off"
									}
								   ]
								  },
								  {
								   "featureType": "water",
								   "elementType": "all",
								   "stylers": [
									{
									 "color": "#46bcec"
									},
									{
									 "visibility": "on"
									}
								   ]
								  },
								  {
								   "featureType": "water",
								   "elementType": "geometry.fill",
								   "stylers": [
									{
									 "color": "#c8d7d4"
									}
								   ]
								  },
								  {
								   "featureType": "water",
								   "elementType": "labels.text.fill",
								   "stylers": [
									{
									 "color": "#070707"
									}
								   ]
								  },
								  {
								   "featureType": "water",
								   "elementType": "labels.text.stroke",
								   "stylers": [
									{
									 "color": "#ffffff"
									}
								   ]
								  }
								 ]
				});
				var infoWindow = new google.maps.InfoWindow(
								{
										content: '<div class=\"map-window\">' +
										'<h3><?php echo $project_info->name; ?></h3>' +
	//                            '<h3>Assign Holdings Limited</h3>' +
										'</div>'
								}
				);
				var marker = new google.maps.Marker({
						position: latlong,
						map: map,
	//                    title: 'Northern Lights.',
						icon: iconPath,
				});
				google.maps.event.addListener(marker, 'click', function () {
						infoWindow.open(map, marker);
				});
				/*infoWindow.open(map.map, marker);*/
				google.maps.event.addListenerOnce(map, 'idle', function () {
						function hideMapLink(el) {
								el = jQuery(el).length ? jQuery(el) : jQuery('#map');
								if (el.length) {
										var mapLinks = el.find('a');
										if (mapLinks.length) {
												mapLinks.hide(0);
												mapLinks.each(function () {
														if (jQuery(this).next('span').length) {
																jQuery(this).next('span').hide(0);
														}
												});
										}
								}
						}

						hideMapLink();
				});
			});
			
			
		}

</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcFWRXxx-r-FKDO587EmqLQw6kq2pTXCE&amp;callback=initMap"></script>
<?php /*?>
<section class="who-we-are-section section-gap bg-grey pb-40">
    <div class="container-fluid">
        <div class="mb-40">
            <h2 class="heading-primary text-white">Book Now </h2>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6">
							<div class="image-box-holder">
																	<div class="image-box " style="background-image: url(<?php echo base_url(); ?>asset/frontend_template/admin/uploads/product/skymark/1491632163yepP6.jpg);">
									</div>
							</div>
            </div>

						<div class="col-sm-6 col-md-6">
							






		<form id="book-now" class="dynamic_form form-primary all-text-white custom-select" action="<?php echo base_url(); ?>contact/booking_request" method="post" data-pjax="false">

					<!-- form full -->
					<input type="hidden" id="book-now" class="form-control" name="form_id" value="book-now">

					

<div class="form-message-container success_wrapper hide success_wrapper_book-now">
    <div class="form-message-body">
        <div class="cross-popup" data-msg-close>
            X
        </div>
        <span class="success_container_book-now"></span>
        <div>
            <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
        </div>
    </div>
</div>
<div class="form-message-container error_wrapper hide error_wrapper_book-now">
    <div class="form-message-body">
        <div class="cross-popup" data-msg-close>
            X
        </div>
        <span class="error_container_book-now"></span>
        <div>
            <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
        </div>
    </div>
</div>
					
											<div class="othersss">

							<input type="hidden" id="project_title" class="form-control" name="Dynamicform[project_title]" value="Skymark">

						</div>
					
					
													<div class="form-group">
<div>
	<label class="control-label" for="name">Name*</label>
	<input type="text" id="name" class="form-control" name="name" placeholder="Enter your full name here" >
        <div class="hint-block"></div>
</div>
</div>							
					
													<div class="form-group">
<div>
	<label class="control-label" for="email">Email</label>
	<input type="text" id="email" class="form-control" name="email" placeholder="Enter your email ID here" >
        <div class="hint-block"></div>
</div>
</div>							
					
													<div class="form-group">
<div>
	<label class="control-label" for="phone">Contact number*</label>
	<input type="text" id="phone" class="form-control" name="phone" placeholder="Enter your contact number here" >
        <div class="hint-block"></div>
</div>
</div>							
													<div class="form-group">
<div>
	<label class="control-label" for="Message">Message</label>
<textarea id="Message" class="form-control" name="Message" placeholder="Enter your message here" ></textarea>
        <div class="hint-block"></div>
</div>
</div>
					
					
											<div class="form-group no-border">
		          <div>
									<button type="submit" class="dynamic_submit_btn button button-outline button-outline-white mt-30">Book Now</button>							</div>
						</div>
					

							<!-- end of form full -->
		
		</form>



						</div>
        </div>
    </div>
</section>
<?php */?>
<?php /*?>
<a href="../../projects/handover.html">
	<div class="back-cont">
	</div>
	<img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/undo-arrow.svg" class="msg_icon">
</a>
<?php */?>

<?php
$this->load->view('frontend/footer.php');
?>

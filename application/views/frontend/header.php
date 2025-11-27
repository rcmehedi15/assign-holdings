<!DOCTYPE html>
<html lang="en-US">
<?php
$urisegment = $this->uri->segment(2);
if($urisegment=='index'){
	$title = SITE_TITLE;
	$keywords = SITE_METAKEYS;
	$description = SITE_METADESCRIPTION;
	$logo = SITE_LOGO;
	$favicon = SITE_FAVICON;
}
else{
	$page_info = $this->db->query("select *from pages where name='".$urisegment."'")->row();
	if($page_info){
		$title = $page_info->metatitle;
		$keywords = $page_info->metakeyword;
		$description = $page_info->metadescription;
		$logo = SITE_LOGO;
		$favicon = SITE_FAVICON;
	}
	else{
		$title = SITE_TITLE;
		$keywords = SITE_METAKEYS;
		$description = SITE_METADESCRIPTION;
		$logo = SITE_LOGO;
		$favicon = SITE_FAVICON;
	}
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token" content="TlhwNGw1LWoIFRJkJQdrBS0JAVonWE8pYzUKUSAGfVMpPxhdFUJjJA==">
    <title><?php echo $title; ?></title>

    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>asset/images/<?php echo $favicon; ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/images/<?php echo $favicon; ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/images/<?php echo $favicon; ?>" sizes="16x16">
    <link rel="manifest" href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/manifest.json">
    <link rel="mask-icon" href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/safari-pinned-tab.svg" color="#8b8232">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/<?php echo $favicon; ?>">
    <meta name="msapplication-config" content="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    

	

    <meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $description; ?>">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" media="all">
<link href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/css/bundle.min.css" rel="stylesheet" media="all">
<link href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/css/style.min.css" rel="stylesheet" media="all">
<script src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/js/min/bundle.min.js"></script></head>
<body class="bodyclass ">
<script type="text/javascript">
            var site_url_info = {
                baseUrl: '<?php echo trim(base_url(),'/'); ?>',
                themeUrl: '<?php echo base_url(); ?>asset/frontend_template/themes/real_estate'
            }
			/*var site_url_info = {
                baseUrl: 'http://www.shantaholdings.com',
                themeUrl: 'http://www.shantaholdings.com/themes/real_estate'
            }*/
			/*function updateTransition() {
  var el = document.querySelector("div.logo-wrapper");
   
  if (el) {
    el.className = "logo-wrapper1";
  } else {
    el = document.querySelector("div.logo-wrapper1");
    el.className = "logo-wrapper";
  }
   
  return el;
}

var intervalID = window.setInterval(updateTransition, 5000);*/

    </script>


    <div class="site-main-wrapper ">
      <div class="animsition open-menu-position">
          <!-- Header -->
          <!-- ============================================= -->
          <div class="menu-fixed-light menu-dark-mobiles">
              <!-- Notice the menu-fixed-light class -->
              <header class="header-wrapper header-transparent header-transparent-light">
                  <div class="main-header">
                      <div class="container-fluid" style="border-bottom: 2px solid rgba(174, 238, 88);">
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="row">
                                      <div class="menu-wrapper">
                                          <div class="logo-wrapper assign-logo-box">
                                              <a href="<?php echo base_url(); ?>home" class="logo">
                                                  <img src="<?php echo base_url(); ?>asset/images/<?php echo $logo; ?>" class="logo-img logo-dark" alt="Logo">

                                              </a>
                                          </div>


                                          <a href="#menu" class="btn btn-dark btn-lg mobile-menu-bar">
                                              <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/menu.svg" alt="hamburger icon">
                                          </a>

                                          <nav class="navbar-right">
                                                                                        <ul class="menu">
                                                                                              <li>
                                                  <a class="<?php if($this->uri->rsegment(1)=='home')echo 'active'; ?>" href="<?php echo base_url(); ?>home"><span>Home</span></a>
                                                                                                  </li>
                                                                                              <li>
                                                  <a class="<?php if($this->uri->rsegment(1)=='about')echo 'active'; ?>" href="<?php echo base_url(); ?>aboutus"><span>About us</span></a>
                                                                                                    <!--<ul class="submenu">
                                                                                                          <li class=""><a href="<?php echo base_url(); ?>about/ourstory">Our Story</a>
                                                                                                              </li>

                                                                                                          <li class=""><a href="<?php echo base_url(); ?>about/visionmission">Vision & Mission</a>
                                                                                                              </li>

                                                                                                          <li class=""><a href="<?php echo base_url(); ?>about/boardofdirectors">Board of Directors</a>
                                                                                                              </li>

                                                                                                          <li class=""><a href="<?php echo base_url(); ?>about/managementteam">Management Team</a>
                                                                                                              </li>

                                                                                                          <li class=""><a href="<?php echo base_url(); ?>about/companies">Companies</a>
                                                                                                              </li>

                                                                                                          <li class=""><a href="<?php echo base_url(); ?>about/csr">CSR</a>
                                                                                                              </li>

                                                                                                      </ul>-->
                                                                                                  </li>
                                                                                              <li>
                                                  <a class="<?php if($this->uri->rsegment(1)=='projects')echo 'active'; ?>" href="#"><span>Projects</span></a>
                                                                                                    <ul class="submenu">
                                                                                                          <li class="<?php if($this->uri->rsegment(2)=='ongoing')echo 'active'; ?>"><a href="<?php echo base_url(); ?>projects/ongoing">Ongoing</a>
                                                                                                              </li>

                                                                                                          <li class="<?php if($this->uri->rsegment(2)=='upcoming')echo 'active'; ?>"><a href="<?php echo base_url(); ?>projects/upcoming">Upcoming</a>
                                                                                                              </li>

                                                                                                          <li class="<?php if($this->uri->rsegment(1)=='handedover')echo 'active'; ?>"><a href="<?php echo base_url(); ?>projects/handedover">Handed Over</a>
                                                                                                              </li>

                                                                                                      </ul>
                                                                                                  </li>
																								  
                                                                                              <li>
                                                  <a class="<?php if($this->uri->rsegment(2)=='landowners')echo 'active'; ?>" href="<?php echo base_url(); ?>landowners"><span>Land Owner's Query</span></a>
                                                                                                  </li>
                                                                                              <li>
                                                  <a class="<?php if($this->uri->rsegment(1)=='contact' && $this->uri->rsegment(2) !== 'landowners')echo 'active'; ?>" href="<?php echo base_url(); ?>contactus"><span>Contact</span></a>
                                                                                                    <!--<ul class="submenu">
                                                                                                          <li class=""><a href="<?php echo base_url(); ?>contact/landowners">Landowners</a>
                                                                                                              </li>

                                                                                                          <li class=""><a href="<?php echo base_url(); ?>contact/buyers">Buyers</a>
                                                                                                              </li>

                                                                                                          <li class=""><a href="<?php echo base_url(); ?>contact/customers">Customers</a>
                                                                                                              </li>

                                                                                                          <li class=""><a href="<?php echo base_url(); ?>contact/contactus">Contact Us</a>
                                                                                                              </li>

                                                                                                      </ul>-->
                                                                                                  </li>
                                              
											  <li>
												<a class="open-search-menu" href="#search">
													<span><img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/search.svg" alt=""></span>
												</a>
											  </li>
                                            </ul>
                                            
                                          </nav>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- END Main-Header -->
              </header>

          </div>



          <!-- Mobile Menu -->
                    <nav id="menu" class="mmenu-mobile" style="display: none;">
              <ul class="listview-icons">
                                  <li><a href="<?php echo base_url(); ?>home"><span>Home</span></a>
                                      </li>
                                  <li><a href="<?php echo base_url(); ?>aboutus"><span>About us</span></a>
                                          <!--<ul>
                                                  <li>
                              <a href="<?php echo base_url(); ?>about/ourstory">Our Story</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>about/visionmission">Vision & Mission</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>about/boardofdirectors">Board of Directors</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>about/managementteam">Management Team</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>about/companies">Companies</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>about/csr">CSR</a>
                                                        </li>
                                              </ul>-->
                                        </li>
                                  <li><a href="#"><span>Projects</span></a>
                                          <ul>
                                                  <li>
                              <a href="<?php echo base_url(); ?>projects/ongoing">Ongoing</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>projects/upcoming">Upcoming</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>projects/handedover">Handed Over</a>
                                                        </li>
                                              </ul>
                                        </li>
                                <li>
                                                  <a href="<?php echo base_url(); ?>landowners"><span>Land Owners Query</span></a>
                                                                                                  </li>
                                  
                                  <li><a href="<?php echo base_url(); ?>contact/contactus"><span>Contact</span></a>
                                          <!--<ul>
                                                  <li>
                              <a href="<?php echo base_url(); ?>contact/landowners">Landowners</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>contact/buyers">Buyers</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>contact/customers">Customers</a>
                                                        </li>
                                                  <li>
                              <a href="<?php echo base_url(); ?>contact/contactus">Contact Us</a>
                                                        </li>
                                              </ul>-->
                                        </li>
                				<li>
                    <a class="open-search-menu" href="#search">
<!--                        <i class="fa fa-search"></i>-->
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-265 377 40 40" style="enable-background:new -265 377 40 40;" xml:space="preserve">
                            <style type="text/css">
                                .st0{fill:#010101;fill-opacity:0;}
                                .st1{fill:rgba(0,0,0,.5);}
                            </style>
                            <g id="XMLID_86_">
                                <rect id="XMLID_90_" x="-265" y="377" class="st0" width="40" height="40"></rect>
                                <g id="search">
                                    <g id="XMLID_117_">
                                        <path id="XMLID_456_" class="st1" d="M-232.3,408.4l-6.3-6.3c1.6-1.9,2.6-4.4,2.6-7.1c0-6.1-4.9-11-11-11s-11,4.9-11,11
                                            s4.9,11,11,11c2.7,0,5.2-1,7.1-2.6l6.3,6.3c0.4,0.4,1,0.4,1.3,0C-231.9,409.3-231.9,408.7-232.3,408.4z M-247,404c-5,0-9-4-9-9
                                            s4-9,9-9s9,4,9,9S-242,404-247,404z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        Search
                    </a>
                </li>
                <li class="social-links">
                    <!-- <a href="#" target="_blank" class="facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" target="_blank" class="twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#" target="_blank" class="linkedin">
                        <i class="fa fa-linkedin"></i>
                    </a> -->
                    <a href="https://www.youtube.com/@assignholdingslimited3663" target="_blank" class="youtube">
                        <i class="fa fa-youtube"></i>
                    </a>
                </li>
              </ul>
          </nav>
                    <!-- End of Mobile Menu -->
      </div>

	  <header class="site-main-header">
        <div class="menu-overlay search-result-menu "  ng-app="shanta" ng-controller="searchCtrl">
          <div class="pull-right hamburger hamburger-close ">
                            <a href="#">
                                <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/Close.svg" alt="close icon">
                            </a>
                        </div>
            <!-- <div class="menu-column column-left has-inner-scroller " style="background-image: url(<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/images/menu-1.jpg);">
                <div class="menu-column-gap">
                    <div class="column-title-container">

                    </div>
                </div>
                <div class="menu-column-gap inner-scroller mcustom-scrollar">
                    <h1 class="heading-secondary text-white mb-50 ">
                        search projects
                    </h1>
                    <div class="text-white">
                        <p>We understand that no two projects are ever the same, so when it comes to appointing a contractor to deliver the services you need confidence is key.</p>
                    </div>
                </div>
            </div>-->
            <div class="menu-column column-middle has-inner-scroller" style="background-color:rgba(174, 238, 88,0.8) !important; color: #000000 !important;">
                <div class="menu-column-gap inner-scroller mcustom-scrollar">
                    <form class="form-primary text-black custom-select assign-header-current">
                        <div class="form-group" style="border-bottom:1px solid rgba(0,0,0,.25) !important;">
                            <div>
                                <label for="">By Project</label>
                                <input type="text" placeholder="Type the project name" ng-model="search.name">
                            </div>
                        </div>

                        <div class="form-group" style="border-bottom:1px solid rgba(0,0,0,.25) !important;">
                            <div>
                                <label for="">By Location</label>
                                <select name="search.address" id="search.address" ng-model="search.address">
                                    <option value="">Any Location</option>
									<?php
									$location_list = $this->db->query("select *from locations where status='1'")->result();
									foreach($location_list as $val){
									?>
										<option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
									<?php
									}
									?>	
									</select>
                            </div>
                        </div>
                        <div class="form-group" style="border-bottom:1px solid rgba(0,0,0,.25) !important;">
                            <div class=''>
                              <label for="search.size">By Size (Sft)
                              </label>
                              <select name="search.size" id="search.size" ng-model="size">
                                  <option value="">All Size</option>
                                  <option value="600-1000">BELOW 1000</option>
                                  <option value="1001-1500">1000 - 1500</option>
                                  <option value="1501-2000">1500 - 2000</option>
                                  <option value="2001-2500">2000 - 2500</option>
                                  <option value="2601-3000">2500 - 3000</option>
                                  <option value="3001-15000">ABOVE 3000</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group" style="border-bottom:1px solid rgba(0,0,0,.25) !important;">
                            <div>
                                <label for="search.type">By Type</label>
                                <select name="search.type" id="search.type" ng-model="search.type">
                                    <option value="">All Type</option>
                                    <option value="1">Residential</option>
                                    <option value="2">Commercial</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="menu-column column-right text-white has-inner-scroller" >
                <div class="menu-column-gap">
                    <div class="column-title-container">
                      <div class="heading-third">
                        <span ng-bind="(filteredResults.length > 1 ? (filteredResults.length + ' Projects') : (filteredResults.length + ' Project')) + ' Matched'"></span>
                      </div>
                      <div class="" ng-show="filteredResults.length == 0">
                          Sorry no result found !
                      </div>
                    </div>
                </div>
                <div class="menu-column-gap inner-scroller mcustom-scrollar">
                    <div class="full-height-desktop">
                      <ul class="search-result-list">
                          <li ng-repeat="result in filteredResults = (results | filter:search | filter:searchSize ) | orderBy:name">
                              <a ng-href="{{result.link}}">
                                  <div class="search-thumb-wrapper">
                                      <div class="search-thumb" ng-style="{'background-image':'url({{result.image}})'}"></div>
                                  </div>
                                  <div class="search-meta">
                                      <h3 class="search-item-title">{{result.name | makeUpper}}</h3>
                                      <div class="search-item-subtitle">{{result.address}}</div>
                                      <!-- <div>
                                          <small>Type: {{result.type}}</small>
                                      </div>
                                      <div>
                                          <small>Size: {{result.size}} Sft</small>
                                      </div> -->
                                  </div>
                              </a>
                          </li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
      </header>

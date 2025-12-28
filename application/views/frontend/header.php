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
} else {
    $page_info = $this->db->query("select * from pages where name='".$urisegment."'")->row();
    if($page_info){
        $title = $page_info->metatitle;
        $keywords = $page_info->metakeyword;
        $description = $page_info->metadescription;
        $logo = SITE_LOGO;
        $favicon = SITE_FAVICON;
    } else {
        $title = SITE_TITLE;
        $keywords = SITE_METAKEYS;
        $description = SITE_METADESCRIPTION;
        $logo = SITE_LOGO;
        $favicon = SITE_FAVICON;
    }
}
// PROJECT DETAILS DYNAMIC META
if($this->uri->segment(1) == 'projects' && $this->uri->segment(2) == 'details' && $this->uri->segment(3)){
    $project_id = $this->uri->segment(3);
    $project_info = $this->db->get_where('projects', ['id' => $project_id])->row();
    if($project_info){
        $title = $project_info->name . " | Assign Holdings Ltd";
        $description = strip_tags($project_info->description);
        $keywords = $project_info->name . ", real estate dhaka, flats, apartments,assign, flat buy in dhaka, uttara, banani,basundhara, gulshan";
        $logo = SITE_LOGO;
        $favicon = SITE_FAVICON;
    }
}



/* ------------------------------------
   ADD CUSTOM ROUTE-WISE META HERE
-------------------------------------*/

// PROJECTS section
if ($this->uri->segment(1) == 'projects') {

    if ($this->uri->segment(2) == 'ongoing') {
        $title = "Ongoing Projects | Assign Holdings Ltd";
        $description = "Explore all ongoing real estate projects by Assign Holdings Ltd including premium residential and commercial developments in Dhaka.";
        $keywords = "ongoing projects, assign holdings ongoing, real estate dhaka ongoing projects";
    }

    else if ($this->uri->segment(2) == 'upcoming') {
        $title = "Upcoming Projects | Assign Holdings Ltd";
        $description = "Discover all upcoming projects of Assign Holdings Ltd. Premium residential & commercial buildings launching soon in prime Dhaka locations.";
        $keywords = "upcoming projects, assign holdings upcoming, new real estate projects dhaka";
    }

    else if ($this->uri->segment(2) == 'handedover') {
        $title = "Handed Over Projects | Assign Holdings Ltd";
        $description = "View all successfully completed and handed-over projects by Assign Holdings Ltd in Dhaka city.";
        $keywords = "handed over projects, completed projects dhaka, assign holdings completed";
    }
}


// LANDOWNERS
if ($this->uri->segment(1) == 'landowners') {
    $title = "Land Owner’s Query | Assign Holdings Ltd";
    $description = "Submit your land-related queries to Assign Holdings Ltd. We provide joint venture, land development & property solutions in Dhaka.";
    $keywords = "landowners, joint venture dhaka, land development assign holdings";
}


// CONTACT US
if ($this->uri->segment(1) == 'contactus') {
    $title = "Contact Us | Assign Holdings Ltd";
    $description = "Get in touch with Assign Holdings Ltd for property queries, project details, or land development opportunities in Dhaka.";
    $keywords = "contact assign holdings, real estate dhaka contact, property developer contact";
}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>asset/images/<?php echo $favicon; ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/images/<?php echo $favicon; ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/images/<?php echo $favicon; ?>" sizes="16x16">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/<?php echo $favicon; ?>">

    <!-- Manifest & Pinned Tab -->
    <link rel="manifest" href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/manifest.json">
    <link rel="mask-icon" href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/safari-pinned-tab.svg" color="#8b8232">
    <meta name="msapplication-config" content="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

   <!-- Preconnect to Google Fonts for faster connection -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Load Google Fonts asynchronously to avoid blocking render -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">

<!-- Fallback for older browsers -->
<noscript>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
</noscript>

    <!-- CSS Preload -->
    <link rel="preload" href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/css/bundle.min.css" as="style" onload="this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/css/bundle.min.css"></noscript>

    <link rel="preload" href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/css/style.min.css" as="style" onload="this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/css/style.min.css"></noscript>



    <!-- JS defer -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer ></script>

<!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js" defer ></script>

<!-- Your Angular App -->
<script src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/js/app.js" defer ></script>

<!-- Other JS -->

<script src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/js/min/bundle.min.js" defer ></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3Z1DX75FSF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3Z1DX75FSF');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NM792CJR');</script>
<!-- End Google Tag Manager -->


<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1546928889839709');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1546928889839709&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->





</head>
<body class="bodyclass">
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NM792CJR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
<script type="text/javascript">
    var site_url_info = {
        baseUrl: '<?php echo trim(base_url(),'/'); ?>',
        themeUrl: '<?php echo base_url(); ?>asset/frontend_template/themes/real_estate'
    };
</script>

<div class="site-main-wrapper">
    <div class="animsition open-menu-position">

        <!-- Header -->
        <div class="menu-fixed-light menu-dark-mobiles">
            <header class="header-wrapper header-transparent header-transparent-light">
                <div class="main-header">
                    <div class="container-fluid" style="border-bottom: 2px solid rgba(174, 238, 88);">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="menu-wrapper">
                                        <!-- Logo -->
                                        <div class="logo-wrapper assign-logo-box">
                                            <a href="<?php echo base_url(); ?>" class="logo">
                                                <img src="<?php echo base_url(); ?>asset/images/<?php echo $logo; ?>" class="logo-img logo-dark" alt="Logo">
                                            </a>
                                        </div>

                                        <!-- Mobile Menu Hamburger -->
                                        <a href="#menu" class="btn btn-dark btn-lg mobile-menu-bar">
                                            <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/menu.svg" alt="menu">
                                        </a>

                                        <!-- Desktop Menu -->
                                        <nav class="navbar-right">
                                            <ul class="menu">
                                                <li><a class="<?php if($this->uri->rsegment(1)=='home')echo 'active'; ?>" href="<?php echo base_url(); ?>home"><span>Home</span></a></li>
                                                <li>
                                                    <a class="<?php if($this->uri->rsegment(1)=='about')echo 'active'; ?>" ><span>About us</span></a>
                                                    <ul class="submenu">
                                                        <li><a href="<?php echo base_url(); ?>about/ourstory">Our Story</a></li>
                                                        <li><a href="<?php echo base_url(); ?>about/visionmission">Vision & Mission</a></li>
                                                        <li><a href="<?php echo base_url(); ?>about/companies">Our Sister Concern</a></li>
                                                          <li><a href="<?php echo base_url(); ?>about/managementteam">Management</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="<?php if($this->uri->rsegment(1)=='projects')echo 'active'; ?>" ><span>Projects</span></a>
                                                    <ul class="submenu">
                                                        <li class="<?php if($this->uri->rsegment(2)=='ongoing')echo 'active'; ?>"><a href="<?php echo base_url(); ?>projects/ongoing">Ongoing</a></li>
                                                        <li class="<?php if($this->uri->rsegment(2)=='upcoming')echo 'active'; ?>"><a href="<?php echo base_url(); ?>projects/upcoming">Upcoming</a></li>
                                                        <li class="<?php if($this->uri->rsegment(1)=='handedover')echo 'active'; ?>"><a href="<?php echo base_url(); ?>projects/handedover">Handed Over</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="<?php if($this->uri->rsegment(2)=='landowners')echo 'active'; ?>" href="<?php echo base_url(); ?>landowners"><span>Land Owner's Query</span></a></li>
                                                <li><a class="<?php if($this->uri->rsegment(1)=='contact')echo 'active'; ?>" href="<?php echo base_url(); ?>contactus"><span>Contact</span></a></li>
                                                <li>
                                                    <a class="open-search-menu" href="#search">
                                                        <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/search.svg" alt="search icon">
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
            </header>
        </div>

        <!-- Mobile Menu -->
        <nav id="menu" class="mmenu-mobile" style="display: none;">
            <ul class="listview-icons">
                <li><a href="<?php echo base_url(); ?>home"><span>Home</span></a></li>
                <li>
                    <a ><span>About us</span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>about/ourstory">Our Story</a></li>
                        <li><a href="<?php echo base_url(); ?>about/visionmission">Vision & Mission</a></li>
                           <li><a href="<?php echo base_url(); ?>about/companies">Our Sister Concern</a></li>
                        <li><a href="<?php echo base_url(); ?>about/managementteam">Management</a></li>
                     
                    </ul>
                </li>
                <li>
                    <a ><span>Projects</span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>projects/ongoing">Ongoing</a></li>
                        <li><a href="<?php echo base_url(); ?>projects/upcoming">Upcoming</a></li>
                        <li><a href="<?php echo base_url(); ?>projects/handedover">Handed Over</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>landowners"><span>Land Owners Query</span></a></li>
                <li><a href="<?php echo base_url(); ?>contactus"><span>Contact</span></a></li>
                <!--<li>-->
                <!--    <a class="open-search-menu" href="#search">Search</a>-->
                <!--</li>-->
                
                    <li style="list-style: none; ">
    <!-- Facebook -->
    <a href="https://facebook.com/assignholdingsltd" target="_blank" 
       style="text-decoration: none; color: #1877F2; display: inline-flex; align-items: center; margin-right: 10px;">
        <i class="fa-brands fa-facebook" style="margin-right: 5px;"></i> Facebook
    </a>
    <!-- YouTube -->
    <a href="https://youtube.com/channel/UCyXL7BnzZ6pOnCqCfEaXXow" target="_blank" 
       style="text-decoration: none; color: #FF0000; display: inline-flex; align-items: center; margin-left: 10px;">
        <i class="fa-brands fa-youtube" style="margin-right: 5px;"></i> YouTube
    </a>
</li>
                
                
                
            </ul>
        </nav>

        <!-- Search Overlay -->
         
<div ng-app="shanta" ng-controller="searchCtrl">

<!-- Search Overlay -->
<header class="site-main-header">
    <div class="menu-overlay search-result-menu">
        <div class="pull-right hamburger hamburger-close">
            <a href="#">
                <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/Close.svg" alt="close icon">
            </a>
        </div>

        <div class="menu-column column-middle has-inner-scroller" style="background-color:rgba(174, 238, 88,0.8); color: #000;">
            <div class="menu-column-gap inner-scroller mcustom-scrollar">
                <form class="form-primary text-black custom-select assign-header-current">
                    <div class="form-group" style="border-bottom:1px solid rgba(0,0,0,.25);">
                        <label>By Project</label>
                        <input type="text" placeholder="Type the project name" ng-model="search.name">
                    </div>

                    <div class="form-group" style="border-bottom:1px solid rgba(0,0,0,.25);">
                        <label>By Location</label>
                        <select ng-model="search.address">
                            <option value="">Any Location</option>
                            <?php
                                $location_list = $this->db->query("select * from locations where status='1'")->result();
                                foreach($location_list as $val){
                                    echo '<option value="'.$val->name.'">'.$val->name.'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group" style="border-bottom:1px solid rgba(0,0,0,.25);">
                        <label>By Size (Sft)</label>
                        <select ng-model="search.size">
                            <option value="">All Size</option>
                            <option value="600-1000">BELOW 1000</option>
                            <option value="1001-1500">1000 - 1500</option>
                            <option value="1501-2000">1500 - 2000</option>
                            <option value="2001-2500">2000 - 2500</option>
                            <option value="2601-3000">2500 - 3000</option>
                            <option value="3001-15000">ABOVE 3000</option>
                        </select>
                    </div>

                    <div class="form-group" style="border-bottom:1px solid rgba(0,0,0,.25);">
                        <label>By Type</label>
                        <select ng-model="search.type">
                            <option value="">All Type</option>
                            <option value="1">Residential</option>
                            <option value="2">Commercial</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="menu-column column-right text-white has-inner-scroller">
            <div class="menu-column-gap">
                <div class="column-title-container">
                    <div class="heading-third">
                        <span ng-bind="(filteredResults.length > 1 ? (filteredResults.length + ' Projects') : (filteredResults.length + ' Project')) + ' Matched'"></span>
                    </div>
                    <div ng-show="filteredResults.length == 0">
                        Sorry no result found!
                    </div>
                </div>
            </div>

            <div class="menu-column-gap inner-scroller mcustom-scrollar">
                <div class="full-height-desktop">
                    <ul class="search-result-list">
                        <li ng-repeat="result in filteredResults = (results | filter:search | filter:searchSize) | orderBy:'name'">
                            <a ng-href="{{result.link}}">
                                <div class="search-thumb-wrapper">
                                    <div class="search-thumb" ng-style="{'background-image':'url({{result.image}})'}"></div>
                                </div>
                                <div class="search-meta">
                                    <h3 class="search-item-title">{{result.name | makeUpper}}</h3>
                                    <div class="search-item-subtitle">{{result.address}}</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    </div>

</header>

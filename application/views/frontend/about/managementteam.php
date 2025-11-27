<?php
$this->load->view('frontend/header.php');
$page = $this->db->query("select *from pages where name='managementteam'")->row();
?>    
<div class="banner-slider-wrapper overflow-hidden">
  <a href="#management-team" class="animate-scroll scroll-down">
      <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/arrow-down.svg" alt="down arrow">
  </a>
  <div class="no-pad project-detail-info fullscreen-content general-page">
      <div class="overlay-layer" style="background-color: #231F20;"></div>
      <div class="container-fluid full-height full-height-sm">

          <div class="row  full-height text-center no-margin table-all">
              <div class="col-sm-12 project-short-info full-height full-height-sm table-cell-all table-cell-all-vertical">
                                    <h3 class="heading-fourth text-white mb-20 hover-line inline-block">
                    <?php echo $page->title; ?>                 </h3>
                  <h2 class="heading-primary text-white">
                   <?php echo $page->description; ?>                </h2>
              </div>
          </div>
      </div>
  </div>

    <div id="layerslider" class="fitvidsignore" style="width:100%; height:100%;">
    	
    <div data-color="#006b5f" class="ls-slide banner-slider-item slider_topper" data-ls="slidedelay:5500;transition2d:12;">
        <img src="<?php echo base_url(); ?>asset/images/pages/<?php echo $page->banner; ?>" class="ls-bg" alt="Slide background">
    </div>
		
    </div>

</div>

<?php echo html_entity_decode($page->content); ?>

<?php
$this->load->view('frontend/footer.php');
?>

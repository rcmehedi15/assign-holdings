<?php $this->load->view("frontend/header.php"); ?>

<?php
$page = $this->db->query("select *from pages where name='contactus'")->row();
$content1 = $this->db->query("select *from contents where section_code='Home1'")->row();
?>      

<!-- Banner Section -->
<div class="banner-slider-wrapper overflow-hidden">
  <a href="#contact-us" class="animate-scroll scroll-down">
      <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/arrow-down.svg" alt="down arrow">
  </a>
  <div class="no-pad project-detail-info fullscreen-content general-page">
      <div class="overlay-layer" style="background-color: #231F20;"></div>
      <div class="container-fluid full-height full-height-sm">
          <div class="row full-height text-center no-margin table-all">
              <div class="col-sm-12 project-short-info full-height full-height-sm table-cell-all table-cell-all-vertical">
                  <h2 class="heading-primary text-white">
                      <?php echo $page->title; ?>
                  </h2>
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

<!-- Main Page Content -->
<section id="page-content">
    <div >
        <?php echo html_entity_decode($page->content); ?>
    </div>
</section>

<!-- Contact Form Section -->
<section id="who-we-are" class="section-gap bg-dark-grey pb-40" style="background-image: url(<?php echo base_url(); ?>asset/images/contents/<?php echo $content1->image; ?>)" data-image-src="<?php echo base_url(); ?>asset/images/contents/<?php echo $content1->image; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-md-8 center-block">
                <div class="mb-60">
                    <h2 class="heading-primary text-white">Write to us</h2>
                </div>
                <div>
                    <form id="contact-form" class="dynamic_form form-primary all-text-white custom-select" action="<?php echo base_url(); ?>contact/contact_request" method="post" data-pjax="false">
                        <input type="hidden" id="contact-form" name="form_id" value="contact-form">

                        <!-- Success & Error Messages -->
                        <div class="form-message-container success_wrapper hide success_wrapper_contact-form">
                            <div class="form-message-body">
                                <div class="cross-popup" data-msg-close>X</div>
                                <span class="success_container_contact-form"></span>
                                <div>
                                    <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-message-container error_wrapper hide error_wrapper_contact-form">
                            <div class="form-message-body">
                                <div class="cross-popup" data-msg-close>X</div>
                                <span class="error_container_contact-form"></span>
                                <div>
                                    <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="form-group">
                            <label class="control-label" for="name">Name*</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Enter your full name here">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Email*</label>
                            <input type="text" id="email" class="form-control" name="email" placeholder="Enter your email ID here">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Message">Message</label>
                            <textarea id="Message" class="form-control" name="Message" placeholder="Enter your message here"></textarea>
                        </div>

                        <div class="form-group no-border">
                            <button type="submit" class="dynamic_submit_btn button button-outline button-outline-white mt-30">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<?php $this->load->view("frontend/footer.php"); ?>

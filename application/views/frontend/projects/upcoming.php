<?php
$this->load->view('frontend/header.php');
?>   


<section class="banner-secondary projects-cat-banner">
    <div class="container-fluid">
      <h1 class="heading-primary style-1">
        <span>Upcoming<br /></span>
        Discover the future</h1>
    </div>
</section>

<section class="projects-ongoing">
    <div class="container-fluid projects-listings-nav-wrapper">
      <div class="projects-listings">
        <ul class="sorting-nav controls">
			<li class="active">
			  <span class="control" data-filter="all">All</span>
			</li>
			<li class="control">
			  <span class="control" data-filter=".residential">Residential</span>
			</li>
			<li class="control">
			  <span class="control" data-filter=".commercial">Commercial</span>
			</li>
		  </ul>
      </div>
    </div>

    <div class="projects-wrapper">
      <div class="clearfix mixitup-container">
		<?php
		$project_list = $this->db->query("select *from projects where status='2' order by sort_order asc")->result();
		foreach($project_list as $value){
		?>
      	
      		<div data-ref="mixitup-target" class="mixit-item <?php if($value->type==1)echo 'residential'; else if($value->type==1)echo 'commercial'; ?>   custom-col-xs-6 col-md-4 col-sm-6 no-pad square">
		        <a href="<?php echo base_url(); ?>projects/details/<?php echo $value->id; ?>">
		            <div class="relative">
		                <div class="bg-thumb high-contrast">
		                    <div class="bg-thumb-inner" style="background-image: url('<?php echo base_url(); ?>asset/images/projects/<?php echo $value->ataglance_image; ?>')">

		                    </div>
		                </div>
		                <div class="thumb-desc">
		                    <h4 class="project-name"><?php echo $value->name; ?></h4>
		                    <span class="project-address"><?php echo $value->address; ?></span>
		                </div>
		            </div>

		            <div class="thumb-overlay">
		              <h4 class="project-name"><?php echo $value->name; ?></h4>
		              <span class="project-address"><?php echo $value->address; ?></span>
		              <hr class="overlay-line">
		              <p><?php echo $value->description; ?></p>

		               <!-- <div class="overlay-list">
		                 <ul>
		                   <li>At a Glance</li>
		                   <li>Features & Amenities</li>
		                   <li>Location</li>
		                   <li>Gallery</li>
		                 </ul>
		               </div> -->
		            </div>
		        </a>
		    </div>

      	<?php
		}
		?>	

      </div>
    </div>
  </section>

<?php
$this->load->view('frontend/footer.php');
?>

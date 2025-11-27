<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <br><!--<img src="<?php echo base_url(); ?>asset/backend_template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
        </div>
        <div class="pull-left info">
			<?php
			$admin_details = $this->db->query("select *from admin where id='".$this->session->userdata('admin_id')."'")->row();
			?>
          <p><?php echo $admin_details->name; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
		<li <?php if($this->uri->segment(1)=='backend' && $this->uri->segment(2)=='dashboard')echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>backend/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		
		<li class="treeview ">
		  <a href="#"><i class="fa fa-user"></i> <span>Admin</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu">
			
				<li class=""><a href="<?php echo base_url(); ?>admin/user"><i class="fa fa-circle-o"></i> User List</a></li>
				<li class=""><a href="<?php echo base_url(); ?>admin/add_user"><i class="fa fa-circle-o"></i> Add New User</a></li>
						
		  </ul>
		</li>
		<li class="treeview ">
		  <a href="#"><i class="fa fa-location-arrow"></i> <span>Locations</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu">
			
				<li class=""><a href="<?php echo base_url(); ?>location/llist"><i class="fa fa-circle-o"></i> Location List</a></li>
				<li class=""><a href="<?php echo base_url(); ?>location/add"><i class="fa fa-circle-o"></i> Add New Location</a></li>
						
		  </ul>
		</li>
		<li class="treeview ">
		  <a href="#"><i class="fa fa-image"></i> <span>Banners</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu">
			
				<li class=""><a href="<?php echo base_url(); ?>banner/blist"><i class="fa fa-circle-o"></i> Banner List</a></li>
				<li class=""><a href="<?php echo base_url(); ?>banner/add"><i class="fa fa-circle-o"></i> Add New Banner</a></li>
						
		  </ul>
		</li>
		<li class="treeview ">
		  <a href="#"><i class="fa fa-file"></i> <span>Pages</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu">
			
				<li class=""><a href="<?php echo base_url(); ?>page/plist"><i class="fa fa-circle-o"></i> Page List</a></li>
				<li class=""><a href="<?php echo base_url(); ?>page/add"><i class="fa fa-circle-o"></i> Add New Page</a></li>
										
		  </ul>
		</li>
		<li class="treeview ">
		  <a href="#"><i class="fa fa-edit"></i> <span>Contents</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu">
			
				<li class=""><a href="<?php echo base_url(); ?>content/clist"><i class="fa fa-circle-o"></i> Content List</a></li>
				<li class=""><a href="<?php echo base_url(); ?>content/add"><i class="fa fa-circle-o"></i> Add New Content</a></li>
						
		  </ul>
		</li>
		<li class="treeview ">
		  <a href="#"><i class="fa fa-question"></i> <span>Why <?php echo SITE_NAME; ?></span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu">
			
				<li class=""><a href="<?php echo base_url(); ?>why/wlist"><i class="fa fa-circle-o"></i> Item List</a></li>
				<li class=""><a href="<?php echo base_url(); ?>why/add"><i class="fa fa-circle-o"></i> Add New Item</a></li>
						
		  </ul>
		</li>
		<li class="treeview ">
		  <a href="#"><i class="fa fa-list"></i> <span>Projects</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu">
			
				<li class=""><a href="<?php echo base_url(); ?>project/plist"><i class="fa fa-circle-o"></i> Project List</a></li>
				<li class=""><a href="<?php echo base_url(); ?>project/add"><i class="fa fa-circle-o"></i> Add New Project</a></li>
						
		  </ul>
		</li>
		<li class="treeview ">
		  <a href="#"><i class="fa fa-gear"></i> <span>Settings</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu">
			
				<li class=""><a href="<?php echo base_url(); ?>settings/siteinfo"><i class="fa fa-circle-o"></i> Site Info</a></li>
				
						
		  </ul>
		</li>
		<li class="treeview ">
		  <a href="#"><i class="fa fa-gear"></i> <span>Requests</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu">
			
				<li class=""><a href="<?php echo base_url(); ?>request/rlist/landowner"><i class="fa fa-circle-o"></i> Landowner</a></li>
				<li class=""><a href="<?php echo base_url(); ?>request/rlist/buyer"><i class="fa fa-circle-o"></i> Buyer</a></li>
				<li class=""><a href="<?php echo base_url(); ?>request/rlist/contact"><i class="fa fa-circle-o"></i> Contact</a></li>
				<li class=""><a href="<?php echo base_url(); ?>request/rlist/booking"><i class="fa fa-circle-o"></i> Booking</a></li>
				
						
		  </ul>
		</li>
		
		<!--<li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>-->
		<li class=""><a href="<?php echo base_url(); ?>backend/logout"><i class="fa fa-link"></i> <span>Logout</span></a></li>
		
		
        
		
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Locations</h3>
			  <a href="<?php echo base_url(); ?>location/add"><button type="button" class="btn  btn-danger btn-flat pull-right"><i class="fa fa-plus margin-r-5"></i>Add New Location</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php
				if($this->session->flashdata('success')){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Alert!</h4>
					<?php echo $this->session->flashdata('success'); ?>
				  </div>
				<?php
				}
				?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="hidden-xs hidden-sm">ID</th>
                  <th class="hidden-xs">Name</th>
                  
				  
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				foreach($location_list as $value){
				?>
                <tr>
                  <td class="hidden-xs hidden-sm"><?php echo $value->id; ?></td>
                  
                  <td><?php echo $value->name; ?></td>
                  
				  
                 
				  <td><i class="fa <?php echo ($value->status==1)?'fa-check bg-green':'fa-close bg-red'; ?> margin-r-5"></i></td>
				  <td>
					<div class="btn-group">
					  <button type="button" class="btn btn-danger btn-flat">Action</button>
					  <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
						
						<li><a href="<?php echo base_url(); ?>location/edit/<?php echo $value->id; ?>">Edit</a></li>
						<li><a href="<?php echo base_url(); ?>location/ldelete/<?php echo $value->id; ?>" onclick="return confirm('Are you sure?')">Delete</a></li>
						<!--<li class="divider"></li>
						<li><a href="#">Separated link</a></li>-->
					  </ul>
					</div>
				  </td>
                </tr>
                <?php
				}
				?>
                </tbody>
                <tfoot>
                <tr>
                  <th class="hidden-xs hidden-sm">ID</th>
                  <th class="hidden-xs">Name</th>
                  
				  
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
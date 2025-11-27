<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Projects</h3>
			  <a href="<?php echo base_url(); ?>project/add"><button type="button" class="btn  btn-danger btn-flat pull-right"><i class="fa fa-plus margin-r-5"></i>Add New Project</button></a>
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
                  
                  <th>Name</th>
                  
                  <th class="hidden-xs hidden-sm">Address</th>
				  <th>Type</th>
				  <th>Status</th>
				  <th>Display</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				foreach($banner_list as $value){
				?>
                <tr>
                  <td class="hidden-xs hidden-sm"><?php echo $value->id; ?></td>
                  
                  <td><?php echo $value->name; ?></td>
                  
				  <td class="hidden-xs hidden-sm"><?php echo $value->address; ?></td>
                 
				  <td>
					<?php
					if($value->type==1){
						echo 'Residential';
					}
					if($value->type==2){
						echo 'Commercial';
					}
					?>
				  </td>
				  <td>
					<?php
					if($value->status==1){
						echo 'Ongoing';
					}
					if($value->status==2){
						echo 'Upcoming';
					}
					if($value->status==3){
						echo 'Handed Over';
					}
					?>
				  </td>
				  <td>
					<?php
					if($value->display_at_home_page==1){
						echo 'On Home';
					}
					else{
						echo 'Not on Home';
					}
					?>
				  </td>
				  <td>
					<div class="btn-group">
					  <button type="button" class="btn btn-danger btn-flat">Action</button>
					  <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
						
						<li><a href="<?php echo base_url(); ?>project/edit/<?php echo $value->id; ?>">Edit</a></li>
						<li><a href="<?php echo base_url(); ?>project/pdelete/<?php echo $value->id; ?>" onclick="return confirm('Are you sure?')">Delete</a></li>
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
                  
                  <th>Name</th>
                  
                  <th class="hidden-xs hidden-sm">Address</th>
				  <th>Type</th>
				  <th>Status</th>
				  <th>Display</th>
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
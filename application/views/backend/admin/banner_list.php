<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Banners</h3>
			  <a href="<?php echo base_url(); ?>banner/add"><button type="button" class="btn  btn-danger btn-flat pull-right"><i class="fa fa-plus margin-r-5"></i>Add New Banner</button></a>
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
                  
                  <th>Title</th>
                  
                  <th class="hidden-xs hidden-sm">Image</th>
				  
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				foreach($banner_list as $value){
				?>
                <tr>
                  <td class="hidden-xs hidden-sm"><?php echo $value->id; ?></td>
                  
                  <td><?php echo $value->title; ?></td>
                  
				  <td class="hidden-xs hidden-sm"><img width="100" src="<?php echo base_url(); ?>asset/images/banners/<?php echo $value->image; ?>"></td>
                 
				  <td><i class="fa <?php echo ($value->status==1)?'fa-check bg-green':'fa-close bg-red'; ?> margin-r-5"></i></td>
				  <td>
					<div class="btn-group">
					  <button type="button" class="btn btn-danger btn-flat">Action</button>
					  <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
						
						<li><a href="<?php echo base_url(); ?>banner/edit/<?php echo $value->id; ?>">Edit</a></li>
						<li><a href="<?php echo base_url(); ?>banner/bdelete/<?php echo $value->id; ?>" onclick="return confirm('Are you sure?')">Delete</a></li>
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
                  
                  <th>Title</th>
                  
                  <th class="hidden-xs hidden-sm">Image</th>
				  
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
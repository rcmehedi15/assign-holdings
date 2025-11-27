<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Details</h3>
            </div>
			<?php
			if($error){
			?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Error!</h4>
				<?php echo $error; ?>
			</div>
			<?php
			}
			?>
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
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" data-toggle="validator" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>settings/siteinfo">
              <div class="box-body">
                <div class="form-group">
                  <label for="username">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $site_info->name; ?>" required>
                </div>
                
				
				<div class="form-group">
                  <label for="username">Meta Title</label>
                  <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Meta Title" value="<?php echo $site_info->metatitle; ?>" required>
                </div>
				<div class="form-group">
                  <label for="username">Meta Keywords</label>
                  <input type="text" class="form-control" id="metakeyword" name="metakeyword" placeholder="Meta Keywords" value="<?php echo $site_info->metakeys; ?>" required>
                </div>
				<div class="form-group">
                  <label for="username">Meta Description</label>
                  <input type="text" class="form-control" id="metadescription" name="metadescription" placeholder="Meta Description" value="<?php echo $site_info->metadescription; ?>" required>
                </div>
				<div class="form-group">
                  <label for="phone">Image</label>
				  <br><img width="100" src="<?php echo base_url(); ?>asset/images/<?php echo $site_info->logo; ?>">
                  <input type="file" name="logo" id="logo">
				  <p class="help-block">jpg, png, gif</p>
                </div>
				<div class="form-group">
                  <label for="phone">Image</label>
				  <br><img width="100" src="<?php echo base_url(); ?>asset/images/<?php echo $site_info->favicon; ?>">
                  <input type="file" name="favicon" id="favicon">
				  <p class="help-block">jpg, png, gif</p>
                </div>
				
				<div class="form-group">
                  <label for="username">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $site_info->phone; ?>" required>
                </div>
				<div class="form-group">
                  <label for="username">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $site_info->address; ?>" required>
                </div>
				<div class="form-group">
                  <label for="username">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $site_info->email; ?>" required>
                </div>
				
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          

        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
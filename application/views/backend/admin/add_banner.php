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
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" data-toggle="validator" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>banner/add">
              <div class="box-body">
                <div class="form-group">
                  <label for="username">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $this->input->post('title'); ?>">
                </div>
               
				<div class="form-group">
                  <label for="name">Description</label>
                  <textarea class="form-control" rows="5" placeholder="Details" id="description" name="description"><?php echo $this->input->post('description'); ?></textarea>
				  
                </div>
				
				<div class="form-group">
                  <label for="phone">Image</label>
                  <input type="file" name="image" id="image" required>
				  <p class="help-block">jpg, png, gif</p>
                </div>
				
				<div class="form-group">
                  <label>Status</label>
                  <select name="status" id="status" class="form-control">
                    <option value="0" <?php echo ($this->input->post('status')!=1)?'selected="selected"':''; ?>>Inactive</option>
                    <option value="1" <?php echo ($this->input->post('status')==1)?'selected="selected"':''; ?>>Active</option>
                    
                  </select>
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
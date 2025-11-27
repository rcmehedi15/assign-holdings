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
            <form role="form" data-toggle="validator" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>page/add">
              <div class="box-body">
                <div class="form-group">
                  <label for="username">URL</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="URL" value="<?php echo $this->input->post('name'); ?>" required>
                </div>
				
				<div class="form-group">
                  <label for="username">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $this->input->post('title'); ?>" required>
                </div>
                
				<div class="form-group">
                  <label for="name">Description</label>
                  <textarea class="form-control" rows="5" placeholder="Details" id="description" name="description" required><?php echo $this->input->post('description'); ?></textarea>
				
                </div>
				<div class="form-group">
                  <label for="username">Meta Title</label>
                  <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Meta Title" value="<?php echo $this->input->post('metatitle'); ?>" required>
                </div>
				<div class="form-group">
                  <label for="username">Meta Keywords</label>
                  <input type="text" class="form-control" id="metakeyword" name="metakeyword" placeholder="Meta Keywords" value="<?php echo $this->input->post('metakeyword'); ?>" required>
                </div>
				<div class="form-group">
                  <label for="username">Meta Description</label>
                  <input type="text" class="form-control" id="metadescription" name="metadescription" placeholder="Meta Description" value="<?php echo $this->input->post('metadescription'); ?>" required>
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
				<div class="form-group">
                  <label>Content</label>
                  <textarea id="content" name="content" rows="10" cols="80">
                                            <?php echo $this->input->post('content'); ?>
                    </textarea>
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
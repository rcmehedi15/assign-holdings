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
            <form role="form" data-toggle="validator" method="post" action="<?php echo base_url(); ?>admin/add_user">
              <div class="box-body">
                <div class="form-group">
                  <label for="username">Email/Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Email/Username" value="<?php echo $this->input->post('username'); ?>" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
				<div class="form-group">
                  <label for="password">Re-Password</label>
                  <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Password" data-match="#password" required>
                </div>
				<div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $this->input->post('name'); ?>" required>
                </div>
				
				<div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $this->input->post('phone'); ?>" required>
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
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
			if($success){
			?>
			<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $success; ?>
              </div>
			<?php
			}
			?>
			<!-- /.box-header -->
            <!-- form start -->
          
                <form class="form-horizontal" data-toggle="validator" method="post" action="<?php echo base_url(); ?>admin/profile">
                  <div class="box-body">
				  <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Email/Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $profile->email; ?>" required>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="repassword" class="col-sm-2 control-label">Re-Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="repassword" name="repassword" data-match="#password" placeholder="Re-Password">
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $profile->name; ?>" placeholder="Name" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $profile->phone; ?>" placeholder="Phone" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="submit" value="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
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
	

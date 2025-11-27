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
            <form role="form" data-toggle="validator" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>project/add">
              <div class="box-body">
                <div class="form-group">
                  <label for="username">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $this->input->post('name'); ?>" required>
                </div>
				<div class="form-group">
                  <label for="username">Size(sft)</label>
                  <input type="text" class="form-control" id="size" name="size" placeholder="Size" value="<?php echo $this->input->post('size'); ?>" required>
                </div>
				<div class="form-group">
                  <label>Location</label>
                  <select name="location" id="location" class="form-control">
                    <option value="" >Select</option>
					<?php
					foreach($location_list as $val){
					?>
                    <option value="<?php echo $val->name; ?>" <?php echo ($this->input->post('location')==$val->name)?'selected="selected"':''; ?>><?php echo $val->name; ?></option>
                    <?php
					}
					?>
                  </select>
                </div>
				<div class="form-group">
                  <label for="username">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $this->input->post('address'); ?>" required>
                </div>
               
				<div class="form-group">
                  <label for="name">Description</label>
                  <textarea class="form-control" rows="5" placeholder="Details" id="description" name="description" required><?php echo $this->input->post('description'); ?></textarea>
				  
                </div>
				
				<div class="form-group">
                  <label for="phone">Banner(s)</label>
                  <p id="bannerholder"><input type="file" name="banner0" id="banner0"></p>
					<button type="button" class="btn  btn-danger btn-flat" onclick="add_more_banner()">
						<i class="fa fa-plus margin-r-5"></i>Add More
					</button>
				  <p class="help-block">jpg, png, gif</p>
                </div>
				
				<div class="form-group">
                  <label for="name">At a glance content</label>
                  <textarea class="form-control" rows="5" placeholder="At a glance" id="ataglance_content" name="ataglance_content" required><?php echo $this->input->post('ataglance_content'); ?></textarea>
				  
                </div>
				
				<div class="form-group">
                  <label for="phone">At a glance image</label>
                  <input type="file" name="agimage" id="agimage" required>
				  <p class="help-block">jpg, png, gif</p>
                </div>
				
				<div class="form-group">
                  <label for="name">Features content</label>
                  <textarea class="form-control" rows="5" placeholder="Features" id="features_content" name="features_content" required><?php echo $this->input->post('features_content'); ?></textarea>
				  
                </div>
				
				<!--<div class="form-group">
                  <label for="phone">Features image</label>
                  <input type="file" name="fimage" id="fimage" required>
				  <p class="help-block">jpg, png, gif</p>
                </div>-->
				<div class="form-group">
                  <label for="phone">Features image</label>
                  <p id="fimageholder"><input type="file" name="fimage0" id="fimage0"></p>
					<button type="button" class="btn  btn-danger btn-flat" onclick="add_more_feature()">
						<i class="fa fa-plus margin-r-5"></i>Add More
					</button>
				  <p class="help-block">jpg, png, gif</p>
                </div>
				
				<div class="form-group">
                  <label for="phone">Booknow image</label>
                  <input type="file" name="bimage" id="bimage" required>
				  <p class="help-block">jpg, png, gif</p>
                </div>
				
				<div class="form-group">
                  <label>Type</label>
                  <select name="type" id="type" class="form-control">
                    <option value="1" <?php echo ($this->input->post('type')==1)?'selected="selected"':''; ?>>Residential</option>
                    <option value="2" <?php echo ($this->input->post('type')==2)?'selected="selected"':''; ?>>Commercial</option>
                    
                  </select>
                </div>
				<div class="form-group">
                  <label>Status</label>
                  <select name="status" id="status" class="form-control">
                    <option value="1" <?php echo ($this->input->post('status')==1)?'selected="selected"':''; ?>>Ongoing</option>
                    <option value="2" <?php echo ($this->input->post('status')==2)?'selected="selected"':''; ?>>Upcoming</option>
					<option value="3" <?php echo ($this->input->post('status')==3)?'selected="selected"':''; ?>>Handed Over</option>
                    
                  </select>
                </div>
				
				<div class="form-group">
                  <label>Show on home page?</label>
                  <select name="showhome" id="showhome" class="form-control">
                    <option value="0" <?php echo ($this->input->post('showhome')!=1)?'selected="selected"':''; ?>>No</option>
                    <option value="1" <?php echo ($this->input->post('showhome')==1)?'selected="selected"':''; ?>>Yes</option>
					
                    
                  </select>
                </div>
				<div class="form-group">
                  <label for="phone">Gallery</label>
                  <p id="galleryholder"><input type="file" name="gallery0" id="gallery0"></p>
					<button type="button" class="btn  btn-danger btn-flat" onclick="add_more_gallery()">
						<i class="fa fa-plus margin-r-5"></i>Add More
					</button>
				  <p class="help-block">jpg, png, gif</p>
                </div>
				<div class="form-group">
                  <label for="username">Sort Order</label>
                  <input type="text" class="form-control" id="sortorder" name="sortorder" placeholder="Sort Order" value="<?php echo $this->input->post('sortorder'); ?>" required>
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
	
<script type="text/javascript">
var banner_cnt = 1;
function add_more_banner(){
	$('#bannerholder').append('<button id="rbtn'+banner_cnt+'" type="button" class="btn  btn-danger btn-flat pull-left" onclick="remove_banner('+banner_cnt+')"><i class="fa fa-minus margin-r-5"></i></button><input type="file" style="margin-top:5px" name="banner'+banner_cnt+'" id="banner'+banner_cnt+'">');
	banner_cnt++;
}
function remove_banner(n){
	$('#rbtn'+n).remove();
	$('#banner'+n).remove();
	
}
var gallery_cnt = 1;
function add_more_gallery(){
	$('#galleryholder').append('<button id="rgbtn'+gallery_cnt+'" type="button" class="btn  btn-danger btn-flat pull-left" onclick="remove_gallery('+gallery_cnt+')"><i class="fa fa-minus margin-r-5"></i></button><input type="file" style="margin-top:5px" name="gallery'+gallery_cnt+'" id="gallery'+gallery_cnt+'">');
	gallery_cnt++;
}
function remove_gallery(n){
	$('#rgbtn'+n).remove();
	$('#gallery'+n).remove();
	
}
var fimage_cnt = 1;
function add_more_feature(){
	$('#fimageholder').append('<button id="rfbtn'+fimage_cnt+'" type="button" class="btn  btn-danger btn-flat pull-left" onclick="remove_feature('+fimage_cnt+')"><i class="fa fa-minus margin-r-5"></i></button><input type="file" style="margin-top:5px" name="fimage'+fimage_cnt+'" id="fimage'+fimage_cnt+'">');
	fimage_cnt++;
}
function remove_feature(n){
	$('#rfbtn'+n).remove();
	$('#fimage'+n).remove();
	
}
</script>
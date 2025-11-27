<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Requests</h3>
				<!--<br><br><a  href="<?php echo base_url(); ?>admin/download_access_log"><button type="button" class="btn  btn-danger btn-flat margin-r-5"><i class="fa fa-file-excel-o margin-r-5"></i>Export Log</button></a>
				<a  href="<?php echo base_url(); ?>admin/clear_access_log" onclick="return confirm('Are you sure?')"><button type="button" class="btn  btn-danger btn-flat"><i class="fa fa-remove margin-r-5"></i>Clear Log</button></a>
				
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
				  
                </div>
				
              </div>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
				<tr>
                  <th>ID</th>
				  
				  <th>Date</th>
				  
				  <th class="hidden-xs">Details</th>
                </tr>
				</thead>
				<tbody>
                <?php 
				foreach($request_list as $val){
				?>
				<tr>
				  <td><?php echo $val->id; ?></td>
				  <td><?php echo date('d/m/Y',strtotime($val->rdate)); ?></td>
				  <td class="hidden-xs"><?php 
				  $details = unserialize($val->data);
				  foreach($details as $key=>$dt){
					  echo str_replace('_',' ',$key).': '.$dt.'<br>';
				  }
				  ?></td>
				</tr>
				<?php
				}
				?>
                </tbody>
				<tfoot>
                <tr>
                  <th>ID</th>
				  
				  <th>Date</th>
				  
				  <th class="hidden-xs">Details</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
			<div class="box-footer clearfix">
              <?php echo $pagination; ?>
            </div>
          
          </div>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
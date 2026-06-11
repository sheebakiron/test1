
 <!-- DataTables CSS -->
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	

    <!-- DataTables Responsive CSS 
    <link href="<?= base_url() ?>/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">-->
<div id="page-wrapper">
            <div class="row">
		
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
				
				
                <!-- /.col-lg-12 -->
            </div>
			<?php if ($this->session->flashdata('success_msg')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('success_msg') ?> </div>
    <?php } ?>
	<?php if ($this->session->flashdata('error_msg')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('error_msg') ?> </div>
<?php } ?>
            <!-- /.row -->
          
        <div class="panel panel-default">
            <div class="panel-heading">Post Details <a href="<?php echo site_url('admin/userview'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
            <div class="panel-body">
                <div class="form-group">
                    <label>id:</label>
                    <p><?php echo !empty($post['id'])?$post['id']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <p><?php echo !empty($post['name'])?$post['name']:''; ?></p>
                </div>
            </div>
        </div>
   
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
		<script>
		$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
		<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- /#page-wrapper
		<script src="<?= base_url() ?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>-->
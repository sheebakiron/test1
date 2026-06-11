
 <!-- DataTables CSS -->
    <link href="<?= base_url()?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?= base_url()?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h2> View Gallery</h2>
                         <h3 style="color:#337ab7;"><?php echo $this->session->flashdata('upload_error'); ?></h3>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                       
                                        <th>No</th>
                                        <th>Image</th>
                                        <th width="100px" >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								
								<?php
								   $k=1;

								   foreach($gallery as $row): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $k; ?></td>
                                         <td> <img  src="<?= base_url() ?>uploads/gallery/<?= $row['image']; ?>" style="width: 150px; height: 150px;" ></td>                                     

                                
                                        <td align="center" >
										 <a href="edit_gallery/<?= $row['id']; ?>" class="glyphicon glyphicon-eye-open"></a>
										 <a href="delete_gallery/<?= $row['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a></td>
                                    </tr>
									<?php
									$k++;
									endforeach; ?>
                                    
                                </tbody>
                            </table>
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
        <!-- /#page-wrapper -->
 <script src="<?= base_url()?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url()?>vendor/datatables-responsive/dataTables.responsive.js"></script>
	
	<script>
	 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
	
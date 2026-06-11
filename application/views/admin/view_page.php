
 <!-- DataTables CSS -->
    <link href="<?= base_url()?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?= base_url()?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h2> View <?php echo $title;?></h2>
                         <h3 style="color:#337ab7;"><?php echo $this->session->flashdata('upload_error'); ?></h3>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th>No.</th>
                                      <?php  foreach($listdatas as $listdatas1) {   ?> 
                                        <th><?php echo $listdatas1;?></th>
                                       <?php }?>   
                                        <th width="100px" >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								
								<?php
								   $k=1;

								   foreach($lists as $row): ?>
                                   <tr class="odd gradeX"> <td><?php echo $k; ?></td>
                                   <?php
                                    foreach($listdatas as $listdatas1) {   
                                   ?>
                                    
                                       
                                        <?php if (in_array($listdatas1, $textdatas)) {   ?>
                                            <td> 
                                            <?php echo $row[$listdatas1]; ?>
                                        </td> 
                                        <?php }?>
                                        <?php if (in_array($listdatas1, $imgdatas)) {   ?>
                                         <td> 
            <img  src="<?php echo base_url(); ?><?php echo $folder;?>/<?php echo $row[$listdatas1]; ?>" style="width: 150px; height: 150px;" >
                                        </td> 
                                <?php }?>
                                <?php if (in_array($listdatas1, $datedatas)) {   ?>
                                         <td> 
                                         <?php echo date("d-m-Y",strtotime($row[$listdatas1])); ?>
                                         </td> 
                                <?php }?>
                                <?php if (in_array($listdatas1, $statdatas)) {   ?>
                                         <td> 
                                         <?php foreach($statdatas as $ind){?>
                                            <select name="<?php echo $ind;?>" onchange="changestat('<?php echo $row[$lnkid];?>','<?php echo $row[$listdatas1];?>')">
                                            <?php foreach($dropdatas[$ind] as $val=>$dropdatas1){?>
                                                <?php if($row[$listdatas1]==$val){?>
                                           <option value="<?php echo $val;?>" selected>
                                           <?php }else{?>
                                            <option value="<?php echo $val;?>"  >
                                            <?php }?>
                                           <?php echo $dropdatas1;?>
                                        </option> 
                                          <?php  }?>
                                            </select>
                                            <?php  }?>
                                            </td> 
                                          
                                <?php }?>
                                         
                                   
									<?php
									
                                    }?> 
                                     <td align="center" >
										 <a href="add_<?php echo $lnktitle;?>/<?php echo $row[$lnkid]; ?>" class="glyphicon glyphicon-eye-open"></a>
										 <a href="delete_<?php echo $lnktitle;?>/<?php echo $row[$lnkid]; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                                        </td> 
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
 <script src="<?php echo base_url()?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>vendor/datatables-responsive/dataTables.responsive.js"></script>
	
	<script>
	 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
     
    </script>
    <script>
     
    function changestat(id,stat){
        location.href="<?php echo base_url()?>admin/Pages/view_<?php echo $lnktitle;?>?statid="+id+"&stat="+stat;
    }
    </script>
	
	
<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header');?>
        <?php $this->load->view('admin/include/sidebar');?>
        
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="row">
                    <!-- ICON BG-->
                   
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    <h1 class="mr-2">All Testimonials</h1>
                   
                </div><div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="float-right">
                    <a href="<?=base_url()?>master/clients_add" class="btn btn-primary btn-block btn-rounded ">ADD Testimonials</a>  </div>
               </div></div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <div class="card text-left">
                            <div class="card-body">
                               
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th>Sr.no</th> 
									      	<th>Image</th>
									      	<th>Title</th>
									      	<th>Date</th>
									       	<th>Action</th>
									    </tr>
									    </thead>
									    <tbody>
									     <?php
                                            if($data->num_rows() > 0){    
                                        $count=1;
                                        foreach ($data->result() as $row ) {
                                         
                                                  ?>
                                                   
                                   
									    <tr>
									      	<td><?=$count;?></td> 
									         <td><img class="img-thumbnail" style="    height: 103px;width: auto;" src="<?=base_url()?><?=$row->img;?>"> </td>
									         <td><?=$row->news_name;?></td> 
									         <td><?=date('d-m-Y',strtotime($row->add_on));?></td> 
									      	 
									                                                    <td>

 <a class="text-primary mr-2" href="<?=base_url('master/clients_edit/'.$row->id); ?>"><span class="btn btn-sm btn-warning"><i class="nav-icon i-Pen-3"></i> Edit</span></a>
 
 <a class="text-primary mr-2" href="<?=base_url('master/delete/clients/clients/'.$row->id); ?>" onclick="return confirm('Are you sure you want to delete this user?');"><span class="btn btn-sm btn-danger"><i class="fa fa trash"></i> Delete </span></a>
 
  
 </td>
									    </tr>
									           <?php 
                                              $count++;
                                         }
                                         }
                                         else{
                                            ?>
                                            <tr>
                                            <td colspan="3">No Record Found</td>
                                            </tr>


                                            <?php
                                         }
                                         ?>
									   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
         
            <!-- fotter end -->
        </div>
    </div><!-- ============ Search UI Start ============= -->
    
    <!-- ============ Search UI End ============= -->
    <?php $this->load->view('admin/include/footerscript');?>
         <script>
             $(document).ready(function() {
    $('.table').DataTable( {
        dom: 'Bfrtip',
        "paging": true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
         </script> 
</body>


</html>
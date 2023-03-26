<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
     
     <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart']});     
      </script>
      <style>
          .critical{
              background-color: #ffeded!important;
          }
          .moderate{
              background-color: #ffffe0!important;
          }
          .normal{
             background-color: #d9ffd9!important;
          }
      </style>
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
                    <h1 class="mr-2">Admin Panel</h1>
                   
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="float-right">
                    
                     </div>
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
									        <th>Name</th> 
									      	<th>Phone</th>
									      	<th>Email</th>
									      	<th>Date</th>
									      	<th>Message</th>
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
									      	<td> <?=$row->name;?></td>
									      	<td> <?=$row->phone;?></td>
									         <td> <?=$row->email;?></td>
									          <td> <?=date('d M, Y H:i:s',strtotime('+5 hour +30 minutes ',strtotime($row->add_on)));?></td>
									         <td><small class="text-muted"><?=$row->messg;?></small></td>
									      	 
									                                                    <td>

 
 <a class="text-primary mr-2" href="<?=base_url('master/delete/index/contact/'.$row->id); ?>" onclick="return confirm('Are you sure you want to delete this ?');"><span class="btn btn-sm btn-danger"><i class="fa fa trash"></i> Delete </span></a>
 
  
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
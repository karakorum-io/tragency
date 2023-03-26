<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<?php
 $settings= $this->crud->get_data("settings", "", "*", "full","", "", "order by id desc");
    $settings = $settings->result()[0];?>
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
                    <h1 class="mr-2">Bookings</h1>
                   
                </div><div class="col-lg-6 col-md-6 col-sm-6">
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
                                            <th>Tour Details</th>
                                            <th>Option Details</th>
									        <th>Traveler</th>
									        <th>Guests</th>
									        <th>Payment </th>
									        <th>Address </th>
									       	
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
									      	<td><?=$row->tour_name;?></td>
									      <td><?=$row->tour_title;?><br>
									      Travel Date : <?=date('M d, y',strtotime($row->travel_date))?><br>
									     Time : <?=date('h:i a', strtotime($row->travel_time))?>
									      </td>
									      <td><?=$row->title;?> <?=$row->fname;?> <?=$row->lname;?><br>
									     Phone :  <?=$row->phone;?><br>
									      Email : <?=$row->email;?><br>
									      Nationality : <?=$row->nationality;?></td>
									      <td><?=$row->adult?> Adult, <?=$row->child?> Child, <?=$row->infant?> Infant</td>
									      <td>Tour Price:<?=$settings->currency_symbol?><?=$row->total?><br><mark>Amount Paid:<?=$settings->currency_symbol?><?=$row->amnt_paid?></mark><br><span class="badge badge-primary"><?=str_replace('_', ' ', $row->payment_type);?></span></td>
									       <td><?=$row->address?><br><?=$row->city?>, <?=$row->state?><br>
									       <?=$row->postal_code?>, <?=$row->country?></td>
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
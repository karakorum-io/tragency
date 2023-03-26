<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header');?>
        <?php $this->load->view('admin/include/sidebar');?>
        
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
        <form action = "<?=base_url('master/add_clients_action')?>" method = "post" enctype='multipart/form-data'>
                       <?php echo form_open('form'); ?> 
            
              
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG--> 
                    <div class="offset-lg-3 col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                        <div class="card mb-3">
                             <div class="card-header text-center">
                                 <h1 class=" h5 mr-2"><b>Add Testimonials</b></h1>
                             </div> 
                            <div class="card-body"> 
                                     
        
       
                                 <div class="row">
            
                         
                             <div class="form-group col-sm-12">
                                <label for="email">Title</label>
                                <input name="news_name" class="form-control " id="email" type="text"  required>
                                
                            </div>
                             <div class="form-group col-sm-12">
                                <label for="email">Description</label>
                                <textarea name="short_descr" class="form-control " id="email" rows="4"  required></textarea>
                                
                            </div>
                              <div class="form-group col-sm-12">
                            <label class="form-label">Add Image</label>
                            <input type="file" name="img"  accept="image/*"    class="form-control " required="">
                                         </div>
                              <div class="form-group col-sm-12">
                                <label for="email">Select Destinations</label>
                                <select name="author" class="js-example-basic-multiple form-control"  required=""  >
                                 <?php if($city->num_rows() > 0){
                                     foreach($city->result() as $row){
                                         echo'<option value="'.$row->slug.'">'.$row->name.'</option>';
                                     }}
                                   ?></select>
                            </div>     
                            <div class="form-group col-sm-12">
                                 <button type="submit" class="btn btn-primary btn-lg">Submit</button> 
                            </div>
                            
                                  </div>
                                  </div>
                                  </div>
                                 
                                  </div> </div> 
                                   
                        </div>
                    </div>
                    
               </div>
               
                  </form>
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
         
            <!-- fotter end -->
        </div>
    </div><!-- ============ Search UI Start ============= -->
    
    <!-- ============ Search UI End ============= -->
    <?php $this->load->view('admin/include/footerscript');?>
   <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'descr' );
                      
                </script>
</body>


</html>
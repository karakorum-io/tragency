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
              
               
                    <!-- ICON BG-->
                 
        <form action = "<?=base_url('master/edit_clients_action')?>" method = "post" enctype='multipart/form-data'>
                       <?php echo form_open('form'); ?> 
            
              
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG--> 
                      <?php if($data->num_rows() > 0){
                              
                                $row = $data->result()[0];
                                
                            ?>
                    <div class="offset-lg-3 col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                        <div class="card mb-3">
                             <div class="card-header text-center">
                                 <h1 class=" h5 mr-2"><b>Edit Testimonials</b></h1>
                             </div> 
                            <div class="card-body"> 
                                     
        
       
                                 <div class="row">
            
                           
                              <div class="form-group col-sm-12">
                                <label for="email">Title</label>
                                <input name="news_name" class="form-control " id="email" type="text" value="<?=$row->news_name?>" required>
                                
                            </div>
                             <div class="form-group col-sm-12">
                                <label for="email">Short Description</label>
                                <textarea name="short_descr" class="form-control " id="email" rows="4"  required><?=$row->short_descr?></textarea>
                                
                            </div>
                              <div class="form-group col-sm-12">
                            <label class="form-label">Add Image</label>
                            <input type="file" name="img"  accept="image/*"    class="form-control " >
                                         </div>
  <div class="form-group col-sm-12">
                                <label for="email">Select Destinations</label>
                                <select name="author" class="js-example-basic-multiple form-control"  required=""  >
                                 <?php if($city->num_rows() > 0){
                                     foreach($city->result() as $ro){
                                         echo'<option value="'.$ro->slug.'" '.(($ro->slug==$row->author)?'selected="selected"':"").'>'.$ro->name.'</option>';
                                     }}
                                   ?></select>
                            </div>     
                            <div class="form-group col-sm-12">
                                 <input name="id" class="form-control " id="email" type="hidden"  value="<?=$row->id?>">
                                 <button type="submit" class="btn btn-primary btn-lg">Update</button> 
                            </div>
                            
                                  </div>
                                  </div>
                                  </div>
                                 
                                  </div> </div> 
                                   
                        </div>
                    </div>
                    
               </div>
               
                  </form>
                  <?php }?>
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
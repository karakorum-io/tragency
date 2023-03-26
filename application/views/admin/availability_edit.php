<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
      <style>
    .btn_remove_area{
         position: absolute;
    top: 16px;
    right: 10px;
    padding: 0 3px;
    font-size: 9px;}
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
              
               
                    <!-- ICON BG-->
                 
        <form action = "<?=base_url('master/edit_availability_action')?>" method = "post" enctype='multipart/form-data'>
                       <?php echo form_open('form'); ?> 
            
              
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG--> 
                      <?php if($data->num_rows() > 0){
                              
                                $row = $data->result()[0];
                                
                            ?>
                    <div class="offset-lg-2 col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                        <div class="card mb-3">
                             <div class="card-header text-center">
                                 <h1 class=" h5 mr-2"><b>Edit tour option</b></h1>
                             </div> 
                            <div class="card-body"> 
                                     
        
       
                                 <div class="row">
            
                             <div class="form-group col-sm-12">
                                <label for="email">Option Name</label>
                                <input name="title" class="form-control " id="email" type="text" value="<?=$row->title?>" required>
                             </div>
                           
                            <input type="hidden" name="tourid" class="form-control"  required="" value="<?=$row->tourid?>">
                            
                              <div class="form-group col-sm-12">
                                <label for="email">Description</label>
                                 <textarea name="descr" class="form-control"  required=""  rows="4"><?=$row->descr?></textarea>

                            </div>
                            
                              <div class="form-group col-sm-12">
                            
            <div style="border: 1px solid #ddd;background: #f2f2f2;padding:5px">                           
                                <label for="email">Adult Price<br>  <a href="javascript:void(0)" id="addcustom_adultprice"> ++Add More Price</a></label>
                                 <div class="row">
                                     <div class="col-sm-12" id="contain_addcustom_adultprice">
                                         
                                        <?php
                                        $k= $j= 0;
                                        $query = $this->crud->tour_price($row->id,'adult');
                                        if($query->num_rows()>=1){
          foreach($query->result() as $roww){
          $k++; $j++;
          ?>
          <div class="row customarea<?=$k?>"><div class="form-group col-sm-4"><label for="email">Min</label><input name="amin[]" class="form-control " id="email" type="number" required="" value="<?=$roww->min?>"></div><div class="form-group col-sm-4"><label for="email">Max</label><input name="amax[]" class="form-control " id="email" type="number" required="" value="<?=$roww->max?>"></div><div class="form-group col-sm-4"><label for="email">Price</label><input name="aprice[]" class="form-control " id="email" type="number" required="" min="0" value="<?=$roww->price?>" step="any">
            <?php if($j!=1)echo'<button type="button" id="'.$k.'" class="btn btn-danger btn_remove_area"> X </button>'?>
                                         </div></div>
          <?php
          
          }}?>
                                         
                              
                                </div>
                                
                            </div></div>
                                 </div>
                                 
                                 <div class="form-group col-sm-12">
                            
            <div style="    border: 1px solid #ddd;
    background: #f2f2f2;padding:5px">                           
                                <label for="email">Child Price<br>  <a href="javascript:void(0)" id="addcustom_childprice"> ++Add More Price</a></label>
                                  <div class="row">
                                     <div class="col-sm-12" id="contain_addcustom_childprice">
                                 <?php
                                         $j= 0;
                                        $query = $this->crud->tour_price($row->id,'child');
                                        if($query->num_rows()>=1){
          foreach($query->result() as $roww){
          $k++; $j++;
          ?>
          <div class="row customarea<?=$k?>"><div class="form-group col-sm-4"><label for="email">Min</label><input name="cmin[]" class="form-control " id="email" type="number" required="" value="<?=$roww->min?>"></div><div class="form-group col-sm-4"><label for="email">Max</label><input name="cmax[]" class="form-control " id="email" type="number" required="" value="<?=$roww->max?>"></div><div class="form-group col-sm-4"><label for="email">Price</label><input name="cprice[]" class="form-control " id="email" type="number" required="" min="0" value="<?=$roww->price?>" step="any">
            <?php if($j!=1)echo'<button type="button" id="'.$k.'" class="btn btn-danger btn_remove_area"> X </button>'?>
                                         </div></div>
          <?php
          
          }}?>
                            </div>
                                 </div>
                                  </div>
                                 </div>
                            
                              <div class="form-group col-sm-2 mt-3">    
                                 <button type="button" id="addcustom_area" class="btn btn-secondary m-auto">Add Time</button> </div>
                               
                               <div class="form-group col-sm-10 mt-3"> 
                                <div class="row" id="custom_area_container">
                            <?php $j= 0;
                                 $time = explode(',',$row->time);
                                   foreach($time as $row2){
                                       $k++; $j++;
                                      ?>
                                      <div class="form-group col-sm-3 customarea<?=$k?>"><label for="email">Tour Time</label>
                                      <select name="time[]" class="form-control " id="email" required="">
        <option value="<?=$row2?>"><?=date('h:i a', strtotime($row2))?></option><option value="00:00">12:00 am</option><option value="00:30">12:30 am</option><option value="01:00">1:00 am</option><option value="01:30">1:30 am</option><option value="02:00">2:00 am</option><option value="02:30">2:30 am</option><option value="03:00">3:00 am</option><option value="03:30">3:30 am</option><option value="04:00">4:00 am</option><option value="04:30">4:30 am</option><option value="05:00">5:00 am</option><option value="05:30">5:30 am</option><option value="06:00">6:00 am</option><option value="06:30">6:30 am</option><option value="07:00">7:00 am</option><option value="07:30">7:30 am</option><option value="08:00">8:00 am</option><option value="08:30">8:30 am</option><option value="09:00">9:00 am</option><option value="09:30">9:30 am</option><option value="10:00">10:00 am</option><option value="10:30">10:30 am</option><option value="11:00">11:00 am</option><option value="11:30">11:30 am</option><option value="12:00">12:00 pm</option><option value="12:30">12:30 pm</option><option value="13:00">1:00 pm</option><option value="13:30">1:30 pm</option><option value="14:00">2:00 pm</option><option value="14:30">2:30 pm</option><option value="15:00">3:00 pm</option><option value="15:30">3:30 pm</option><option value="16:00">4:00 pm</option><option value="16:30">4:30 pm</option><option value="17:00">5:00 pm</option><option value="17:30">5:30 pm</option><option value="18:00">6:00 pm</option><option value="18:30">6:30 pm</option><option value="19:00">7:00 pm</option><option value="19:30">7:30 pm</option><option value="20:00">8:00 pm</option><option value="20:30">8:30 pm</option><option value="21:00">9:00 pm</option><option value="21:30">9:30 pm</option><option value="22:00">10:00 pm</option><option value="22:30">10:30 pm</option><option value="23:00">11:00 pm</option><option value="23:30">11:30 pm</option>         </select><?php if($j!=1)echo'<button type="button" id="'.$k.'" class="btn btn-danger btn_remove_area"> X </button>'?></div>
                         <?php }?>
                            
                            </div>
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
    <script>
      
   var k=250;  
      $('#addcustom_area').click(function(){  
     	$('#custom_area_container').append('<div class="form-group col-sm-3 customarea'+k+'"><label for="email">Tour Time</label><select name="time[]" class="form-control " id="email" required=""><option value="00:00">12:00 am</option><option value="00:30">12:30 am</option><option value="01:00">1:00 am</option><option value="01:30">1:30 am</option><option value="02:00">2:00 am</option><option value="02:30">2:30 am</option><option value="03:00">3:00 am</option><option value="03:30">3:30 am</option><option value="04:00">4:00 am</option><option value="04:30">4:30 am</option><option value="05:00">5:00 am</option><option value="05:30">5:30 am</option><option value="06:00">6:00 am</option><option value="06:30">6:30 am</option><option value="07:00">7:00 am</option><option value="07:30">7:30 am</option><option value="08:00">8:00 am</option><option value="08:30">8:30 am</option><option value="09:00">9:00 am</option><option value="09:30">9:30 am</option><option value="10:00">10:00 am</option><option value="10:30">10:30 am</option><option value="11:00">11:00 am</option><option value="11:30">11:30 am</option><option value="12:00">12:00 pm</option><option value="12:30">12:30 pm</option><option value="13:00">1:00 pm</option><option value="13:30">1:30 pm</option><option value="14:00">2:00 pm</option><option value="14:30">2:30 pm</option><option value="15:00">3:00 pm</option><option value="15:30">3:30 pm</option><option value="16:00">4:00 pm</option><option value="16:30">4:30 pm</option><option value="17:00">5:00 pm</option><option value="17:30">5:30 pm</option><option value="18:00">6:00 pm</option><option value="18:30">6:30 pm</option><option value="19:00">7:00 pm</option><option value="19:30">7:30 pm</option><option value="20:00">8:00 pm</option><option value="20:30">8:30 pm</option><option value="21:00">9:00 pm</option><option value="21:30">9:30 pm</option><option value="22:00">10:00 pm</option><option value="22:30">10:30 pm</option><option value="23:00">11:00 pm</option><option value="23:30">11:30 pm</option>         </select><button type="button"  id="'+k+'" class="btn btn-danger btn_remove_area"> X </button></div>'); 
		k++;  
 
	  });
	  
	    $('#addcustom_adultprice').click(function(){  
     	$('#contain_addcustom_adultprice').append('<div class="row customarea'+k+'"><div class="form-group col-sm-4"><label for="email">Min</label><input name="amin[]" class="form-control " id="email" type="number"  required></div><div class="form-group col-sm-4"><label for="email">Max</label><input name="amax[]" class="form-control " id="email" type="number"  required></div><div class="form-group col-sm-4"><label for="email">Price</label><input name="aprice[]" class="form-control " id="email" type="number"  required min="0" value="0" step="any"><button type="button"  id="'+k+'" class="btn btn-danger btn_remove_area"> X </button></div></div>'); 
		k++;  
 
	  });
	  
	  	   $('#addcustom_childprice').click(function(){  
     	$('#contain_addcustom_childprice').append('<div class="row customarea'+k+'"><div class="form-group col-sm-4"><label for="email">Min</label><input name="cmin[]" class="form-control " id="email" type="number"  required></div><div class="form-group col-sm-4"><label for="email">Max</label><input name="cmax[]" class="form-control " id="email" type="number"  required></div><div class="form-group col-sm-4"><label for="email">Price</label><input name="cprice[]" class="form-control " id="email" type="number"  required min="0" value="0" step="any"><button type="button"  id="'+k+'" class="btn btn-danger btn_remove_area"> X </button></div></div>'); 
		k++;  
 
	  });
	  
	  
	  $(document).on('click', '.btn_remove_area', function(){  
   
           var button_id = $(this).attr("id");   
           $('.customarea'+button_id+'').remove();  
           });
           

       
   </script>
</body>


</html>
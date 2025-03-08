<!DOCTYPE html>
<html>
<head>
   <?php $this->load->view('admin/include/head'); ?>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
    .btn_remove_area{
         position: absolute;
    top: 16px;
    right: 10px;
    padding: 0 3px;
    font-size: 9px;}
    </style>
<style>
    .select2-container {
       width: 100%!important;}
</style>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header');?>
        <?php $this->load->view('admin/include/sidebar');?>
              <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3 class="mr-2">Add Tour Package</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php $this->load->view('admin/include/message-alert'); ?>
                                        <form id="addPackage" action="<?php echo $this->controllerUrl ?>add/<?=$package->id?>"
                                            method="POST" enctype='multipart/form-data'>
                                           <div class="row">
            
                             <div class="form-group col-sm-12">
                                <label for="email">Option Name</label>
                                <input name="title" class="form-control " id="email" type="text"  required>
                             </div>
                           
                              
                            
                            
                              <div class="form-group col-sm-12">
                                <label for="email">Description</label>
                                 <textarea name="descr" class="form-control"  required="" rows="4"></textarea>

                            </div>
                            <div class="form-group col-sm-12">
                            
            <div style="    border: 1px solid #ddd;
    background: #f2f2f2;padding:5px">                           
                                <label for="email">Adult Price<br>  <a href="javascript:void(0)" id="addcustom_adultprice"> ++Add More Price</a></label>
                                 <div class="row">
                                     <div class="col-sm-12" id="contain_addcustom_adultprice">
                                  <div class="row">    
                             <div class="form-group col-sm-4">
                                <label for="email">Min</label>
                                <input name="amin[]" class="form-control " id="email" type="number"  required>
                            </div>
                              <div class="form-group col-sm-4">
                                <label for="email">Max</label>
                                <input name="amax[]" class="form-control " id="email" type="number"  required>
                            </div>
                             <div class="form-group col-sm-4">
                                <label for="email">Price</label>
                                <input name="aprice[]" class="form-control " id="email" type="number"  required min="0" value="0" step="any">
                            </div>
                                 </div>
                                </div>
                                
                            </div></div>
                                 </div>
                                  <div class="form-group col-sm-12">
                            
            <div style="    border: 1px solid #ddd;
    background: #f2f2f2;padding:5px">                           
                                <label for="email">Child Price<br>  <a href="javascript:void(0)" id="addcustom_childprice"> ++Add More Price</a></label>
                                 <div class="row">
                                     <div class="col-sm-12" id="contain_addcustom_childprice">
                                  <div class="row">    
                             <div class="form-group col-sm-4">
                                <label for="email">Min</label>
                                <input name="cmin[]" class="form-control " id="email" type="number"  required>
                            </div>
                              <div class="form-group col-sm-4">
                                <label for="email">Max</label>
                                <input name="cmax[]" class="form-control " id="email" type="number"  required>
                            </div>
                             <div class="form-group col-sm-4">
                                <label for="email">Price</label>
                                <input name="cprice[]" class="form-control " id="email" type="number"  required min="0" value="0" step="any">
                            </div>
                                 </div>
                                </div>
                                
                            </div></div>
                                 </div>
                             
                             <div class="form-group col-sm-12 mt-3">    
                                  <div class="row" id="custom_area_container">
                              <div class="form-group col-sm-2 d-flex">
                               <button type="button" id="addcustom_area" class="btn btn-secondary m-auto">Add Time</button> 
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="email">Tour Time</label>
                                <select name="time[]" class="form-control " id="email" required=""><option value="00:00">12:00 am</option><option value="00:30">12:30 am</option><option value="01:00">1:00 am</option><option value="01:30">1:30 am</option><option value="02:00">2:00 am</option><option value="02:30">2:30 am</option><option value="03:00">3:00 am</option><option value="03:30">3:30 am</option><option value="04:00">4:00 am</option><option value="04:30">4:30 am</option><option value="05:00">5:00 am</option><option value="05:30">5:30 am</option><option value="06:00">6:00 am</option><option value="06:30">6:30 am</option><option value="07:00">7:00 am</option><option value="07:30">7:30 am</option><option value="08:00">8:00 am</option><option value="08:30">8:30 am</option><option value="09:00">9:00 am</option><option value="09:30">9:30 am</option><option value="10:00">10:00 am</option><option value="10:30">10:30 am</option><option value="11:00">11:00 am</option><option value="11:30">11:30 am</option><option value="12:00">12:00 pm</option><option value="12:30">12:30 pm</option><option value="13:00">1:00 pm</option><option value="13:30">1:30 pm</option><option value="14:00">2:00 pm</option><option value="14:30">2:30 pm</option><option value="15:00">3:00 pm</option><option value="15:30">3:30 pm</option><option value="16:00">4:00 pm</option><option value="16:30">4:30 pm</option><option value="17:00">5:00 pm</option><option value="17:30">5:30 pm</option><option value="18:00">6:00 pm</option><option value="18:30">6:30 pm</option><option value="19:00">7:00 pm</option><option value="19:30">7:30 pm</option><option value="20:00">8:00 pm</option><option value="20:30">8:30 pm</option><option value="21:00">9:00 pm</option><option value="21:30">9:30 pm</option><option value="22:00">10:00 pm</option><option value="22:30">10:30 pm</option><option value="23:00">11:00 pm</option><option value="23:30">11:30 pm</option>
                                </select>
                            </div>
                            
                            </div></div>
                              <div class="form-group col-sm-12">
                                 <button type="submit" class="btn btn-primary btn-lg">Submit</button> 
                            </div>
                             </div>
                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-grow-1"></div>
    </div>
    <?php $this->load->view('admin/include/footerscript'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
      
   var k=1;  
      $('#addcustom_area').click(function(){  
     	$('#custom_area_container').append('<div class="form-group col-sm-2 customarea'+k+'"><label for="email">Tour Time</label><select name="time[]" class="form-control " id="email" required=""><option value="00:00">12:00 am</option><option value="00:30">12:30 am</option><option value="01:00">1:00 am</option><option value="01:30">1:30 am</option><option value="02:00">2:00 am</option><option value="02:30">2:30 am</option><option value="03:00">3:00 am</option><option value="03:30">3:30 am</option><option value="04:00">4:00 am</option><option value="04:30">4:30 am</option><option value="05:00">5:00 am</option><option value="05:30">5:30 am</option><option value="06:00">6:00 am</option><option value="06:30">6:30 am</option><option value="07:00">7:00 am</option><option value="07:30">7:30 am</option><option value="08:00">8:00 am</option><option value="08:30">8:30 am</option><option value="09:00">9:00 am</option><option value="09:30">9:30 am</option><option value="10:00">10:00 am</option><option value="10:30">10:30 am</option><option value="11:00">11:00 am</option><option value="11:30">11:30 am</option><option value="12:00">12:00 pm</option><option value="12:30">12:30 pm</option><option value="13:00">1:00 pm</option><option value="13:30">1:30 pm</option><option value="14:00">2:00 pm</option><option value="14:30">2:30 pm</option><option value="15:00">3:00 pm</option><option value="15:30">3:30 pm</option><option value="16:00">4:00 pm</option><option value="16:30">4:30 pm</option><option value="17:00">5:00 pm</option><option value="17:30">5:30 pm</option><option value="18:00">6:00 pm</option><option value="18:30">6:30 pm</option><option value="19:00">7:00 pm</option><option value="19:30">7:30 pm</option><option value="20:00">8:00 pm</option><option value="20:30">8:30 pm</option><option value="21:00">9:00 pm</option><option value="21:30">9:30 pm</option><option value="22:00">10:00 pm</option><option value="22:30">10:30 pm</option><option value="23:00">11:00 pm</option><option value="23:30">11:30 pm</option>         </select><button type="button"  id="'+k+'" class="btn btn-danger btn_remove_area"> X </button></div>'); 
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
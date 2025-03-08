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
                                        <form id="addPackage" action="<?php echo $this->controllerUrl ?>add"
                                            method="POST" enctype='multipart/form-data'>
                                            <div class="row">
            
                             <div class="form-group col-sm-12">
                                <label for="email">Tour Name</label>
                                <input name="name" class="form-control " id="email" type="text"  required>
                                
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="email">Select Destinations</label>
                                <select name="destination[]" class="js-example-basic-multiple form-control"  required=""  multiple="multiple">
                                 <?php if(count($destination) > 0){
                                     foreach($destination as $row){
                                         echo'<option value="'.$row->id.'">'.$row->name.'</option>';
                                     }}
                                   ?></select>
                            </div>
                              <div class="form-group col-sm-4">
                                <label for="email">Tour Price</label>
                                <input name="tour_price" class="form-control " id="tour_price" type="number"  required   min="0" step="any">
                            </div>
                             <div class="form-group col-sm-4">
                                <label for="email">Discounted Price</label>
                                <input name="price" class="form-control " id="price" type="number"  required   min="0" step="any">
                            </div>
                             <div class="form-group col-sm-4">
                                <label for="email">Off(%)</label>
                                <input name="sale" class="form-control " id="sale" type="number"  required value="0" readonly>
                            </div>
                              <div class="form-group col-sm-6">
                                <label for="email">Main Image</label>
                                <input name="image" class="form-control " id="email" type="file" accept="image/*" >
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Gallary Images</label>
                                <input name="gallery[]" class="form-control " id="email" type="file" accept="image/*" multiple="multiple">
                            </div>
                             <div class="form-group col-sm-12">
                                <label for="email">Short Description</label>
                                <textarea name="short_desc" class="form-control "  required  rows="4"></textarea>
                                
                            </div>
                              <div class="form-group col-sm-12">
                                <label for="email">Overview</label>
                                 <textarea name="overview" class="form-control"  required=""></textarea>

                            </div>
                               <div class="form-group col-sm-6">
                                <label for="email">Includes</label>
                                 <textarea name="includes" class="form-control"  ></textarea>
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Excludes</label>
                                 <textarea name="excludes" class="form-control"  ></textarea>
                            </div>
                               <div class="form-group col-sm-12">
                                <label for="email">Additional info</label>
                                 <textarea name="additional" class="form-control"  ></textarea>
                            </div>
                           <div class="form-group col-sm-4">
                                <label for="email">Start Date</label>
                                <input name="start_date" class="form-control " id="email" type="date"  required>
                            </div>
                              <div class="form-group col-sm-4">
                                <label for="email">End Date</label>
                                <input name="end_date" class="form-control " id="email" type="date" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="email">Duration</label>
                                <input name="duration" class="form-control " id="email" type="text" required>
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">weekly off</label>
                                <select name="weekly_off" class="form-control weekly_off" required="" >
                               <option value="no">no</option>
                               <option value="yes">yes</option>
                               </select>
                            </div>
                             <div class="form-group col-sm-6 weaklydays " style="display:none">
                                <label for="email">Select Days</label>
                                <select name="weaklydays[]" class="js-example-basic-multiple form-control" multiple="multiple">
                                <option value="monday">monday</option>
                                <option value="tuesday">tuesday</option>
                                <option value="wednesday">wednesday</option>
                                <option value="thursday">thursday</option>
                                <option value="friday">friday</option>
                                <option value="saturday">saturday</option>
                                <option value="sunday">sunday</option>
                                  </select>
                            </div>
   <div class="form-group col-sm-12">
      <div style="    border: 1px solid #ddd;background: #f2f2f2;padding:5px">                           
                                <label for="email">Tour Plan<br>  <a href="javascript:void(0)" id="addcustom_adultprice"> ++Add More</a></label>
                                 <div id="contain_addcustom_adultprice" >
                                  <div class="row">    
                             <div class="form-group col-sm-12">
                                <input name="plan_title[]" class="form-control "  type="text"  required placeholder="Tour Plan Title">
                            </div>
                              <div class="form-group col-sm-12">
                                <textarea name="plan_desc[]" rows="4" class="form-control " required placeholder="Tour Plan Detail"></textarea>
                            </div>
                            </div>
                                                            </div>
                            </div>
                                
                            </div>
                          
                             <div class="form-group col-sm-6">
                                <label for="email">Departure Location</label>
                                <input name="depart" class="form-control " type="text"  >
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Return Location</label>
                                <input name="return" class="form-control " type="text"  >
                            </div>
                              <div class="form-group col-sm-6">
                                <label for="email">Tripadvisor Link</label>
                                <input name="tadvsr" class="form-control " type="text"  >
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Viator Link</label>
                                <input name="viator" class="form-control " type="text"   >
                            </div>
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
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
                        CKEDITOR.replace( 'overview' );
                        CKEDITOR.replace( 'includes' );
                        CKEDITOR.replace( 'excludes' );
                        CKEDITOR.replace( 'additional' );
                </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
      $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

$('.weekly_off').on('change', function() {
   $(".weaklydays").toggle();
});

$("#price").change(function(){
      let tour_price = $("#tour_price").val();
       let price = $("#price").val();
       
       let sale =   Math.floor(((tour_price-price)*100)/tour_price);
       $("#sale").val(sale);
});

 var k=1;  
	  $('#addcustom_adultprice').click(function(){  
     	$('#contain_addcustom_adultprice').append('<div class="row customarea'+k+'"><div class="form-group col-sm-12"><input name="plan_title[]" class="form-control "  type="text"  required placeholder="Tour Plan Title"></div><div class="form-group col-sm-12"><textarea name="plan_desc[]" rows="4" class="form-control " required placeholder="Tour Plan Detail"></textarea><button type="button"  id="'+k+'" class="btn btn-danger btn_remove_area"> X </button></div></div>'); 
		k++;  
 
	  });
	  
 
	  
	  $(document).on('click', '.btn_remove_area', function(){  
   
           var button_id = $(this).attr("id");   
           $('.customarea'+button_id+'').remove();  
           });
           

       
   </script>

</body>


</html>
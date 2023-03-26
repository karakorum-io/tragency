<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
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
         .image_view img{
                 max-height: 100px;

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
              
               
                    <!-- ICON BG-->
                 
        <form action = "<?=base_url('master/edit_product_action')?>" method = "post" enctype='multipart/form-data'>
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
                                 <h1 class=" h5 mr-2"><b>Edit tour</b></h1>
                             </div> 
                            <div class="card-body"> 
                                     
        
       
                                 <div class="row">
            
                              <div class="form-group col-sm-12">
                                <label for="email">Tour Name</label>
                                <input name="name" class="form-control " id="email" type="text" value="<?=$row->name?>" required >
                                
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="email">Select Destinations</label>
                                <select name="destination[]" class="js-example-basic-multiple form-control"  required=""  multiple="multiple">
                                 <?php
                                 $destination = explode(',',$row->destination);
                                 if($data1->num_rows() > 0){
                                     foreach($data1->result() as $row1){
                                         echo'<option value="'.$row1->id.'" '.(in_array($row1->id, $destination)?'selected="selected"':"").'>'.$row1->name.'</option>';
                                     }}
                                    
                            ?></select>
                            </div>
                             <div class="form-group col-sm-4">
                                <label for="email">Tour Price</label>
                                <input name="tour_price" class="form-control " id="tour_price" type="number"  required value="<?=$row->tour_price?>" min="0" step="any">
                            </div>
                             <div class="form-group col-sm-4">
                                <label for="email">Discounted Price</label>
                                <input name="price" class="form-control " id="price" type="number"  required value="<?=$row->price?>" min="0" step="any">
                            </div>
                             <div class="form-group col-sm-4">
                                <label for="email">Off(%)</label>
                                <input name="sale" class="form-control " id="sale" type="number"  required value="<?=$row->sale?>" readonly>
                            </div>
                              <div class="form-group col-sm-12">
                                <label for="email">Main Image</label>
                                <input name="image" class="form-control " id="email" type="file" accept="image/*" >
                            </div>
                             <div class="form-group col-sm-12">
                                <label for="email">Gallary Images</label>
                                <input name="gallery[]" class="form-control " id="email" type="file" accept="image/*" multiple="multiple">
                                <div class="image_view d-flex">
                                 <?php
                                 $destination = explode(',',$row->gallery);
                                 if(!empty($destination)){
                                     $i=1;
                                     foreach($destination as $row1){
                                         $i++;
                                        echo'<div class="gall'.$i.'"><img src="'.base_url().$row1.'" class="img-fluid img-thumbnail"><span class="badge badge-danger remover" data-id="gall'.$i.'">X</span><input name="oldgallery[]" class="imgremove" value="'.$row1.'" type="hidden"></div>'; 
                                     }
                                 }
                                 ?>
                            </div> </div>
                            
                             <div class="form-group col-sm-12">
                                <label for="email">Short Description</label>
                                <textarea name="short_desc" class="form-control "  required rows="4"><?=$row->short_desc?></textarea>
                                
                            </div>
                              <div class="form-group col-sm-12">
                                <label for="email">Overview</label>
                                 <textarea name="overview" class="form-control"  required=""><?=$row->overview?></textarea>

                            </div>
                               <div class="form-group col-sm-6">
                                <label for="email">Includes</label>
                                 <textarea name="includes" class="form-control"  ><?=$row->includes?></textarea>
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Excludes</label>
                                 <textarea name="excludes" class="form-control"  ><?=$row->excludes?></textarea>
                            </div>
                               <div class="form-group col-sm-12">
                                <label for="email">Additional info</label>
                                 <textarea name="additional" class="form-control"  ><?=$row->additional?></textarea>

                            </div>
                             <div class="form-group col-sm-4">
                                <label for="email">Start Date</label>
                                <input name="start_date" class="form-control " id="email" type="date" value="<?=$row->start_date?>" required>
                            </div>
                              <div class="form-group col-sm-4">
                                <label for="email">End Date</label>
                                <input name="end_date" class="form-control " id="email" type="date" required  value="<?=$row->end_date?>" >
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="email">Duration</label>
                                <input name="duration" class="form-control " id="email" type="text" required  value="<?=$row->duration?>" >
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">weekly off</label>
                                <select name="weekly_off" class="form-control weekly_off" required="" >
                               <option value="no" <?=(($row->weekly_off=='no')?'selected="selected"':"")?>>no</option>
                               <option value="yes" <?=(($row->weekly_off=='yes')?'selected="selected"':"")?>>yes</option>
                               </select>
                            </div>
                             <div class="form-group col-sm-6 weaklydays " <?=(($row->weekly_off=='no')?'style="display:none"':"")?>>
                                <label for="email">Select Days</label>
                                <select name="weaklydays[]" class="js-example-basic-multiple form-control" multiple="multiple">
                                    <?php  $weaklydays = explode(',',$row->weaklydays);?>
                                <option <?=(in_array('monday',$weaklydays)?'selected="selected"':"")?> value="monday">monday</option>
                                <option <?=(in_array('tuesday',$weaklydays)?'selected="selected"':"")?> value="tuesday">tuesday</option>
                                <option <?=(in_array('wednesday',$weaklydays)?'selected="selected"':"")?> value="wednesday">wednesday</option>
                                <option <?=(in_array('thursday',$weaklydays)?'selected="selected"':"")?> value="thursday">thursday</option>
                                <option <?=(in_array('friday',$weaklydays)?'selected="selected"':"")?> value="friday">friday</option>
                                <option <?=(in_array('saturday',$weaklydays)?'selected="selected"':"")?> value="saturday">saturday</option>
                                <option <?=(in_array('sunday',$weaklydays)?'selected="selected"':"")?> value="sunday">sunday</option>
                                  </select>
                            </div>`
                            
                            <div class="form-group col-sm-12">
      <div style="    border: 1px solid #ddd;background: #f2f2f2;padding:5px">                           
                                <label for="email">Tour Plan<br>  <a href="javascript:void(0)" id="addcustom_adultprice"> ++Add More</a></label>
                                 <div id="contain_addcustom_adultprice" >
                                     
                                                       <?php
                                        $k= $j= 0;
                              $plan_title = json_decode($row->plan_desc);
                             
           if(!empty($plan_title)) { foreach($plan_title as $x) {
          $k++; $j++;
          ?>
          <div class="row customarea<?=$k?>"><div class="form-group col-sm-12"><input name="plan_title[]" class="form-control "  type="text"  required placeholder="Tour Plan Title" value="<?=$x->title?>"></div><div class="form-group col-sm-12"><textarea name="plan_desc[]" rows="4" class="form-control " required placeholder="Tour Plan Detail"><?=$x->descr?></textarea>
            <?php if($j!=1)echo'<button type="button" id="'.$k.'" class="btn btn-danger btn_remove_area"> X </button>'?>
                                         </div></div>
          <?php
          
          }}else{
          ?>
          <div class="row customarea1"><div class="form-group col-sm-12"><input name="plan_title[]" class="form-control " type="text" required="" placeholder="Tour Plan Title" autocomplete="off"></div><div class="form-group col-sm-12"><textarea name="plan_desc[]" rows="4" class="form-control " required="" placeholder="Tour Plan Detail"></textarea></div></div>
          <?php }?>
          </div>
                            </div>
                                
                            </div>
                              <div class="form-group col-sm-12">
                               <textarea name="map" rows="4" class="form-control " required placeholder="Location"><?=$row->map?></textarea>
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Departure Location</label>
                                <input name="depart" class="form-control " type="text" value="<?=$row->depart?>" >
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Return Location</label>
                                <input name="return" class="form-control " type="text"  value="<?=$row->return?>" >
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Tripadvisor Link</label>
                                <input name="tadvsr" class="form-control " type="text" value="<?=$row->tadvsr?>" >
                            </div>
                             <div class="form-group col-sm-6">
                                <label for="email">Viator Link</label>
                                <input name="viator" class="form-control " type="text"  value="<?=$row->viator?>" >
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
                        CKEDITOR.replace( 'overview' );
                         CKEDITOR.replace( 'excludes' );
                        CKEDITOR.replace( 'includes' );
                        CKEDITOR.replace( 'additional' );
                </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
  
  $("#price").change(function(){
      let tour_price = $("#tour_price").val();
       let price = $("#price").val();
       
       let sale =   Math.floor(((tour_price-price)*100)/tour_price);
       $("#sale").val(sale);
});

  
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

$(document).on('click','.remover', function(){
$(this).parent().remove();
 });
 
 $('.weekly_off').on('change', function() {
   $(".weaklydays").toggle();
});
 
 
 var k=80;  
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
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>
 <style>
     .tour-details-gallery .details p {
    color: #000;
}
 </style>
<body>
    <?php include 'includes/header.php' ?>
   
      
    
      <div class="breadcrumb-area style-two jarallax" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner ">
                        <h4 class="page-title">Bookings</h4>
                        <ul class="page-list">
                            <li><a href="<?=base_url()?>">Home</a></li>
                            <li>Bookings</li>
                        </ul>
                             
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
      <div class="tour-details-area mg-top--70">
        <div class="tour-details-gallery">
           
                <div class="container">
                  
                    <div class="row">
                        
                         <?php
            if($data->num_rows()>0){
                $i = 1;
                foreach($data->result_array() as $row){
                 
                 $id = $row['tour_id'];
	$oid = $row['option_id'];
	$option=$this->crud->get_data("availability", " and id='$oid' ", "*", "full","", "", "order by id desc")->result()[0];
	$detail= $this->crud->get_data("product", "and id=$id ", "*", "full","", "","")->result()[0];
                 
                 ?>
                         <div class="col-xl-12">
                   <div class="widget tour-list-widget" style="    border-radius: 0.5rem;padding: 15px;border: 1px solid #e5e5e5;">
                       
                        <div class="single-destinations-list style-three">
                            <div class="thumb" style="    min-height: 115px;">
                                <img src="<?=base_url()?><?=$detail->image?>" alt="list">
                            </div>
                            <div class="details">
                               
                               
                                <h4 style="color: #000;"><b><?=$detail->name?></b> (<?=$detail->duration?>)</h4>
                            
                                <p class="book-list-content"><?=$detail->name?></p>
                                <p>Travel Date : <?=date('M d, Y', strtotime($row['travel_date']))?></p>
                                <p><?=$option->title?> (<?=date('h:i a', strtotime($row['travel_time']))?>)</p>
                                 <p><?=$row['adult']?> Adult, <?=$row['child']?> Child, <?=$row['infant']?> Infant</p>
                                <h3><b>Total:</b> <span><?=$settings->currency_symbol?><?=$row['total']?></span></h3>
                            </div>
                             
                        </div>
                       
                           
                                
                </div> 
                </div>
                <?php }
            }?>
                </div>
                 
            </div>
        </div>
         
 </div>
    <!-- tour list area End -->
  
    <?php include 'includes/footer.php' ?>
     
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>
<body>
    <?php include 'includes/header.php' ?>
    <div class="banner-area tp-main-search-area">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
      <?php if($banner_img->num_rows()>0){
          $banner = $banner_img;
      }else{
         $banner = $dest_detail;
      }
      $i=0;
      foreach($banner->result() as $row){
          $i++;
          echo '<div class="carousel-item '.(($i=='1')?'active"':"").'" >
      <img class="d-block w-100" src="'.base_url().$row->image.'" alt="Tour & Travels">
    </div>';
      }
      ?>
   
     
  </div>
 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
     <!-- intro area start -->
      <?php
                $dest_detail = $dest_detail->result()[0];?>
     <div class="page-breadcrumb container">
    <ol class="breadcrumb">
      <li>
        <a href="<?=base_url()?>">Home</a>
      </li>

      <li class="breadcrumb-item active">
       <?=$dest_detail->name?>
      </li>
    </ol>
  </div>
     <div class="intro-area">
        <div class="container pd-top-70">
            <div class="section-title text-lg-center text-left">
               
                <h2 class="title"><?=$dest_detail->name?></h2>
            </div>
        </div>
    </div>
    <!-- intro area End -->
<!-- tour list area End -->
<div class="tour-list-area">
        <div class="container">
            <div class="row">
        <div class="col-xl-12">
                            
                <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home" class="active">Overview</a></li>
  <li><a data-toggle="tab" href="#menu1"><?=$dest_detail->name?> Tour Packages</a></li>
</ul>

<div class="tab-content pb-5">
  <div id="home" class="tab-pane  in active">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-xxl-12 offset-xxl-0 lead mt-5">
        <?=$dest_detail->overview?>
    </div>
     
    <div class="col-12 col-md-10 offset-md-1 col-xxl-12 offset-xxl-0 lead mt-5">
        <div class="container pd-top-70">
            <div class="section-title text-lg-center text-left">
                <h2 class="title">Best Time to Visit <?=$dest_detail->name?></h2>
            </div>
        </div>
        <div>
            <?=$dest_detail->weather?>
        </div>
    </div>
     <div class="container pd-top-70">
            <div class="row">
                 <div class="col-xl-12">
                <div class="section-title mb-lg-0 mb-4 text-center">
                         
                        <h2 class="title mb-4"><?=$dest_detail->name?> GOES WELL WITH</h2>
                      </div>
                 
                </div>
                    <style>
                        .single-blog .single-blog-details {
    background: transparent;}
                    </style>
                <div class="col-lg-12">
                    <div class="row">
                        <?php
                        $i=0;
                                if($destination1->num_rows()>=1){
                                    foreach($destination1->result() as $row){
                                         $i++;
                                          if ($i == 9) {
        break;   
    }
                                        echo'<div class="col-sm-3 col-6">
                            <div class="single-blog style-three">
                                <div class="thumb">
                                    <img src="'.base_url().$row->image.'" alt="blog">
                                </div>
                                <div class="single-blog-details-wrap">
                                    <div class="single-blog-details text-center">
                                       
                                        <h3 class="title">'.$row->name.'</h3>
                                        <a class="btn btn-yellow" href="'.base_url().'destination/'.$row->slug.'" style="    height: auto;
    line-height: initial;"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                                    }
                                }?>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  </div>
  <div id="menu1" class="tab-pane ">
      <div class="container Itineraries itin- tw-overflow-hidden mt-5">
      <div class="row">
    <div class="col-12">
      <h2 class="h2 tw-text-center tw-mb-12">
        <span id="countrytotalitin"></span> <?=$dest_detail->name?> Itineraries
      </h2>
    </div>

    <div class="col-12">
      <div class="p-2 mb-4" style="background: #e2e2e2;">
           <form class="form" action="<?=base_url()?>welcome/tour_filter" name="myForm" method="post" id="add_to_cart">  
        <div class="row">
          <div class="col-12 col-md-3">
              <div class="single-widget-search-input-title mt-0">Destination</div>
              <select class="form-control w-100" name="dest_array" >
                   <option></option>       
                                 <?php
                                if($destination->num_rows()>=1){
                                    foreach($destination->result() as $row){
                                        echo'<option value="'.$row->id.'" '.(($row->id==$dest_detail->id)?'selected="selected"':"").'> '.$row->name.'</option>';
                                    }
                                }?>                     
                            </select>
                  </div>
                   <div class="col-12 col-md-3">
              <div class="single-widget-search-input-title mt-0">Duration</div>
              <select class="form-control w-100"  name="duration" >
                                 <option></option>       
                                 <?php
                                if($duration->num_rows()>=1){
                                    foreach($duration->result() as $row){
                                        echo'<option value="'.$row->duration.'"> '.$row->duration.'</option>';
                                    }
                                }?>                   
                            </select>
                  </div>
<style>
    .widget-product-sorting .slider-product-sorting {
    
    margin: 0 10px 4px 10px;
}
</style>
          <div class="col-12 col-md-3">
               <div class="single-widget-search-input-title mt-0"> Price Filter</div>
                                <div class="widget-product-sorting">
                                    <div class="slider-product-sorting"></div>
                                    <div class="product-range-detail">
                                        
                                        <input type="text" id="amount" name="price_filter" readonly>
                                    </div>
                                </div>
                   </div>
                   <div class="col-12 col-md-3">
                       <div class="single-widget-search-input-title mt-0"> Filter</div> <button type="submit" class="btn btn-outline-gold stretched-link w-100">Apply Filter</button></div>

          
        </div>
        </form>
      </div>
    </div>
  </div>
      
                    <div class="tour-list-area mt-4" id="ajax_data">
                        
                         <?php
            if($tour->num_rows()>0){
                $i = 1;
                foreach($tour->result() as $row){
                 ?>
                    
                       <div class="single-destinations-list style-three">
                            <div class="thumb u-image-filter img-fill md:tw-mt-1 bg-blue-light">
                                  
                                <img src="<?=base_url()?><?=$row->image?>" alt="<?=$row->name?>">
                            </div>
                            <div class="details">
                               
                               <div class="row">
                                   <div class="col-12 col-lg-8 bs-lg:tw-pr-6">
                                     <h2 class="h3 tw-mb-4">
      <a href="<?=base_url()?>tours/<?=urlencode(str_replace(' ', '-', $row->name))?>/<?=$row->id?>">
      <?=$row->name?>
      </a>
    </h2>    
                                <p class="content"><?=mb_substr($row->short_desc,0,300)?>...</p>
                                
                                   </div>
                                   <div class="col-12 col-lg-4 md:tw-pt-2 md:tw-px-0">
    <div class="row">
      <dl class="col-6 col-sm-12"><dt class="h4 tw-text-gold tw-mb-1">Duration</dt><dd class="text-small"><?=$row->duration?></dd></dl><dl class="col-6 col-sm-12">
          <dt class="h4 tw-text-gold tw-mb-1">Price Per Person</dt><dd class="text-small">From <?php if($row->sale!=0)echo'<del>'.$settings->currency_symbol.$row->tour_price.'</del>';?> &nbsp;<?=$settings->currency_symbol.$row->price?></dd></dl>    </div>

    <div class=" md:tw-text-left">
      <a class="btn btn-sm btn-outline-gold tw-mt-1 p-2" href="<?=base_url()?>tours/<?=urlencode(str_replace(' ', '-', $row->name))?>/<?=$row->id?>">
        See Itinerary
      </a>
    </div>
  </div>
                               </div>
                             
                            
                            </div>
                        </div>
                           <?php
                    
                } 
                }?>
                        
                       
                    </div>
                   </div> 
                 
  </div>
</div>
                </div>
                
               
                
              
            </div>
        </div>
    </div>
    <!-- tour list area End -->
 
    <?php include 'includes/footer.php' ?>
     <script>
 $("#add_to_cart").submit(function(e) {
      $("#ajax_data").html("");
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
         type: "POST",
         url: url,
         data: form.serialize(), // serializes form input
         success: function(data){
           $("#ajax_data").html(data);
         }
    });
});
    </script>  
</body>
</html>
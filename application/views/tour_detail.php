<!DOCTYPE html>
<html lang="en">
     <?php
    $settings= $this->crud->get_data("settings", "", "*", "full","", "", "order by id desc");
    $settings = $settings->result()[0];
    
    $detail  = $detail->result()[0]; 
    ?>
    <title><?=$detail->name?> @<?=$settings->currency_symbol.$detail->price?></title>
    <meta name="description" content="<?=$detail->short_desc?>">
    <meta property="og:title" content="<?=$detail->name?> @<?=$settings->currency_symbol.$detail->price?>" />
    <meta property="og:description" content="<?=$detail->short_desc?>" />
    <meta property="og:image" content="<?=base_url()?><?=$detail->image?>" />
    <meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@tour" />
<meta name="twitter:creator" content="@tour" />
<meta property="og:url" content="<?=base_url($_SERVER['REQUEST_URI'])?>" />
<meta property="og:title" content="<?=$detail->name?> @<?=$settings->currency_symbol.$detail->price?>" />
<meta property="og:description" content="<?=$detail->short_desc?>" />
<meta property="og:image" content="<?=base_url()?><?=$detail->image?>" />
<?php include 'includes/head.php' ?>
   <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
    #map {
  height: 480px;width:100%;
}
</style>
 
<style>

.tp-gallery-item-img img {
    height: 168px;
    object-fit: cover;
    width: 100%;}
    .gallery .col-md-6 .tp-gallery-item-img img{
   height: 350px;
    object-fit: cover;
    width: 100%;
}
.panel-body{
        white-space: pre-line;text-align: justify;
}
#option_text .btn{  
    margin-top: 5px;}
#option_text p{
        margin: 0;
    line-height: 1.2;
    text-align: right;
}
.ui-datepicker-calendar .ui-state-default .small, .ui-datepicker-calendar .ui-state-default small {
    font-size: 9px;
    font-weight: 400;
    color: green;
}
.btn-yellow ,.btn-blue{
    background: #a39161;
    color: #ffffff;
    font-weight: 600;
}
    .sidebar-area .widget {
    border: unset;
    border-radius: 8px;
    padding: 1.5rem;
    background: #F5F5F5;
    border-radius: 0.5rem;}
    [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}
.field, .field1 {
    max-width: 43px;
    padding: 7px;
    font-size: .875rem;
    border: 1px solid #d2d8dd;
    margin-bottom: 0px;
    background: #fff;
}
.add, .sub, .add1, .sub1 {
    background-color: #eeeeee;
    padding: 7px;
    width: 24px;
    font-size: .875rem;
    border: 1px solid #d2d8dd;
}
.table td, .table th {
    line-height: 1.4;
    padding: 1px;
    vertical-align: top;
    border-top: 0;font-size: 13px;
    font-weight: 600;}
    .table {
    margin-bottom: 0;}.card-body {
    padding: 13px 12px;}
</style>
<body>
    <?php include 'includes/header.php' ?>
       <div class="banner-area tp-main-search-area">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
      <?php
      $banner = explode(',',$detail->gallery);
              if(!empty($banner)){
                                     $i=0;
                                     foreach($banner as $row1){
                                         $i++;
                                         if($i<6){
                                       echo '<div class="carousel-item '.(($i=='1')?'active"':"").'" >
      <img class="d-block w-100" src="'.base_url().$row1.'" alt="'.$detail->name.'">
    </div>'; }
                                     }
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
           <div class="page-breadcrumb container">
    <ol class="breadcrumb">
      <li>
        <a href="<?=base_url()?>">Home</a>
      </li>

      <li class="breadcrumb-item active">
       ITINERARY
      </li>
    </ol>
  </div>
    
    
      
               
                     
        
        <div class="container pd-top-70">
            <!-- destinations-details-main-slider start -->
            <div class="row">
                 <div class="col-lg-10 offset-lg-1 align-self-center">
                    <div class="section-title mb-lg-0 mb-4 text-center">
                        <p class="sub-heading">ITINERARY</p>
                        <h2 class="title"><?=$detail->name?></h2>
                        
                         
                    </div>
                
            </div>
               </div>
                  </div>
                   <div class="container">
                     
                   
                           <div class="tour_info">
                                 
                           
                            <div class="row">
                    <div class="offset-lg-3 col-lg-2">
                  <div class="d-flex">
                      <i class="ti-wallet"></i>
                      <div class="tp-price-meta">
                                    <p>Price</p>
                                    <h2><?=$settings->currency_symbol.$detail->price?></b> <sup class="per">per <i class="fa fa-user"></i></sup></h2>
                                </div></div>
               </div>
                      <div class="col-lg-2">
                  <div class="d-flex"><i class="ti-alarm-clock"></i>  <div class="tp-price-meta">
                                    <p>Duration</p>
                                    <h2><?=$detail->duration?></h2>
                                </div></div>
               </div>
                <div class="col-lg-2">
                  <div class="d-flex"><i class="ti-location-pin"></i>  <div class="tp-price-meta">
                                    <p>Destination</p>
                                    <h2><?php
                                     $destination1 = explode(',',$detail->destination);
                                 if(!empty($destination1)){
                                    echo $this->crud->destination($destination1[0])->name;
                                    }
                                    ?></b></h2>
                                </div></div>
               </div>
                    <div class="col-lg-12 text-center mt-3">
                        <a href="#exampleModalCenter" class="btn btn-outline-gold " data-toggle="modal" data-target="#exampleModalCenter">
                        Book This Tour
                    </a>
                         
                    </div>
                </div>
                </div>
                            
                        </div>   
                   <div class="container-fluid"><div class="row">
                   
                            <!-- Button trigger modal -->
 
                <div class="col-xl-12">
                    <div class="tour-details-wrap">
                        
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="active">
    <a class="active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
  </li>
  
  <li>
    <a id="Gallery-tab" data-toggle="tab" href="#Gallery" role="tab" aria-controls="Gallery" aria-selected="false">Gallery</a>
  </li>
  <li>
    <a id="Similar-tab" data-toggle="tab" href="#Similar" role="tab" aria-controls="Similar" aria-selected="false">
      Similar Itineraries
    </a>
  </li>

</ul>
<div class="tab-content mt-5" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
             <div class="row">
                 <div class="col-lg-10 offset-lg-1 align-self-center">
                        <div><?=$detail->overview?></div>
                         <h4 class="single-page-small-title">What's included</h4>
                         <div class="what_in">
                             <div class="item">
                             <div class="row">
                                    <div class="col-lg-4"><h6>Destination</h6></div>
                                    <div class="col-lg-8">                           <?php
                                     $destination1 = explode(',',$detail->destination);
                                 if(!empty($destination1)){
                                  foreach($destination1 as $row22){
                                      echo"<span>".$this->crud->destination($row22)->name.", </span>";
                                  }  
                                    }
                                    ?>                 
                                             
                                    </div>
                            </div>
                            </div>
                             <div class="item">
                             <div class="row">
                                    <div class="col-lg-4"><h6>Departure Location</h6></div>
                                    <div class="col-lg-8">                           <?php echo"<span>".$detail->depart."</span>";
                                
                                    ?>                 
                                             
                                    </div>
                            </div>
                            </div>
                             <div class="item">
                             <div class="row">
                                    <div class="col-lg-4"><h6>Return Location</h6></div>
                                    <div class="col-lg-8">                           <?php echo"<span>".$detail->return."</span>";
                                
                                    ?>                 
                                             
                                    </div>
                            </div>
                            </div>
                             <div class="item">
                             <div class="row">
                                    <div class="col-lg-4"><h6>Includes</h6></div>
                                    <div class="col-lg-8">                         <div class="inclusion"><?=$detail->includes?></div>
                                    </div>
                            </div>
                            </div>
                            <div class="item">
                             <div class="row">
                                    <div class="col-lg-4"><h6>Not Includes</h6></div>
                                    <div class="col-lg-8">                      <div class="exclusions"><?=$detail->excludes?></div>
                                    </div>
                            </div>
                            </div>
                         </div>
                        </div>
                        </div>
                      <div class='thumb gold-lined-top u-image-filter img-fill md:tw-mt-1 bg-blue-light'>
                          <div id="map"></div>
                      </div>
                       <div class="row">
                 <div class="col-lg-10 offset-lg-1 align-self-center">
                       <div class="wrapper center-block">
  
         <?php
                                        $k= 0;
                              $plan_title = json_decode($detail->plan_desc);
         if(!empty($plan_title))  foreach($plan_title as $x) {
          $k++;
          ?>
 <h4 class="panel-title my-4"><?=$x->title?></h4>
      <div class="panel-body">
      <?=$x->descr?>
      </div>
<?php
}?>
</div>
</div>
</div>
  </div>
   
  
   <div class="tab-pane fade" id="Gallery" role="tabpanel" aria-labelledby="Gallery-tab">
       <div class="row">
                 <div class="col-lg-10 offset-lg-1 align-self-center">
          <div class="row gallery">
                         <?php
                                 $destination1 = explode(',',$detail->gallery);
                                 if(!empty($destination1)){
                                     $i=0;
                                     foreach($destination1 as $row1){
                                        echo' <div class="col-sm-4">
                            <div class="tp-gallery-item-img">
                                <a href="'.base_url().$row1.'" data-effect="mfp-zoom-in">
                                    <img src="'.base_url().$row1.'" alt="image">
                                </a>
                            </div>
                        </div>'; 
                                     }
                                 }
                                 ?>
                     </div></div>
                    </div>
   </div>
    
                          <div class="tab-pane fade" id="Similar" role="tabpanel" aria-labelledby="Similar-tab">
       <div class="tour-list-area mt-4">
                   <div class="row">
                 <div class="col-lg-10 offset-lg-1 align-self-center">       
                         <?php
            if($tour->num_rows()>0){
                $i = 1;
                foreach($tour->result() as $row){
                 ?>
                    
                       <div class="single-destinations-list style-three">
                            <div class="thumb gold-lined-top u-image-filter img-fill md:tw-mt-1 bg-blue-light">
                                  
                                <img src="<?=base_url()?><?=$row->image?>" alt="list">
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
           
             <div class="col-lg-10 offset-lg-1 align-self-center wow ">  
                        <div class="tag-share-area my-3">
                            <span class="mr-2">Share:</span>
                            <ul class="social-icon style-two">
                                
											  <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>     
 
										 
                                <li>
                                    <a class="facebook" target="_blank" href="https://www.facebook.com/sharer.php?u=<?=$actual_link?>&display=popup"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="twitter" target="_blank" href="https://twitter.com/intent/tweet?url=<?=$actual_link?>&via=tour"><i class="fa fa-twitter"></i></a>
                                </li>
                               <li>
                                    <a class="pinterest" target="_blank" href="https://web.whatsapp.com/send?text=<?=$actual_link?>"><i class="fa fa-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a class="linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?=$actual_link?>&title=<?=$detail->name?> @<?=$settings->currency_symbol.$detail->price?>&summary=<?=$detail->short_desc;?>"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                         
                     </div> 
            </div>
            <!-- destinations-details-main-slider End -->
           
            <!-- destinations-client-review-slider start -->
           </div> 
 </div>
 
 

<!-- Modal -->
<div class="modal fade option_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="container">
                  
                    <div class="row">
                        
                        <div class="col-xl-12">
                                 <div class="section-title mb-lg-0 mb-4 text-center">
                         <h2><?=$detail->name?></h2>
                        
                         
                    </div>
                            </div>
                             <div class="container">
                     
                   
                           <div class="tour_info">
                                 
                           
                            <div class="row">
                    <div class="offset-lg-3 col-lg-2">
                  <div class="d-flex">
                      <i class="ti-wallet"></i>
                      <div class="tp-price-meta">
                                    <p>Price</p>
                                    <h2><?=$settings->currency_symbol.$detail->price?></b> <sup class="per">per <i class="fa fa-user"></i></sup></h2>
                                </div></div>
               </div>
                      <div class="col-lg-2">
                  <div class="d-flex"><i class="ti-alarm-clock"></i>  <div class="tp-price-meta">
                                    <p>Duration</p>
                                    <h2><?=$detail->duration?></h2>
                                </div></div>
               </div>
                <div class="col-lg-2">
                  <div class="d-flex"><i class="ti-location-pin"></i>  <div class="tp-price-meta">
                                    <p>Destination</p>
                                    <h2><?php
                                     $destination1 = explode(',',$detail->destination);
                                 if(!empty($destination1)){
                                    echo $this->crud->destination($destination1[0])->name;
                                    }
                                    ?></b></h2>
                                </div></div>
               </div>
                    
                </div>
                </div>
                            
                        </div>   
                          
      <div class="col-lg-12">
                        <div class="widget tour-list p-0">
                            <div class="widget-tour-list-meta">
                                <form method="post" action="<?=base_url()?>welcome/get_availibility" id="check_availability"  name="myForm" >
                               
                 <div class="row">
                     <div class="col-lg-6">
                                   <div class="card h-100">
  <div class="card-header">
    Travellers
  </div>
   <div class="card-body">
    <table class="table">
    <tbody>
        <tr>
            <td>Adult<br><small>(15-99yr)</small></td>
			<td class="text-right">
								<div class="form-group">
    <button type="button" id="sub" class="sub">-</button>
    <input type="number" name="adult" min="1" max="" id="1" value="1" class="field" readonly>
    
    <button type="button" id="add" class="add">+</button>
</div>
									</td>
		</tr>
		<tr>
            <td>Child<br><small>(03-15yr)</small></td>
			<td class="text-right">
			    <div class="form-group">
    <button type="button" id="sub" class="sub">-</button>
    <input type="number" name="child" min="0" max="" id="1" value="0" class="field" readonly>
    <button type="button" id="add" class="add">+</button>
</div>
			</td>
		</tr>
			<tr>
            <td>Infant<br><small>(00-03yr)</small></td>
			<td class="text-right">
			    <div class="form-group">
    <button type="button" id="sub" class="sub">-</button>
    <input type="number" name="infant" min="0" max="" id="1" value="0" class="field" readonly>
    <button type="button" id="add" class="add">+</button>
</div>
			</td>
		</tr>
	</tbody>
	</table>
  </div>
</div>
</div>
<div class="col-lg-6">
     <div class="card h-100">
  <div class="card-header">
    Travel Date
  </div>
   <div class="card-body">
                             
                                <div class="single-widget-search-input">
                                    <input type="text" id="datepicker" placeholder="Travel Date" name="travel_date">
                                </div>
                                  <div class="error-text">
                                  </div>
                                <div class="text-lg-center text-left">
                <input type="hidden" name="tour_id" value="<?=$detail->id?>">
                                    <button  type="submit" class="btn btn-yellow w-100  p-3" style="background:#a39161" >Check Availibility</button>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </form>
                                
                            </div>
                             <div class="widget-tour-list-meta  mt-3" id="option_text"></div>
                        </div>
                         
                    </div>
      </div>
       </div>
        </div>
     
    </div>
  </div>
</div>
    <!-- tour list area End -->
    
      <div class="client-area pd-top-108 pd-bottom-70 gold-lined-top" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                <div class="section-title mb-lg-0 mb-4 text-center">
                        <p class="sub-heading tw-text-white">WHY REMOTE LANDS?</p>
                        <h2 class="title">EXCLUSIVELY INDIA</h2>
                      </div>
                 
                </div>
            </div>
            <div class="row">
      <p class="tw-text-center col-lg-6 offset-lg-3 tw-mb-12 tw-leading-snug tw-text-white text-center">With Remote Lands you'll travel with people who have made Asia the solitary focus of their own lifelong adventure. As our guest, in the continent that our north American founders Catherine and Jay have adored and explored for decades, you'll discover Asia on a journey that is completely, authentically your own, adapted from our own remarkable experiences and adventures over the years.<span class="tw-hidden bs-md:tw-inline"> on the right</span>.
      </p>
    </div>
        </div>
    </div>
    
    
    <div class="holiday-plan-area tp-holiday-plan-area mg-top-96 pb-5" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-9">
                    <div class="section-title text-center">
                        <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">WHAT OTHERS SAY</h2>
                        <p class="wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">Here is a small selection of the kind words our clients have said about us recently.</p>
                    </div>
                </div>
            </div>
          <div class="owl-carousel owl-theme">
                 
                <div class="item">
                    <div class="single-destinations-list style-two wow animated fadeInUp gold-lined-top" data-wow-duration="0.4s" data-wow-delay="0.1s">
                        <div class="thumb">
                            <img src="<?=base_url()?>assets/img/c120713033___testimonial-image-size_398_272.jpg" alt="list">
                        </div>
                       <div class="details bg-blue-dark gold-lined-top rounded-bottom tw-p-9">
                           
                            <h3 class="tw-text-white tw-mb-6">DENNIS & JOCELYN</h3>
                            <p class="tw-text-white">
Remote Lands provided us with a deep, emotional human experience and we felt as alive as we could feel.  You truly do not know what traveling is like until you have traveled with Remote Lands.
</p> <p class="tw-text-gold-light h4 tw-mt-6 tw-mb-0">Bhutan</p>
                        </div>
                    </div>
                </div>
                 <div class="item">
                    <div class="single-destinations-list style-two wow animated fadeInUp gold-lined-top" data-wow-duration="0.4s" data-wow-delay="0.1s">
                        <div class="thumb">
                            <img src="<?=base_url()?>assets/img/c130219002___testimonial-image-size_398_272.jpg" alt="list">
                        </div>
                        <div class="details bg-blue-dark gold-lined-top rounded-bottom tw-p-9">
                           
                            <h3 class="tw-text-white tw-mb-6">DENNIS & JOCELYN</h3>
                            <p class="tw-text-white">
Remote Lands provided us with a deep, emotional human experience and we felt as alive as we could feel.  You truly do not know what traveling is like until you have traveled with Remote Lands.
</p> <p class="tw-text-gold-light h4 tw-mt-6 tw-mb-0">Bhutan</p>
                        </div>
                    </div>
                </div>
                 <div class="item">
                    <div class="single-destinations-list style-two wow animated fadeInUp gold-lined-top" data-wow-duration="0.4s" data-wow-delay="0.1s">
                        <div class="thumb bg-blue-dark   rounded-bottom">
                            <img src="<?=base_url()?>assets/img/c221121001___testimonial-image-size_399_266.jpg" alt="list">
                        </div>
                      <div class="details bg-blue-dark gold-lined-top rounded-bottom tw-p-9">
                           
                            <h3 class="tw-text-white tw-mb-6">DENNIS & JOCELYN</h3>
                            <p class="tw-text-white">
Remote Lands provided us with a deep, emotional human experience and we felt as alive as we could feel.  You truly do not know what traveling is like until you have traveled with Remote Lands.
</p> <p class="tw-text-gold-light h4 tw-mt-6 tw-mb-0">Bhutan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
    
    <script>
    (function() {
        var $gallery = new SimpleLightbox('.gallery a', {});
    })();
    
 
  $('#datepicker').datepicker({
      minDate: '0',
      beforeShowDay: function(date) {                 
      dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear(); 
    var from = new Date('<?=$detail->start_date?>');
    var to = new Date('<?=$detail->end_date?>');
    var check = new Date("dmy");
    
    var no_days = '<?=$detail->weaklydays?>';
    let day = date.toLocaleString('en-us', {weekday: 'long'});
    var second = day.toLowerCase();
    console.log(second);
    console.log(no_days);
    if(no_days.split(',').indexOf(second) > -1 ) {
   return [false,"","unAvailable"];
}else{
    if((date >= from && date < to)) {
    return [true, "","Available"];
  } else {
    return [false,"","unAvailable"];
  }
    }
      }
  });
    
    
$(document).on("click", '.add', function(event) {
   let total =0;
   $('.field').each(function(){
    total=parseInt(total)+parseInt(this.value); 
    });
    $(this).prev().val(+$(this).prev().val() + 1);
    

});
 $(document).on("click", '.sub', function(event) {
    	 if ($(this).next().val() > $(this).next().attr('min')){ $(this).next().val(+$(this).next().val() - 1);
}
});

$("#check_availability").submit(function(e) {
    e.preventDefault();
    $('.error-text').html('');
    $('#option_text').html('');
    let total =0;
   $('.field').each(function(){
    total=parseInt(total)+parseInt(this.value); 
});
    if(parseInt(total)<=0){
       $('.error-text').html('Please add guests');
        return false;
    }
   if($('#datepicker').val()==''){
        $('.error-text').html('<span class="text-danger">Please select date</span>');
        return false;
   }
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
         type: "POST",
         url: url,
         data: form.serialize(), // serializes form input
         success: function(data){
           $('#option_text').html(data);
         }
    });
});

 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
</script>

 <script>
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
     dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
    </script>
    <script  src="https://maps.googleapis.com/maps/api/js?key=<?=$this->config->item('map-key');?>&callback=initMap&v=weekly"
      async
    ></script>
    <style>
        button.gm-ui-hover-effect {
    visibility: hidden;
}.gm-style .gm-style-iw {
      text-transform: uppercase;
    font-family: mont-semibold-webfont,sans-serif!important;
    letter-spacing: .125em;
   
    font-size: .9875rem;
    
    color: #a39161;
     
}
    </style>
   <script>
       function initMap() {
        var ltlng = [];
         <?php
         $destination1 = explode(',',$detail->destination);
                                 if(!empty($destination1)){
                                  foreach($destination1 as $row22){
                                     echo'ltlng.push(new google.maps.LatLng('.$this->crud->destination($row22)->latitude.', '.$this->crud->destination($row22)->longitude.'));';
                                    }
                                 }
                                    ?> 
            
            var locations = [
              <?php
                                     $destination1 = explode(',',$detail->destination);
                                 if(!empty($destination1)){
                                  foreach($destination1 as $row22){
                                     echo'["'.$this->crud->destination($row22)->name.'"],';
                                    }
                                 }
                                    ?> 
               
      
    ];
     var myOptions = {
                zoom: 6,
      styles:[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#BBCDDE"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },

  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {"visibility": "off",
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#000"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#89A5C2"
      }
    ]
  },
   {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#a39161"
      }
    ]
  },
   {
    "featureType": 'administrative.province',
    "elementType": 'geometry.stroke',
    "stylers": [{
         "color": "#a39161",
         
    }]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
],
                center: ltlng[0],
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
   var map = new google.maps.Map(document.getElementById("map"), myOptions);
var infowindow = new google.maps.InfoWindow();
    var marker, i;
            for (var i = 0; i < ltlng.length; i++) {
                var marker = new google.maps.Marker
                    (
                    {
                      position: ltlng[i],
        map: map,
         icon: '<?=base_url()?>assets/img/maps-and-flags.png',
         title: 'Click me'
                    }
                    );
                    google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
          infowindow.setContent((i + 1) +' ' + locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
            }

             //Intialize the Path Array
            var path = new google.maps.MVCArray();

            //Intialize the Direction Service
            var service = new google.maps.DirectionsService();


               var flightPath = new google.maps.Polyline({
          path: ltlng,
          geodesic: true,
          strokeColor: '#fff',
          strokeOpacity: 1.0,
          strokeWeight: 4
        });

        flightPath.setMap(map);

}
window.initMap = initMap;

   </script>
</body>
</html>
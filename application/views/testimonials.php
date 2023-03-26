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
      <img class="d-block w-100" src="'.base_url().$row->img.'" alt="Tour & Travels">
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
      
     <div class="page-breadcrumb container">
    <ol class="breadcrumb">
      <li>
        <a href="<?=base_url()?>">Home</a>
      </li>

      <li class="breadcrumb-item active">
       Testimonials
      </li>
    </ol>
  </div>
    <!-- breadcrumb area End -->

  <div class="holiday-plan-area tp-holiday-plan-area mg-top-96" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-9">
                    <div class="section-title text-center">
                        <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">WHAT OTHERS SAY</h2>
                        <p class="wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">Here is a small selection of the kind words our clients have said about us recently.</p>
                    </div>
                </div>
            </div>
          <div class="row justify-content-center">
              
                 <?php
                                if($clients->num_rows()>=1){
                                    foreach($clients->result() as $row){
                                       ?>
                                      <div class="col-lg-4 col-sm-6">
                    <div class="single-destinations-list style-two wow animated fadeInUp gold-lined-top" data-wow-duration="0.4s" data-wow-delay="0.1s">
                        <div class="thumb">
                            <img src="<?=base_url()?><?=$row->img?>" alt="list">
                        </div>
                       <div class="details bg-blue-dark gold-lined-top rounded-bottom tw-p-9">
                           
                            <h3 class="tw-text-white tw-mb-6"><?=$row->news_name?></h3>
                            <p class="tw-text-white"><?=$row->short_descr?></p> <p class="tw-text-gold-light h4 tw-mt-6 tw-mb-0"><a href="<?=base_url()?>destination/<?=$row->author?>"><?=$row->author?></a></p>
                        </div>
                    </div>
                </div>  
                                       <?php
                                    }
                                }?> 
               
                 
            </div>
             <div class="text-md-center text-left">
                        <div class="tp-pagination text-md-center text-left d-inline-block mt-4 pagination">
                           <?= $pagination; ?>                  
                        </div>
                    </div>
        </div>
    </div>
    
     </div>
    <?php include 'includes/footer.php' ?>
</body>
</html>
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
       Blogs
      </li>
    </ol>
  </div>
    <!-- breadcrumb area End -->
 <div class="blog-area pd-top-108 pb-5 mt-5" style="    background: rgb(221 221 221 / 61%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">TRAVELOGUES</h2>
                       
                    </div>
                </div>
            </div>
           <div class="row justify-content-center">
                
                  <?php
            if($blogs->num_rows()>0){
                $i = 1;
                foreach($blogs->result() as $row){
                 ?>
                 
                <div class="col-lg-4 col-sm-6">
                    <div class="single-blog wow animated fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.1s">
                        <div class="thumb tw-aspect-w-1 tw-aspect-h-1 tw-relative gold-lined-top bg-blue-light">
                            <img src="<?=base_url()?><?=$row->img;?>" alt="blog">
                        </div>
                        <div class="single-blog-details tw-p-9">
                            <p class="date"><?=date('M d, y',strtotime($row->add_on))?></p>
                            <h4 class="title"><?=$row->news_name?></h4>
                            <p class="content"><?=$row->short_descr?></p>
                            <a class="btn btn-outline-gold tw-text-black bg-white-25" href="<?=base_url()?>blog/<?=$row->id?>/<?=urlencode(str_replace(' ', '-', $row->news_name))?>"><span>Read More<i class="la la-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                
                <?php 
                } }?>
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
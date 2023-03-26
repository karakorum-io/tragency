<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
    #map {
  height: 580px;
}
</style>
<body>
    <?php include 'includes/header.php' ?>
    
   
    <div class="banner-area tp-main-search-area">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?=base_url()?>assets/img/b130109003.jpg" alt="Remote Land">
      <div class="carousel-caption ">
   <h2 class="banner-slide__title font-heading-semibold tw-text-white tw-mb-4">
                Intrepid Adventures             </h2>

                          <p class="padded-multiline banner-slide__subtitle">
                <span>
                    Journeys that flow at your pace and follow your own path                </span>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?=base_url()?>assets/img/b160801019.jpg" alt="Remote Land">
      <div class="carousel-caption ">
   <h2 class="banner-slide__title font-heading-semibold tw-text-white tw-mb-4">
                Intrepid Adventures             </h2>

                          <p class="padded-multiline banner-slide__subtitle">
                <span>
                    Journeys that flow at your pace and follow your own path                </span>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?=base_url()?>assets/img/b160801022.jpg" alt="Remote Land">
      <div class="carousel-caption ">
   <h2 class="banner-slide__title font-heading-semibold tw-text-white tw-mb-4">
                Intrepid Adventures             </h2>

                          <p class="padded-multiline banner-slide__subtitle">
                <span>
                    Journeys that flow at your pace and follow your own path                </span>
  </div>
    </div>
  </div>
 
</div>
    </div>
    <!-- search area end -->
     <!-- Button to Open the Modal -->

    <!-- offer area start -->
    <div class="video-area tp-video-area pd-top-50" >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 align-self-center wow  fadeinright animated" data-wow-duration="1s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeinright;">
                    <div class="section-title mb-lg-0 mb-4 text-center">
                        <p class="sub-heading">RemoteLands</p>
                        <h2 class="title">EXPLORE INDIA</h2>
                        <p class="tw-text-center  tw-mb-12 tw-leading-snug">Explore in-depth information, experiences and highlights by navigating to specific regions using the links below on the right.</p>
                         
                    </div>
                
            </div>
               <div class="col-lg-7 mb-4">
         <div id="map"></div>
            </div>
            <div class="col-lg-5 align-self-center wow  fadeinright animated cities_list" data-wow-duration="1s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeinright;">
          <div class="map-list">
            <div class="row" id="map-list">
                <div class="col-sm-12 col-md-8 offset-md-4"> <ul>
                <?php
                                if($destination->num_rows()>=1){
                                    foreach($destination->result() as $row){
                                        echo'<li><h4><a href="'.base_url().'destination/'.$row->slug.'">'.$row->name.'</a></h4></li>
                                   ';
                                    }
                                }?>
                                </ul></div>
              </div>
          </div>
        </div>
           
        </div>
       
    </div>
    
  </div>
    <div class="offer-area pd-top-70 pd-bottom-92" style="background: rgb(221 221 221 / 61%);">
        
        <div class="destinations-list-slider-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
              <div class="section-title mb-lg-0 mb-4 text-center">
                        <p class="sub-heading">RemoteLands</p>
                        <h2 class="title">Explore <span class="tw-text-gold">400+</span> Journeys 
        <br>
       Across India
      </h2>
                        <p class="tw-text-center col-lg-6 offset-lg-3 tw-mb-12 tw-leading-snug tw-text-black">Explore in-depth information, experiences and highlights by navigating to specific regions using the links below on the right.</p>
                         
                    </div>
                </div>
                    <div class="swiper-container client-slider-two">
                <div class="swiper-wrapper">
                    <!-- item -->
                    
                      <?php
            if($tour->num_rows()>0){
                $i = 1;
                foreach($tour->result() as $row){
                 ?>
                  <div class="swiper-slide mt-5">
                        <div class="client-slider-item">
                            <a href="<?=base_url()?>tours/<?=urlencode(str_replace(' ', '-', $row->name))?>/<?=$row->id?>">
                            <div class="row">
                                <div class="col-lg-5 thumb" style="background-image: url(<?=base_url()?><?=$row->image?>);">
                                   
                                </div>
                                <div class="col-lg-7">
                                    <div class="details">
                                        
                                        <h4><?=$row->name?></h4>
                                        <span><?=$row->duration?></span>
                                        <p><?=mb_substr($row->short_desc,0,300)?>...</p><div class="border-tp-solid ">
                                           <p class="price">From <?php if($row->sale!=0)echo'<del>'.$settings->currency_symbol.$row->tour_price.'</del>';?> <b><?=$settings->currency_symbol.$row->price?></b></p>
                                            
                                        </div>
                                        <button   class="btn btn-outline-gold tw-text-black bg-white-25">
                  See Itinerary</button>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                    </div>
                           <?php
                    
                } 
                }?>
                   
                </div>
                <!-- Add Pagination -->
                <div class="tp-control-nav text-center">
                    <div class="slick-arrow swiper-buttons-prev"><i class="la la-long-arrow-left"></i></div>
                    <div class="slick-arrow swiper-buttons-next"><i class="la la-long-arrow-right"></i></div>
                </div>
                <!-- /.end carousel -->                    
            </div>
                  
                            
                        </div>
                    </div>
               </div>
            </div>
  
  
   
   
    
 
   <div class="holiday-plan-area tp-holiday-plan-area mg-top-96 pd-bottom-92 " >
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
                 <?php
                                if($clients->num_rows()>=1){
                                    foreach($clients->result() as $row){
                                       ?>
                                      <div class="item">
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
        </div>
    </div>
      <div class="client-area pd-top-108 pd-bottom-70 gold-lined-top" style=" background:url(<?=base_url()?>assets/img/20093001.jpg)rgb(0 0 0 / 52%);background-size: cover;
    background-position: top;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                <div class="section-title mb-lg-0 mb-4 text-center">
                        
                        <h2 class="title">REMOTE LANDS</h2>
                      </div>
                 
                </div>
            </div>
            <div class="row">
      <div class="tw-text-center col-lg-4 offset-lg-2 tw-mb-12 tw-leading-snug ">
          <div>
<p  class="tw-text-white">Seek the remarkable. Seek it in the world you know. But also in a world you don't: Asia.</p>
<p class="tw-text-white">In distant, idyllic archipelagos, explored by luxury yacht, or unforgettable landscapes, witnessed from a private helicopter. In 
palatial hideaways on secret shores. In the natural habitats of the world's most cherished wildlife. In the welcome of remote mountain villages and ancient communities.</p>
</div>
      </div>
      
       <div class="tw-text-center col-lg-4 tw-mb-12 tw-leading-snug ">
           <div>
<p class="tw-text-white">Discover sides of Asia you never knew existed, revealed by people who know every facet. Find serenity in a journey that flows at your pace and follows your path, effortlessly accommodating any diversion.</p>
<p  class="tw-text-white">A journey not only of the body and mind but also of the soul; an opportunity for deeper, lasting connection with places and people, for you, for those you travel with and for those you meet.</p>
<p  class="tw-text-white">Seek the soul of Asia. Remote Lands.</p>
</div>
      </div>
      
      <div class="mt-4 text-center col-lg-12">
      <a href="#0" class="btn btn-outline-gold btn--shade tw-text-white">
        About Us
      </a>
    </div>
    </div>
        </div>
    </div>
    <!-- client area end --> 
 

    <div class="blog-area pd-top-108 pb-5" style="    background: rgb(221 221 221 / 61%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">TRAVELOGUES</h2>
                       
                    </div>
                </div>
            </div>
             <div class="owl-carousel owl-theme justify-content-center">
                
                  <?php
            if($blogs->num_rows()>0){
                $i = 1;
                foreach($blogs->result() as $row){
                 ?>
                 
                <div class="item">
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
        </div>
    </div>
    <!-- blog area end -->
     </div>
     
    <?php include 'includes/footer.php' ?>
    <script>
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
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
   <script>
       function initMap() {
            var locations = [
                
                 <?php
                                if($destination->num_rows()>=1){
                                    foreach($destination->result() as $row){
                                        echo'["'.$row->name.'", '.$row->latitude.', '.$row->longitude.', "'.$row->slug.'","'.base_url().$row->image.'"],';
                                    }
                                }?>
      
    ];
    
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4.7,
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

      center: new google.maps.LatLng(22.5937, 78.9629),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
         icon: '<?=base_url()?>assets/img/maps-and-flags.png',
         url: '<?=base_url()?>destination/'+locations[i][3]
      });
      
 
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          window.location.href = '<?=base_url()?>destination/'+locations[i][3];
        }
      })(marker, i));
      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
          
        return function() {
            var hrefe = '<?=base_url()?>destination/'+locations[i][3];
            var contentString = '<a href="'+hrefe+'"><div class="info-card card"><img src="'+ locations[i][4] +' "> ' + '<h4>' + locations[i][0] + '</h4>' + '</div></a>';

          infowindow.setContent(contentString);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}

window.initMap = initMap;

   </script>
</body>
</html>
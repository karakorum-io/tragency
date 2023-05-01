<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
    <title>Expedition Saga - Truly Luxury</title>
    <meta name="description"
        content="Get great offers on India holiday Packages at Mystical Taj Truly Luxury. Book your vacations packages and holiday packages in India with us today." />
    <meta property="og:title"
        content="Luxury Taj Mahal Tours | Taj Mahal Day Tour | Delhi to Taj Mahal | Mystical Taj Truly Luxury" />
    <meta property="og:description"
        content="Get great offers on India holiday Packages at Mystical Taj Truly Luxury. Book your vacations packages and holiday packages in India with us today." />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        #map {
            height: 100%;
        }
        @media only screen and (max-width: 992px){  #map {
            height: 480px;
        }}
    </style>
</head>

<body>
    <?php include 'includes/header.php' ?>
     <?php
            $banner = getcontentByNeedle($this->db, 'main-banner');
            if ($banner) {
               
                    $index = 0;
                    foreach ($banner as $content) {
                        $index++ ;
                        echo '<style>.banner-slider .banner-slider-item.banner-bg-'.$index.':after {
    background-image: url("'.base_url().'uploads/cms/'.$content['media'][0]->media.'");
}</style>';
} }?>
     <div class="banner-area tp-main-search-area">
        <div class="banner-slider">
               <?php
            if ($banner) {
               
                    $index = 0;
                    foreach ($banner as $content) {
                        $index++ ;
                        
                        ?>
            <div class="banner-slider-item banner-bg-<?=$index?>">
               
                            <div class="carousel-caption ">
                                <h2 class="banner-slide__title font-heading-semibold tw-text-white tw-mb-4">
                                    <?php echo $content['title'] ?>
                                </h2>
                                <p class="padded-multiline banner-slide__subtitle">
                                    <span>
                                        <?php echo $content['sub_title'] ?>
                                    </span>
                                </p>
                            </div>
                      
            </div>
             
             <?php } }?>
        </div>
    </div>    
    
   
    <div class="offer-area pd-top-70 pd-bottom-92" style="background: rgb(221 221 221 / 61%);">
        <div class="destinations-list-slider-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title mb-lg-0 mb-4 text-center">
                            <?php
                            $trending = getcontentByNeedle($this->db, 'trending-packages');
                            if ($trending) {
                                foreach ($trending as $content) {
                                    ?>
                                    <p class="sub-heading">
                                        <?php echo $content['sub_title'] ?>
                                    </p>
                                    <h2 class="title">
                                        <?php echo $content['title'] ?>
                                    </h2>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="swiper-container client-slider-two">
                        <div class="swiper-wrapper">
                            <!-- item -->
                            <?php
                            if (count($tour) > 0) {
                                $i = 1;
                                foreach ($tour as $row) {
                                    ?>
                                    <div class="swiper-slide mt-5">
                                        <div class="client-slider-item">
                                            <div class="row">
                                                <div class="col-lg-5 thumb"
                                                    style="background-image: url(<?= base_url() ?>uploads/packages/<?= $row->image ?>);">
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="details">
                                                        <h4>
                                                            <?= $row->name ?>
                                                        </h4>
                                                        <span>
                                                            <?= $row->duration ?>
                                                        </span>
                                                        <p>
                                                            <?= mb_substr($row->short_desc, 0, 300) ?>...
                                                        </p>
                                                        <div class="border-tp-solid ">
                                                            <p class="price">From
                                                                <?php if ($row->sale != 0)
                                                                    echo '<del>' . $currency_data->currency_symbol . convertPrice($row->tour_price, $currency_data->conversion_rate) . '</del>'; ?>
                                                                <b>
                                                                    <?= $currency_data->currency_symbol . convertPrice($row->price, $currency_data->conversion_rate) ?>
                                                                </b>
                                                            </p>
                                                        </div>
                                                        <div class="mt-4 text-center col-lg-12">
                                                            <a href="<?= base_url() ?>tour/<?= $row->slug ?>"
                                                                class="btn btn-outline-gold bg-white-25">
                                                                Explore More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>
                        <!-- Add Pagination -->
                        <!-- <div class="tp-control-nav text-center">
                            <div class="slick-arrow swiper-buttons-prev"><i class="la la-long-arrow-left"></i></div>
                            <div class="slick-arrow swiper-buttons-next"><i class="la la-long-arrow-right"></i></div>
                        </div> -->
                        <!-- /.end carousel -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="video-area tp-video-area pd-top-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 align-self-center wow  fadeinright animated" data-wow-duration="1s"
                    data-wow-delay="0.3s"
                    style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeinright;">
                    <div class="section-title mb-lg-0 mb-4 text-center">
                        <?php
                        $mapPanel = getcontentByNeedle($this->db, 'map-panel');
                        if ($mapPanel) {
                            foreach ($mapPanel as $content) {
                                ?>
                                <p class="sub-heading">
                                    <?php echo $content['sub_title'] ?>
                                </p>
                                <h2 class="title">
                                    <?php echo $content['title'] ?>
                                </h2>
                                <p class="tw-text-center  tw-mb-12 tw-leading-snug">
                                    <?php echo $content['short_description'] ?>
                                </p>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-7 mb-4">
                    <div id="map"></div>
                </div>
                <style>
                    
@media only screen and (max-width: 1680px){
.single-blog.style-three .thumb img {
    height: 106px;}}
    .single-blog.style-three .single-blog-details-wrap {
   
    margin-top: 0;}
                </style>
                <div class="col-lg-5 align-self-center wow  fadeinright animated cities_list" data-wow-duration="1s"
                    data-wow-delay="0.3s"
                    style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeinright;">
                    <div class="map-list px-2">
                        <div class="row" id="map-list">
                            
                                    <?php
                                    if (count($destination) >= 1) {
                                        foreach ($destination as $row) {
                                            echo '<div class="col-md-4 col-6 p-1">
                                                                  <a  href="' . base_url() . 'destination/' . $row->slug . '">  <div class="single-blog style-three mb-2">
                                                                        <div class="thumb">
                                                                            <img src="' . base_url() . 'uploads/destinations/' . $row->image . '" alt="blog">
                                                                        </div>
                                                                        <div class="single-blog-details-wrap">
                                                                            <div class="text-center">
                                                                                <h3 class="title">' . $row->name . '</h3>
                                                                                 </div>
                                                                        </div>
                                                                    </div></a>
                                                            </div>';
                                        }
                                    }
                                    ?>
                                
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="holiday-plan-area tp-holiday-plan-area mg-top-96 pd-bottom-92 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-9">
                    <div class="section-title text-center">
                        <?php
                        $mapPanel = getcontentByNeedle($this->db, 'why-us');
                        if ($mapPanel) {
                            foreach ($mapPanel as $content) {
                                ?>
                                <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">
                                    <?php echo $content['title'] ?>
                                </h2>
                                <p class="wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
                                    <?php echo $content['short_description'] ?>
                                </p>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
             <div class="owl-carousel owl-theme justify-content-center">
                <?php
                if (count($experience) >= 1) {
                    foreach ($experience as $row) {
                        ?>
                        <div class="item">

                            <div class="single-destinations-list style-two wow animated fadeInUp gold-lined-top"
                                data-wow-duration="0.4s" data-wow-delay="0.1s">
                                <div class="thumb" style="display:flex;">
                                    <?php
                                        if($row->video_link){
                                    ?>
                                   <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" title="<?php echo $row->title;?>"
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        src="<?php echo $row->video_link;?>"></iframe>
</div> 
                                    
                                    <?php
                                        } else {
                                            if ($row->media_type == 1){
                                                echo '<img src="' . base_url() . 'uploads/experiences/' . $row->media . '" alt="list">';
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="details bg-blue-dark gold-lined-top rounded-bottom tw-p-9">
                                    <p class="tw-text-white">
                                        <?= $row->title ?>
                                    </p>
                                    <p class="tw-text-gold-light h4">
                                        <?= $row->display_name ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </div>
    <div class="client-area pd-top-108 pd-bottom-70 gold-lined-top" style=" background:url(<?= base_url() ?>assets/premium/images/taj05.jpg)rgb(0 0 0 / 52%);background-size: cover;
    background-position: top;">
        <div class="container">
            <?php
            $mapPanel = getcontentByNeedle($this->db, 'about-us-short');
            if ($mapPanel) {
                foreach ($mapPanel as $content) {
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title mb-lg-0 mb-4 text-center">
                                <h2 class="title">
                                    <?php echo $content['title'] ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="tw-text-white text-justify">
                                <?php echo $content['description'] ?>
                            </p>
                            <div class="mt-4 text-center col-lg-12">
                                <a href="<?php echo base_url() ?>about" class="btn btn-outline-gold btn--shade tw-text-white">
                                    About Us
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- client area end -->
    <div class="blog-area pd-top-108 pb-5" style="background: rgb(221 221 221 / 61%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center">
                        <?php
                        $blogContent = getcontentByNeedle($this->db, 'home-blog-section');
                        if ($blogContent) {
                            foreach ($blogContent as $content) {
                                ?>
                                <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">
                                    <?php echo $content['title'] ?>
                                </h2>
                                <p class="wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
                                    <?php echo $content['sub_title'] ?>
                                </p>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme justify-content-center">
                <?php
                if (count($blogs) > 0) {
                    $i = 1;
                    foreach ($blogs as $row) {
                        ?>
                        <div class="item">
                            <div class="single-blog wow animated fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.1s">
                                <div class="thumb tw-aspect-w-1 tw-aspect-h-1 tw-relative gold-lined-top bg-blue-light">
                                    <img src="<?= base_url() ?>uploads/blogs/<?= $row->media; ?>" alt="blog">
                                </div>
                                <div class="single-blog-details tw-p-9">
                                    <p class="date">
                                        <?= date('M d, y', strtotime($row->created_at)) ?>
                                    </p>
                                    <h4 class="title">
                                        <?= $row->title ?>
                                    </h4>
                                    <p class="content">
                                        <?= $row->short_description ?>
                                    </p>
                                    <div class="text-center col-lg-12">
                                        <a class="btn btn-outline-gold bg-white-25"
                                            href="<?= base_url() ?>blog/<?= $row->slug ?>"><span>Read More<i
                                                    class="la la-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </div>
    <!-- blog area end -->
    </div>
    <?php include 'includes/footer.php' ?>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?= $this->config->item('map-key'); ?>&callback=initMap&v=weekly"
        async>
        </script>
    <script>
        function initMap() {
            var locations = [
                <?php
                $destination = getAllDestination($this->db);
                if (count($destination) >= 1) {
                    foreach ($destination as $row) {
                        echo '["' . $row->name . '", ' . $row->latitude . ', ' . $row->longitude . ', "' . $row->slug . '","' . base_url() . "uploads/destinations/" . $row->image . '"],';
                    }
                } ?>
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4.5,
                styles: [
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
                            {
                                "visibility": "off",
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
                    icon: {
                        url: '<?= base_url() ?>assets/premium/images/map-marker1.png',
                        scaledSize: new google.maps.Size(40, 40),
                    },
                    url: '<?= base_url() ?>destination/' + locations[i][3],
                });
                // google.maps.event.addListener(marker, 'click', (function (marker, i) {
                //     return function () {
                //         window.location.href = '<?= base_url() ?>destination/' + locations[i][3];
                //     }
                // })(marker, i));
                google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                    return function () {
                        var hrefe = '<?= base_url() ?>destination/' + locations[i][3];
                        var contentString = '<a href="' + hrefe + '"><div class="info-card card"><img src="' + locations[i][4] + ' "> ' + '<h4>' + locations[i][0] + '</h4>' + '</div></a>';
                        infowindow.setContent(contentString);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        var hrefe = '<?= base_url() ?>destination/' + locations[i][3];
                        var contentString = '<a href="' + hrefe + '"><div class="info-card card"><img src="' + locations[i][4] + ' "> ' + '<h4>' + locations[i][0] + '</h4>' + '</div></a>';
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
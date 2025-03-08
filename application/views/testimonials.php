<!DOCTYPE html>
<html lang="en">

<head>
    <title>Testimonials |  Expedition Saga | Why people choose us? </title>
    <meta name="description"
        content="Get great offers on India holiday Packages at Expedition Saga Truly Luxury. Book your vacations packages and holiday packages in India with us today.">
    <meta property="og:title"
        content=" Testimonials | Luxury Taj Mahal Tours | Taj Mahal Day Tour | Delhi to Taj Mahal | Expedition Saga Truly Luxury" />
    <meta property="og:description"
        content="Get great offers on India holiday Packages at Expedition Saga Truly Luxury. Book your vacations packages and holiday packages in India with us today." />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <?php include 'includes/head.php' ?>
    
    <style>
        .holiday-plan-area .tw-text-white {
    height: 125px;}
    </style>
    
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "TravelAgency",
  "name": "Luxury Taj Mahal Tours | Taj Mahal Day Tour | Delhi to Taj Mahal | Mystical Taj Truly Luxury",
  "image": "https://expeditionsaga.com/assets/images/saGA1.png",
  "@id": "https://expeditionsaga.com/#website",
  "url": "https://expeditionsaga.com/",
  "telephone": "+91-9873801605",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Near Domestic Airport,",
    "addressLocality": "Agra",
    "postalCode": "282008",
    "addressCountry": "IN"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "00:00",
    "closes": "23:59"
  },
  "sameAs": [
    "https://www.facebook.com/expeditionsaga",
    "https://www.instagram.com/expedition_saga/",
    "https://expeditionsaga.com/",
    "https://www.youtube.com/channel/UCrk5DR2rkgxx_Yli1n2yG6Q"
  ],
  "department": {
    "@type": "LocalBusiness",
    "name": "Expedition Saga",
    "image": "https://expeditionsaga.com/assets/images/saGA1.png",
    "telephone": "+91-9873801605",
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday"
      ],
      "opens": "10:00",
      "closes": "18:00"
    }
  }
}
</script>
    
</head>

<body>
    <?php include 'includes/header.php' ?>
    
    
     <?php
     if (count($testimonials) > 0) {
                    $i = 0;
                    foreach ($testimonials as $row) {
                        $i++;
                        if($i<6){
                        echo '<style>.banner-slider .banner-slider-item.banner-bg-'.$i.':after {
    background-image: url("'.base_url().'uploads/experiences/' . $row->media.'");
}</style>';
} } }?>
     <div class="banner-area tp-main-search-area">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php
                    $aboutHeader = getcontentByNeedle($this->db, 'experience-page-header');
                    if ($aboutHeader) {
                        foreach ($aboutHeader as $content) {
                            ?>
                            <img class="d-block w-100"
                                src="<?= base_url() ?>uploads/cms/<?php echo $content['media'][0]->media; ?>"
                                alt="Expedition Saga">
                            <div class="carousel-caption ">
                                <h2 class="banner-slide__title font-heading-semibold tw-text-white tw-mb-4">
                                    <?php echo $content['sub_title'] ?>
                                </h2>
                                <p class="padded-multiline banner-slide__subtitle text-center">
                                    <span>
                                        <?php echo $content['short_description'] ?>
                                    </span>
                                </p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>  
    
    
    <div class="page-breadcrumb container">
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url() ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">
                Testimonials
            </li>
        </ol>
    </div>
    <!-- breadcrumb area End -->
    <div class="holiday-plan-area tp-holiday-plan-area mg-top-96">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-9">
                    <div class="section-title text-center">
                        <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">WHAT
                            OTHERS SAY</h2>
                        <p class="wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">Here is a small
                            selection of
                            the kind words our clients have said about us recently.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if (count($testimonials) >= 1) {
                    foreach ($testimonials as $row) {
                        ?>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="bg-blue-dark h-100">
                            <div class="single-destinations-list style-two wow animated fadeInUp gold-lined-top "
                                data-wow-duration="0.4s" data-wow-delay="0.1s">
                                <div class="thumb">
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
                                <div class="details bg-blue-dark gold-lined-top rounded-bottom tw-p-9 ">
                                    <p class="tw-text-gold-light h4 tw-mt-6 tw-mb-0 text-right">
                                       - <?= $row->display_name ?>
                                    </p>
                                    <h4 class="tw-text-white text-justify tw-mb-6 h-auto">
                                        <?= $row->title ?>
                                    </h4>
                                    <br/><br/>
                                    <?php
                                        $desc = str_replace("<p>","",$row->description );
                                        $desc = str_replace("</p>","",$desc );
                                    ?>
                                    <div class="text-center col-lg-12">
                                        <a class="btn btn-outline-gold bg-white-25" href="<?= $desc ?>" target="_blank">
                                            <span>Read More<i class="la la-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div>
                        <?php
                    }
                } ?>
            </div>
            <div class="text-md-center text-left">
                <div class="pagination">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                <br/>
            </div>
        </div>
    </div>
    </div>
    <?php include 'includes/footer.php' ?>
</body>

</html>
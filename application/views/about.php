<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
    <title>About Best Luxury Travel Agency in Agra</title>
    <meta name="description" content="Expedition Saga is a luxury travel agency in agra and we are a leading name in Indian luxury travels, dedicated to creating the best experience for our guests.">
    <meta property="og:title" content="About Best Luxury Travel Agency in Agra" />
    <meta property="og:description" content="Expedition Saga is a luxury travel agency in agra and we are a leading name in Indian luxury travels, dedicated to creating the best experience for our guests." />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <style>
        #map {
            height: 580px;
        }

        p {
            text-align: justify;
        }
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

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "website",
  "name": "Expedition Saga - Truly Luxury - India Tours",
  "url": "https://expeditionsaga.com/",
  "sameAs": [
      "https://www.facebook.com/expeditionsaga",
    "https://www.instagram.com/expedition_saga/",
    "https://www.youtube.com/channel/UCrk5DR2rkgxx_Yli1n2yG6Q",
    "https://www.linkedin.com/company/expedition-saga/",
    "https://expeditionsaga.com/blogs"
  ]
}
</script>
</head>

<body>
    <?php include 'includes/header.php' ?>
    <div class="banner-area tp-main-search-area">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php
                    $aboutHeader = getcontentByNeedle($this->db, 'about-us-page-header');
                    if ($aboutHeader) {
                        foreach ($aboutHeader as $content) {
                            ?>
                            <img class="d-block w-100"
                                src="<?= base_url() ?>uploads/cms/<?php echo $content['media'][0]->media; ?>"
                                alt="MYSTICAL TAJ">
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
                About us
            </li>
        </ol>
    </div>

    <div class="pd-top-108 pd-bottom-70">
        <div class="container">
            <?php
            $aboutLong = getcontentByNeedle($this->db, 'about-us-long');
            if ($aboutLong) {
                foreach ($aboutLong as $content) {
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
                        <div class="col-lg-12 tw-mb-2 tw-leading-snug ">
                            <p class="text-justify">
                                <?php echo $content['description'] ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="pd-top-108 pd-bottom-70" style="background: rgb(221 221 221 / 61%);">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title mb-lg-0 mb-4 text-center">
                        <h2 class="title">Discover Incredible India</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $incIndia = getcontentByNeedle($this->db, 'about-incredible-india-part1');
                if ($incIndia) {
                    foreach ($incIndia as $content) {
                        ?>
                        <div class=" col-lg-6 tw-mb-2 tw-leading-snug d-flex align-items-center">
                            <img class="my-3 tw-transition-all tw-duration-1000 tw-w-full tw-h-auto gold-lined-top u-image-filter tw-opacity-1 img-fluid"
                                src="<?= base_url() ?>uploads/cms/<?php echo $content['media'][0]->media; ?>"
                                alt="Incredible India">
                        </div>
                        <div class=" col-lg-6 tw-mb-2 tw-leading-snug ">
                            <div>
                                <p class="">
                                    <?php echo $content['description']; ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <?php
                $incIndia = getcontentByNeedle($this->db, 'about-incredible-india-part2');
                if ($incIndia) {
                    foreach ($incIndia as $content) {
                        ?>
                        <div class="col-lg-6 order-sm-1 tw-mb-2 tw-leading-snug d-flex align-items-center">
                            <img class="my-3 tw-transition-all tw-duration-1000 tw-w-full tw-h-auto gold-lined-top u-image-filter tw-opacity-1 img-fluid"
                                src="<?= base_url() ?>uploads/cms/<?php echo $content['media'][0]->media; ?>"
                                alt="Incredible India">
                        </div>
                        <div class=" col-lg-6 tw-mb-2 tw-leading-snug ">
                            <div>
                                <p class="">
                                    <?php echo $content['description']; ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
</body>

</html>
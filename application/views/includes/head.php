<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
$curnturl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- favicon -->
<link rel="icon" href="<?= base_url() ?>assets/images/fav/android-chrome-512x512.png" type="image/x-icon">
<link rel="shortcut icon" href="<?= base_url() ?>assets/images/fav/android-chrome-512x512.png" type="image/x-icon">
<!-- Additional plugin css -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/slick.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/swiper.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/nice-select.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery-ui.min.css">
<!-- icons -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/themify-icons.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/line-awesome.min.css">
<!-- main css -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css?v=2332">
<!-- responsive css -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive-min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/simple-lightbox.css?v3.2.1" />
<link href="<?= base_url() ?>assets/admin/css/plugins/sweetalert2.min.css" rel="stylesheet">
<link rel="preload" as="font" type="font/woff2" crossorigin
    href="<?= base_url() ?>assets/fonts/mont/mont-book-webfont-7b54ebf9.woff2">
<link rel="preload" as="font" type="font/woff2" crossorigin
    href="<?= base_url() ?>assets/fonts/mont/mont-semibold-webfont-c3dcc94e.woff2">
<link as="font" type="font/woff2" crossorigin
    href="<?= base_url() ?>assets/fonts/mont/aleo-v4-latin-regular-6c661089.woff2">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

<meta name="theme-color" content="#a39161">
<meta name="msapplication-TileColor" content="#a39161">
<meta name="msapplication-navbutton-color" content="#a39161">
<meta name="apple-mobile-web-app-status-bar-style" content="#a39161">
<meta property="og:site_name" content="Expedition Saga">
<meta property="og:url" content="<?=$curnturl?>">
<meta name="author" content="Expedition Saga - Truly Luxury Travel Agency">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<link rel="canonical" href="<?=$curnturl?>" />
<meta name="robots" content="index, follow" >

<link rel="dns-prefetch" href="//tpc.googlesyndication.com" />
<link rel="dns-prefetch" href="//pagead2.googlesyndication.com" />
<link rel="dns-prefetch" href="//www.googletagservices.com" />
<link rel='dns-prefetch' href='//www.googletagmanager.com' />
<meta name="distribution" content="global" />
<meta name="identifier-url" content="URL/" />

<meta property="article:publisher" content="https://www.facebook.com/expeditionsaga" />

<!--viaje-->
<style>
@media (max-width: 576px){
.h2, h2 {
    font-size: calc(.93rem + .6vw);
}}
    .error{
        color: red;
    }
</style>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KHKZWW1SNV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KHKZWW1SNV');
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "TravelAgency",
  "name": "Expedition Saga - Truly Luxury Travel Agency",
  "image": "https://expeditionsaga.com/assets/images/saGA1.png",
  "@id": "",
  "url": "https://expeditionsaga.com/",
  "telephone": "+91-9873801605",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Near Domestic Airport",
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
    "https://www.youtube.com/channel/UCrk5DR2rkgxx_Yli1n2yG6Q",
    "https://www.linkedin.com/company/expedition-saga/",
    "https://expeditionsaga.com/blogs"
]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Expedition Saga - Truly Luxury Travel Agency",
  "alternateName": "Best Luxury Travel Agency In India",
  "url": "https://expeditionsaga.com/",
  "logo": "https://expeditionsaga.com/assets/images/saGA1.png",
  "sameAs": [
    "https://www.facebook.com/expeditionsaga",
    "https://www.instagram.com/expedition_saga/",
    "https://www.youtube.com/channel/UCrk5DR2rkgxx_Yli1n2yG6Q",
    "https://www.linkedin.com/company/expedition-saga/",
    "https://expeditionsaga.com/blogs"
]
}
</script>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>
      Luxury <?= $dest_detail->name ?> Tour Packages || Expedition Saga
    </title>
    <meta name="description" content="<?= $dest_detail->metadescr ?>">
    <meta property="og:title" content="Luxury <?= $dest_detail->name ?> Tour Packages || Expedition Saga" />
    <meta property="og:description" content="<?= $dest_detail->metadescr ?> />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <?php include 'includes/head.php' ?>
    
      <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      ?>
    <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "ItemList",
    "url": "<?=$actual_link?>",
    "numberOfItems": "<?=count($tour)?>",
     "name": "<?= $dest_detail->name ?> Tour Packages",
  "description": "<?= $dest_detail->metadescr ?>",
    "itemListElement": [
        
        <?php
  $hasComma = false;$sr = 0;
   if (count($tour) > 0) {
   foreach ($tour as $row) {
       
      $pr =  convertPrice($row->price, $currency_data->conversion_rate);
       
          if ($hasComma){ 
        echo ","; 
    }$sr++;
    echo'{
            "@type": "ListItem",
            "position": '.$sr.',
            "item": {
              "@type": "Product",
"image": "'.base_url().'uploads/packages/'.$row->image.'",
 "url": "'.base_url().'tour/'.$row->slug.'",
                  "name": "'.$row->name.'",
                  "offers": {
                      "@type": "Offer",
                      "price": "'.$pr.'",
                      "priceCurrency": "'.$currency_data->currency_alpha.'",
                      "url": "'.base_url().'tour/'.$row->slug.'"
                  }
            }
       }';
$hasComma=true;

        }
   }
   ?>
         
 ]
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

    <?php
        if (count($banner_img) > 0) {
            $index = 0;
            foreach ($banner_img as $row) {
                $index++;
                echo '<style>.banner-slider .banner-slider-item.banner-bg-' . $index . ':after {
                        background-image: url("' . base_url() . 'uploads/packages/' . $row->image . '");
                }</style>';
            }
        } else {
            $banner_img[] = $dest_detail->image;
            
            $index = 0;
            foreach ($banner_img as $row) {
                $index++;
                echo '<style>.banner-slider .banner-slider-item.banner-bg-' . $index . ':after {
                        background-image: url("' . base_url() . 'uploads/destinations/' . $row . '");
                }</style>';
            }
        } 
    ?>
    <div class="banner-area tp-main-search-area">
        <div class="banner-slider">
            <?php
            $headerContent = getcontentByNeedle($this->db, 'destination-page-header');
            $headerText = "";
            $headerDesc = "";
            if ($headerContent) {
                foreach ($headerContent as $content) {
                    $headerText = $content['title'];
                    $headerDesc = $content['short_description'];
                }
            }

            if (count($banner_img) > 0) {
                $index = 0;
                foreach ($banner_img as $row) {
                    $index++;

                    ?>
                    <div class="banner-slider-item banner-bg-<?= $index ?>">

                        <div class="carousel-caption ">
                            <h2 class="banner-slide__title font-heading-semibold tw-text-white tw-mb-4">
                                <?php echo $headerText ?>
                            </h2>
                            <p class="padded-multiline banner-slide__subtitle">
                                <span>
                                    <?php echo $headerDesc ?>
                                </span>
                            </p>
                        </div>

                    </div>

                <?php }
            } ?>
        </div>
    </div>


    <!-- intro area start -->
    <div class="page-breadcrumb container">
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url() ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <?= $dest_detail->name ?>
            </li>
        </ol>
    </div>
    <div class="intro-area">
        <div class="container pd-top-70">
            <div class="section-title text-center text-left">
                <h1 class="title h2 text-dark">
                    <?= $dest_detail->name ?> Tour Packages
                </h1>
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
                        <li class="active"><a data-toggle="tab" href="#home" class="active">Tour Packages</a></li>
                        <li><a data-toggle="tab" href="#menu1">About <?= $dest_detail->name ?></a></li>
                    </ul>
                    <div class="tab-content pb-5">
                        <div id="home" class="tab-pane  in active">
                             <div class="container Itineraries itin- tw-overflow-hidden mt-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="h2 tw-text-center tw-mb-12">
                                            <span id="countrytotalitin"></span> Tour Packages
                                        </h2>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-4 mb-4" style="background: #ddd;">
                                            <form class="form" action="<?= base_url() ?>web/tour_filter" name="myForm"
                                                method="post" id="add_to_cart">
                                                <div class="row">
                                                    <div class="col-12 col-md-3">
                                                        <div class="single-widget-search-input-title mt-0">Destination
                                                        </div>
                                                        <select class="form-control w-100" name="dest_array">
                                                            <option value="">Select Destination </option>
                                                            <?php
                                                            $destination = getAllDestination($this->db);
                                                            if (count($destination) >= 1) {
                                                                foreach ($destination as $row) {
                                                                    echo '<option value="' . $row->id . '" ' . (($row->id == $dest_detail->id) ? 'selected="selected"' : "") . '> ' . $row->name . '</option>';
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="single-widget-search-input-title mt-0">Duration
                                                        </div>
                                                        <select class="form-control w-100" name="duration">
                                                            <option value="">Select Duration </option>
                                                            <?php
                                                            if (count($duration) >= 1) {
                                                                foreach ($duration as $row) {
                                                                    echo '<option value="' . $row->duration . '"> ' . $row->duration . '</option>';
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <style>
                                                        .widget-product-sorting .slider-product-sorting {
                                                            margin: 0 10px 4px 10px;
                                                        }
                                                    </style>
                                                    <div class="col-12 col-md-3">
                                                        <div class="single-widget-search-input-title mt-0"> Price Filter
                                                        </div>
                                                        <div class="widget-product-sorting">
                                                            <div class="slider-product-sorting"></div>
                                                            <div class="product-range-detail">
                                                                <input type="text" id="amount" name="price_filter"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="single-widget-search-input-title mt-0"> Filter</div>
                                                        <button type="submit"
                                                            class="btn btn-outline-gold stretched-link w-100">Apply
                                                            Filter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tour-list-area mt-4" id="ajax_data">
                                    <?php
                                    if (count($tour) > 0) {
                                        $i = 1;
                                        foreach ($tour as $row) {
                                            ?>
                                            <div class="single-destinations-list style-three">
                                                <div class="thumb u-image-filter img-fill md:tw-mt-1 bg-blue-light">
                                                    <img src="<?= base_url() ?>uploads/packages/<?= $row->image ?>"
                                                        alt="<?= $row->name ?>">
                                                </div>
                                                <div class="details">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-8 bs-lg:tw-pr-6">
                                                            <h2 class="h3 tw-mb-4">
                                                                <a href="<?= base_url() ?>tour/<?= $row->slug ?>">
                                                                    <?= $row->name ?>
                                                                </a>
                                                            </h2>
                                                            <p class="content">
                                                                <?= mb_substr($row->short_desc, 0, 300) ?>...
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-lg-4 md:tw-pt-2 md:tw-px-0">
                                                            <div class="row">
                                                                <dl class="col-6 col-sm-12">
                                                                    <dt class="h4 tw-text-gold tw-mb-1">Duration</dt>
                                                                    <dd class="text-small">
                                                                        <?= $row->duration ?>
                                                                    </dd>
                                                                </dl>
                                                                <dl class="col-6 col-sm-12">
                                                                    <dt class="h4 tw-text-gold tw-mb-1">Price Onwards</dt>
                                                                    <dd class="text-small">From
                                                                        <?php if ($row->sale != 0)
                                                                            echo '<del>' . $currency_data->currency_symbol . convertPrice($row->tour_price, $currency_data->conversion_rate) . '</del>'; ?>
                                                                        &nbsp;
                                                                        <?= $currency_data->currency_symbol . convertPrice($row->price, $currency_data->conversion_rate) ?>
                                                                    </dd>
                                                                </dl>
                                                            </div>
                                                            <div class=" md:tw-text-left">
                                                                <a class="btn btn-sm btn-outline-gold tw-mt-1 p-2 d-block m-auto"
                                                                    href="<?= base_url() ?>tour/<?= $row->slug ?>">
                                                                    Explore More
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                           
                        </div>
                        <div id="menu1" class="tab-pane ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 offset-md-1 col-xxl-12 offset-xxl-0 lead mt-5">
                                        <?= $dest_detail->description ?>
                                    </div>
                                    <div class="col-12 col-md-10 offset-md-1 col-xxl-12 offset-xxl-0 lead mt-5">
                                        <div class="container pd-top-70">
                                            <div class="section-title text-lg-center text-left">
                                                <h2 class="title">Best Time to Visit</h2>
                                            </div>
                                        </div>
                                        <div>
                                            <?= $dest_detail->weather ?>
                                        </div>
                                    </div>
                                    <div class="container pd-top-70">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="section-title mb-lg-0 mb-4 text-center">
                                                    <h2 class="title mb-4">
                                                        Similar Destinations
                                                    </h2>
                                                </div>
                                            </div>
                                            <style>
                                                .single-blog .single-blog-details {
                                                    background: transparent;
                                                }
                                            </style>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <?php
                                                    $i = 0;
                                                    if (count($destination1) >= 1) {
                                                        foreach ($destination1 as $row) {
                                                            $i++;
                                                            if ($i == 9) {
                                                                break;
                                                            }
                                                            echo '<div class="col-sm-3 col-6">
                                                                    <div class="single-blog style-three">
                                                                        <div class="thumb">
                                                                            <img src="' . base_url() . 'uploads/destinations/' . $row->image . '" alt="blog">
                                                                        </div>
                                                                        <div class="single-blog-details-wrap">
                                                                            <div class="single-blog-details text-center">
                                                                                <h3 class="title">' . $row->name . '</h3>
                                                                                <a class="btn btn-outline-gold btn--shade tw-text-white" href="' . base_url() . 'destination/' . $row->slug . '" style="height: auto;line-height: initial;"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tour list area End -->
    <?php include 'includes/footer.php' ?>
    <script>
        $("#add_to_cart").submit(function (e) {
            $("#ajax_data").html("");
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function (data) {
                    $("#ajax_data").html(data);
                }
            });
        });
    </script>
</body>

</html>
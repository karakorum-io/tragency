<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expedition Saga | Blogs</title>
    <meta name="description"
        content="Get great offers on India holiday Packages at Expedition Taj Truly Luxury. Book your vacations packages and holiday packages in India with us today.">
    <meta property="og:title"
        content="Blogs | Luxury Taj Mahal Tours | Taj Mahal Day Tour | Delhi to Taj Mahal | Expedition Taj Truly Luxury" />
    <meta property="og:description"
        content="Get great offers on India holiday Packages at Expedition Taj Truly Luxury. Book your vacations packages and holiday packages in India with us today." />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <?php include 'includes/head.php' ?>
</head>

<body>
    <?php include 'includes/header.php' ?>
    <div class="banner-area tp-main-search-area">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-item active">
                <?php
                $aboutHeader = getcontentByNeedle($this->db, 'blogs-us-page-header');
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
    <!-- intro area start -->
    <div class="page-breadcrumb container">
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url() ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">
                Blogs
            </li>
        </ol>
    </div>
    <!-- breadcrumb area End -->
    <div class="blog-area pd-top-108 pb-5" style="    background: rgb(221 221 221 / 61%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">
                            TRAVELOGUES</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
               
                 <?php
                if (count($blogs) > 0) {
                    $i = 1;
                    foreach ($blogs as $row) {
                        ?>
                        <div class="col-lg-4 col-sm-6">
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
                                        <a class="btn btn-outline-gold bg-white-25"href="<?= base_url() ?>blog/<?= $row->slug ?>">
                                            <span>Read More<i class="la la-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } ?>
                         
            </div>
            <div class="text-md-center text-left">
                 <div class="pagination">
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include 'includes/footer.php' ?>
</body>

</html>
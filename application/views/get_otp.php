<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expedtion Saga | Login OTP</title>
    <meta name="description" content="Expedtion Saga : Login OTP" />
    <meta property="og:title" content="Expedtion Saga : Login OTP" />
    <meta property="og:description" content="Expedtion Saga : Login OTP" />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <?php include 'includes/head.php' ?>
    <style>
        .tour-details-gallery .details p {
            color: #ffffff;
        }
    </style>
</head>

<body>
    <?php include 'includes/header.php' ?>
    <div class="breadcrumb-area jarallax"
        style="background-image:url(<?= base_url() ?>assets/premium/images/jaipur07.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner ">
                        <h4 class="page-title">Verification</h4>
                        <ul class="page-list">
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>Verification</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tour-details-area mg-top--70">
        <div class="tour-details-gallery">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <form class="box" action="<?= base_url() ?>users/code_verify" method="post">
                            <div class="single-widget-search-input">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="single-widget-search-input-title">Enter Verification Code</div>
                                        <input type="number" name="code" placeholder="Verification Code">
                                    </div>
                                </div>
                                <div class="single-input-wrap style-two mt-4">
                                    <button class="btn btn-yellow w-100">Verify</button>
                                </div>
                                <a href="<?= base_url() ?>users/resend_otp" class=" w-100 btn btn-primary">Resend ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- tour list area End -->
    <?php include 'includes/footer.php' ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expedition Saga | Sign In / Sign Up</title>
    <meta name="description" content="">
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
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
                        <h4 class="page-title">Sign In / Sign Up</h4>
                        <ul class="page-list">
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>Sign In / Sign Up</li>
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
                    <div class="col-sm-6">
                        <form class="box" action="<?= base_url() ?>users/validate" method="post">
                            <div class="single-widget-search-input">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="single-widget-search-input-title text-center">Password Free login
                                        </div>
                                    </div>
                                </div>
                                <a class="w-100 btn" href="<?= base_url() ?>users/google"
                                    style="border:2px solid #999;">
                                    <img width="15px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                                        src="<?= base_url() ?>assets/images/free-google-1772223-1507807.webp" />
                                    Google SignIn / SignUp
                                </a>
                                <div class="divider">
                                    <span>Or</span>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="single-input-wrap style-two mt-4">
                                    <button class="btn btn-yellow w-100">Login / Sign Up</button>
                                    <div class="text-center">
                                        We will send you an OTP for login.
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- tour list area End -->
    <?php include 'includes/footer.php' ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
    <title>Expedition Saga | 24x7 Support</title>
    <meta name="description" content="Expedtion Saga 24x7 customer support" />
    <meta property="og:title" content="Expedtion Saga 24x7 customer support" />
    <meta property="og:description" content="Expedtion Saga 24x7 customer support" />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <style>
        .single-input-wrap.style-two input,
        .single-input-wrap.style-two textarea {
            background: #fff;
            border: 1px solid #a39161 !important;
        }

        .tp-form-wrap {
            border: 1px solid #a39161 !important;
        }

        .contact-info p {

            color: #000;
            display: inline-block;
            font-size: 18px;
            margin-bottom: 14px;
        }

        .contact-info p i {
            color: #a39161;
            height: 40px;
            width: 40px;
            font-size: 15px;
            display: inline-block;
            border-radius: 50%;
            text-align: center;
            line-height: 38px;
            border: 2px solid #a39161;
            -webkit-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .contact-info p span {
            margin: auto;
        }

        .contact-info {
            padding: 0 !important;
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
                        <h4 class="page-title">Contact Us</h4>
                        <ul class="page-list">
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>Contact / Support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area End -->
    <div class="contact-area pd-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-lg-center text-center">
                        <h2 class="title">Get custom packages</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 offset-xl-1 col-lg-7">
                    <form id="contactForm" class="tp-form-wrap bg-gray  p-4" method="post"
                        action="<?= base_url() ?>web/contact">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-center">We are at your serivce. Feel free to ask.</h5>
                                <br/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Name</span>
                                    <input type="text" name="name" required>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Contact</span>
                                    <input type="text" name="phone" required>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Email</span>
                                    <input type="text" name="email" required>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Message</span>
                                    <textarea name="query" required></textarea>
                                </label>
                            </div>
                            <?php
                            $num_a = rand(1, 29);
                            $num_b = rand(1, 9);
                            $captcha = $num_a + $num_b;
                            $this->session->unset_userdata('captchaCode');
                            $this->session->set_userdata('captchaCode', $captcha);
                            ?>
                            <div class="form-group col-md-4">
                                <label class="form-label mb-1 text-2">Solve</label>
                                <h3 style="background: #ddd;padding: 5px 10px;text-align: center;" id="captImg">
                                    <?= $num_a; ?> +
                                    <?= $num_b; ?> =
                                </h3>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="form-label mb-1 text-2">Enter Answer</label>
                                <input type="text" name="captcha" value="" class="form-control text-3 h-auto py-2"
                                    required="" />
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-gold" href="#">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-4 pd-top-50">
                    <div class="contact-info ">
                        <h3 class="title text-center" style="margin-top:20px;">Contact Details</h3>
                        <p>
                            <i class="ti-map"></i>
                            <?php
                            $contactUsAddress = getcontentByNeedle($this->db, 'contact-address-1');
                            if ($contactUsAddress) {
                                foreach ($contactUsAddress as $content) {
                                    ?>
                                    <?php echo $content['short_description'] ?>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            $contactUsAddress2 = getcontentByNeedle($this->db, 'contact-address-2');
                            if ($contactUsAddress2) {
                                foreach ($contactUsAddress2 as $content) {
                                    ?>
                                    <?php echo $content['short_description'] ?>
                                    <?php
                                }
                            }
                            ?>
                        </p>
                        <p style="line-height:55px;"> <i class="ti-email"></i>

                            <?php
                            $contactEmail = getcontentByNeedle($this->db, 'contact-email');
                            if ($contactEmail) {
                                foreach ($contactEmail as $content) {
                                    ?>

                                    <?php echo $content['sub_title'] ?>

                                    <?php
                                }
                            }
                            ?>
                        </p>
                        <p style="line-height:55px;"><i class="ti-mobile"></i>

                            <?php
                            $contactPhone = getcontentByNeedle($this->db, 'contact-phone');
                            if ($contactPhone) {
                                foreach ($contactPhone as $content) {
                                    ?>

                                    <?php echo $content['sub_title'] ?>

                                    <?php
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include 'includes/footer.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $("#contactForm").validate();
    });
</script>
</body>

</html>
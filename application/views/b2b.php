<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
    <title>Expedition Saga | B2B</title>
    <meta name="description" content="Expedtion Saga B2B Collaboration" />
    <meta property="og:title" content="Expedtion Saga B2B Collaboration" />
    <meta property="og:description" content="Expedtion Saga B2B Collaboration" />
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
                        <h4 class="page-title">B2B Partnership Request</h4>
                        <ul class="page-list">
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>B2B Partnership</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area End -->
    <div class="contact-area pd-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 offset-xl-1 col-lg-7">
                    <form  class="tp-form-wrap bg-gray  p-4" method="post"
                        action="<?= base_url() ?>b2b">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-center">Help us understand your Business</h5>
                                <br/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Company Name*</span>
                                    <input type="text" placeholder="Company Name" name="company_name" required>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Contact Person Name*</span>
                                    <input type="text" placeholder="Contact Person" name="name" required>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Contact Phone*</span>
                                    <input type="text" placeholder="Company Phone" name="phone" required>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Contact Email*</span>
                                    <input type="text" placeholder="Company Email" name="email" required>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Company Website</span>
                                    <input type="text" placeholder="https://example.com" name="website" required>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Company Size*</span>
                                    <input type="number" placeholder="20" name="size" min="1" required>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">
                                        Write your proposal
                                    </span>
                                    <textarea name="proposal" required></textarea>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">
                                        Describe us with the expectations you have from us.
                                    </span>
                                    <textarea name="expectations" required></textarea>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Business per month in ($)*</span>
                                    <input type="number" name="monthly_business" min="1" placeholder="Expected business in a month?" required>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Partnership Percentage</span>
                                    <input type="number" name="share_percentage" min="1" placeholder="Expected share in %" required>
                                </label>
                            </div>
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-outline-gold" href="#">Send Proposal</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-info ">
                        <?php
                            $personalizedData = getcontentByNeedle($this->db, 'b2b-form-introduction');
                        ?>
                        <h3 class="title text-center" style="margin-top:20px;"><?php echo $personalizedData[0]['title']?></h3>
                        <p class="text-justify"><?php echo $personalizedData[0]['description']?></p>
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
        $("#b2bProposalForm").validate();
    });
</script>
</body>

</html>
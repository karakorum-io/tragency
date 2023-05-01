<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expedition Saga</title>
    <meta name="description" content="Expedition Saga : My bookings" />
    <meta property="og:title" content="Expedition Saga : My bookings" />
    <meta property="og:description" content="Expedition Saga : My bookings" />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <?php include 'includes/head.php' ?>
</head>
<style>
    .tour-details-gallery .details p {
        color: #000;
    }

    .accordion {
        padding: 10px;
    }

    .acoordian-content {
        padding: 5px 15px;
        display: flex;
        justify-content: space-between;
    }

    .accordion-main-panel {
        margin-bottom: 20px;
        border: 1px solid #999;
    }
</style>

<body>
    <?php include 'includes/header.php' ?>
    <div class="breadcrumb-area jarallax"
        style="background-image:url(<?= base_url() ?>assets/premium/images/jaipur07.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h4 class="page-title">My Bookings</h4>
                        <ul class="page-list">
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>My Booked Tours</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area End -->
    <div class="contact-area pd-bottom-100">
        <div class="tour-details-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <h3>My Booked Tours</h3>
                        <p>All booked tour with Expedition Saga</p>
                    </div>
                </div>
                <div class="row" style="justify-content:center;">
                    <div class="col-xl-6">
                        <?php
                        if (count($bookings) > 0) {
                            foreach ($bookings as $booking) {
                                ?>
                                <div id="booking-<?php echo $booking->id ?>">
                                    <button class="w-100 accordion table-dark text-left">
                                        <?php echo sprintf('%04d', $booking->id); ?> -
                                        <?php echo $booking->package_name ?>
                                    </button>
                                    <div class="panel accordion-main-panel">
                                        <div class="acoordian-content text-right">
                                            <span>Type : &nbsp;<b>
                                                    <?php echo $booking->option_name ?>
                                                </b></span>
                                        </div>
                                        <div class="acoordian-content text-right">
                                            <span>Booked On : <br /><b>
                                                    <?php echo date('m-d-Y', strtotime($booking->created_at)) ?>
                                                </b></span>
                                            <span>
                                                Tour On :
                                                <br /><b>
                                                    <?php echo date('m-d-Y', strtotime($booking->travel_date)) ?>
                                                    <small>
                                                        <?php echo date('h:i A', strtotime($booking->travel_time)) ?>
                                                    </small>
                                                </b>
                                            </span>
                                        </div>
                                        <div class="acoordian-content text-left">
                                            <span>Travellers / Packs: <br />
                                                <b>
                                                    <?php echo $booking->adult ?> Adult,
                                                    <?php echo $booking->child ?> Child,
                                                    <?php echo $booking->infant ?> Infant
                                                </b>
                                            </span>
                                        </div>
                                        <div class="acoordian-content text-right">
                                            <span class="text-left">STATUS : <br /><b class="badge badge-success">
                                                    <?php echo Booking::STATUS[$booking->status]; ?>
                                                </b></span>
                                            <span>PAYMENT : <br /><b class="badge badge-danger">
                                                    <?php echo ucwords(str_replace('_', ' ', $booking->payment_type)); ?>
                                                </b></span>
                                        </div>
                                        <div class="acoordian-content text-right">
                                            <span class="text-left">Cost:<br />
                                                <b>
                                                    <?php echo $booking->currency . " " . $booking->total ?>
                                                </b><br>
                                            </span>
                                            <span>
                                                Paid:<br />
                                                <b>
                                                    <?php echo $booking->currency . " " . $booking->amount_paid ?>
                                                </b><br>
                                            </span>
                                        </div>
                                        <div class="acoordian-content text-left">
                                            <span>
                                                Paid On:<br />
                                                <b>
                                                    <?php echo $booking->paid_on ? date('d-m-Y', strtotime($booking->paid_on)) : ""; ?>
                                                    <small>
                                                        <?php echo $booking->paid_on ? date('h:i A', strtotime($booking->paid_on)) : ""; ?>
                                                    </small>
                                                </b>
                                            </span>
                                        </div>
                                        <div class="acoordian-content"
                                            style="justify-content:space-evenly; margin-bottom:16px;">
                                            <span>
                                                <a href="#" onclick="printInvoice()" class="btn btn-outline-gold bg-white-25">
                                                    <i class="fa fa-print"></i>Invoice
                                                </a>
                                            </span>
                                            <span>
                                                <?php
                                                $message = 'Hi, I have wanted to enquire about Booking ID : ' . sprintf('%04d', $booking->id);
                                                ?>
                                                <a href="https://wa.me/919873801605?text=<?php echo $message; ?>"
                                                    class="text-success btn bg-white-25" target="_blank"
                                                    style="border-color:#28a745!important;border-radius:100px;border:1px solid;">
                                                    <i class="fa fa-whatsapp"></i>Support
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="row" style="justify-content:center;">
                    <div class="col-xl-6">
                        <div class="">
                            <div class="pagination">
                                <?php echo $this->pagination->create_links(); ?>
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
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }

        function printInvoice(id) {
            window.print(document.getElementById('booking-' + id));
        }
    </script>
</body>

</html>
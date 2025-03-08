<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
    <title>Expedition Saga | Personalized Tours</title>
    <meta name="description" content="Expedtion Saga Personalized Tours" />
    <meta property="og:title" content="Expedtion Saga Personalized Tours" />
    <meta property="og:description" content="Expedtion Saga Personalized Tours" />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
                        <h4 class="page-title">Get Personalized Itineraries</h4>
                        <ul class="page-list">
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>Personalized Tours</li>
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
                    <form id="personalizedTourForm" class="tp-form-wrap bg-gray  p-4" method="post"
                        action="<?= base_url() ?>personalized-tours">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-center">Let us know some about our expectations.</h5>
                                <br/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Name*</span>
                                    <input type="text" name="name" required>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Whatsapp / Mobile</span>
                                    <input type="text" name="phone">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Email*</span>
                                    <input type="email" name="email" required>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Planning your trip in 3-5 Months *</span>
                                </label>
                                <input type="radio" name="is_planning" value="yes" checked required> Yes 
                                <input type="radio" name="is_planning" value="no" required> No 
                                <input type="radio" name="is_planning" value="i dont know"required> I don't know.
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">No of days in India (Approx.) *</span>
                                    <input type="number" name="stays" min="2" required>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Expected Arrival Date</span>
                                    <input type="date" name="arrival" required>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">We book your international flights?</span>
                                </label>
                                <input type="radio" name="book_flights" value="yes" required> Yes 
                                <input type="radio" name="book_flights" value="no" checked required> No 
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Want us to apply for Indian Visa?</span>
                                </label>
                                <input type="radio" name="apply_visa" value="yes" required> Yes 
                                <input type="radio" name="apply_visa" value="no" checked required> No 
                            </div>
                            <div class="col-lg-12">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">
                                        <br/>
                                        Let us your interests or any preferred location in India. <br>
                                        (Your interests and preferrences help us to plan your trip better.)
                                    </span>
                                    <textarea name="query"></textarea>
                                </label>
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="g-recaptcha" data-sitekey="6Lfu8nApAAAAANb1M8EZCguAdTvtasXiMK0GKazE"></div>
                            </div>                            <div class="col-12 text-right">
                                <button type="button" class="btn btn-outline-gold" href="javscript::void(0)" onclick="sendOverWhatsapp()">Send on Whatsapp</button>
                                <button type="submit" class="btn btn-outline-gold" href="#">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-info ">
                        <?php
                            $personalizedData = getcontentByNeedle($this->db, 'personalized-form-introduction');
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
        $("#personalizedTourForm").validate();
        
    });

    function sendOverWhatsapp(){
        var dataa = $('form').serializeArray();
        if(dataa[0].value == '' || dataa[1].value == '' || dataa[2].value == ''){
            alert('Name,Email,Phone can not be empty');
             return;
        }else{
            console.log(dataa[0].value);
            // location.href = "https://api.whatsapp.com/send?phone=919873801605&amp;text=Personalized ItinerariesHello World!\nThis is my string";
            
            var url = "https://wa.me/919873801605?text="
                + "Hi This is my Personalized Itineraries Request%0a"
                + "Name: " + dataa[0].value + "%0a"
                + "Phone: " + dataa[1].value + "%0a"
                + "Email: " + dataa[2].value + "%0a"
                + "Planning your trip in 3-5 Months: " + dataa[3].value + "%0a"
                + "No of days in India: " + dataa[4].value + "%0a"
                + "Expected Arrival Date: " + dataa[5].value + "%0a"
                + "We book your international flights?: " + dataa[6].value + "%0a"
                + "Want us to apply for Indian Visa?: " + dataa[7].value + "%0a"
                + "Message: " + dataa[8].value;

            window.open(url, '_blank').focus();
            
            
           
        }
    }
    
</script>
</body>

</html>
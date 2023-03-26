<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>
<body>
    <?php include 'includes/header.php' ?>
    
     <!-- intro area start -->
     <div class="intro-area pd-top-108 pd-bottom-108">
        <div class="container pd-top-108">
            <div class="section-title text-lg-center text-left">
                <h2 class="title"><span>Terms and Conditions</span></h2>
            </div>
        </div>
    </div>
    <!-- intro area End -->
<!-- tour list area End -->
<div class="tour-list-area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                  
                 <div class="wpb_text_column wpb_content_element ">
<div class="wpb_wrapper">
<h4>1.&nbsp;Definitions</h4>
<p>Client:&nbsp;A person intending to hire travel services from Akbran Tour .</p>
<p>Product Purchased :&nbsp;Travel related services offered by Akbran Tour.</p>
<p>Tour Fees:&nbsp;Any and all fees payable by the client for products purchased.</p>
<h4>2.&nbsp;Fees and Payment</h4>
<p>2.1&nbsp;It is the client’s responsibility to ensure that the tour fee in respect of the Product purchased (as stated in the tour invoice document) are paid in such a fashion that atleast 50% of the fee are credited to our account 30 days prior to the date of travel. This condition can be modified in certain cases where added payments may be requested well ahead of time. These are typically situations where parts of travel booking are confirmed only against receipt of advance payments.</p>
<p>&nbsp;</p>
<p>2.2&nbsp;If the client purchases a product where the date of travel is less than 30 days away, then, a 50% deposit becomes due as soon as the tour arrangements are confirmed.</p>
<p>&nbsp;</p>
<p>2.3&nbsp;All payments made through this Online Payment Facility must be made in INR . Any currency conversion costs or other charges incurred in making the payment or in processing a refund shall be borne by the client or the third party making payment, and shall not be deductible from the Fees due to the company.</p>
<h4>3.&nbsp;Payment by Instalment</h4>
<p>3.1&nbsp;Where an instalment arrangement is set up to make payments using a credit card, Akbran Tour will notify the client, or the third party making payment, of the dates on which instalment payments will be claimed, and the amounts of those instalments, at least 5 working days before the first instalment is due.</p>
<p>&nbsp;</p>
<p>3.2&nbsp;Payment of tour fees by a person or organisation other than the client does not constitute a contract for the provision of the product between such person or organisation and Akbran Tour</p>
<h4>4.&nbsp;Refund of Tour Fees</h4>
<p>4.1&nbsp;Event, Attraction, Theater, Show or Coupon Ticket</p>
<p>These are non-refundable in all circumstances.</p>
<p>&nbsp;</p>
<h3>Other Tour Products &amp; Services</h3>
<p>If you cancel at least 10 day(s) in advance of the scheduled departure, there is no cancellation fee.</p>
<p>If you cancel between 5 and 9 day(s) in advance of the scheduled departure, there is a 50 percent cancellation fee.</p>
<p>If you cancel within 4 day(s) of the scheduled departure, there is a 100 percent cancellation fee.</p>
<p>&nbsp;</p>
<p>4.2&nbsp;In the event that any payment made via the company’s online payment system is to be refunded (either fully or in part) the company will endeavour to make the refund to the card account or bank account from which the refundable payment was made. If, for reasons beyond the company’s control, refund cannot be made to the originating card/bank account, the refund will be made through an alternate process.</p>
<h4>5.&nbsp;Security</h4>
<p>5.1&nbsp;All payment details which are entered through this payment gateway are encrypted. The site is secure and aims to offer secure communications using the latest technology available.</p>
<p>&nbsp;</p>
<p>5.2&nbsp;The company shall not be liable for any failure by the user of this online payment system to properly protect data from being seen on their screen by other persons or otherwise obtained by such other persons, during the Online Payment process or in respect of any omission to provide accurate information in the course of the Online Payment process.</p>
</div>
</div>
                </div>
                
              
            </div>
        </div>
    </div>
    <!-- tour list area End -->
 
    <?php include 'includes/footer.php' ?>
     <script>
 $("#add_to_cart").submit(function(e) {
      $("#ajax_data").html("");
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
         type: "POST",
         url: url,
         data: form.serialize(), // serializes form input
         success: function(data){
           $("#ajax_data").html(data);
         }
    });
});
    </script>  
</body>
</html>
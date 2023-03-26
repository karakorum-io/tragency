<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>
<body>
    <?php include 'includes/header.php' ?>
    
     <!-- intro area start -->
     <div class="intro-area pd-top-108 pd-bottom-108">
        <div class="container pd-top-108">
            <div class="section-title text-lg-center text-left">
                <h2 class="title"><span>Refund &amp; Cancellation </span> Policy</h2>
            </div>
        </div>
    </div>
    <!-- intro area End -->
<!-- tour list area End -->
<div class="tour-list-area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                  
                  <div class="entry-content">
<h4><strong>Payment , Refund &amp; Cancellation Policy</strong></h4>
<div class="row">
<div class="col-sm-12">
<p>When you book a reservation for a Product through the Website, Akbran Tour collects your payment information and processes your payment as described below under “Payment Processing”. Akbran Tour accepts the following credit cards: Mastercard, Visa, American Express . Charges or service fee for processing credit or debit card payments will be as per the bank’s schedule of charges . Full payment by credit or debit card is required to make a reservation. Payment will be listed as Akbran Tour on the credit or debit card statement.</p>
<p>No refunds are available once a tour or service has commenced, or in respect of any package, accommodation, meals or any other services utilized.</p>
<p>Canceling a booking with Akbran Tour can result in cancellation fees being applied by Akbran Tour , as outlined below.When canceling any booking you will be notified via email or telephone of the total cancellation fees. In some situations the payment and cancellation policies would vary on a case by case basis.</p>
<p>Event, Attraction, Theater, Show or Coupon Ticket</p>
<p>These are non-refundable in all circumstances.</p>
<h4>Other Tour Products &amp; Services</h4>
<p>If you cancel at least 10 day(s) in advance of the scheduled departure, there is no cancellation fee.</p>
<p>If you cancel between 7 and 9 day(s) in advance of the scheduled departure, there is a 50 percent cancellation fee.</p>
<p>If you cancel within 7 day(s) of the scheduled departure, there is a 100 percent cancellation fee.</p>
<p>The value of the transaction may be subject to taxes, duties, foreign transaction, currency exchange or other fees. Your bank or credit or debit card company may convert the payment into the local currency and charge fees, resulting in differences between the amount displayed on Akbran Tour websites, and the final amount charged to your bank account or credit or debit card statement. Please contact your bank or card company if you have any questions concerning any applicable conversion or fees.</p>
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
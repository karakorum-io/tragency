<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>
 <style>
 .btn-block {
    display: block;
    width: 100%;
    background: #000;
    color: #fff;
    font-size: 16px;
    padding: 8px 3px;
    border-radius: 5px;
}
 body{
     background-color: #e5e5e5;
 }
 .box_detail {
         border-radius: 0.5rem;
    box-shadow: 0 4px 10px 0 rgb(0 0 0 / 10%);
    padding: 15px;
    border: 1px solid #e5e5e5;
    background-color: #f2f2f2;
    margin: 55px 0;
 }
  .wait-spin {
    display: none;
      position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;
    bottom: 0;
    background-color:rgb(255 255 255 / 68%);
    z-index: 99999999999!important;}
    .wait-spin .spin{
        position: absolute;
    width: 50px;
    height: 50px;
    top: 50%;
    left: 50%;
    margin-left: -25px;
    margin-top: -25px;
    -webkit-animation: circle infinite .95s linear;
    -moz-animation: circle infinite .95s linear;
    -o-animation: circle infinite .95s linear;
    animation: circle infinite .95s linear;
    border: 2px solid #d3a061;
    border-top-color: rgba(0,0,0,.2);
    border-right-color: rgba(0,0,0,.2);
    border-bottom-color: rgba(0,0,0,.2);
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    -ms-border-radius: 100%;
    border-radius: 100%;
    }
      .card-errors p{  background: #ffe7e7;
    padding: 10px;
    color: red;
    font-size: 15px;
    text-transform: capitalize;
    font-weight: 600;}
    .box_detail ul li a {    color: #222;margin: auto; 
    font-size: 17px;
    font-weight: 600;
    letter-spacing: 1px;}
    .box_detail ul li {
        display:flex;
    margin-bottom: 15px;
    background: #fff;
    padding: 18px 10px;
    border: 2px solid #ddd;
    border-radius: 6px;
    box-shadow: 1px 1px 12px #dddddd;
    color: #000;
    width: 50%;
    text-align: center;
}
.box_detail ul .active{
        border: 2px solid #d3a061;    background: #fffcf8;
}
.box_detail ul .active a{
        color:#d3a061;
}
    </style>
<body>
  	<main style="    min-height: 100vh;">
	     
	    <div class="container row-height">
		 
     
    <div class="row">
        <div class="col-md-6 offset-md-3">
           <div class="box_detail booking ">
               	 
						    
							<div class="price">
							 
		    <div class="row no-gutters">
		        <div class="col-6">
		           <h4>Pay Now</h4>
		        </div>
		        <div class="col-6">
		            <div class="wrapper text-right">
		                 <img class="img-fluid pull-right" src="<?=base_url()?>assets/img/logo-stripe.png" style="max-height: 50px;margin-top: -12px;">
		            </div> 
		    </div>
		</div>
							 
							</div>
            
                <div class="panel-body ratedata">
    
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    <?php } ?>
 
     <div class="card-errors " id="paymentResponse"></div>
                  <form action="#" method="POST" id="paymentFrm">
           <div class='form-row row'>
                            <div class='col-12 form-group'>
                                <label class='control-label'>CARD NUMBER</label> <div id="card_number" class='form-control'></div>
                            </div>
                        </div>
                     
     
             <div class='form-row row'>
                            <div class='col-6 form-group'>
                                <label class='control-label'>EXPIRY DATE</label> <div id="card_expiry" class='form-control' ></div>
                            </div>
                            
                            <div class='col-6 form-group'>
                                <label class='control-label'>CVC CODE</label> <div id="card_cvc" class='form-control' ></div>
                            </div>
                        </div>
     
             <div class="row">
                            <div class="col-12">
                                <button class="add_top_30 btn_1 full-width purchase btn-block" type="submit" id="payBtn">Pay Now (<?=$currency.' '.$final_total?> )</button>
                            </div>
                        </div>
          
        </form>
          </div>
   
</div>  
    
                </div>
            </div>        
        </div>
   
     	</main>
</body>  
<script src="https://js.stripe.com/v3/"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <div id="wait" class="wait-spin"><div class="spin"></div></div>      	 

<script>
$(document).ready(function(){
  $(document).ajaxStart(function(){
    $("#wait").css("display", "block");
  });
  $(document).ajaxComplete(function(){
    $("#wait").css("display", "none");
  });
  
});
</script>
 <script>
 
var stripe = Stripe('<?php echo $this->config->item('stripe_key') ?>');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
   stripe.confirmCardPayment("<?=$intent?>",
  {
    payment_method: {card: cardElement}
  }
).then(function(result) {
  if (result.error) {
     resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
  } else {
   
    $.ajax({
        url: "<?=base_url()?>welcome/stripePost",
        type: 'POST',
        data:{},
        success: function(res) {
           window.location = "<?=base_url()?>welcome/load/thanku";
        }
    });
    
  }
});

}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
	
    // Submit the form
    form.submit();
}
</script>
</html>
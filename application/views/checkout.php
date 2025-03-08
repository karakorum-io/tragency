<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expedition Saga | Secure Checkout</title>
    <meta name="description" content="Expedition Saga : Secure Checkout" />
    <meta property="og:title" content="Expedition Saga : Secure Checkout" />
    <meta property="og:description" content="Expedition Saga : Secure Checkout" />
    <meta property="og:image" content="<?= base_url() ?>assets/images/mystical_tour.jpg" />
    <?php include 'includes/head.php' ?>
</head>
<style>
.info-addon{
        border: 1px solid #ddd;
    border-radius: 50%;
    padding: 1px 6px;
}
.addon {
    
    margin-bottom: 0;}
.addon td, .addon th{
        padding: 0.25rem;
     border: 1px solid #dee2e6;    font-size: 13px;
    font-weight: 500;
}
.addon .red td, .addon .red th{
        color: red;
}
    .tour-details-gallery .details p {
        color: #000;
    }

    input[type="radio"] {
        height: 15px;
        width: 15px;
        margin-right: 3px;
    }
</style>

<body>
    <?php include 'includes/header.php' ?>
    <div class="breadcrumb-area jarallax"
        style="background-image:url(<?= base_url() ?>assets/premium/images/jaipur07.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner ">
                        <h4 class="page-title">Secure Checkout</h4>
                        <ul class="page-list">
                            <li>Checkout securely — it takes only a few minutes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tour-details-area mg-top-70">
        <div class="tour-details-gallery">
            <form action="<?= base_url() ?>web/checkout_submit" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="widget tour-list-widget box ">
                                <div class="single-destinations-list style-three">
                                    <div class="thumb u-image-filter img-fill md:tw-mt-1 bg-blue-light">
                                        <img src="<?= base_url() ?>uploads/packages/<?= $detail->image ?>" alt="list">
                                    </div>
                                    <div class="details">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 bs-lg:tw-pr-6">
                                                <h2 class="h3 tw-mb-4">
                                                    <a href="<?= base_url() ?>tour/<?= $detail->slug ?>">
                                                        <?= $detail->name ?>
                                                    </a>
                                                </h2>
                                                <p>Duration :
                                                    <?= $detail->duration ?>
                                                </p>
                                                <p class="content">
                                                    <?= mb_substr($detail->short_desc, 0, 200) ?>...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-tour-list-meta">
                                    <h2 class="widget-title">Traveler Details</h2>
                                    <p>Information we need to confirm your tour or activity</p>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <p><b>Lead Traveler (Adult)</b></p>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-widget-search-input-title">Name</div>
                                            <div class="single-widget-search-input">
                                                <input type="text" name="name" class="form-control" required
                                                    value="<?= ((isset($user_data)) ? $user_data->name : "") ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-widget-search-input-title">Your email address</div>
                                            <div class="single-widget-search-input">
                                                <input type="email" name="email" class="form-control" required
                                                    value="<?= ((isset($user_data)) ? $user_data->email : "") ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-widget-search-input-title">Phone Number</div>
                                            <div class="single-widget-search-input">
                                                <input type="tel" name="phone" placeholder="Phone"
                                                    value="<?= ((isset($user_data)) ? $user_data->phone : "") ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="single-widget-search-input-title">Address</div>
                                            <div class="single-widget-search-input">
                                                <input type="text" name="address" class="form-control"
                                                    value="<?= ((isset($user_data)) ? $user_data->address : "") ?>"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-widget-search-input-title">Country</div>
                                            <div class="single-widget-search-input">
                                                <select name="country" class="form-control select_cntry">
                                                    <option value="">--select country--</option>
                                                    <?php
                                                    if (count($countries) > 0) {
                                                        foreach ($countries as $row) {
                                                            echo '<option value="' . $row->id . '" ' . ((isset($user_data) && $user_data->country == $row->id) ? "selected='selected'" : "") . '>' . $row->name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="single-widget-search-input-title">State</div>
                                            <div class="single-widget-search-input">
                                                <select name="state" class="form-control select_state">
                                                    <?php
                                                        if(!isset($user_data->state) || $user_data->state == 0){
                                                    ?>
                                                    <option value="">--choose state--</option>
                                                    <?php
                                                        } else {
                                                    ?>
                                                    <option
                                                        value="<?= ((isset($user_data)) ? $user_data->state : "") ?>">
                                                        <?= ((isset($user_data)) ? getStateName($this->db, $user_data->state) : "") ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="box">
                                <div class="book-list-warp">
                                    <h2 class="widget-title">Review Order Details</h2>
                                    <div class="widget-tour-list-meta mt-4 " style="background: #fff; padding: 10px;">
                                        <p class="book-list-content">
                                            <?= $detail->name ?>
                                        </p>
                                        <p>
                                            <?= date('M d, Y', strtotime($post['travel_date'])) ?>
                                        </p>
                                        <?php
                                            if(isset($post['travel_time'])){
                                        ?>
                                        <p>
                                            (
                                            <?= date('h:i a', strtotime($post['travel_time'])) ?>)
                                        </p>
                                        <?php
                                            }
                                        ?>
                                        <p>
                                            <?= $post['adult'] ?> Adult,
                                            <?= $post['child'] ?> Child,
                                            <?= $post['infant'] ?> Infant
                                        </p>
                                    </div>
                                     <hr>
                                     <?php
                                        $finalamnt = $post['total'];
                                        
                                        ?>
                                    <h2 class="widget-title">Tour AddOns</h2>
                                    <div class="table-responsive widget-tour-list-meta mt-4 " style="background: #fff; padding: 10px;">
                                       <table class="table addon">
                                          <?php
                                          if(!empty($addon)){
                                              foreach($addon as $aon){
                                                  
                              $finalamnt =  $aon['price']+$finalamnt;
                                                  echo'<tr class="'.(($aon['price']<=0)?'red':'').'">
                                                  <th>'.$aon['name'].' <a href="javascript:void(0)" class="info-addon" data-toggle="tooltip" data-placement="top" title="'.$aon['description'].'"><i class="fa fa-info"></i></a></th><td>'.$aon['price'].$currency_data->currency_symbol.'</td></tr>';
                                              }
                                          } ?>
                                       </table>
                                        
                                    </div>
                                    <hr>
                                    <h2 class="widget-title">Payment Options</h2>
                                    <div class="widget-tour-list-meta mt-4 " style="background: #fff; padding: 10px;">
                                        <p class="text-center">Secure Payment — We accept PayPal</p>
                                        
                                        <div class="row">
                                            <div class="col-xl-12 font-weight-bold text-right">
                                                Pay Later ($ 0.00) 
                                                <input type="radio" name="payment_type" value="pay_later" checked>
                                            </div>
                                            <div class="col-xl-12 text-right">
                                                Half Payment ( <?= $currency_data->currency_symbol ?> <?= round(($finalamnt / 2), 2) ?>)
                                                <input type="radio" name="payment_type" value="half_pay">
                                            </div>
                                            <div class="col-xl-12 text-right">
                                                Full Payment ( <?= $currency_data->currency_symbol ?> <?= $finalamnt ?>) 
                                                <input type="radio" name="payment_type" value="full_pay"> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                                <div class="tp-list-meta border-tp-solid text-right">
                                   
                                    <h3>
                                        <small>Total:</small>
                                        <span>
                                            <?= $currency_data->currency_symbol . $finalamnt ?>
                                        </span>
                                    </h3>
                                    <img src="<?= base_url() ?>assets/premium/images/paypal.png" height="50"/>
                                    <input type="hidden" name="travel_time" value="<?php $post['travel_time'] ?? "" ?>">
                                    <input type="hidden" name="adult" value="<?= $post['adult'] ?>">
                                    <input type="hidden" name="child" value="<?= $post['child'] ?>">
                                    <input type="hidden" name="infant" value="<?= $post['infant'] ?>">
                                    <input type="hidden" name="total" value="<?= $finalamnt ?>">
                                    <input type="hidden" name="travel_date" value="<?= $post['travel_date'] ?>">
                                    <input type="hidden" name="package_id" value="<?= $post['tour_id'] ?>">
                                    <input type="hidden" name="option_id" value="">
                                    <input type="hidden" name="package_name" value="<?= $detail->name ?>">
                                    <input type="hidden" name="option_name" value=" ">
                                    <button type="submit" class="mt-3 btn btn-yellow w-100" style="font-size: 14px;font-weight: 700;">
                                        Paypal Checkout
                                    </button>
                                    <p class="text-justify" style="line-height:18px;">
                                        <br/>
                                        <small>
                                            We take the safety of our guests very seriously, which is why we provide a complimentary SOS 
                                            service with every tour purchase. Our dedicated team ensures that each guest arrives, stays, 
                                            and departs safely, so you can fully experience India like a local without any extra cost. With 
                                            our SOS service, you can have peace of mind and enjoy your trip to the fullest.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- tour list area End -->
    <?php include 'includes/footer.php' ?>
    <script>
        $('.select_cntry').change(function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>utility/get_country_states/" + id,
            }).done(function (msg) {
                obj = JSON.parse(msg);
                if (obj.success) {
                    $(".select_state").html('');
                    $.each(obj.payload, function () {
                        $(".select_state").append('<option value="' + this.id + '">' + this.name + '</option>');
                    })
                }
            });
        });
        
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
</body>

</html>
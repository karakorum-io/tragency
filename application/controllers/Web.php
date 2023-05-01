<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/ExpeditionSaga.php');

class Web extends ExpeditionSaga
{

    public $controllerUrl;
    public $currency_data;
    public function __construct()
    {

        parent::__construct();
        $this->controllerUrl = base_url() . "web/";

        $this->load->model('admin/package');
        $this->load->model('admin/destination');
        $this->load->model('admin/blog');
        $this->load->model('admin/experience');
        $this->load->model('admin/setting');
        $this->load->model('admin/tour_option');
        $this->load->model('admin/tour_price');
        $this->load->model('admin/countries');
        $this->load->model('admin/booking');
        $this->load->model('admin/user');
        $this->load->model('admin/query');
        $this->load->model('email_model');
        $this->currency_data = $this->setting->getAll();

    }

    public function index()
    {
        $data['tour'] = $this->package->getActiveRec(6, 0);
        $data['blogs'] = $this->blog->getActiveRec(6, 0);
        $data['experience'] = $this->experience->getActiveRec(6, 0);
        $data['currency_data'] = $this->currency_data;
        $this->load->view('index', $data);
    }

    public function about()
    {
        $this->load->view('about');
    }

    public function load($load)
    {
        $this->load->view($load);
    }

    public function destination($slug)
    {
        $dest_detail = $this->destination->getBySlug($slug);
        if ($dest_detail) {
            $q = '';
            $destinationID = $dest_detail->id;
            $data['dest_detail'] = $dest_detail;
            $q .= " and FIND_IN_SET('$destinationID',destination) > 0 and status = 1";
            $data['tour'] = $this->package->get_data($q);
            $data['banner_img'] = $this->package->get_banner($q);
            $data['destination1'] = $this->destination->similar_dest($destinationID);
            $data['currency_data'] = $this->currency_data;
            $data['duration'] = $this->package->get_duration();

            $this->load->view('destination', $data);
        } else {
            redirect('', 'refresh');
        }
    }

    public function tour_filter()
    {
        $q = ' and status=1 ';
        if (isset($_POST['dest_array']) && $_POST['dest_array'] != '') {
            $row = $_POST['dest_array'];
            $q .= " and FIND_IN_SET('$row',destination) > 0";
        }
        if (isset($_POST['price_filter']) && $_POST['price_filter'] != '') {
            $number = $_POST['price_filter'];
            $exp = explode(' - ', $number);
            $from = str_replace("$", "", $exp[0]);
            $to = str_replace("$", "", $exp[1]);
            $q .= " and price>=$from  and price<=$to ";
        }
        if (isset($_POST['search']) && $_POST['search'] != '') {
            $search = $_POST['search'];
            $q .= " and name LIKE '%$search%'";
        }
        if (isset($_POST['duration']) && $_POST['duration'] != '') {
            $search = $_POST['duration'];
            $q .= " and duration = '$search' ";
        }

        $tour = $this->package->get_data($q);
        $currency_data = $this->currency_data;
        if (count($tour) > 0) {
            $i = 1;
            foreach ($tour as $row) {
                echo '<div class="single-destinations-list style-three">
                            <div class="thumb u-image-filter img-fill md:tw-mt-1 bg-blue-light"><img src="' . base_url() . 'uploads/packages/' . $row->image . '" alt="' . $row->name . '"></div><div class="details"><div class="row">
                                   <div class="col-12 col-lg-8 bs-lg:tw-pr-6">
                                     <h2 class="h3 tw-mb-4"><a href="' . base_url() . 'tour/' . $row->slug . '">' . $row->name . '</a></h2>  
                                <p class="content">' . mb_substr($row->short_desc, 0, 300) . '...</p></div><div class="col-12 col-lg-4 md:tw-pt-2 md:tw-px-0"><div class="row"><dl class="col-6 col-sm-12"><dt class="h4 tw-text-gold tw-mb-1">Duration</dt><dd class="text-small">' . $row->duration . '</dd></dl><dl class="col-6 col-sm-12">
          <dt class="h4 tw-text-gold tw-mb-1">Price Per Person</dt><dd class="text-small">From ' . (($row->sale != 0) ? '<del>' . $currency_data->currency_symbol . convertPrice($row->tour_price, $currency_data->conversion_rate) . '</del>' : "") . ' &nbsp;' . $currency_data->currency_symbol . convertPrice($row->price, $currency_data->conversion_rate) . '</dd></dl></div><div class=" md:tw-text-left"><a class="btn btn-sm btn-outline-gold tw-mt-1 p-2" href="' . base_url() . 'tour/' . $row->slug . '">See Itinerary</a></div></div></div></div></div>';

            }
        }
    }

    public function tour_detail($slug)
    {
        $data['detail'] = $this->package->getBySlug($slug);
        if ($data['detail']) {
            $data['tour'] = $this->package->getActiveRec(6, 0);
            $data['currency_data'] = $this->currency_data;
            $data['experience'] = $this->experience->getActiveRec(6, 0);
            $this->load->view('tour_detail', $data);
        } else {
            echo 'PAGE NOT FOUND';
        }
    }

    public function get_availibility()
    {
        $currency_data = $this->currency_data;
        $id = $this->input->post('tour_id');
        $adult = $this->input->post('adult');
        $child = $this->input->post('child');
        $infant = $this->input->post('infant');
        $travel_date = $this->input->post('travel_date');
        $options = $this->tour_option->getAll_active($id);
        if (count($options) > 0) {
            $i = 0;
            foreach ($options as $row) {
                $timeoptio = '';
                $total = 0;
                $adul_per_price = $this->tour_price->get_option_price($row->id, 'adult', $adult);
                $child_per_price = $this->tour_price->get_option_price($row->id, 'child', $child);
                if ($adul_per_price != 0) {

                    $adul_per_price = convertPrice($adul_per_price, $currency_data->conversion_rate);
                    $child_per_price = convertPrice($child_per_price, $currency_data->conversion_rate);
                    $total = ($child_per_price * $child) + ($adul_per_price * $adult);
                    $pricetext = '<p><b>' . $currency_data->currency_symbol . $total . '</b></p><p>' . $adult . 'x Adults ' . $currency_data->currency_symbol . $adul_per_price . '</p>';
                    if ($child >= 1) {
                        $pricetext .= '<p>' . $child . 'x Child ' . $currency_data->currency_symbol . $child_per_price . '</p>';
                    }
                    $pricetext .= '<button type="submit" class="btn btn-blue float-right" >Book Now</button>';

                } else {
                    $pricetext = '<p class="text-danger">No rates for seleted guests</p>';
                }
                $time = explode(',', $row->time);
                foreach ($time as $row2) {

                    $timeoptio .= '<option value="' . $row2 . '">' . date('h:i a', strtotime($row2)) . '</option>';
                }
                $i++;
                echo '
	            <div class="card mb-2" >
                    <div class="card-header">
                        ' . $i . ') ' . $row->title . '
                    </div>
                    <div class="card-body">
                        ' . $row->descr . '
                        <form method="post" action="' . base_url() . 'web/checkout">
                            <div class="row">
                                <div class="col-12">
                                    <p></p>
                                    <input type="hidden" name="adult" value="' . $adult . '">
                                    <input type="hidden" name="child" value="' . $child . '">
                                    <input type="hidden" name="infant" value="' . $infant . '">
                                    <input type="hidden" name="total" value="' . $total . '">
                                    <input type="hidden" name="travel_date" value="' . date("Y-m-d", strtotime($travel_date)) . '">
                                    <input type="hidden" name="tour_id" value="' . $id . '">
                                    <input type="hidden" name="option_id" value="' . $row->id . '">
                                    ' . $pricetext . '
                                </div>
                            </div>
                        </form>
                    </div>
                </div>';
            }
        } else {
            echo '<p>No tour options available right now</p>';
        }
    }

    public function checkout()
    {
        if (isset($_POST['tour_id'])) {
            if ($this->session->userdata('user_data')) {
                $data['user_data'] = $this->session->userdata('user_data');
            }
            $id = $_POST['tour_id'];
            $oid = $_POST['option_id'];
            $data['options'] = $this->tour_option->getById($oid);
            $data['detail'] = $this->package->getById($id);
            $data['countries'] = $this->countries->getAllRecord();
            $data['post'] = $_POST;
            $data['currency_data'] = $this->currency_data;
            $this->load->view('checkout', $data);
        } else {
            $error = 'Some Error Occurred!!';
            $this->session->set_flashdata('error_message', $error);
            redirect('web');
        }
    }

    public function booking_mail($id)
    {
        $post = $this->crud->get_data("booking", "and id='$id' ", "*", "full", "", "", "");
        $data = $post->result_array()[0];
        $subject = "Booking Confirmed - Memorable TajTour";
        $message = "<html><head><title>Booking Confirmed - Memorable TajTour</title></head>
            <body><p>Dear " . $data['title'] . " " . $data['fname'] . " " . $data['lname'] . "</p>
            <p>Thank you for booking your Tour with Memorable TajTour, We are looking forward to your visit</p><br>
            <br>
            <address>Tour Booked : " . $data['tour_name'] . "<br>
            Travel Date : " . date('M d, Y', strtotime($data['travel_date'])) . "<br>
            Option : " . $data['tour_title'] . " (" . date('h:i a', strtotime($data['travel_time'])) . ")<br>
            " . $data['adult'] . " Adult, " . $data['child'] . " Child, " . $data['infant'] . " Infant</address>
            <br>
            
            <br>
            <address>Traveler Details<br>
            Name : " . $data['title'] . " " . $data['fname'] . " " . $data['lname'] . "<br>
            Phone : " . $data['phone'] . "<br>
            Email : " . $data['email'] . "<br>
            Nationality : " . $data['nationality'] . "</address>
            <br> 
            <p>If your have any questions please don't hesitate to contact us</p>
            <p>We hope you enjoy your Tour with us</p>
            <p>Best Regards</p>
            <img src='" . base_url() . "assets/img/while_bg_logo-removebg-preview.png' height='50'>
            <address><strong> Memorable TajTour.</strong><br>
                    +91 87557 75544 , +91 70558 81199<br>
            LG-3 Handicraft nagar,<br> fatehabad Road, Agra<br>
            info@mtajtour.com , mtajtour@gmail.com
            </address>
            </body>
            </html>";

        $this->email->from('info@mtajtour.com', 'Memorable TajTour');
        $this->email->to($data['email']);
        $this->email->set_mailtype("html");
        $this->email->subject($subject);
        $this->email->message($message);

        return $this->email->send();
    }

    public function checkout_submit()
    {
        if (!empty($this->input->post())) {
            if ($_POST['payment_type'] != 'pay_later') {
                if ($_POST['payment_type'] == 'full_pay') {
                    $_POST['amnt_paid'] = $_POST['total'];
                } else {
                    $_POST['amnt_paid'] = round(($_POST['total'] / 2), 2);
                }
                $itemPrice = $_POST['amnt_paid'];
            } else {
                $itemPrice = 0;
            }

            //CREATE BOOKING================
            $currency_data = $this->currency_data;
            $currency = strtoupper($currency_data->currency_alpha);
            $booking = array(
                'option_id' => trim($this->input->post('option_id')),
                'package_id' => trim($this->input->post('package_id')),
                'package_name' => trim($this->input->post('package_name')),
                'option_name' => trim($this->input->post('option_name')),
                'travel_date' => trim($this->input->post('travel_date')),
                'travel_time' => trim($this->input->post('travel_time')),
                'payment_type' => trim($this->input->post('payment_type')),
                'amount_paid' => $itemPrice,
                'adult' => trim($this->input->post('adult')),
                'child' => trim($this->input->post('child')),
                'infant' => trim($this->input->post('infant')),
                'total' => trim($this->input->post('total')),
                'currency' => $currency,
                'name' => trim($this->input->post('name')),
                'email' => trim($this->input->post('email')),
                'phone' => trim($this->input->post('phone')),
                'address' => trim($this->input->post('address')),
                'country' => trim($this->input->post('country')),
                'state' => trim($this->input->post('state'))
            );
            $id = $this->booking->create($booking);

            //PROFILE UPDATE==================
            $user = array(
                'name' => trim($this->input->post('name')),
                'email' => trim($this->input->post('email')),
                'phone' => trim($this->input->post('phone')),
                'address' => trim($this->input->post('address')),
                'country' => trim($this->input->post('country')),
                'state' => trim($this->input->post('state'))
            );
            $check = $this->user->getByEmail($this->input->post('email'));
            if ($check) {
                $uid = $check->id;
                $this->user->update($uid, $user);
            } else {
                $this->user->create($user);
            }

            $check = $this->user->getByEmail($this->input->post('email'));
            $this->session->set_userdata('user_data', $check);

            if ($_POST['payment_type'] == 'pay_later') {
                redirect('web/load/thanku');
            } else {
                $tour_name = trim($this->input->post('package_name'));
                $this->load->library('paypal_lib');

                // Set variables for paypal form 
                $returnURL = base_url() . 'web/success'; //payment success url 
                $cancelURL = base_url() . 'web/cancel'; //payment cancel url 
                $notifyURL = base_url() . 'web/ipn'; //ipn url 

                // Add fields to paypal form 
                $this->paypal_lib->add_field('return', $returnURL);
                $this->paypal_lib->add_field('cancel_return', $cancelURL);
                $this->paypal_lib->add_field('notify_url', $notifyURL);
                $this->paypal_lib->add_field('item_name', $tour_name);
                $this->paypal_lib->add_field('custom', $id);
                $this->paypal_lib->add_field('item_number', $id);
                $this->paypal_lib->add_field('amount', $itemPrice);
                $this->paypal_lib->add_field('currency_code', $currency);

                // Render paypal form 
                $this->paypal_lib->paypal_auto_form();
            }
        } else {
            $error = 'Some Error Occurred!!';
            $this->session->set_flashdata('error_message', $error);
            redirect('web');
        }
    }

    function success()
    {
        $this->load->library('paypal_lib');
        // Get the transaction data 
        $paypalInfo = $this->input->post();
        $productData = $paymentData = array();
        if (!empty($paypalInfo['item_number'])) {
            $booking_id = $paypalInfo['item_number'];
            $this->booking->update($booking_id, array('status' => 1));
            $booking = $this->booking->getById($booking_id);
            if ($booking) {
                $email = $booking->email;
                $check = $this->user->getByEmail($email);
                if ($check) {
                    $this->session->set_userdata('user_data', $check);
                }
            }
            redirect('web/load/thanku');

        }
    }

    function cancel()
    {
        echo '<p>Your Transaction has been cancelled</p>';
        echo '<a href="' . base_url() . '">Go back home</a> ';
    }

    function ipn()
    {
        $this->load->library('paypal_lib');
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post();

        if (!empty($paypalInfo)) {
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid 
            if ($ipnCheck) {

            }
        }
    }

    public function user_login()
    {
        $this->load->view('login');
    }

    public function user_logout()
    {
        $this->session->unset_userdata('user_data');
        redirect('web', 'refresh');
    }

    public function bookings()
    {
        if ($this->session->userdata('user_data')) {
            $email = $this->session->userdata('user_data')->email;
            $allcount = $this->booking->getAllCountByEmail($email)->records;
            $this->initializeUserPagination($this->controllerUrl . "bookings", $allcount);
            $page = $this->uri->segment(PAGINATION_URI_SEGMENT_USER);
            $offset = !$page ? 0 : $page;

            $bookings = $this->booking->getAllByEmail($email, PAGINATION_PERPAGE, $offset);

            $this->load->view('bookings', [
                'bookings' => $bookings
            ]);


        } else {
            $error = 'Please Login!!';
            $this->session->set_flashdata('error_message', $error);
            redirect('web/user_login');
        }
    }

    public function contact()
    {
        $inputCaptcha = $this->input->post('captcha');
        $sessCaptcha = $this->session->userdata('captchaCode');
        if ($inputCaptcha == $sessCaptcha) {
            $data = array(
                'name' => trim($this->input->post('name', TRUE)),
                'phone' => trim($this->input->post('phone', TRUE)),
                'email' => trim($this->input->post('email', TRUE)),
                'query' => trim($this->input->post('query', TRUE))
            );

           $id = $this->query->create($data);
           $this->email_model->send_query($id);
            
            $error = 'Successfully submited';
            $this->session->set_flashdata('success_message', $error);
            redirect('contact');
        } else {
            echo 'Captcha code does not match, please try again.';
        }
    }

    public function blogs()
    {
        $allcount = $this->blog->getActiveCount()->records;
        $this->initializeUserPagination($this->controllerUrl . "blogs", $allcount);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT_USER);
        $offset = !$page ? 0 : $page;
        $blogs = $this->blog->getActiveRec(PAGINATION_PERPAGE, $offset);
        $this->load->view('blogs', ['blogs' => $blogs]);
    }

    public function blog($slug)
    {
        $data['data'] = $this->blog->getBySlug($slug);
        if ($data['data']) {
            $data['blogs'] = $this->blog->getActiveRec(6, 0);
            $this->load->view('blog_detail', $data);
        } else {
            echo 'BLOG NOT FOUND';
        }
    }

    public function testimonials()
    {
        $allcount = $this->experience->getActiveCount()->records;
        $this->initializeUserPagination($this->controllerUrl . "testimonials", $allcount);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT_USER);
        $offset = !$page ? 0 : $page;
        $testimonials = $this->experience->getActiveRec(PAGINATION_PERPAGE, $offset);
        $this->load->view('testimonials', ['testimonials' => $testimonials]);
    }
}
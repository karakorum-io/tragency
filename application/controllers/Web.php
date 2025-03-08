<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/ExpeditionSaga.php');

require(__DIR__ . '/../libraries/pdf/fpdf.php');

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
        $this->load->model('admin/b2b');
        $this->load->model('admin/addon');
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
    
    public function tagra()
    {
        $this->load->view('tagra');
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
            // $oid = $_POST['option_id'];
            $data['addon'] = $this->crud->get_data("addons", "and status='1' and tour='' or FIND_IN_SET($id, tour) ", "*", "full", "", "", "")->result_array();
            $guest = $_POST['adult'] + $_POST['child'];
            $_POST['total'] = $_POST['price'] * $guest;
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
            $travel_date = $this->input->post('travel_date');

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
                'travel_date' => date('Y-m-d', strtotime($travel_date)),
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
        $recaptcha = $this->input->post('g-recaptcha-response');
        $secret_key = '6Lfu8nApAAAAAFDQQ5aWYH_EI-Psmx-LDAHSQAda';
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
            . $secret_key . '&response=' . $recaptcha;
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success == true) {
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
            $this->session->set_flashdata('error_message', 'Captcha code does not match, please try again.');
            redirect('contact');
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

    public function personalized_tours()
    {
        if (count($this->input->post()) > 0) {
            // Get reCAPTCHA response
            $recaptcha = $this->input->post('g-recaptcha-response');
            $secret_key = '6Lfu8nApAAAAAFDQQ5aWYH_EI-Psmx-LDAHSQAda'; // Replace with your actual secret key
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $recaptcha;
    
            // Verify with Google
            $response = file_get_contents($url);
            $response = json_decode($response);
    
            if ($response->success == true) {
                // CAPTCHA passed, process the form
                $data = array(
                    'name' => trim($this->input->post('name')),
                    'phone' => trim($this->input->post('phone')),
                    'email' => trim($this->input->post('email')),
                    'query' => trim($this->input->post('query')),
                    'is_planning' => trim($this->input->post('is_planning')),
                    'stays' => trim($this->input->post('stays')),
                    'arrival' => trim($this->input->post('arrival')),
                    'book_flights' => trim($this->input->post('book_flights')),
                    'apply_visa' => trim($this->input->post('apply_visa')),
                    'type' => 3
                );
    
                $id = $this->query->create($data);
                $this->email_model->send_query($id);
    
                $this->session->set_flashdata('success_message', 'We have received your message! We will get back to you shortly!');
                redirect('../personalized-tours');
            } else {
                // CAPTCHA failed
                $this->session->set_flashdata('error_message', 'Captcha verification failed, please try again.');
                redirect('../personalized-tours');
            }
        }
        $this->load->view('personalized_tours', []);
    }

    public function b2b()
    {
        if (count($this->input->post()) > 0) {
            $data = array(
                'company_name' => trim($this->input->post('company_name')),
                'name' => trim($this->input->post('name')),
                'phone' => trim($this->input->post('phone')),
                'email' => trim($this->input->post('email')),
                'website' => trim($this->input->post('website')),
                'size' => trim($this->input->post('size')),
                'proposal' => trim($this->input->post('proposal')),
                'expectations' => trim($this->input->post('expectations')),
                'monthly_business' => trim($this->input->post('monthly_business')),
                'share_percentage' => trim($this->input->post('share_percentage'))
            );

            echo $id = $this->b2b->create($data);
            echo $this->email_model->send_b2b($id);

            $error = 'We have received your message! We will get back to you shortly!';
            $this->session->set_flashdata('success_message', $error);
            redirect('b2b');
        }
        $this->load->view('b2b', []);
    }

    public function review()
    {
        $this->load->view('review', []);
    }

    public function invoice($id)
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Logo
        $pdf->Image('assets/images/saGA1.png', 24, 6, 30);
        // Arial bold 15
        $pdf->SetFont('Arial', 'B', 15);
        // Move to the right
        $pdf->Cell(80);
        // Title
        
        $pdf->Cell(30, 10, 'Truly Luxury', 0, 0, 'C');
        // Line break
        $pdf->Ln(15);

        $booking = $this->getBookingData($id);

        $pdf->SetFont('Arial', '', 12);

        $content = '
            #ID: '.$booking->id.'
            Booking Date: '.date('m-d-Y', strtotime($booking->created_at)).'
            Tour Date: '.date('m-d-Y', strtotime($booking->travel_date)).'
            Packs: '.$booking->adult.' Adults, '.$booking->child.' Kids, '.$booking->infant.' Infants
            Status: '.Booking::STATUS[$booking->status].'
            Payment: '.ucwords(str_replace('_', ' ', $booking->payment_type)).'
            Cost: '.$booking->currency . ' ' . $booking->total.'
            Paid: '.$booking->currency . ' ' . $booking->amount_paid.'
            Paid On: '.date('m-d-Y', strtotime($booking->paid_on)) . '
        ';

        $pdf->MultiCell(90, 10, $content);

        // Position at 1.5 cm from bottom
        $pdf->SetY(130);
        // Arial italic 8
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0,10,'info@expeditionsaga.com | +91-9927061766',0,0,'C');
        
        // Position at 1.5 cm from bottom
        $pdf->SetY(135);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(0,10,'https://expeditionsaga.com/cancellation-policy',0,0,'C');
        $pdf->Output();
    }

    function getBookingData($id)
    {
        $booking = $this->booking->getById($id);
        return $booking;
    }

    function meta_tours() {
        $data = [];
        $this->load->view('meta_tours', $data);
    }
}
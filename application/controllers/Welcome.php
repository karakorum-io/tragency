<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
	    $data['tour']= $this->crud->get_data("product", "and status=1 ", "*", "full","", "", "order by order_id desc");
	    $data['destination']= $this->crud->get_data("category", "", "*", "full","", "", "order by id desc");
	    	$data['blogs']= $this->crud->get_data('all_news',' and status="1" ','*','','','','ORDER BY id DESC','limit 3'); 
	    	$data['clients']= $this->crud->get_data("clients", "", "", "full","", "", "order by id desc limit 6");
		$this->load->view('index',$data);
	}
	public function about()
	{
		$this->load->view('about');
	}
	public function load($load)
	{
		$this->load->view($load);
	}
	public function tour($rowno=0)
	{
	    $this->load->library('pagination');
	     $rowperpage=20;$q='';
	    if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
        if(isset($_POST['dest_array']) && !empty($_POST['dest_array'])){
            foreach($_POST['dest_array'] as $row){
                $q .= " and FIND_IN_SET('$row',destination) > 0";
            }
        }
        if(isset($_POST['price_filter'])){
            $number = $_POST['price_filter'];
$exp = explode(' - ', $number);
$from = str_replace("$", "", $exp[0]);
$to = str_replace("$", "", $exp[1]);
$q .=  " and price>='$from'  and price<='$to' ";
        }
       if(isset($_POST['destination'])){
           $destination = $_POST['destination'];
           $q .=  " and FIND_IN_SET('$destination',destination) > 0";
       }
        if(isset($_GET['destination'])){
           $destination = $_GET['destination'];
           $q .=  " and FIND_IN_SET('$destination',destination) > 0";
       }
       if(isset($_POST['search'])){
           $search = $_POST['search'];
          $q .= " and name LIKE '%$search%'";
       }
      
        $allcount = $this->crud->get_data('product'," $q and status = 1",'id','','','','','')->num_rows();  
	    $data['tour']= $this->crud->get_data("product", "$q and status=1 ", "*", "full","", "ORDER BY id DESC","LIMIT $rowno ,$rowperpage");
     
	   $config['base_url'] = base_url().'welcome/tour';
       $config['use_page_numbers'] = TRUE;
       $config['total_rows'] = $allcount;
       $config['per_page'] = $rowperpage;
       $config['cur_tag_open'] = '&nbsp;<a class="current">';
       $config['cur_tag_close'] = '</a>';
         $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $this->pagination->initialize($config);
       $data['pagination'] = $this->pagination->create_links();
       $data['row'] = $rowno;
       
	    $data['destination']= $this->crud->get_data("category", "", "*", "full","", "", "order by id desc");
	    
	    $data['duration']= $this->crud->get_data("product", " and status=1", "DISTINCT(duration) as duration", "full","", "", "order by duration desc");
	    
	    
		$this->load->view('tour',$data);
	}
	public function destination($des)
	{
	    $dest_detail= $this->crud->get_data("category", "and slug='$des'", "*", "full","", "", "order by id desc");
	   if($dest_detail->num_rows()>0){
	       $q='';
	       $destination = $dest_detail->result()[0]->id;
	       $data['dest_detail'] = $dest_detail;
        if(isset($_POST['dest_array']) && !empty($_POST['dest_array'])){
            foreach($_POST['dest_array'] as $row){
                $q .= " and FIND_IN_SET('$row',destination) > 0";
            }
        }
        if(isset($_POST['price_filter'])){
            $number = $_POST['price_filter'];
$exp = explode(' - ', $number);
$from = str_replace("$", "", $exp[0]);
$to = str_replace("$", "", $exp[1]);
$q .=  " and price>='$from'  and price<='$to' ";
        }
        $q .=  " and FIND_IN_SET('$destination',destination) > 0";
     
       if(isset($_POST['search'])){
           $search = $_POST['search'];
          $q .= " and name LIKE '%$search%'";
       }
       $data['tour']= $this->crud->get_data("product", "$q and status=1 ", "*", "full","", "ORDER BY id DESC","");
        $data['banner_img']= $this->crud->get_data("product", "$q and status=1 ", "image", "full","", "ORDER BY  RAND()","LIMIT 5");
       $data['destination1']= $this->crud->get_data("category", "and slug!='$des'", "*", "full","", "", "order by id desc LIMIT 8");
	    $data['duration']= $this->crud->get_data("product", " and status=1", "DISTINCT(duration) as duration", "full","", "", "order by duration desc");
	    
		$this->load->view('destination',$data);
	   }else{
	                    redirect('','refresh');
	   }
	}
	public function tour_filter()
	{
	   $q='';
        if(isset($_POST['dest_array']) && $_POST['dest_array']!=''){
            $row = $_POST['dest_array'];
                $q .= " and FIND_IN_SET('$row',destination) > 0";
        }
        if(isset($_POST['price_filter']) && $_POST['price_filter']!=''){
            $number = $_POST['price_filter'];
            $exp = explode(' - ', $number);
            $from = str_replace("$", "", $exp[0]);
            $to = str_replace("$", "", $exp[1]);
            $q .=  " and price>=$from  and price<=$to ";
        }
       if(isset($_POST['search']) && $_POST['search']!=''){
           $search = $_POST['search'];
          $q .= " and name LIKE '%$search%'";
       }
        if(isset($_POST['duration']) && $_POST['duration']!=''){
           $search = $_POST['duration'];
          $q .= " and duration = '$search' ";
       }
       
	    $tour= $this->crud->get_data("product", "$q and status=1 ", "*", "full","", "ORDER BY id DESC","");
      	$settings= $this->crud->get_data("settings", "", "*", "full","", "", "order by id desc");
    $settings = $settings->result()[0];
	      if($tour->num_rows()>0){
                $i = 1;
                foreach($tour->result() as $row){
               echo'<div class="single-destinations-list style-three">
                            <div class="thumb u-image-filter img-fill md:tw-mt-1 bg-blue-light"><img src="'.base_url().$row->image.'" alt="'.$row->name.'"></div><div class="details"><div class="row">
                                   <div class="col-12 col-lg-8 bs-lg:tw-pr-6">
                                     <h2 class="h3 tw-mb-4"><a href="'.base_url().'tours/'.urlencode(str_replace(' ', '-', $row->name)).'/'.$row->id.'">'.$row->name.'</a></h2>  
                                <p class="content">'.mb_substr($row->short_desc,0,300).'...</p></div><div class="col-12 col-lg-4 md:tw-pt-2 md:tw-px-0"><div class="row"><dl class="col-6 col-sm-12"><dt class="h4 tw-text-gold tw-mb-1">Duration</dt><dd class="text-small">'.$row->duration.'</dd></dl><dl class="col-6 col-sm-12">
          <dt class="h4 tw-text-gold tw-mb-1">Price Per Person</dt><dd class="text-small">From '.(($row->sale!=0)?'<del>'.$settings->currency_symbol.$row->tour_price.'</del>':"").' &nbsp;'.$settings->currency_symbol.$row->price.'</dd></dl></div><div class=" md:tw-text-left"><a class="btn btn-sm btn-outline-gold tw-mt-1 p-2" href="'.base_url().'tours/'.urlencode(str_replace(' ', '-', $row->name)).'/'.$row->id.'">See Itinerary</a></div></div></div></div></div>';
                    
                } 
                }
	}
	
		public function tour_detail($title,$id)
	{
	   $data['detail']= $this->crud->get_data("product", "and id=$id ", "*", "full","", "","");
	   $data['tour']= $this->crud->get_data("product", "and status=1 ", "*", "full","", "", "ORDER BY rand() LIMIT 5 ");
	    $data['reviews']= $this->crud->get_data("review", "and tourid='$id' ", "*", "full","", "", "ORDER BY rand() LIMIT 10 ");
	 	$this->load->view('tour_detail',$data);
	}
	
	//   ADMIN ====================================

   public function admin()
	{  
		$this->load->view('admin/login');
	}
	public function admin_login()
	{	
	    $email = $this->input->post('email', TRUE);
	    $password = $_POST['pass'];
	    $check = $this->crud->get('admin',array('username'=>$email));
	     if($check->num_rows()>=1){
	     $pass = $check->result_array()[0]['password'];
	     if(password_verify($password,$pass)){
	     
	    
             setcookie('admin_mail1', $email, time() + (86400 * 30), "/");
             
             redirect('master','refresh');
        }else{
              $error= 'Invalid  Password';
              $this->session->set_flashdata('error_message',$error);
             redirect('welcome/admin');
        }
	     }else{
              $error= 'Invalid Email';
              $this->session->set_flashdata('error_message',$error);
              redirect('welcome/admin');
        }
	}
	public function logout_admin()
	{
	 
       
       setcookie('admin_mail1', '', time() + (86400), "/");
    
		$error= 'Successfully Logout';
		  $this->session->set_flashdata('success_message',$error);
          redirect('welcome/admin');}
          
     public function logout_user()
	{
		$this->session->unset_userdata('user_detail');
		$error= 'Successfully Logout';
		  $this->session->set_flashdata('success_message',$error);
          redirect('welcome/user');
     }


// GET AVAILABILITY OPTIONS=============================

public function get_availibility()
	{	
	$settings= $this->crud->get_data("settings", "", "*", "full","", "", "order by id desc");
    $settings = $settings->result()[0];
	    $id = $this->input->post('tour_id');
	    $adult = $this->input->post('adult');
	    $child = $this->input->post('child');
	    $infant = $this->input->post('infant');
	    $travel_date = $this->input->post('travel_date');
	    $options=$this->crud->get_data("availability", " and status=1  and tourid='$id' ", "*", "full","", "", "order by id desc");
	    if($options->num_rows()>0){
	        $i = 0;
	        foreach($options->result() as $row){
	            $timeoptio = '';$total=0;
	          $adul_per_price = $this->crud->tour_type_price($row->id,'adult',$adult);
	            
	                 $child_per_price = $this->crud->tour_type_price($row->id,'child',$child);
	                 if($adul_per_price!='not_found'){
	              if($child<=0 || $child_per_price!='not_found'){
	         
	         if($child_per_price=='not_found'){$child_per_price = 0;}
	          $total = ($child_per_price*$child)+($adul_per_price*$adult);
	          $pricetext = '<p><b>'.$settings->currency_symbol.$total.'</b></p><p>'.$adult.'x Adults '.$settings->currency_symbol.$adul_per_price.'</p>';
	                 if($child>=1){
	                $pricetext .= '<p>'.$child.'x Child '.$settings->currency_symbol.$child_per_price.'</p>';
	            }
	                 $pricetext .= '<button type="submit" class="btn btn-blue float-right" >Book Now</button>';
	             }else{
	                 $pricetext = '<p class="text-danger">No rates for seleted guests</p>';
	             }
	             }else{
	                 $pricetext = '<p class="text-danger">No rates for seleted guests</p>';
	             }
	            $time = explode(',',$row->time);
             foreach($time as $row2){
                
       $timeoptio.= '<option value="'.$row2.'">'.date('h:i a', strtotime($row2)).'</option>';
             }
	            $i++;
	            echo'
	            <div class="card mb-2" >
  <div class="card-header">
    '.$i.') ' .$row->title.'
  </div>
   <div class="card-body">
    '.$row->descr.'
    <form method="post" action="'.base_url().'welcome/checkout">
    <div class="row">
    <div class="col-4">
    <div class="single-widget-search-input-title">Select Time</div>
                                <div class="single-widget-search-input mb-0">
                                    <select name="travel_time" class="form-control p-1" required="">'.$timeoptio.'</select>
                                </div></div>
    <div class="col-8">
    <p></p>
    <input type="hidden" name="adult" value="'.$adult.'">
    <input type="hidden" name="child" value="'.$child.'">
    <input type="hidden" name="infant" value="'.$infant.'">
    <input type="hidden" name="total" value="'.$total.'">
    <input type="hidden" name="travel_date" value="'.date("Y-m-d",strtotime($travel_date)).'">
    <input type="hidden" name="tour_id" value="'.$id.'">
    <input type="hidden" name="option_id" value="'.$row->id.'">
    '.$pricetext.'
    </div>
    </div></form>
   </div>
   </div>';
	        }
	    }else{
	        echo'<p>No tour options available right now</p>';
	    }
	}
	public function checkout()
	{	
	    if(isset($_POST['tour_id'])){
	       
	$id = $_POST['tour_id'];
	$oid = $_POST['option_id'];
	$data['options']=$this->crud->get_data("availability", " and id='$oid' ", "*", "full","", "", "order by id desc");
	$data['detail']= $this->crud->get_data("product", "and id=$id ", "*", "full","", "","");
	$data['post']=$_POST;
	$this->load->view('checkout',$data);
	}else{
	     $error= 'Some Error Occurred!!';
              $this->session->set_flashdata('error_message',$error);
             redirect('welcome');
	}
	}
	
	public function booking_mail($id){
	    $post = $this->crud->get_data("booking", "and id='$id' ", "*", "full","", "","");
	    $data = $post->result_array()[0];
	    $subject = "Booking Confirmed - Memorable TajTour";
$message = "<html><head><title>Booking Confirmed - Memorable TajTour</title></head>
<body><p>Dear ".$data['title']." ".$data['fname']." ".$data['lname']."</p>
<p>Thank you for booking your Tour with Memorable TajTour, We are looking forward to your visit</p><br>
<br>
<address>Tour Booked : ".$data['tour_name']."<br>
Travel Date : ".date('M d, Y', strtotime($data['travel_date']))."<br>
Option : ".$data['tour_title']." (".date('h:i a', strtotime($data['travel_time'])).")<br>
".$data['adult']." Adult, ".$data['child']." Child, ".$data['infant']." Infant</address>
  <br>
  
 <br>
<address>Traveler Details<br>
Name : ".$data['title']." ".$data['fname']." ".$data['lname']."<br>
Phone : ".$data['phone']."<br>
Email : ".$data['email']."<br>
Nationality : ".$data['nationality']."</address>
  <br> 
  <p>If your have any questions please don't hesitate to contact us</p>
  <p>We hope you enjoy your Tour with us</p>
  <p>Best Regards</p>
  <img src='".base_url()."assets/img/while_bg_logo-removebg-preview.png' height='50'>
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
	     
	    if(isset($_POST['tour_id'])){
	 $_POST['phone'] = $_POST['countryCode'].$_POST['phone'];
	 unset($_POST['countryCode']);
	
	if($_POST['payment_type'] !='pay_later'){
	    $_POST['status'] = 0;
	    if($_POST['payment_type'] =='full_pay'){
	    $_POST['amnt_paid'] = $_POST['total'];}else{
	        $_POST['amnt_paid'] = round($_POST['total']/2);
	    }
	    	$itemPrice = $_POST['amnt_paid'];
	}
	$address = $_POST['address'];
	$tr_name =  $_POST['fname']." ".$_POST['lname'];
	$this->crud->insert("booking", $_POST);
	$id = $this->db->insert_id();
	  
		if($_POST['payment_type']=='pay_later'){
		  //  $this->booking_mail($id);
            redirect('welcome/load/thanku');}else{
 	$settings= $this->crud->get_data("settings", "", "*", "full","", "", "order by id desc");
    $settings = $settings->result()[0];
    $currency = strtoupper($settings->currency_alpha);
    $tour_name = $_POST['tour_name'];
        $this->load->library('paypal_lib'); 
        
        // Set variables for paypal form 
        $returnURL = base_url().'welcome/success'; //payment success url 
        $cancelURL = base_url().'welcome/cancel'; //payment cancel url 
        $notifyURL = base_url().'welcome/ipn'; //ipn url 
        // Get current user ID from the session (optional) 
        $userID = !empty($_SESSION['userID'])?$_SESSION['userID']:1; 
         
        // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', $tour_name); 
        $this->paypal_lib->add_field('custom', $userID); 
        $this->paypal_lib->add_field('item_number',  $id); 
        $this->paypal_lib->add_field('amount',  $itemPrice); 
         
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 
	      
            }
	}else{
	     $error= 'Some Error Occurred!!';
              $this->session->set_flashdata('error_message',$error);
             redirect('welcome');
	}
	}
	
 function success(){ 
        $this->load->library('paypal_lib'); 
        // Get the transaction data 
        $paypalInfo = $this->input->get(); 
         
        $productData = $paymentData = array(); 
        if(!empty($paypalInfo['item_number']) && !empty($paypalInfo['tx']) && !empty($paypalInfo['amt']) && !empty($paypalInfo['cc']) && !empty($paypalInfo['st'])){ 
            $item_name = $paypalInfo['item_name']; 
            $item_number = $paypalInfo['item_number']; 
            $txn_id = $paypalInfo["tx"]; 
            $payment_amt = $paypalInfo["amt"]; 
            $currency_code = $paypalInfo["cc"]; 
            $status = $paypalInfo["st"]; 
             
            // Get product info from the database 
            $productData = $this->product->getRows($item_number); 
             
            // Check if transaction data exists with the same TXN ID 
            $paymentData = $this->payment->getPayment(array('txn_id' => $txn_id)); 
        } 
         
        // Pass the transaction data to view 
        $data['product'] = $productData; 
        $data['payment'] = $paymentData; 
        $this->load->view('paypal/success', $data); 
    } 
      
     function cancel(){ 
        // Load payment failed view 
        $this->load->view('paypal/cancel'); 
     } 
      
     function ipn(){ 
         $this->load->library('paypal_lib'); 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
         
        if(!empty($paypalInfo)){ 
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo); 
 
            // Check whether the transaction is valid 
            if($ipnCheck){ 
                // Check whether the transaction data is exists 
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"])); 
                if(!$prevPayment){ 
                    // Insert the transaction data in the database 
                    $data['user_id']    = $paypalInfo["custom"]; 
                    $data['product_id']    = $paypalInfo["item_number"]; 
                    $data['txn_id']    = $paypalInfo["txn_id"]; 
                    $data['payment_gross']    = $paypalInfo["mc_gross"]; 
                    $data['currency_code']    = $paypalInfo["mc_currency"]; 
                    $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status'] = $paypalInfo["payment_status"]; 
     
                    $this->payment->insertTransaction($data); 
                } 
            } 
        } 
    } 
	 public function stripePost()
    {
        	$booking_id = $this->session->userdata('booking_id');
        	$this->session->unset_userdata('booking_id');
        	$this->crud->update("booking", array('status'=>1),array('id'=>$booking_id));
        
		}
	public function user_login()
	{	
	   $this->load->view('login');
        }
    public function user_logout()
	{	
	  	$this->session->unset_userdata('user_data');
             redirect('welcome','refresh');
    }    
	public function login()
	{	
	    $phone = $_POST['countryCode'].$_POST['phone'];
	    $check = $this->crud->get('user',array('phone'=>$phone));
	     if($check->num_rows()>=1){
	     $pass = $check->result_array()[0];
        }else{
           $this->crud->insert("user", array('phone'=>$phone));
           $check = $this->crud->get('user',array('phone'=>$phone));
	     $pass = $check->result_array()[0];
       	}
       	$this->session->set_userdata('user_data',$pass);
             redirect('welcome/bookings','refresh');
        }
    public function bookings()
	{	
	    if($this->session->userdata('user_data')){
	        $phone = $this->session->userdata('user_data')['phone'];
	        $data['data'] = $this->crud->get('booking',array('phone'=>$phone));
	        	$this->load->view('bookings',$data);
	    }else{
	        $error= 'Please Login!!';
              $this->session->set_flashdata('error_message',$error);
             redirect('welcome/user_login');
	    }
        }
    public function contact()
	{	
	     $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha == $sessCaptcha){
                unset($_POST['captcha']);
	   $_POST['name'] = $this->input->post('name', TRUE);
	   $_POST['phone'] = $this->input->post('phone', TRUE);
	   $_POST['email'] = $this->input->post('email', TRUE);
	   $_POST['messg'] = $this->input->post('messg', TRUE);
     $this->crud->insert("contact", $_POST);
     $error= 'Successfully submited';
              $this->session->set_flashdata('success_message',$error);
             redirect('contact');
            }
else{
                echo 'Captcha code does not match, please try again.';
            }
	}   
	
			public function blogs($rowno = 0)
	{
	    
	    $this->load->library('pagination');
	     $rowperpage=10;
	    if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
       
        $allcount = $this->crud->get_data('all_news',' and status = 1','id','','','','','')->num_rows();  
	    $data['blogs']= $this->crud->get_data("all_news", "and status=1 ", "*", "full","", "ORDER BY id DESC","LIMIT $rowno ,$rowperpage");
       $data['banner_img']= $this->crud->get_data("all_news", " and status=1 ", "img", "full","", "ORDER BY  RAND()","LIMIT 5");
	   $config['base_url'] = base_url().'blogs';
       $config['use_page_numbers'] = TRUE;
       $config['total_rows'] = $allcount;
       $config['per_page'] = $rowperpage;
       $config['cur_tag_open'] = '&nbsp;<a class="current">';
       $config['cur_tag_close'] = '</a>';
         $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $this->pagination->initialize($config);
       $data['pagination'] = $this->pagination->create_links();
       $data['row'] = $rowno;
       
	    
		$this->load->view('blogs',$data);
	}
		public function blog($id , $title)
	{ 
	    	$data['users']= $this->crud->get_data('all_news',' and id="'.$id.'" ' ,'*','','','',' ',' '); 
	    		$data['blogs']= $this->crud->get_data('all_news',' and status="1" ','*','','','','ORDER BY id DESC','limit 6'); 
		$this->load->view('blog_detail',$data);
	}
		public function testimonials($rowno = 0)
	{
	    
	    $this->load->library('pagination');
	     $rowperpage=12;
	    if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
       
        $allcount = $this->crud->get_data('clients',' and status = 1','id','','','','','')->num_rows();  
	    $data['clients']= $this->crud->get_data("clients", "and status=1 ", "*", "full","", "ORDER BY id DESC","LIMIT $rowno ,$rowperpage");
       $data['banner_img']= $this->crud->get_data("clients", " and status=1 ", "img", "full","", "ORDER BY  RAND()","LIMIT 5");
	   $config['base_url'] = base_url().'client-testimonials';
       $config['use_page_numbers'] = TRUE;
       $config['total_rows'] = $allcount;
       $config['per_page'] = $rowperpage;
       $config['cur_tag_open'] = '&nbsp;<a class="current">';
       $config['cur_tag_close'] = '</a>';
         $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $this->pagination->initialize($config);
       $data['pagination'] = $this->pagination->create_links();
       $data['row'] = $rowno;
       
	    
		$this->load->view('testimonials',$data);
	}
}

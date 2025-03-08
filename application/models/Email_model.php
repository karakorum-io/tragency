<?php
class Email_model extends CI_Model
{
    public $from_email = "info@expeditionsaga.com";
    public $logo_url = 'assets/images/saGA1.png';
    function send_otp($email, $otp)
    {
        $from_email = $this->from_email;
        $logo_url = $this->logo_url;
        $to_email = $email;
        $this->load->library('email');
        $subject = "Login OTP - Expedition Saga";
        $message = "<html>
                        <head>
                            <title>Login OTP - Expedition Saga</title>
                        </head>
                        <body>
                            <div>
                                <p>
                                    Hi,<br><br>
                                    We are very happy to see you exploring our tours. <br>
                                    Your login Verification code is : 
                                    <b>$otp</b><br>
                                    <br/>
                                    Thank You!<br/>
                                    Best Regards
                                </p>
                                <img src='" . base_url() . "$logo_url' height='50'>
                                <address>
                                    <strong>Expedition Saga</strong><br>
                                    <a href='mailto:$from_email'>$from_email</a>
                                </address>
                                <hr>
                                <br/>
                                <b>Disclaimer- </b>This is an auto generated email, please do not reply to this email.<br>
                            </div>
                        </body>
                    </html>";
        $this->email->from($from_email, 'Expedition Saga');
        $this->email->to($email);
        $this->email->set_mailtype("html");
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
    
    function send_query($id)
    {
        $from_email = $this->from_email;
        $logo_url = $this->logo_url;
        $this->load->model('admin/query');
        $data = $this->query->getbyid($id);
        if($data){
        $to_email = $data->email;
        $phone = $data->phone;
        $name = $data->name;
        $is_planning = $data->is_planning;
        $stays = $data->stays;
        $arrival = $data->arrival;
        $book_flights  = $data->book_flights;
        $apply_visa = $data->apply_visa;
        $query = $data->query;
        $this->load->library('email');
        
        if($data->type == 1){
            $title  = 'New Contact Enquiry';
            $per_data = '';
        }else{
            $title  = 'New Personalized Itineraries Enquiry';
            $per_data = "<p><b>Planning your trip in 3-5 Months:</b>$is_planning</p>
                                <p><b>No of days in India (Approx.:</b>$stays</p>
                                <p><b>Expected Arrival Date:</b>$arrival</p>
                                <p><b>We book your international flights?:</b>$book_flights</p>
                                <p><b>Want us to apply for Indian Visa?:</b>$apply_visa</p>";
                                
        }
        $subject = "$title - Expedition Saga";
        $message = "<html>
                        <head>
                            <title>$title - Expedition Saga</title>
                        </head>
                        <body>
                            <div>
                                <p>
                                    Hi,<br><br>
                                   You have a $title from website(expeditionsaga.com) <br>
                                   Here are the filled informations :
                                </p>
                                <p><b>Name:</b>$name</p>
                                <p><b>Phone:</b>$phone</p>
                                <p><b>Email:</b>$to_email</p>
                                $per_data
                                <p><b>Query:</b>$query</p>
                                <img src='" . base_url() . "$logo_url' height='50'>
                               
                                <hr>
                                <br/>
                                <b>Disclaimer- </b>This is an auto generated email, please do not reply to this email.<br>
                            </div>
                        </body>
                    </html>";
        $this->email->from($from_email, 'Expedition Saga');
        $this->email->to($from_email);
        $this->email->set_mailtype("html");
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
        }
    }
    function send_b2b($id)
    {
        $from_email = $this->from_email;
        $logo_url = $this->logo_url;
        $this->load->model('admin/b2b');
        $data = $this->b2b->getbyid($id);
        if($data){
            $comany_name = $data->company_name;
        $phone = $data->phone;
        $name = $data->name;
        $email = $data->email;
        $website= $data->website;
        $size = $data->size;
        $proposal  = $data->proposal;
        $expectations = $data->expectations;
        $monthly_business = $data->monthly_business;
        $share = $data->share_percentage;
        
        $this->load->library('email');
        $subject = "B2B Partnership Request - Expedition Saga";
        $message = "<html>
                        <head>
                            <title>B2B Partnership Request - Expedition Saga</title>
                        </head>
                        <body>
                            <div>
                                <p>
                                    Hi,<br><br>
                                   You have a B2B Partnership Request from website(expeditionsaga.com) <br>
                                   Here are the filled informations :
                                </p>
                                
                                <p><b>Company Name : </b>$comany_name</p>
                                <p><b>Contact Person Name : </b>$name</p>
<p><b>Phone : </b>$phone</p>
<p><b>Email : </b>$email</p>
<p><b>Website : </b>$website</p>
<p><b>Company Size : </b>$size</p>
<p><b>Proposal : </b>$proposal</p>
<p><b>Expectations : </b>$expectations</p>
<p><b>Business per month in ($) : </b>$monthly_business</p>
<p><b>Partnership Percentage : </b>$share</p>
                                <img src='" . base_url() . "$logo_url' height='50'>
                               
                                <hr>
                                <br/>
                                <b>Disclaimer- </b>This is an auto generated email, please do not reply to this email.<br>
                            </div>
                        </body>
                    </html>";
        $this->email->from($from_email, 'Expedition Saga');
        $this->email->to($email);
        $this->email->set_mailtype("html");
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
        }
    }
    
}
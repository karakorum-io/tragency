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
        $query = $data->query;
        $this->load->library('email');
        $subject = "New Contact Enquiry - Expedition Saga";
        $message = "<html>
                        <head>
                            <title>New Contact Enquiry - Expedition Saga</title>
                        </head>
                        <body>
                            <div>
                                <p>
                                    Hi,<br><br>
                                   You have a new contact enquiry from website(expeditionsaga.com) <br>
                                   Here are the filled informations :
                                </p>
                                <p><b>Name:</b>$name</p>
                                <p><b>Phone:</b>$phone</p>
                                <p><b>Email:</b>$to_email</p>
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
    
}
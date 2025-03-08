<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/ExpeditionSaga.php');

class Users extends ExpeditionSaga
{

    public $controllerUrl;
    public $currency_data;
    public function __construct()
    {

        parent::__construct();
        $this->controllerUrl = base_url() . "web/";
        $this->load->model('admin/user');
        $this->load->model('admin/setting');
        $this->load->model('email_model');
        $this->currency_data = $this->setting->getAll();



    }
    public function google()
    {
        $this->load->library('google');
        if (isset($_GET['code'])) {
            //authenticate user
            $this->google->getAuthenticate();

            $gpInfo = $this->google->getUserInfo();
            $check = $this->user->getByEmail($gpInfo['email']);
            if (!$check) {
                $user_data = array('email' => $gpInfo['email'], 'name' => $gpInfo['name']);
                $this->user->create($user_data);
            }
            $check = $this->user->getByEmail($gpInfo['email']);

            $this->session->set_userdata('user_data', $check);
            redirect('web/bookings', 'refresh');

        }
        $data['loginURL'] = $this->google->loginURL();

        redirect($this->google->loginURL());
    }
    public function validate()
    {
        $email = $this->input->post('email');
        $check = $this->user->getByEmail($email);
        if (!$check) {
            $user_data = array('email' => $email);
            $this->user->create($user_data);
        }
        $otp = rand(99999, 999999);
        $this->session->set_userdata('login_data', array('email' => $email, 'otp' => $otp));
        if ($this->email_model->send_otp($email, $otp)) {
            $this->load->view('get_otp');
        } else {
            $error = 'Error while sending email';
            $this->session->set_flashdata('error_message', $error);
            redirect('web/user_login');
        }
    }
    public function resend_otp()
    {
        if ($this->session->userdata('login_data')) {

            if ($this->email_model->send_otp($this->session->userdata('login_data')['email'], $this->session->userdata('login_data')['otp'])) {
                $this->load->view('get_otp');
            } else {
                $error = 'Error while sending email';
                $this->session->set_flashdata('error_message', $error);
                redirect('web/user_login');
            }

        } else {
            $error = 'Session Expired';
            $this->session->set_flashdata('error_message', $error);
            redirect('web/user_login');
        }
    }
    public function code_verify()
    {
        if ($this->session->userdata('login_data')) {
            $login_data = $this->session->userdata('login_data');
            $code = $this->input->post('code');
            if ($login_data['otp'] == $code) {
                $check = $this->user->getByEmail($login_data['email']);

                $this->session->set_userdata('user_data', $check);
                redirect('web/bookings', 'refresh');
            } else {
                $this->load->view('get_otp');
            }

        } else {
            $error = 'Error while sending email';
            $this->session->set_flashdata('error_message', $error);
            redirect('web/user_login');
        }
    }
}
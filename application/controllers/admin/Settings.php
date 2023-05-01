<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Settings extends CI_Controller
{
    public $controllerUrl;
    public $isAdminLogin;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('session');

        $this->load->helper('general');

        $this->load->model('admin/setting');

        $this->controllerUrl = base_url() . "admin/settings";

        $this->isAdminLogin = $this->session->userdata('isAdminLogin');
    }

    public function index()
    {
        $settings = $this->setting->getAll();
        $this->load->view('admin/settings/edit', [
            'settings' => $settings
        ]);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {

            $update = [
                'conversion_rate' => trim($this->input->post('conversion_rate')),
                'currency_alpha' => trim($this->input->post('currency_alpha')),
                'currency_symbol' => trim($this->input->post('currency_symbol'))
            ];
            $this->setting->update($id, $update);

            $this->session->set_flashdata('success', 'Package updated!');
            redirect($this->controllerUrl);
        }
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Configurations extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/configurations/";

        $this->load->model('admin/configuration');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }

    public function index()
    {

        $configurations = $this->configuration->getAll();

        $this->load->view('admin/configurations/list', [
            'configurations' => $configurations
        ]);
    }
    public function add()
    {
        // when form is posted
        if (!empty($this->input->post())) {

            $id = $this->configuration->create([
                'key' => trim($this->input->post('key')),
                'value' => trim($this->input->post('value')),
                'status' => Configuration::STATUS_INACTIVE
            ]);

            if ($id) {
                $this->session->set_flashdata('success', 'Configuration added!');
                redirect($this->controllerUrl);
            }

            redirect($this->controllerUrl);
        }

        $this->load->view('admin/configurations/add', []);
    }

    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {
            $update = [
                'key' => trim($this->input->post('key')),
                'value' => trim($this->input->post('value')),
                'updated_at' => date('Y-m-d h:i:s')
            ];

            $this->configuration->update($id, $update);

            $this->session->set_flashdata('success', 'Configuration updated!');
        }

        redirect($this->agent->referrer());
    }
    public function activate_deactivate($id, $status)
    {
        $newStatus = Configuration::STATUS_ACTIVE;
        if ($status == Configuration::STATUS_ACTIVE) {
            $newStatus = Configuration::STATUS_INACTIVE;
        }

        if ($status == Configuration::STATUS_INACTIVE) {
            $newStatus = Configuration::STATUS_ACTIVE;
        }

        $this->configuration->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'Configuration status changed!');
        redirect($this->agent->referrer());
    }
    public function delete($id)
    {
        $this->configuration->delete($id);
        $this->session->set_flashdata('success', 'Configuration deleted!');
        redirect($this->agent->referrer());
    }
}
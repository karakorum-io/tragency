<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Email_templates extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/email_templates/";

        $this->load->model('admin/email_template');
        $this->load->model('admin/setting');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }
    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->email_template);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $email_templates = $this->email_template->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/email_templates/list', [
            'email_templates' => $email_templates
        ]);
    }
    public function add()
    {
        // when form is posted
        if (!empty($this->input->post())) {
            
            $id = $this->email_template->create([
                'name' => trim($this->input->post('name')),
                'subject' => trim($this->input->post('subject')),
                'body' => trim($this->input->post('body')),
                'status' => Email_template::STATUS_INACTIVE
            ]);

            if ($id) {
                $this->session->set_flashdata('success', 'Email Template added!');
                redirect($this->controllerUrl);
            }

            redirect($this->controllerUrl);
        }

        $this->load->view('admin/email_templates/add', []);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {
            $update = [
                'name' => trim($this->input->post('name')),
                'subject' => trim($this->input->post('subject')),
                'body' => trim($this->input->post('body')),
                'updated_at' => date('Y-m-d h:i:s')
            ];

            $this->email_template->update($id, $update);

            $this->session->set_flashdata('success', 'Email Template updated!');
            redirect($this->agent->referrer());
        }

        $email_template = $this->email_template->getById($id);
        $this->load->view('admin/email_templates/edit', [
            'email_template' => $email_template
        ]);
    }
    public function activate_deactivate($id, $status)
    {
        $newStatus = Email_template::STATUS_ACTIVE;
        if ($status == Email_template::STATUS_ACTIVE) {
            $newStatus = Email_template::STATUS_INACTIVE;
        }

        if ($status == Email_template::STATUS_INACTIVE) {
            $newStatus = Email_template::STATUS_ACTIVE;
        }

        $this->email_template->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'Email Template status changed!');
        redirect($this->agent->referrer());
    }
    public function delete($id)
    {
        $this->email_template->delete($id);
        $this->session->set_flashdata('success', 'Email Template deleted!');
        redirect($this->agent->referrer());
    }
}
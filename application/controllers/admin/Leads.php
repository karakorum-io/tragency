<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Leads extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/leads/";

        $this->load->model('admin/lead');
        $this->load->model('admin/setting');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }
    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->lead);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $leads = $this->lead->getAll(
            $this->input->get('search_by'), 
            $this->input->get('search'),
            $this->input->get('filter'), 
            PAGINATION_PERPAGE,
            $offset
        );

        $this->load->view('admin/leads/list', [
            'leads' => $leads,
            'all_leads' => $this->lead->getAllCount(
                $this->input->get('search_by'), 
                $this->input->get('search'),
                $this->input->get('filter')
            )->records
        ]);
    }
    public function add()
    {
        // when form is posted
        if (!empty($this->input->post())) {
            
            $id = $this->lead->create([
                'source_id' => trim($this->input->post('source_id')),
                'name' => trim($this->input->post('name')),
                'email' => trim($this->input->post('email')),
                'phone' => trim($this->input->post('phone')),
                'city' => trim($this->input->post('city')),
                'state' => trim($this->input->post('state')),
                'country' => trim($this->input->post('country')),
                'conversation' => trim($this->input->post('conversation')),
                'status' => Lead::STATUS_INACTIVE
            ]);

            if ($id) {
                $this->session->set_flashdata('success', 'Lead added!');
                redirect($this->controllerUrl);
            }

            redirect($this->controllerUrl);
        }

        $this->load->view('admin/leads/add', [
            'sources' => getLeadSources($this->db),
            'countires' => getCountries($this->db),
        ]);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {
            $update = [
                'source_id' => trim($this->input->post('source_id')),
                'name' => trim($this->input->post('name')),
                'email' => trim($this->input->post('email')),
                'phone' => trim($this->input->post('phone')),
                'city' => trim($this->input->post('city')),
                'state' => trim($this->input->post('state')),
                'country' => trim($this->input->post('country')),
                'conversation' => trim($this->input->post('conversation')),
                'updated_at' => date('Y-m-d h:i:s')
            ];

            $this->lead->update($id, $update);

            $this->session->set_flashdata('success', 'Lead updated!');
            redirect($this->agent->referrer());
        }

        $lead = $this->lead->getById($id);
        $this->load->view('admin/leads/edit', [
            'lead' => $lead,
            'sources' => getLeadSources($this->db),
            'countires' => getCountries($this->db),
        ]);
    }
    public function activate_deactivate($id, $status)
    {
        $newStatus = Lead::STATUS_ACTIVE;
        if ($status == Lead::STATUS_ACTIVE) {
            $newStatus = Lead::STATUS_INACTIVE;
        }

        if ($status == Lead::STATUS_INACTIVE) {
            $newStatus = Lead::STATUS_ACTIVE;
        }

        $this->lead->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'Lead status changed!');
        redirect($this->agent->referrer());
    }
    public function delete($id)
    {
        $this->lead->delete($id);
        $this->session->set_flashdata('success', 'Lead deleted!');
        redirect($this->agent->referrer());
    }
}
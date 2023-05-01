<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Queries extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/queries/";

        $this->load->model('admin/query');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }
    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->query);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $queries = $this->query->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/queries/list', [
            'queries' => $queries
        ]);
    }

    public function delete($id)
    {
        $this->query->delete($id);
        $this->session->set_flashdata('success', 'Query deleted!');
        redirect($this->agent->referrer());
    }

    public function activate_deactivate($id, $status)
    {
        $newStatus = Query::STATUS_ACTIVE;
        if ($status == Query::STATUS_ACTIVE) {
            $newStatus = Query::STATUS_INACTIVE;
        }

        if ($status == Query::STATUS_INACTIVE) {
            $newStatus = Query::STATUS_ACTIVE;
        }

        $this->query->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'Destination status changed!');
        redirect($this->agent->referrer());
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__.'/../ExpeditionSaga.php');
class Customers extends ExpeditionSaga
{
    public $controllerUrl;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->helper('general');
        $this->load->model('admin/customer');
        $this->load->library('session');
        $this->controllerUrl = base_url() . "admin/customers/";

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }

    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->customer);

        // Define offset 
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $customers = $this->customer->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/customers/list', [
            'users' => $customers
        ]);
    }
}
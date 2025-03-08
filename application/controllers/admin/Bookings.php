<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__.'/../ExpeditionSaga.php');

class Bookings extends ExpeditionSaga
{

    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/bookings/";

        $this->load->model('admin/booking');
        $this->load->model('admin/setting');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }

    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->booking);

        // Define offset 
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $settings = $this->setting->getAll();
        $bookings = $this->booking->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/bookings/list', [
            'bookings' => $bookings,
            'settings' => $settings
        ]);
    }
}
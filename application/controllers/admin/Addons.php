<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Addons extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/addons/";

        $this->load->model('admin/addon');
        $this->load->model('admin/setting');
        $this->load->model('admin/package');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }
    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->addon);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $addons = $this->addon->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/addons/list', [
            'addons' => $addons
        ]);
    }
    public function add()
    {
        // when form is posted
        if (!empty($this->input->post())) {
             
            if(!empty($this->input->post('tour'))){
                $tour = implode (",", $this->input->post('tour'));
            }else{
                $tour = '';
            }
            
            $id = $this->addon->create([
                'name' => trim($this->input->post('name')),
                'description' => trim($this->input->post('description')),
                'price' => trim($this->input->post('price')),
                'status' => Addon::STATUS_INACTIVE,
                'tour' => $tour
            ]);

            if ($id) {
                $this->session->set_flashdata('success', 'Addon added!');
                redirect($this->controllerUrl);
            }

            redirect($this->controllerUrl);
        }
        $data['tour'] = $this->package->getAllActive();

        $this->load->view('admin/addons/add', $data);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {
            
            if(!empty($this->input->post('tour'))){
                $tour = implode (",", $this->input->post('tour'));
            }else{
                $tour = '';
            }
            
            
            $update = [
                'name' => trim($this->input->post('name')),
                'description' => trim($this->input->post('description')),
                'price' => trim($this->input->post('price')),
                'updated_at' => date('Y-m-d h:i:s'),
                'tour' => $tour
            ];

            $this->addon->update($id, $update);

            $this->session->set_flashdata('success', 'Addon updated!');
            redirect($this->agent->referrer());
        }
        $tour = $this->package->getAllActive();   
        $addon = $this->addon->getById($id);
        $this->load->view('admin/addons/edit', [
            'addon' => $addon,'tour'=>$tour
        ]);
    }
    public function activate_deactivate($id, $status)
    {
        $newStatus = Addon::STATUS_ACTIVE;
        if ($status == Addon::STATUS_ACTIVE) {
            $newStatus = Addon::STATUS_INACTIVE;
        }

        if ($status == Addon::STATUS_INACTIVE) {
            $newStatus = Addon::STATUS_ACTIVE;
        }

        $this->addon->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'Addon status changed!');
        redirect($this->agent->referrer());
    }
    public function delete($id)
    {
        $this->addon->delete($id);
        $this->session->set_flashdata('success', 'Addon deleted!');
        redirect($this->agent->referrer());
    }
}
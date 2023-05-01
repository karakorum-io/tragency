<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Tour_options extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/tour_options/";

        $this->load->model('admin/package');
        $this->load->model('admin/tour_option');
        $this->load->model('admin/tour_price');
        $this->load->model('admin/setting');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }
    public function index($tour_id)
    {
        $tour_options = $this->tour_option->getAll($tour_id);
        $package = $this->package->getById($tour_id);

        $this->load->view('admin/tour_options/list', [
            'tour_options' => $tour_options,
             'package' => $package
        ]);
    }
    public function add($tour_id)
    {
        // when form is posted
        if (!empty($this->input->post())) {
        $time = implode(",", $this->input->post('time'));
        $id = $this->tour_option->create([
                    'title' => trim($this->input->post('title')),
                    'descr' => trim($this->input->post('descr')),
                    'time' => $time,
                    'tourid' => $tour_id,
                    'status' => tour_option::STATUS_INACTIVE
                ]);

        if($id){
            $aprice = $this->input->post('aprice');
        foreach ($aprice as $key => $value) {
            $this->tour_price->create([
                    'tourid' => $tour_id,
                    'option_id' => $id,
                    'type' => 'adult',
                    'min' => trim($this->input->post('amin')[$key]),
                    'max' => trim($this->input->post('amax')[$key]),
                    'price' => $value
                ]);
        }
        $cprice = $this->input->post('cprice');
        foreach ($cprice as $key => $value) {
            $this->tour_price->create([
                    'tourid' => $tour_id,
                    'option_id' => $id,
                    'type' => 'child',
                    'min' => trim($this->input->post('cmin')[$key]),
                    'max' => trim($this->input->post('cmax')[$key]),
                    'price' => $value
                ]);
        }
        
      

                if ($id) {
                    $this->session->set_flashdata('success', 'Tour Price added!');
                    redirect($this->controllerUrl.'index/'.$tour_id);
                }
            }

            redirect($this->controllerUrl.'index/'.$tour_id);
        }
        $package = $this->package->getById($tour_id);
        $this->load->view('admin/tour_options/add', [
            'package' => $package
        ]);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {
            $time = implode(",", $this->input->post('time'));
           $this->tour_option->update($id,[
                    'title' => trim($this->input->post('title')),
                    'descr' => trim($this->input->post('descr')),
                    'time' => $time,
                ]);
         $this->tour_price->deletebyOid($id);  
         $tour_id = $this->input->post('tour_id');
           $aprice = $this->input->post('aprice');
        foreach($aprice as $key => $value) {
            $this->tour_price->create([
                    'tourid' => $tour_id,
                    'option_id' => $id,
                    'type' => 'adult',
                    'min' => trim($this->input->post('amin')[$key]),
                    'max' => trim($this->input->post('amax')[$key]),
                    'price' => $value
                ]);
        }
        $cprice = $this->input->post('cprice');
        foreach ($cprice as $key => $value) {
            $this->tour_price->create([
                    'tourid' => $tour_id,
                    'option_id' => $id,
                    'type' => 'child',
                    'min' => trim($this->input->post('cmin')[$key]),
                    'max' => trim($this->input->post('cmax')[$key]),
                    'price' => $value
                ]);
        }
        if ($id) {
                    $this->session->set_flashdata('success', 'Tour Price Updated!');
                    redirect($this->controllerUrl.'index/'.$tour_id);
                }
        }

        $tour_option = $this->tour_option->getById($id);
        $adult_price = $this->tour_price->getAdultbyOid($id);
        $child_price = $this->tour_price->getChildbyOid($id);
        $this->load->view('admin/tour_options/edit', [
            'tour_option' => $tour_option,
            'adult_price' => $adult_price,
            'child_price'=>$child_price
        ]);
    }
    public function activate_deactivate($id, $status)
    {
        $newStatus = Package::STATUS_ACTIVE;
        if ($status == Package::STATUS_ACTIVE) {
            $newStatus = Package::STATUS_INACTIVE;
        }

        if ($status == Package::STATUS_INACTIVE) {
            $newStatus = Package::STATUS_ACTIVE;
        }

        $this->tour_option->activate_package($id, $newStatus);
        $this->session->set_flashdata('success', 'Tour Option status changed!');
        redirect($this->agent->referrer());
    }
    public function delete($id)
    {
        
        $this->tour_option->delete($id);
        $this->session->set_flashdata('success', 'Tour Option deleted!');
        redirect($this->agent->referrer());
    }
}
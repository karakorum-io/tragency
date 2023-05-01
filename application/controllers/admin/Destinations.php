<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Destinations extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/destinations/";

        $this->load->model('admin/destination');
        $this->load->model('admin/setting');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/users/login");
        }
    }
    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->destination);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $destinations = $this->destination->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/destinations/list', [
            'destinations' => $destinations
        ]);
    }
    public function add()
    {
        // when form is posted
        if (!empty($this->input->post())) {

            $file = $this->upload("destinations", "image");
            if ($file) {
                $id = $this->destination->create([
                    'name' => trim($this->input->post('name')),
                    'description' => trim($this->input->post('overview')),
                    'weather' => trim($this->input->post('weather')),
                    'image' => $file,
                    'slug' => url_title($this->input->post('name'), 'dash', true),
                    'latitude' => trim($this->input->post('latitude')),
                    'longitude' => trim($this->input->post('longitude')),
                    'status' => Destination::STATUS_INACTIVE
                ]);

                if ($id) {
                    $this->session->set_flashdata('success', 'Destination added!');
                    redirect($this->controllerUrl);
                }
            }

            redirect($this->controllerUrl);
        }

        $this->load->view('admin/destinations/add', []);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {
            $update = [
                'name' => trim($this->input->post('name')),
                'description' => trim($this->input->post('overview')),
                'weather' => trim($this->input->post('weather')),
                'slug' => url_title($this->input->post('name'), 'dash', true),
                'latitude' => trim($this->input->post('latitude')),
                'longitude' => trim($this->input->post('longitude')),
            ];

            if (!empty($_FILES['image']['name'])) {
                $destination = $this->destination->getById($id);
                $this->deleteFile(UPLOAD_PATH . "destinations/" . $destination->image);
                $file = $this->upload("destinations", "image");
                if ($file) {
                    $update['image'] = $file;
                }
            }

            $this->destination->update($id, $update);

            $this->session->set_flashdata('success', 'Destination updated!');
            redirect($this->agent->referrer());
        }

        $destination = $this->destination->getById($id);
        $this->load->view('admin/destinations/edit', [
            'destination' => $destination
        ]);
    }
    public function activate_deactivate($id, $status)
    {
        $newStatus = Destination::STATUS_ACTIVE;
        if ($status == Destination::STATUS_ACTIVE) {
            $newStatus = Destination::STATUS_INACTIVE;
        }

        if ($status == Destination::STATUS_INACTIVE) {
            $newStatus = Destination::STATUS_ACTIVE;
        }

        $this->destination->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'Destination status changed!');
        redirect($this->agent->referrer());
    }
    public function delete($id)
    {
        $destination = $this->destination->getById($id);
        $this->deleteFile(UPLOAD_PATH . "destinations/" . $destination->image);
        $this->destination->delete($id);
        $this->session->set_flashdata('success', 'Destination deleted!');
        redirect($this->agent->referrer());
    }
}
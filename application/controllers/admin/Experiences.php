<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Experiences extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/experiences/";

        $this->load->model('admin/experience');
        $this->load->model('admin/setting');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }
    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->experience);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $experiences = $this->experience->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/experiences/list', [
            'experiences' => $experiences
        ]);
    }
    public function add()
    {
        // when form is posted
        if (!empty($this->input->post())) {
            
            $insert = [
                'display_name' => trim($this->input->post('display_name')),
                'description' => trim($this->input->post('overview')),
                'title' => trim($this->input->post('title')),
                'video_link' => trim($this->input->post('video_link')),
                'status' => Experience::STATUS_INACTIVE
            ];
            
            $file = $this->upload("experiences", "media");
            if ($file) {
                $insert['media'] = $file;
            }

            $id = $this->experience->create($insert);

            if ($id) {
                $this->session->set_flashdata('success', 'Experience added!');
                redirect($this->controllerUrl);
            }
            redirect($this->controllerUrl);
        }

        $this->load->view('admin/experiences/add', []);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {
            $update = [
                'display_name' => trim($this->input->post('display_name')),
                'description' => trim($this->input->post('overview')),
                'title' => trim($this->input->post('title')),
                'video_link' => trim($this->input->post('video_link'))
            ];

            if (!empty($_FILES['media']['name'])) {
                $experience = $this->experience->getById($id);
                $this->deleteFile(UPLOAD_PATH . "experiences/" . $experience->media);
                $file = $this->upload("experiences", "media");
                if ($file) {
                    $update['media'] = $file;
                }
            }

            $this->experience->update($id, $update);

            $this->session->set_flashdata('success', 'Experience updated!');
            redirect($this->agent->referrer());
        }

        $experience = $this->experience->getById($id);
        $this->load->view('admin/experiences/edit', [
            'experience' => $experience
        ]);
    }
    public function activate_deactivate($id, $status)
    {
        $newStatus = Experience::STATUS_ACTIVE;
        if ($status == Experience::STATUS_ACTIVE) {
            $newStatus = Experience::STATUS_INACTIVE;
        }

        if ($status == Experience::STATUS_INACTIVE) {
            $newStatus = Experience::STATUS_ACTIVE;
        }

        $this->experience->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'Experience status changed!');
        redirect($this->agent->referrer());
    }
    public function delete($id)
    {
        $experience = $this->experience->getById($id);
        $this->deleteFile(UPLOAD_PATH . "experiences/" . $experience->media);
        $this->experience->delete($id);
        $this->session->set_flashdata('success', 'Experience deleted!');
        redirect($this->agent->referrer());
    }
}
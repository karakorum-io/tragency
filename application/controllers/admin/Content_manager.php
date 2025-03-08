<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Content_manager extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/content_manager/";

        $this->load->model('admin/content');
        $this->load->model('admin/destination');
        $this->load->model('admin/setting');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }
    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->content);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $contents = $this->content->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/cms/list', [
            'contents' => $contents
        ]);
    }
    public function add()
    {
        // when form is posted
        if (!empty($this->input->post())) {
            $medias = array();
            $count = count($_FILES['media']['name']);
            for ($key = 0; $key < $count; $key++) {
                $_FILES['file']['name'] = $_FILES['media']['name'][$key];
                $_FILES['file']['type'] = $_FILES['media']['type'][$key];
                $_FILES['file']['tmp_name'] = $_FILES['media']['tmp_name'][$key];
                $_FILES['file']['error'] = $_FILES['media']['error'][$key];
                $_FILES['file']['size'] = $_FILES['media']['size'][$key];
                $files = $this->upload("cms", "file");
                if ($files) {
                    $medias[$key] = $files;
                }
            }
            
            $id = $this->content->create([
                'needle' => url_title($this->input->post('needle'), 'dash', true),
                'title' => trim($this->input->post('title')),
                'sub_title' => trim($this->input->post('sub_title')),
                'short_description' => trim($this->input->post('short_desc')),
                'description' => trim($this->input->post('description')),
                'status' => Content::STATUS_INACTIVE
            ]);

            foreach ($medias as $media) {
                $this->content->createMedia([
                    'cms_id' => $id,
                    'media' => $media
                ]);
            }

            if ($id) {
                $this->session->set_flashdata('success', 'Content added!');
                redirect($this->controllerUrl);
            }

            redirect($this->controllerUrl);
        }
        $destination = $this->destination->getAll_active();
        $this->load->view('admin/cms/add', [
            'destination' => $destination
        ]);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {

            $medias = array();
            $count = count($_FILES['media']['name']);

            $update = [
                'needle' => url_title($this->input->post('needle'), 'dash', true),
                'title' => trim($this->input->post('title')),
                'sub_title' => trim($this->input->post('sub_title')),
                'short_description' => trim($this->input->post('short_desc')),
                'description' => trim($this->input->post('description')),
                'updated_at' => date('Y-m-d h:i:s')
            ];

            if($count > 0){
                for ($key = 0; $key < $count; $key++) {
                    $_FILES['file']['name'] = $_FILES['media']['name'][$key];
                    $_FILES['file']['type'] = $_FILES['media']['type'][$key];
                    $_FILES['file']['tmp_name'] = $_FILES['media']['tmp_name'][$key];
                    $_FILES['file']['error'] = $_FILES['media']['error'][$key];
                    $_FILES['file']['size'] = $_FILES['media']['size'][$key];
                    $files = $this->upload("cms", "file");
                    if ($files) {
                        $medias[$key] = $files;
                    }
                }

                foreach ($medias as $media) {
                    $this->content->createMedia([
                        'cms_id' => $id,
                        'media' => $media
                    ]);
                }
            }

            $this->content->update($id, $update);
            
            $this->session->set_flashdata('success', 'Content updated!');
            redirect($this->controllerUrl);
        }

        $destination = $this->destination->getAll_active();
        $content = $this->content->getById($id);
        $this->load->view('admin/cms/edit', [
            'destination' => $destination,
            'content' => $content
        ]);
    }
    public function activate_deactivate($id, $status)
    {
        $newStatus = Content::STATUS_ACTIVE;
        if ($status == Content::STATUS_ACTIVE) {
            $newStatus = Content::STATUS_INACTIVE;
        }

        if ($status == Content::STATUS_INACTIVE) {
            $newStatus = Content::STATUS_ACTIVE;
        }

        $this->content->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'Content status changed!');
        redirect($this->agent->referrer());
    }

    public function delete_media($mediaId)
    {
        $media = getCMSMediaById($this->db, $mediaId);
        $this->deleteFile(UPLOAD_PATH . "cms/" . $media->media);
        
        $this->content->deleteMedia($mediaId);

        $this->session->set_flashdata('success', 'Media deleted!');
        redirect($this->agent->referrer());
    }

    public function delete($id)
    {
        $medias = getCMSMedia($this->db, $id);

        foreach ($medias as $media) {
            $this->deleteFile(UPLOAD_PATH . "cms/" . $media->media);
        }

        deleteCMSMedia($this->db, $id);
        $this->content->delete($id);
        $this->session->set_flashdata('success', 'Content deleted!');
        redirect($this->agent->referrer());
    }
}
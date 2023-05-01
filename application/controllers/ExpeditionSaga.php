<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ExpeditionSaga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('session');
        $this->load->library('pagination');

        $this->load->helper('general');
    }

    public function initializePagination($uris, $model)
    {
        // Pagination configuration 
        $config['base_url'] = $uris;
        $config['uri_segment'] = PAGINATION_URI_SEGMENT;
        $config['total_rows'] = $model->getAllCount()->records;
        $config['per_page'] = PAGINATION_PERPAGE;

        // Initialize pagination library 
        $this->pagination->initialize($config);
    }
    public function initializeUserPagination($uris, $total_rows)
    {
        // Pagination configuration 
        $config['base_url'] = $uris;
        $config['uri_segment'] = PAGINATION_URI_SEGMENT_USER;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = PAGINATION_PERPAGE;

        // Initialize pagination library 
        $this->pagination->initialize($config);
    }

    public function upload($folder="", $fileName)
    {
        $this->load->helper(array('file', 'directory'));
        $config['upload_path'] = UPLOAD_PATH.$folder;
        $config['allowed_types'] = UPLOAD_TYPES;
        $config['max_size'] = UPLOAD_SIZE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($fileName)) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error_message', $error);
            return "";
        } else {
            $file = $this->upload->data();
            return $file['file_name'];
        }
    }

    public function deleteFile($filePath)
    {
        if(unlink($filePath)){
            return true;
        } else {
            return false;
        }
    }
}
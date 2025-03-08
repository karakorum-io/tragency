<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');
require(__DIR__ . '/../../vendors/meta/Meta.php');

class Blogs extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/blogs/";

        $this->load->model('admin/blog');
        $this->load->model('admin/setting');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }
    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->blog);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $blogs = $this->blog->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/blogs/list', [
            'blogs' => $blogs
        ]);
    }
    public function add()
    {
        // when form is posted
        if (!empty($this->input->post())) {
            $file = $this->upload("blogs", "media");
            if ($file) {
                $id = $this->blog->create([
                    'user_id' => $this->session->userdata('userInfo')->id,
                    'title' => trim($this->input->post('title')),
                    'short_description' => trim($this->input->post('short_description')),
                    'description' => trim($this->input->post('overview')),
                    'slug' => url_title($this->input->post('slug'), 'dash', true),
                    'media' => $file,
                    'status' => Blog::STATUS_INACTIVE
                ]);

                if ($id) {
                    // $meta = new Meta(
                    //     getConfig($this->db, 'FB_GRAPH_API_URL'),
                    //     getConfig($this->db, 'FB_PAGE_MYSTICAL_TAG_ID'),
                    //     getConfig($this->db, 'FB_PAGE_ACCESS_TOKEN')
                    // );

                    // $meta->publish(
                    //     trim($this->input->post('short_description')),
                    //     base_url()."uploads/blogs/".$file
                    // );

                    $this->session->set_flashdata('success', 'Post added!');
                    redirect($this->controllerUrl);
                }
            }

            redirect($this->controllerUrl);
        }

        $this->load->view('admin/blogs/add', []);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {
            $update = [
                'title' => trim($this->input->post('title')),
                'short_description' => trim($this->input->post('short_description')),
                'description' => trim($this->input->post('overview')),
                'slug' => url_title($this->input->post('slug'), 'dash', true),
                'updated_at' => date('Y-m-d h:i:s')
            ];

            if (!empty($_FILES['media']['name'])) {
                $blog = $this->blog->getById($id);
                $this->deleteFile(UPLOAD_PATH . "blogs/" . $blog->media);
                $file = $this->upload("blogs", "media");
                if ($file) {
                    $update['media'] = $file;
                }
            }

            $this->blog->update($id, $update);

            $this->session->set_flashdata('success', 'Post updated!');
            redirect($this->agent->referrer());
        }

        $blog = $this->blog->getById($id);
        $this->load->view('admin/blogs/edit', [
            'blog' => $blog
        ]);
    }
    public function activate_deactivate($id, $status)
    {
        $newStatus = Blog::STATUS_ACTIVE;
        if ($status == Blog::STATUS_ACTIVE) {
            $newStatus = Blog::STATUS_INACTIVE;
        }

        if ($status == Blog::STATUS_INACTIVE) {
            $newStatus = Blog::STATUS_ACTIVE;
        }

        $this->blog->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'Post status changed!');
        redirect($this->agent->referrer());
    }
    public function delete($id)
    {
        $blog = $this->blog->getById($id);
        $this->deleteFile(UPLOAD_PATH . "blogs/" . $blog->media);
        $this->blog->delete($id);
        $this->session->set_flashdata('success', 'Post deleted!');
        redirect($this->agent->referrer());
    }
}
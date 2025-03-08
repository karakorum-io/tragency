<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__ . '/../ExpeditionSaga.php');

class Packages extends ExpeditionSaga
{
    public $controllerUrl;
    public function __construct()
    {
        parent::__construct();

        $this->controllerUrl = base_url() . "admin/packages/";

        $this->load->model('admin/package');
        $this->load->model('admin/destination');
        $this->load->model('admin/setting');

        if (!$this->session->userdata('isAdminLogin')) {
            redirect(base_url() . "admin/user/login");
        }
    }
    public function index()
    {
        $this->initializePagination($this->controllerUrl . "index", $this->package);
        $page = $this->uri->segment(PAGINATION_URI_SEGMENT);
        $offset = !$page ? 0 : $page;

        $packages = $this->package->getAll(PAGINATION_PERPAGE, $offset);

        $this->load->view('admin/packages/list', [
            'packages' => $packages
        ]);
    }
    public function add()
    {
        // when form is posted
        if (!empty($this->input->post())) {
            $file = $this->upload("packages", "image");
            if ($file) {

                $image_path = array();
                $count = count($_FILES['gallery']['name']);
                for ($key = 0; $key < $count; $key++) {
                    $_FILES['file']['name'] = $_FILES['gallery']['name'][$key];
                    $_FILES['file']['type'] = $_FILES['gallery']['type'][$key];
                    $_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$key];
                    $_FILES['file']['error'] = $_FILES['gallery']['error'][$key];
                    $_FILES['file']['size'] = $_FILES['gallery']['size'][$key];
                    $files = $this->upload("packages", "file");
                    if ($files) {
                        $image_path[$key] = $files;
                    }
                }
                $gallery = implode(",", $image_path);
                $tour_plan = array();
                $plan_title = $this->input->post('plan_title');
                foreach ($plan_title as $x => $val) {
                    $tour_plan[$x]['title'] = $val;
                    $tour_plan[$x]['descr'] = $this->input->post('plan_desc')[$x];
                }
                $tour_plan_data = json_encode($tour_plan);
                $weaklydays = '';
                if (isset($_POST['weaklydays']) && !empty($_POST['weaklydays']))
                    $weaklydays = implode(",", $this->input->post('weaklydays'));

                $id = $this->package->create([
                    'name' => trim($this->input->post('name')),
                    'short_desc' => trim($this->input->post('short_desc')),
                    'destination' => implode(",", $this->input->post('destination')),
                    'image' => $file,
                    'slug' => url_title($this->input->post('name'), 'dash', true),
                    'price' => trim($this->input->post('price')),
                    'tour_price' => trim($this->input->post('tour_price')),
                    'sale' => trim($this->input->post('sale')),
                    'gallery' => $gallery,
                    'overview' => trim($this->input->post('overview')),
                    'includes' => trim($this->input->post('includes')),
                    'additional' => trim($this->input->post('additional')),
                    'start_date' => trim($this->input->post('start_date')),
                    'end_date' => trim($this->input->post('end_date')),
                    'weekly_off' => trim($this->input->post('weekly_off')),
                    'weaklydays' => $weaklydays,
                    'excludes' => trim($this->input->post('excludes')),
                    'duration' => trim($this->input->post('duration')),
                    'tour_plan' => $tour_plan_data,
                    'depart' => trim($this->input->post('depart')),
                    'return' => trim($this->input->post('return')),
                    'viator' => trim($this->input->post('viator')),
                    'tadvsr' => trim($this->input->post('tadvsr')),
                    'status' => Package::STATUS_INACTIVE
                ]);

                if ($id) {
                    $this->session->set_flashdata('success', 'Package added!');
                    redirect($this->controllerUrl);
                }
            }

            redirect($this->controllerUrl);
        }
        $destination = $this->destination->getAll_active();
        $this->load->view('admin/packages/add', [
            'destination' => $destination
        ]);
    }
    public function edit($id)
    {
        if (!empty($this->input->post()) && $id != NULL) {
            
            $tour_plan = array();
            $plan_title = $this->input->post('plan_title');

            foreach ($plan_title as $x => $val) {
                $tour_plan[$x]['title'] = $val;
                $tour_plan[$x]['descr'] = $this->input->post('plan_desc')[$x];
            }

            $tour_plan_data = json_encode($tour_plan);
            $weaklydays = '';

            if (isset($_POST['weaklydays']) && !empty($_POST['weaklydays'])){
                $weaklydays = implode(",", $this->input->post('weaklydays'));
            }

            $update = [
                'name' => trim($this->input->post('name')),
                'short_desc' => trim($this->input->post('short_desc')),
                'destination' => implode(",", $this->input->post('destination')),
                'slug' => trim($this->input->post('slug')),
                'price' => trim($this->input->post('price')),
                'tour_price' => trim($this->input->post('tour_price')),
                'sale' => trim($this->input->post('sale')),
                'overview' => trim($this->input->post('overview')),
                'includes' => trim($this->input->post('includes')),
                'additional' => trim($this->input->post('additional')),
                'start_date' => trim($this->input->post('start_date')),
                'end_date' => trim($this->input->post('end_date')),
                'weekly_off' => trim($this->input->post('weekly_off')),
                'weaklydays' => $weaklydays,
                'excludes' => trim($this->input->post('excludes')),
                'duration' => trim($this->input->post('duration')),
                'tour_plan' => $tour_plan_data,
                'depart' => trim($this->input->post('depart')),
                'return' => trim($this->input->post('return')),
                'viator' => trim($this->input->post('viator')),
                'tadvsr' => trim($this->input->post('tadvsr')),
                'status' => Package::STATUS_INACTIVE
            ];


            if (!empty($_FILES['image']['name'])) {
                
                $package = $this->package->getById($id);
                $this->deleteFile(UPLOAD_PATH . "packages/" . $package->image);
                $file = $this->upload("packages", "image");

                if ($file) {
                    $update['image'] = $file;
                }
            }

            $image_path = array();
            
            if (!empty($_FILES['gallery']['name'][0])) {

                $count = count($_FILES['gallery']['name']);

                for ($key = 0; $key < $count; $key++) {
                    
                    $_FILES['file']['name'] = $_FILES['gallery']['name'][$key];
                    $_FILES['file']['type'] = $_FILES['gallery']['type'][$key];
                    $_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$key];
                    $_FILES['file']['error'] = $_FILES['gallery']['error'][$key];
                    $_FILES['file']['size'] = $_FILES['gallery']['size'][$key];
                    $files = $this->upload("packages", "file");

                    if ($files) {
                        $image_path[$key] = $files;
                    }
                }
            }

            if (isset($_POST['oldgallery'])) {

                $oldgallery = $_POST['oldgallery'];
                $package = $this->package->getById($id);
                $gallery = explode(',', $package->gallery);
                
                if (!empty($gallery)) {
                    foreach ($gallery as $row) {
                        if (!in_array($row, $oldgallery)) {
                            $this->deleteFile(UPLOAD_PATH . "packages/" . $row);
                        }
                    }
                }

                $image_path = array_merge($image_path, $oldgallery);
            }

            $galler_image = implode(",", $image_path);
            $update['gallery'] = $galler_image;
            $this->package->update($id, $update);

            $this->session->set_flashdata('success', 'Package updated!');
            redirect($this->agent->referrer());
        }

        $destination = $this->destination->getAll_active();
        $package = $this->package->getById($id);

        $this->load->view('admin/packages/edit', [
            'destination' => $destination,
            'package' => $package
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

        $this->package->activate_package($id, $newStatus);
        $this->session->set_flashdata('success', 'Package status changed!');
        redirect($this->agent->referrer());
    }
    public function delete($id)
    {
        $package = $this->package->getById($id);
        $this->deleteFile(UPLOAD_PATH . "packages/" . $package->image);
        $gallery = explode(',', $package->gallery);
        if (!empty($gallery)) {
            foreach ($gallery as $row) {
                $this->deleteFile(UPLOAD_PATH . "packages/" . $row);
            }
        }
        $this->package->delete($id);
        $this->session->set_flashdata('success', 'Package deleted!');
        redirect($this->agent->referrer());
    }
}
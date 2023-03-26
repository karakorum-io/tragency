<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
    
    
  
    public function __construct()
    {   
       
        parent::__construct();
            if(is_null(get_cookie('admin_mail1')))
        {
         
             redirect('welcome/admin');
               
        }
        
    }
 
	public function index()
	{
	      $data['data']= $this->crud->get_data("contact", "", "*", "full","", "", "order by id desc");
		$this->load->view('admin/index',$data);
	}
	public function view($view)
	{ 
		$this->load->view('admin/'.$view);
	}
    public function status($redirect , $table, $id, $status)
	{
	      $check = $this->crud->update($table,array('status'=>$status),array('id'=>$id));
	      redirect('master/'.$redirect);
	}
	public function delete($redirect , $table, $id)
	{
	      $check = $this->crud->delete($table,array('id'=>$id));
	      redirect('master/'.$redirect);
	}
	
	public function resizeImage($filename,$path)
   {
      $source_path = $_SERVER['DOCUMENT_ROOT'] .'/demo/travel'. $path . $filename;
      $target_path = $_SERVER['DOCUMENT_ROOT'] .'/demo/travel'. $path ;
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'quality' => '80%',
          'width' => 1000,
      );
   
      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }
   
      $this->image_lib->clear();
   }
   
// =================================================
// user CONFIG  >> >>
// =================================================



		public function category()
	{  
	    $data['data']= $this->crud->get_data("category", "", "*", "full","", "", "order by id desc");
		$this->load->view('admin/category_view',$data);
	}
 
		public function category_edit($id)
	{  
	    $data['data']= $this->crud->get_data("category", " and id='$id' ", "*", "full","", "", "");
		$this->load->view('admin/category_edit',$data);
	}
		public function add_category_action()
	{
	   
	   $_POST['slug'] = url_title($_POST['name'], 'dash', true);
	       $this->load->helper(array('file', 'directory'));
           $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1500;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
             $this->session->set_flashdata('error_message',$error);
                  
        } else {
                    $grad = $this->upload->data();
                    $this->resizeImage($grad['file_name'],'/assets/uploads/');
                    $_POST['image'] =  '/assets/uploads/'.$grad['file_name'];
        }
   
         $this->crud->insert('category',$_POST); 
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/category');die;
	}
	public function edit_category_action()
	{
	   
	       $this->load->helper(array('file', 'directory'));
           $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1500;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
        if ($this->upload->do_upload('image')) {
                    $grad = $this->upload->data();
                    $this->resizeImage($grad['file_name'],'/assets/uploads/');
                    $_POST['image'] =  '/assets/uploads/'.$grad['file_name'];
        }
   $id= $_POST['id'];
	    
	     unset($_POST['id']);
		  $check = $this->crud->update('category',$_POST,array('id'=>$id));   
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/category');die;
	}
	

// =================================================
// product CONFIG  >> >>
// =================================================



		public function product()
	{  
	    $data['data']= $this->crud->get_data("product p", "and p.status=1 ", "p.*,c.name as cname", "full","join category c on c.id = p.destination", "", "order by p.id desc");
		$this->load->view('admin/product_view',$data);
	}
		public function reorder()
	{  
	    $data['data']= $this->crud->get_data("product", "and status=1 ", "name,id,order_id,image", "full","", "", "order by order_id desc");
		$this->load->view('admin/reorder',$data);
	}
		public function reorder_product_action(){
	    $order  = explode(",",$_GET["order"]);
	    $order = array_reverse($order);
	    for($i=0; $i < count($order);$i++) {
	    $this->crud->update('product',array('order_id'=>$i),array('id'=>$order[$i]));
	}
	}
	public function product_add()
	{  
	     $data['data']= $this->crud->get_data("category", "", "*", "full","", "", "order by id desc");
		$this->load->view('admin/product_add',$data);
	}
 
		public function product_edit($id)
	{  
	    $data['data']= $this->crud->get_data("product", " and id='$id' ", "*", "full","", "", "");
	     $data['data1']= $this->crud->get_data("category", "", "*", "full","", "", "order by id desc");
		$this->load->view('admin/product_edit',$data);
	}
		public function add_product_action()
	{
	   
	       $this->load->helper(array('file', 'directory'));
         $path=  $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|webp';
                $config['max_size']             = 1500;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
             $this->session->set_flashdata('error_message',$error);
                
        } else {
                    $grad = $this->upload->data();
                    $this->resizeImage($grad['file_name'],'/assets/uploads/');
                    $_POST['image'] =  '/assets/uploads/'.$grad['file_name'];
        }
            $image_path = array();          
            $count = count($_FILES['gallery']['name']);   
            for($key =0; $key <$count; $key++){     
                $_FILES['file']['name']     = $_FILES['gallery']['name'][$key]; 
                $_FILES['file']['type']     = $_FILES['gallery']['type'][$key]; 
                $_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$key]; 
                $_FILES['file']['error']     = $_FILES['gallery']['error'][$key]; 
                $_FILES['file']['size']     = $_FILES['gallery']['size'][$key]; 
                    
                $config['file_name'] = $_FILES['gallery']['name'][$key];                      
                $this->upload->initialize($config); 
                
                if($this->upload->do_upload('file')) {
                    $data = $this->upload->data();
                    $image_path[$key] = $path ."$data[file_name]";                  
                }
            }
         $_POST['gallery'] = implode (",", $image_path);
         $_POST['destination'] = implode (",", $_POST['destination']);
         $tour_plan = array();
         $plan_title = $_POST['plan_title'];
         foreach($plan_title as $x => $val) {
             $tour_plan[$x]['title'] = $val; $tour_plan[$x]['descr'] = $_POST['plan_desc'][$x];
         }
          $_POST['plan_title'] = '';
         $_POST['plan_desc'] = json_encode($tour_plan); 
         if(isset($_POST['weaklydays']) && !empty($_POST['weaklydays']))
         $_POST['weaklydays'] = implode (",", $_POST['weaklydays']);
   
         $this->crud->insert('product',$_POST); 
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/product','refresh');
	}
	public function edit_product_action()
{
	   
	       $this->load->helper(array('file', 'directory'));
         $path=  $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1500;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
        if ($this->upload->do_upload('image')) {
                    $grad = $this->upload->data();
                    $this->resizeImage($grad['file_name'],'/assets/uploads/');
                    $_POST['image'] =  '/assets/uploads/'.$grad['file_name'];
        }
            $image_path = array();          
            $count = count($_FILES['gallery']['name']);   
            for($key =0; $key <$count; $key++){     
                $_FILES['file']['name']     = $_FILES['gallery']['name'][$key]; 
                $_FILES['file']['type']     = $_FILES['gallery']['type'][$key]; 
                $_FILES['file']['tmp_name'] = $_FILES['gallery']['tmp_name'][$key]; 
                $_FILES['file']['error']     = $_FILES['gallery']['error'][$key]; 
                $_FILES['file']['size']     = $_FILES['gallery']['size'][$key]; 
                    
                $config['file_name'] = $_FILES['gallery']['name'][$key];                      
                $this->upload->initialize($config); 
                
                if($this->upload->do_upload('file')) {
                    $data = $this->upload->data();
                    $image_path[$key] = $path ."$data[file_name]";                  
                }
            }
            if(!isset($_POST['oldgallery'])){
                $_POST['oldgallery'] = array();
            }
         $image_path = array_merge($image_path, $_POST['oldgallery']);
         $_POST['gallery'] = implode (",", $image_path);
         $_POST['destination'] = implode (",", $_POST['destination']);
         $tour_plan = array();
         $plan_title = $_POST['plan_title'];
         foreach($plan_title as $x => $val) {
             $tour_plan[$x]['title'] = $val; $tour_plan[$x]['descr'] = $_POST['plan_desc'][$x];
         }
          $_POST['plan_title'] = '';
         $_POST['plan_desc'] = json_encode($tour_plan); 
    if(isset($_POST['weaklydays']) && !empty($_POST['weaklydays']))
         $_POST['weaklydays'] = implode (",", $_POST['weaklydays']);
         
         $id= $_POST['id'];
	       unset($_POST['id']);unset($_POST['oldgallery']);
		  $check = $this->crud->update('product',$_POST,array('id'=>$id));   
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/product','refresh');
	}
 
	
// =================================================
// review CONFIG  >> >>
// =================================================



		public function review($id)
	{  
	    $data['data']= $this->crud->get_data("review", " and status=1  and tourid='$id' ", "*", "full","", "", "order by id desc");
	    $data['tourid']= $id;
	    $data['tour_name']= $this->crud->get_data("product", " and id='$id' ", "name", "full","", "", "")->result()[0]->name;
		$this->load->view('admin/review_view',$data);
	}
		public function review_add($id)
	{  
	     $data['tourid']= $id;
		$this->load->view('admin/review_add',$data);
	}
 
		public function review_edit($id)
	{  
	    $data['data']= $this->crud->get_data("review", " and id='$id' ", "*", "full","", "", "");
	  
		$this->load->view('admin/review_edit',$data);
	}
	public function add_review_action()
	{
         $this->crud->insert('review',$_POST);
         $this->session->set_flashdata('success_message','Successfully added');
          redirect('master/review/'.$_POST['tourid'],'refresh');
	}
          
	
	
// =================================================
// availability CONFIG  >> >>
// =================================================



		public function availability($id)
	{  
	    $data['data']= $this->crud->get_data("availability", " and status=1  and tourid='$id' ", "*", "full","", "", "order by id desc");
	    $data['tourid']= $id;
	    $data['tour_name']= $this->crud->get_data("product", " and id='$id' ", "name", "full","", "", "")->result()[0]->name;
		$this->load->view('admin/availability_view',$data);
	}
		public function availability_add($id)
	{  
	     $data['tourid']= $id;
		$this->load->view('admin/availability_add',$data);
	}
 
		public function availability_edit($id)
	{  
	    $data['data']= $this->crud->get_data("availability", " and id='$id' ", "*", "full","", "", "");
	  
		$this->load->view('admin/availability_edit',$data);
	}
	public function add_availability_action()
	{
	     $_POST['time'] = implode (",", $_POST['time']);
         $this->crud->insert('availability',array('title'=>$_POST['title'],'descr'=>$_POST['descr'],'time'=>$_POST['time'],'tourid'=>$_POST['tourid']));
         $id = $this->db->insert_id();
         foreach($_POST['aprice'] as $key => $value) {
              $this->crud->insert('tour_price',array('tourid'=>$_POST['tourid'],'option_id'=>$id,'type'=>'adult','min'=>$_POST['amin'][$key],'max'=>$_POST['amax'][$key],'price'=>$value));
             }
        foreach($_POST['cprice'] as $key => $value) {
              $this->crud->insert('tour_price',array('tourid'=>$_POST['tourid'],'option_id'=>$id,'type'=>'child','min'=>$_POST['cmin'][$key],'max'=>$_POST['cmax'][$key],'price'=>$value));
             }     
         $this->session->set_flashdata('success_message','Successfully added');
          redirect('master/availability/'.$_POST['tourid'],'refresh');
	}
         	public function edit_availability_action()
     {
        // echo'<pre>';print_r($_POST);die;
           $id= $_POST['id'];unset($_POST['id']);
           $_POST['time'] = implode (",", $_POST['time']);
		  $this->crud->update('availability',array('title'=>$_POST['title'],'descr'=>$_POST['descr'],'time'=>$_POST['time'],'tourid'=>$_POST['tourid']),array('id'=>$id));
		   $this->crud->delete('tour_price',array('option_id'=>$id));
		    foreach($_POST['aprice'] as $key => $value) {
              $this->crud->insert('tour_price',array('tourid'=>$_POST['tourid'],'option_id'=>$id,'type'=>'adult','min'=>$_POST['amin'][$key],'max'=>$_POST['amax'][$key],'price'=>$value));
             }
        foreach($_POST['cprice'] as $key => $value) {
              $this->crud->insert('tour_price',array('tourid'=>$_POST['tourid'],'option_id'=>$id,'type'=>'child','min'=>$_POST['cmin'][$key],'max'=>$_POST['cmax'][$key],'price'=>$value));
             }     
		  $this->session->set_flashdata('success_message','Successfully updated');
           redirect('master/availability/'.$_POST['tourid'],'refresh');
	}
	

// =================================================
// offer CONFIG  >> >>
// =================================================
public function offer_edit()
	{  
	    $data['data']= $this->crud->get_data("offer", " and id=1 ", "*", "full","", "", "");
		$this->load->view('admin/offer_edit',$data);
	}
		public function edit_offer_action()
	{
	   
	       $this->load->helper(array('file', 'directory'));
           $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1500;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
        if ($this->upload->do_upload('img')) {
                    $grad = $this->upload->data();
                    $this->resizeImage($grad['file_name'],'/assets/uploads/');
                    $_POST['img'] =  '/assets/uploads/'.$grad['file_name'];
        }
                    $id= $_POST['id'];
	    
	     unset($_POST['id']);
		  $check = $this->crud->update('offer',$_POST,array('id'=>$id));   
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/offer_edit');die;
	}

	
// =================================================
// gallery CONFIG  >> >>
// =================================================



		public function gallery()
	{  
	    $data['data']= $this->crud->get_data("all_news", "", "", "full","", "", "order by id desc");
		$this->load->view('admin/gallery_view',$data);
	}

		public function gallery_edit($id)
	{  
	    $data['data']= $this->crud->get_data("all_news", " and id='$id' ", "*", "full","", "", "");
	     
		$this->load->view('admin/gallery_edit',$data);
	}
		public function add_gallery_action()
	{
	   
	       $this->load->helper(array('file', 'directory'));
           $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1500;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
        if (!$this->upload->do_upload('img')) {
          echo  $error = $this->upload->display_errors();
             $this->session->set_flashdata('error_message',$error);
                  die;
        } else {
                    $grad = $this->upload->data();
                    $this->resizeImage($grad['file_name'],'/assets/uploads/');
                    $_POST['img'] =  '/assets/uploads/'.$grad['file_name'];
                    $this->crud->insert('all_news',$_POST); 
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/gallery');die;
        }
   
         
	}
	public function edit_gallery_action()
	{
	   
	       $this->load->helper(array('file', 'directory'));
           $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1500;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
        if ($this->upload->do_upload('img')) {
                    $grad = $this->upload->data();
                    $this->resizeImage($grad['file_name'],'/assets/uploads/');
                    $_POST['img'] =  '/assets/uploads/'.$grad['file_name'];
        }
                    $id= $_POST['id'];
	    
	     unset($_POST['id']);
		  $check = $this->crud->update('all_news',$_POST,array('id'=>$id));   
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/gallery');die;
	}
	
	
// =================================================
// clients CONFIG  >> >>
// =================================================



		public function clients()
	{  
	    $data['data']= $this->crud->get_data("clients", "", "", "full","", "", "order by id desc");
		$this->load->view('admin/client_view',$data);
	}
	public function clients_add()
	{  
	    $data['city']= $this->crud->get_data("category", "", "*", "full","", "", "order by id desc");
		$this->load->view('admin/client_add',$data);
	}

		public function clients_edit($id)
	{  
	    $data['data']= $this->crud->get_data("clients", " and id='$id' ", "*", "full","", "", "");
	    $data['city']= $this->crud->get_data("category", "", "*", "full","", "", "order by id desc");
	     
		$this->load->view('admin/client_edit',$data);
	}
		public function add_clients_action()
	{
	   
	       $this->load->helper(array('file', 'directory'));
           $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1500;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
        if (!$this->upload->do_upload('img')) {
          echo  $error = $this->upload->display_errors();
             $this->session->set_flashdata('error_message',$error);
                  die;
        } else {
                    $grad = $this->upload->data();
                    $this->resizeImage($grad['file_name'],'/assets/uploads/');
                    $_POST['img'] =  '/assets/uploads/'.$grad['file_name'];
                    $this->crud->insert('clients',$_POST); 
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/clients');die;
        }
   
         
	}
	public function edit_clients_action()
	{
	   
	       $this->load->helper(array('file', 'directory'));
           $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1500;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
        if ($this->upload->do_upload('img')) {
                    $grad = $this->upload->data();
                    $this->resizeImage($grad['file_name'],'/assets/uploads/');
                    $_POST['img'] =  '/assets/uploads/'.$grad['file_name'];
        }
                    $id= $_POST['id'];
	    
	     unset($_POST['id']);
		  $check = $this->crud->update('clients',$_POST,array('id'=>$id));   
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/clients');die;
	}	
	
// =================================================
// product CONFIG  >> >>
// =================================================


	public function settings()
	{  
	     $data['data']= $this->crud->get_data("settings", "", "*", "full","", "", "order by id desc");
		$this->load->view('admin/settings',$data);
	}
		public function edit_settings_action()
	{
          $id= $_POST['id'];
	     unset($_POST['id']);
		  $check = $this->crud->update('settings',$_POST,array('id'=>$id));   
         $this->session->set_flashdata('success_message','Successfully updated');
                   redirect('master/settings');die;
	}
	
	
	

// =================================================
// product CONFIG  >> >>
// =================================================



		public function bookings()
	{  
	    $data['data']= $this->crud->get_data("booking b", " and b.status = 1","b.*", "full","", "", "order by b.id desc");
		$this->load->view('admin/bookings',$data);
	}	
}	
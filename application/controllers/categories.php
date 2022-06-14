<?php 



class Categories extends CI_Controller
{


	public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url','form','date');
        $this->load->library("pagination");
		$this->load->model('post_model');
		$this->load->library('session');
    }


	public function index(){

			

		$data['title'] = 'Categories';

		$data['categories'] = $this->category_model->get_categories();

		$data['num'] = $this->category_model->get_posts_per_category();


		// var_export($data['num']);

		

		    $this->load->view('templates/header_vertical');
			$this->load->view('categories/index',$data);
			$this->load->view('templates/footer');


	}

	public function posts($id) {


		if($id){

			$this->session->set_userdata('Id',$id);




		}

		$config = array();
	     $config['full_tag_open'] = '<div class = "cont"><ul class = "pagination1">';
         $config['full_tag_close'] = '</ul></div>';
         $config['first_link'] = false;
        
        
         $config['last_link'] = false;
		 
		

		 $config['next_link'] = '&raquo';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';

		 $config['prev_link'] = '&laquo';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['cur_tag_open'] = '<li class="active"><a href="">';
		 $config['cur_tag_close'] = '</a></li>';

		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';


		$config["base_url"] = base_url() . "index.php/categories/posts/0";
      
        $config["total_rows"] = $this->post_model->count_posts_per_categories($this->session->userdata('Id'));

          if($this->input->post('sel')){

				                $config['per_page'] = $this->input->post('sel');

				                


				                $this->session->set_userdata('userId',$this->input->post('sel'));



				            }

				                else{

				                $config['per_page'] =  $this->session->userdata('userId');

				                


				            }



         
        $config["uri_segment"] = 4;
      

        $this->pagination->initialize($config);

        if($this->uri->segment(4)){

        	 

        	$page = $this->uri->segment(4);


				        }else{

				        	$page = 0;

				        }


				         $this->session->set_userdata('userPage',$page);


				         $data['m'] = $this->uri->segment(3);

		

		$data["page_selected"] =  $this->session->userdata('userId');

        $data["links"] = $this->pagination->create_links();

        // $data['posts'] = $this->post_model->get_students($config["per_page"], $page);

        $data['num_post_comments'] = $this->post_model->get_num_comments();

        // var_dump($data['num_post_comments']);


		$data['title']=$this->category_model->get_category($this->session->userdata('Id'))->name;

		// var_export($data['title']);

		$data['posts'] = $this->post_model->get_posts_by_category($this->session->userdata('Id'),$config["per_page"], $page);


		  $this->load->view('templates/header_vertical');
			$this->load->view('posts/index',$data);
			$this->load->view('templates/footer');


	}


	
	


	public function create(){

		if(!$this->session->userdata('logged_in')){

											redirect('users/login');

										}

			$data['categories'] = $this->category_model->get_categories();

			//var_export($data['categories']);



		$data['title'] = 'Create Category';

		

		$this->form_validation->set_rules('name','Name','required');



		if($this->form_validation->run() === FALSE){

			$this->load->view('templates/header_vertical');
			$this->load->view('categories/create',$data);
			$this->load->view('templates/footer');


		}else{

			

			

			$this->category_model->create_category();

			$this->session->set_flashdata('category_created','Category Created');

			redirect('categories/create');

		}


	}

	public function delete($id){



								if(!$this->session->userdata('logged_in')){

										redirect('categories/index');

															}

								

								

								if(empty($this->category_model->posts_per_category($id))){

								$this->category_model->delete_category($id);

								$this->session->set_flashdata('category_deleted','Category Deleted');

								redirect('categories');


								}else{redirect('categories');}

								

								

							}



}



















 ?>
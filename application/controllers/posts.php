<?php  





class Posts extends CI_Controller
{

	public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url','form','date');
        $this->load->library("pagination");
		$this->load->model('post_model');
		$this->load->library('session');
    }


	
	

	public function index() {

         
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


		$config["base_url"] = base_url() . "posts/index/0";
      
        $config["total_rows"] = $this->post_model->get_count();

       

          if($this->input->post('sel')){

				                $config['per_page'] = $this->input->post('sel');

				                


				                $this->session->set_userdata('userId',$this->input->post('sel'));



				            }

				                else {

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

				         $data['m'] = 0;

		

		$data["page_selected"] =  $this->session->userdata('userId');

        $data["links"] = $this->pagination->create_links();

         if($this->input->post('mostLikes')){

        	$this->session->set_userdata('mostLikes','checked');



        	 
        	$this->session->unset_userdata('mostComments');

        	$this->session->unset_userdata('mostViews');
        	$this->session->unset_userdata('mostNew');
        	$this->session->unset_userdata('mostOld');
        	


        }else if($this->input->post('mostComments')) {

        	$this->session->set_userdata('mostComments','checked');

        	 
        	$this->session->unset_userdata('mostLikes');
        	
        	$this->session->unset_userdata('mostViews');
        	$this->session->unset_userdata('mostNew');
        	$this->session->unset_userdata('mostOld');



        }

        else if($this->input->post('mostViews')){

        	$this->session->set_userdata('mostViews','checked');

        	 
        	$this->session->unset_userdata('mostLikes');
        	$this->session->unset_userdata('mostComments');
        	$this->session->unset_userdata('mostNew');
        	$this->session->unset_userdata('mostOld');


        } else if($this->input->post('mostNew')){

        	$this->session->set_userdata('mostNew','checked');
        	$this->session->unset_userdata('mostLikes');
        	$this->session->unset_userdata('mostComments');
        	$this->session->unset_userdata('mostViews');
        	$this->session->unset_userdata('mostOld');


        } else if($this->input->post('mostOld')){

        	$this->session->set_userdata('mostOld','checked');
        	$this->session->unset_userdata('mostLikes');
        	$this->session->unset_userdata('mostComments');
        	$this->session->unset_userdata('mostViews');
        	$this->session->unset_userdata('mostNew');


        }

        else{

        	// $this->session->unset_userdata('mostLikes');
        	// $this->session->unset_userdata('mostComments');
        	// $this->session->unset_userdata('mostViews');

        	



        }

        if($this->session->userdata('mostLikes')){

        	

        		$data['posts'] = $this->post_model->get_students($config["per_page"], $page,'likes','number_likes','DESC');


        	}

        	else if($this->session->userdata('mostComments')){

        	

        		$data['posts'] = $this->post_model->get_students($config["per_page"], $page,'posts','num_comments','DESC');


        	}

        	else if($this->session->userdata('mostViews')){

        	

        		$data['posts'] = $this->post_model->get_students($config["per_page"], $page,'posts','visits','DESC');


        	}

        	else if($this->session->userdata('mostNew')){

        	

        		$data['posts'] = $this->post_model->get_students($config["per_page"], $page,'posts','id_p','DESC');


        	}

        	else if($this->session->userdata('mostOld')){

        	

        		$data['posts'] = $this->post_model->get_students($config["per_page"], $page,'posts','id_p','ASC');


        	}else{

        		$data['posts'] = $this->post_model->get_students($config["per_page"], $page,'posts','id_p','DESC');




        	}

       



        $data['users_id'] = $this->user_model->users_array();

         

        $data['num_post_comments'] = $this->post_model->get_num_comments();

      


		$data['title'] = 'Latest Posts';

		


			$this->load->view('templates/header_vertical');
			
		    $this->load->view('posts/index',$data);
		    
		    $this->load->view('templates/footer');

		}



		public function index1() {

		

		$data['title'] = 'Latest Posts';

		$x = $this->input->post('result');

		$data['search'] = $x;

		
			$data['posts'] = $this->post_model->get_like($x);

			
			$this->load->view('templates/header_vertical');
		    $this->load->view('posts/index',$data);
		    $this->load->view('templates/footer');


		}
		




public function view($slug = NULL) {



                          //echo $slug;



	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

	if(!$pageWasRefreshed){$this->post_model->set_visits($slug);}

                         

						if(empty($this->post_model->get_likes($slug))){


						$this->post_model->add_like($slug);




						};


      
       
       $data['post'] = $this->post_model->get_posts($slug);

        $post_id = $data['post']['id_p'];

        $data['photos'] = $this->post_model->get_number_photos($post_id);

       //var_export($data['post']);

       
       $data['comments'] = $this->comment_model->get_comments($post_id);

       // print_r($data['post']);

      

       // var_dump($data['post']);

       if(empty($data['post'])){

       	show_404();



       }

       $data['title'] = $data['post']['title'];

       $this->load->view('templates/header_vertical');
		$this->load->view('posts/view',$data);
		$this->load->view('templates/footer');
	

}

													public function images($id_p){

												// $data['title'] = $this->input->post('imageTitle');

														if($this->input->post('imageTitle')){

															$this->session->set_userdata('imageTitle',$this->input->post('imageTitle'));


														}

														if($this->input->post('imageUsername')){

															$this->session->set_userdata('imageUsername',$this->input->post('imageUsername'));


														}

												

												$data['title'] = $this->session->userdata('imageTitle');

												$data['username'] = $this->session->userdata('imageUsername');

												$data['images'] = $this->post_model->get_images($id_p);

												$data['id_p'] = $id_p;

												


												$this->load->view('templates/header_vertical');
												$this->load->view('posts/images',$data);
												$this->load->view('templates/footer');




													}

													public function delete_gallery_image($id){

														$id_p = $this->input->post('id_p');


														$this->post_model->delete_post_image($id);

								                         redirect('posts/images/'.$id_p);
													}

					public function output(){

						$x = $this->input->post('result'); 

						$y = intval($this->input->post('result1')); 

						 $data['num_post_comments'] = $this->post_model->get_num_comments();

						


						if($x !== ''){

						
						  $data['title'] = 'Search Results';

						  if($y != 0){$data['posts'] = $this->post_model->get_like1($x,$y);

						  var_export($data['posts']);




						}else

						  {$data['posts'] = $this->post_model->get_like($x);}

						 

						$this->load->view('posts/indexView',$data);

					}else{

						if($y != 0){


							$data['posts'] = $this->post_model->get_students1($this->session->userdata('userId'), $this->session->
							userdata('userPage'),$y);}


							else{$data['posts'] = $this->post_model->get_students($this->session->
								userdata('userId'), $this->session->userdata('userPage'));}



			

						   $this->load->view('posts/indexView',$data);


																}
																			
																}

								public function likes(){


									$x = $this->input->post('result');

									if($this->input->post('result1')>$this->post_model->get_num_likes($x)){


										$this->post_model->set_likes($x);}

                      echo $this->input->post('result1');



								}

								public function imageUpload(){


									$data['url'] = $this->input->post('result');

									

									$this->load->view('posts/get-data',$data);


									// if($data['url']){


									// 	 $this->post_model->insert_web_url($data['url']);

									// 	 $this->load->view('posts/get-data',$data);


									// }



								}

					

public function create(){

	if(!$this->session->userdata('logged_in')){

		redirect('users/login');

	}


	$data['title'] = 'Create Post';

	$data['categories'] = $this->post_model->get_categories();



	 // var_dump($data['categories']);

	$this->form_validation->set_rules('title','Title','required');

	$this->form_validation->set_rules('body','Body','required');

	$this->form_validation->set_error_delimiters('<p style = "color:red;">', '</p>');

	$data['color'] = 'red';

if($this->form_validation->run() === FALSE){

	$this->load->view('templates/header_vertical');
	$this->load->view('posts/create',$data);
	$this->load->view('templates/footer');


}else{

	//Upload Image

	$config['upload_path'] = './assets/images/posts';

	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size'] = '2048';
	$config['max_width'] = '500';
	$config['max_height'] = '500';

	$this->load->library('upload',$config);

	if(!$this->upload->do_upload()){

		$errors = array('error' => $this->upload->display_errors() );

		$post_image = 'noimage.jpg';

	}else{

		$data = array('upload_data'=>$this->upload->data());
		$post_image = $_FILES['userfile']['name'];


	}


	

			$this->post_model->create_post($post_image);

			$this->session->set_flashdata('post_created','Post Created');

			redirect('posts');



}

	







}

							public function delete($id){

								if(!$this->session->userdata('logged_in')){

										redirect('users/login');

															}

								echo $id;

								$this->post_model->delete_post($id);

								redirect('posts');

							}

							public function edit($slug){

								if(!$this->session->userdata('logged_in')){

											redirect('users/login');

										}

								

								$data['post'] = $this->post_model->get_posts($slug);
								$data['categories'] = $this->post_model->get_categories();

								// if($this->session->userdata('user_id')!=)


								// var_export($data['post']);



							       // print_r($data['post']);

							      

							       // var_dump($data['post']);

							       if(empty($data['post'])){

							       	show_404();



							       }

							       $data['title'] = 'Edit Post';

							       $this->load->view('templates/header_vertical');
									$this->load->view('posts/edit',$data);
									$this->load->view('templates/footer');

							}

							public function update(){

								if(!$this->session->userdata('logged_in')){

											redirect('users/login');

										}

								$config['upload_path'] = './assets/images/posts';
								$config['allowed_types'] = 'gif|jpg|png';
								$config['max_size'] = '2048';
								$config['max_width'] = '2000';
								$config['max_height'] = '2000';

					$this->load->library('upload',$config);

						if(!$this->upload->do_upload()){

							$errors = array('error' => $this->upload->display_errors() );

							$post_image = $this->input->post('post_image');

								}else{

							$data = array('upload_data'=>$this->upload->data());
							$post_image = $_FILES['userfile']['name'];

								}
								

								

								 $this->post_model->update_post($post_image);

								 $this->session->set_flashdata('post_updated','Post Updated');

								 redirect('posts');

								


								// $this->post_model->update_post();

							}









		
	
}
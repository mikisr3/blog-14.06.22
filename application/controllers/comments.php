<?php 


/**
 * 
 */
class Comments extends CI_Controller
{
	
	

	public function create($post_id){

		$this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');



		$slug = $this->input->post('slug');



		

		$data['post'] = $this->post_model->get_posts($slug);

		 $data['comments'] = $this->comment_model->get_comments($post_id);

		


		// var_dump($data['post']);

		$this->form_validation->set_error_delimiters("","");

		// $this->form_validation->set_rules('name','Name','required');
		//$this->form_validation->set_rules('email','Email','required|valid_email');
	    // $this->form_validation->set_rules('email','Email','valid_email');

		$this->form_validation->set_rules('body','Body','required');

		if($this->form_validation->run() === FALSE){

			$this->load->view('templates/header_vertical');
			$this->load->view('posts/view',$data);
			$this->load->view('templates/footer');

		}else{

			$this->comment_model->create_comment($post_id);
			$this->post_model->set_num_comments($post_id);

			redirect('posts/'.$slug);



		}









	}

									public function multiple_images($id_p){

										$slug = $this->input->post('image_slug');

										 $this->load->library('upload');

										
   
									      $count = count($_FILES['files']['name']);

									       // var_export($_FILES['files']);
									    
									      for($i=0;$i<$count;$i++){
									    
									        
									    
									          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
									          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
									          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
									          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
									          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
									  
									          $config['upload_path'] = './assets/images/posts'; 
									          $config['allowed_types'] = 'jpg|jpeg|png|gif';
									          $config['max_size'] = '2048';
									          $config['max_width'] = '2000';
	                                          $config['max_height'] = '2000';
									         
									           $config['overwrite']=TRUE;
									   
									          $this->load->library('upload',$config); 

									          $this->upload->initialize($config);
									    
									          if($this->upload->do_upload('file')){

									            //$uploadData = $this->upload->data();

									            $data = array('upload_data'=>$this->upload->data());

									            // var_export($data);

									             $filename = $_FILES['files']['name'][$i];

									            

									            $this->post_model->upload_image($filename,$id_p);

									            
									   
									          
									          }
									        
									   
									      }

									      $this->session->set_flashdata('images_uploaded','Images Uploaded');

			                                redirect('posts/'.$slug);

									     

									    

	
											   }

											   public function delete_comment($id){

											   	$slug = $this->input->post('comment_slug');

											   	$deleteComment = $this->input->post('delete_comment_from_posts');


											   	

											   	$this->comment_model->delete_comment($id);
											   	
											   	$this->post_model->minus_comment($deleteComment);

												$this->session->set_flashdata('comment_deleted','Comment Deleted');

												redirect('posts/'.$slug);





											   }








									}



















 ?>
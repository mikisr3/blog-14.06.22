<?php 



/**
 * 
 */
class Users extends CI_Controller
{
	

	public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url','form','date');
  //       $this->load->library("pagination");
		// $this->load->model('post_model');
		$this->load->library('session');
    }
	
	public function register(){

		$data['title'] = 'Sign Up';

		$this->form_validation->set_error_delimiters('', '');

		$this->form_validation->set_rules('name','Name','required');

		$this->form_validation->set_rules('username','Username','required|callback_check_username_exists');

		$this->form_validation->set_rules('email','Email','required|callback_check_email_exists');

		$this->form_validation->set_rules('password','Password','required');

		$this->form_validation->set_rules('password2','Confirm Password','matches[password]');


		if($this->form_validation->run() === FALSE){

			$this->load->view('templates/header_vertical');
			$this->load->view('users/register',$data);
			$this->load->view('templates/footer');







		}else{

			$enc_password = md5($this->input->post('password'));

			$this->user_model->register($enc_password);

			$this->session->set_flashdata('user_registered','You are now registered');

			redirect('posts');


		}


	}

	//Login User

	public function login(){

		$data['title'] = 'Sign In';

		$this->form_validation->set_error_delimiters('', '');

		$this->form_validation->set_rules('username','Username','required');

		$this->form_validation->set_rules('password','Password','required');

		


		if($this->form_validation->run() === FALSE){

			$this->load->view('templates/header_vertical');
			$this->load->view('users/login',$data);
			$this->load->view('templates/footer');






		}else{

			$username = $this->input->post('username');

			$password = md5($this->input->post('password'));

			$user_id = $this->user_model->login($username,$password);

			if($user_id){

				// var_export($user_id);

				// die('success');

				//create session

				$user_data = array(

					'user_id'=>$user_id,
					'username'=>$username,
					'logged_in'=>true


				);

				$this->session->set_userdata($user_data);

				$this->session->set_flashdata('user_login','You are now logged');

				redirect('posts');


			}else{

				$this->session->set_flashdata('login_failed','Login Failed!');

				redirect('users/login');



			}



			//Set message

			// $this->session->set_flashdata('user_login','You are now logged');

			// redirect('posts');


		}


	}

	//Log users out

	public function logout(){

		//Unset user data

		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('user_loggedout','You are now logged out');

		redirect('users/login');








	}

	public function check_username_exists($username){

		$this->form_validation->set_message('check_username_exists','Username exists!');

		if($this->user_model->check_username_exists($username)){

			return true;


		}else{

			return false;



								}



							}

							public function check_email_exists($email){


											$this->form_validation->set_message('check_email_exists','Email exists!');

											if($this->user_model->check_email_exists($email)){

												return true;


											}else{

												return false;



													}



												}














						}











 ?>
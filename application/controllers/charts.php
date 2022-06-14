<?php 


/**
 * 
 */
class Charts extends CI_Controller
{
	
	public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url','form','date');
        $this->load->library("pagination");
		$this->load->model('post_model');
		$this->load->library('session');
    }


						public function index12()

						{

							  if($this->input->post('sel')){


				                $this->session->set_userdata('userId',$this->input->post('sel'));


				            }

				             
							 $x = $this->post_model->get_group($this->session->userdata('userId'));

							 $post_month = $this->post_model->get_posts_by_month($this->session->userdata('userId'));

							 echo $post_month['total'];

							 // var_export($x);

							 // echo '<br>';


                                $data["option_selected"] =  $this->session->userdata('userId');
						        $data['json'] = json_encode($x);

						        $data['json_post_month'] = json_encode( $post_month['total']);

						       $this->load->view('templates/header');

							    $this->load->view('bars/charts',$data);
							    
							    $this->load->view('templates/footer');

						         // echo $data['json'];








						}

					}








 ?>
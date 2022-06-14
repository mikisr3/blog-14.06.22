<?php 

/**
 * 
 */


class Category_model extends CI_Model




{


	public function __construct(){

		$this->load->database();
		$this->load->helper('date');






	}

	public function create_category(){

		if($this->input->post('CatId')){

			$x = $this->input->post('CatId');
		}else{
			$x = 0;
		}

		$data = array(


			'name' => $this->input->post('name'),
			'user_id'=>$this->session->userdata('user_id'),
			'parent'=>$x



		);

		return $this->db->insert('categories',$data);








	}

								public function get_categories(){

								$this->db->order_by('name');
								// $this->db->join('users');

								$query = $this->db->get('categories');

								return $query->result_array();


							}

							public function get_posts_per_category() {


							 $this->db->select('category_id,COUNT(category_id)as total');

								// $this->db->count_all_results('category_id');


							$this->db->from('posts'); 


							 $this->db->group_by('category_id');

							 $this->db->order_by('category_id', 'asc'); 

							 $query = $this->db->get();

							 return $query->result_array();


							}

							public function posts_per_category($id) {


							 $this->db->select('*');

								// $this->db->count_all_results('category_id');


							$this->db->from('posts'); 


							 $this->db->where('category_id',$id);

							 // $this->db->order_by('category_id', 'asc'); 

							 $query = $this->db->get();

							 return $query->row_array();


							}


							




									public function get_category($id){


										


										$query = $this->db->get_where('categories',array('id'=>$id));

										return $query->row();









									}

									public function delete_category($id){

										$this->db->where('id',$id);
									    $this->db->delete('categories');

									    return true;





									}
	
}

 ?>
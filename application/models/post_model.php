<?php 

/**
 * 
 */


class Post_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
		 $this->load->helper('date');
	}



public function get_posts($slug = FALSE){ 

	if($slug === FALSE){

		$this->db->order_by('posts.id','DESC');
		$this->db->join('categories','categories.id = posts.category_id');







		$query = $this->db->get('posts');



		return $query-> result_array();





	}


    $this->db->join('likes','likes.post_slug = posts.slug');
    $this->db->join('users','users.id_users = posts.user_id');
	$query = $this->db->get_where('posts',array('slug'=>$slug));





	 return $query-> row_array();









}

														public function get_number_photos($id){

															$query = $this->db->get_where('post_images',array('post_id'=>$id));

										          return count($query->result_array());


														}

											public function set_likes($slug){


													$this->db->select('*');
												    $this->db->from('likes');
													
													$this->db->where('post_slug',$slug);
											        $this->db->set('number_likes','number_likes+1',false);

											      

											        
											        
											        
											         $this->db->update();

											         //$query =  $this->db->get();

											        // return $query->row_array();

											}

											public function set_visits($slug){


													$this->db->select('*');
												    $this->db->from('posts');
													
													$this->db->where('slug',$slug);
											        $this->db->set('visits','visits+1',false);

											      

											        
											        
											        
											         $this->db->update();

											         //$query =  $this->db->get();

											        // return $query->row_array();

											}

											public function set_num_comments($post_id){


													$this->db->select('*');
												    $this->db->from('posts');
													
													$this->db->where('id_p',$post_id);
											        $this->db->set('num_comments','num_comments+1',false);

											      

											        
											        
											        
											         $this->db->update();

											         //$query =  $this->db->get();

											        // return $query->row_array();

											}

											public function minus_comment($id){

												$this->db->select('*');
												    $this->db->from('posts');
													
													$this->db->where('id_p',$id);
											        $this->db->set('num_comments','num_comments-1',false);

											      

											        
											        
											        
											         $this->db->update();






											}


											public function get_num_likes($slug){

												$this->db->select('*');

												$this->db->from('likes');
													
											    $this->db->where('post_slug',$slug);

											    $query = $this->db->get();

											    return $query->row_array()['number_likes'];



											}

						public function get_group($month)

						{


							$this->db->select('COUNT(id_p) as total,CONCAT(YEAR(created_at),"-",LPAD(MONTH(created_at),2,"0"),"-",LPAD(DAY(created_at),2,"0")) as created_at');

							$this->db->from('posts');

							 $this->db->where('LPAD(MONTH(created_at),2,"0")',$month);



							 $this->db->group_by('DAY(created_at)');

							  $this->db->order_by('created_at', 'asc'); 

							 $query = $this->db->get();

							 return $query->result_array();


						}

						public function get_posts_by_month($month){

							$this->db->select('COUNT(id_p) as total,LPAD(MONTH(created_at),2,"0") as created_at');

							$this->db->from('posts');

							 $this->db->where('LPAD(MONTH(created_at),2,"0")',$month);



							 //$this->db->group_by('DAY(created_at)');

							  //$this->db->order_by('created_at', 'asc'); 

							 $query = $this->db->get();

							 return $query->row_array();








						}




public function get_count() 
	{
        return $this->db->count_all("posts");
    }

    public function get_students($limit, $start,$x,$y,$z) 
	{

		

		$this->db->select('*');
	    $this->db->from('posts');
		
	
	   $this->db->join('categories','categories.id = posts.category_id');
	   $this->db->join('likes','likes.post_slug = posts.slug','left');
	   $this->db->join('users','users.id_users = posts.user_id','left');


		
        $this->db->limit($limit, $start);
        $this->db->order_by($x.'.'.$y,$z);
        $query = $this->db->get();

        return $query->result_array();

                      }

                      public function get_students1($limit, $start,$y) 
	{

		

		$this->db->select('*');
	    $this->db->from('posts');
		
	
	   $this->db->join('categories','categories.id = posts.category_id');
	   $this->db->join('likes','likes.post_slug = posts.slug','left');

		
        $this->db->limit($limit, $start);
        $this->db->where('id', $y);
        $this->db->order_by('posts.id_p','DESC');
        $query = $this->db->get();

        return $query->result_array();

                      }


							public function get_like($keyword){

								$this->db->select('*');
								$this->db->from('posts');
								$this->db->join('categories','categories.id = posts.category_id');
								 $this->db->join('likes','likes.post_slug = posts.slug','left');
								 $this->db->join('users','users.id_users = posts.user_id','left');
								$this->db->like('title', $keyword);
								$this->db->order_by('posts.id_p','DESC');
								$query = $this->db->get();

								return $query->result_array();


							                         }

							                         public function get_like1($keyword,$y){

								$this->db->select('*');
								$this->db->from('posts');
								$this->db->join('categories','categories.id = posts.category_id');
								 $this->db->join('likes','likes.post_slug = posts.slug','left');
								 $this->db->join('users','users.id_users = posts.user_id','left');

								$this->db->like('title', $keyword);

								$this->db->where('id', $y);

								$this->db->order_by('posts.id_p','DESC');
								$query = $this->db->get();

								return $query->result_array();


							                         }


                         public function get_num_comments(){

                         	$q = $this->db->get("comments");





                         	foreach ($q->result_array() as $q) {

                         		$y = $q['post_id'];

                         		$this->db->like('post_id',$y);
                                $this->db->from('comments');
                                

                                $array[$y] = $this->db->count_all_results();

                                

                         	}

                         	return $array;



                         }




                        public function create_post($post_image){

	

						$slug = url_title($this->input->post('title'));

						$posts = $this->db->get('posts');

						foreach ($posts->result_array() as $posts) {

							if($posts['slug'] === $slug){

								$slug = $slug.'-'.rand(1,1000000);

			

										}
										

									}


							$data = array(

								'title' => $this->input->post('title'),
								'slug' => $slug,
								'body' => $this->input->post('body'),
								'category_id' => $this->input->post('category_id'),
								'user_id'     => $this->session->userdata('user_id'),
								'post_image' => $post_image


							);

							return $this->db->insert('posts',$data);



						}

						public function create_custom_marker($markerId,$markerSource){

							// $this->db->get_where('markers',array('marker_id'=>$markerId));

							// 	return $this->db->update('markers',array('source'=>$markerSource));


								$this->db->select('*');
												    $this->db->from('markers');
													
													$this->db->where('marker_id',$markerId);
											     $this->db->set('source',$markerSource);

											      

											        
											        
											        
											         $this->db->update();


						}

						 public function create_marker(){

							$data = array(

								'marker_Title' => $this->input->post('title'),
								'latitude' => $this->input->post('lat'),
								'longitude' => $this->input->post('long'),
								'description' => $this->input->post('textarea'),
								'shortDescription' => $this->input->post('shortTextarea'),
								'user_id'     => $this->session->userdata('user_id')
								


							);

							return $this->db->insert('markers',$data);



						}

						public function get_maxId_marker(){

								$this->db->select_max('marker_id');
                $this->db->from('markers');
                $query = $this->db->get();
                   return $query->row_array();

              









						}

						public function delete_marker($id){

							$this->db->where('marker_id',$id);
									$this->db->delete('markers');

									return true;








						}

						public function upload_image($filename,$id_p){

							$data = array(

								
								'post_id' => $id_p,
								'image_name' => $filename
								

							);

							return $this->db->insert('post_images',$data);








						}

						public function upload_marker_image($filename,$id_p){

							$data = array(

								
								'marker_id_img' => $id_p,
								'image_name' => $filename
								

							);

							return $this->db->insert('marker_images',$data);








						}




						public function get_images($id){

							$query = $this->db->get_where('post_images',array('post_id'=>$id));

							$array = $query->result_array();

							// $arr = array_column($array,"image_name");

							return $array;



						}





									public function create_posts_per_page($variable){

										

										$data = array(

											'posts_per_page' => $variable
											


										);

										

										return $this->db->insert('storepostnumber',$data);

									}



							public function add_like($variable){

								

								$data = array(

									'post_slug' => $variable,
									'number_likes' => 0
									


								);

								

								return $this->db->insert('likes',$data);

							}

							public function update_like($slug,$likes){

								
								


									$data = array(

										'number_likes' => $likes,
										'last_added'   => date("Y-m-d h:i:sa",time())
										






									);

								


									

								$this->db->where('post_slug',$slug);

	                             return $this->db->update('likes',$data);

							}







						public function get_likes($slug = NULL){

							$this->db->where('post_slug',$slug);

							$query = $this->db->get("likes");

							return $query->row_array();

						}



						



								public function delete_post($id){

									$this->db->where('id_p',$id);
									$this->db->delete('posts');

									return true;


								}

								public function delete_post_image($id){

									$this->db->where('id_images',$id);
									$this->db->delete('post_images');

									return true;


								}

								public function update_post($post_image){

									

															
									$data = array(

										'title'=>$this->input->post('title'),
										'slug'=> $this->input->post('slug'),
										'body'=>$this->input->post('body'),
										'category_id'=>$this->input->post('category_id'),
										'post_image' => $post_image


									);

									$this->db->where('id_p',$this->input->post('id_p'));

									return $this->db->update('posts',$data);

									

									


								}

											public function get_categories(){

												$this->db->order_by('name');

												$query = $this->db->get('categories');

												return $query->result_array();








											}

											public function get_markers(){

												//$this->db->order_by('marker_id');

												$this->db->join('users','users.id_users = markers.user_id','left');

	                     // $this->db->join('marker_images','marker_images.marker_id_img = markers.marker_id','left');



												$query = $this->db->get('markers');

												return $query->result_array();








											}

								public function get_posts_by_category($id,$limit,$start){


									$this->db->order_by('posts.id_p','DESC');


								    $this->db->join('categories','categories.id = posts.category_id');
								    $this->db->join('likes','likes.post_slug = posts.slug','left');
								    $this->db->join('users','users.id_users = posts.user_id','left');
								     $this->db->limit($limit, $start);


									

									$query = $this->db->get_where('posts',array('category_id'=>$id));


									return $query->result_array();

								}

								public function count_posts_per_categories($id){

								
								$this->db->order_by('posts.id_p','DESC');


									    $this->db->join('categories','categories.id = posts.category_id');
									    $this->db->join('likes','likes.post_slug = posts.slug','left');


										

										$query = $this->db->get_where('posts',array('category_id'=>$id));

										return count($query->result_array());


							}

							public function get_markers_images($y){

								//$query = $this->db->get_where('marker_images', array('marker_id' => $y));

								$this->db->where('marker_id_img',$y);

								


									$result = $this->db->get('marker_images');

								return $result->result_array();








							}





}









 ?>
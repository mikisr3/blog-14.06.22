<?php 



/**
 * 
 */
class Pages extends CI_Controller
{


	public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url','form','date');
        $this->load->library("googlemaps");
         $this->load->library("googlemapsajax");
		// $this->load->model('post_model');
		$this->load->library('session');
    }

    public function change_marker(){

		 //var_export($this->input->post('markerIcon'));

		 //var_export($this->input->post('input1'));

		 $markerId = $this->input->post('markerIcon');
		 $markerSource = $this->input->post('input1');

		 $this->post_model->create_custom_marker($markerId,$markerSource);

		 $this->session->set_flashdata('marker_changed','Marker Changed');

		 redirect('about');

		 






	}


	
	

	public function view($page = 'home') {

		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {

			show_404();
			
		}

		$data['title'] = ucfirst($page);

		//$n = $this->input->post('marker_id');

		//var_export($n);

		




		

		

		

		$x = $this->post_model->get_markers();





		

		for ($i = 0; $i < count($x); $i++) {

			
			$marker = array();
			$marker['id'] = intval($x[$i]['marker_id']);

			$data['marker_images'] = $this->post_model->get_markers_images($x[$i]['marker_id']);



			//var_export($data['marker_images']);


			$marker['description'] = strval($x[$i]['description']);

			//echo $marker['description'];

			
			//var_export($marker);

			if($x[$i]['marker_Title']){
			$marker['title']=$x[$i]['marker_Title'];
		}else{

			$marker['title']="No Title";


		}
		

			//var_export($marker);
			$marker['ondblclick'] = "


             document.getElementById('myDelete').style.display='grid';

             

			document.getElementById('mark').value=".$marker['id'].";

			

			

			";

			$marker['onrightclick']="

			document.getElementById('markerLista').style.display='block';

			document.getElementById('markIcon').value=".$marker['id'].";







			";

			$marker['onclick'] = "


			document.getElementById('mainCont').style.display='block';
			document.getElementById('title_h2').innerHTML='".$marker['title']."';
			document.getElementById('date_small').innerHTML='Posted on : ".$x[$i]['time_added']."<span> by : <strong>".$x[$i]['username']."</strong></span>';

			 document.getElementById('longDesc').innerHTML = '<div>".str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br/>",$marker['description'])."</div>';

			 document.getElementById('image_row').setAttribute('value', ".$marker['id'].");
			 document.getElementById('myForm').submit();

			


			";


			$marker['title'] = $x[$i]['marker_Title'];
			if(!empty($x[$i]['source'])){

               $marker['icon'] = $x[$i]['source'];


			}
			
			



			 $marker['position'] = floatval($x[$i]['latitude']).", ".floatval($x[$i]['longitude']); 

			  $marker['infowindow_content']='<div id="content">'.
    '<div id="siteNotice">'.
    "</div>".
    '<h1 id="firstHeading" class="firstHeading">'.$x[$i]['marker_Title'].'</h1>'.
    '<div id="bodyContent">'.'<div style="padding-bottom: 13px;white-space:pre-wrap;">'.word_limiter($x[$i]['shortDescription'],60)
    .'</div>'.
    '<p>Date Created : <b>'.$x[$i]['time_added'].'</b></p>'.
    '<p>'.$x[$i]['latitude'].', '.$x[$i]['longitude'].'</p>'.

    '<div><a href="https://www.w3schools.com" target="_blank">Visit W3Schools.com!</a></div>'.
    "</div>".
    "</div>";


		
			$this->googlemaps->add_marker($marker);

			


        }
        if(empty($this->session->userdata('points'))){

            $this->session->set_userdata('inc',0);

           
        }

        $polyline['points'] = array();

            

            //var_export($this->session->userdata('points'));

              

            if(!empty($this->session->userdata('points'))){

              if(count($this->session->userdata('points'))>=2){

              
             for ($i=0; $i < count($this->session->userdata('points')); $i++) { 

             	 array_push($polyline['points'],$this->session->userdata('points')[$i]);

             	 $config['center'] = $this->session->userdata('points')[count($this->session->userdata('points'))-1];


             	 
            	
             }

             
         }

             }




            $this->googlemaps->add_polyline($polyline);

        

        //var_export($polyline['points']);
        //var_export($this->session->userdata('points'));
        //var_export($this->session->userdata('points')[0]);
         //var_export(count($this->session->userdata('points')));

        


                 

                 $config = array();
		$config['geocodeCaching'] = TRUE;

		 if(!empty($this->session->userdata('points'))){$config['center'] = $this->session->userdata('points')[count($this->session->userdata('points'))-1];}else{

		if(count($x)>=1){
		$config['center'] = floatval($x[count($x)-1]['latitude']).", ".floatval($x[count($x)-1]['longitude']); 

	}else{

		$config['center'] = 'auto';
	}}
		$config['zoom'] = '7';
		$this->googlemaps->initialize($config);

//------------------------------------------------------------------------------

		 if(empty($this->session->userdata('points'))){

		$marker = array();
		if(count($x)>=1){
		$marker['position'] = floatval($x[count($x)-1]['latitude']).", ".floatval($x[count($x)-1]['longitude']+1);
		
	}else{
		$marker['position']='auto';
	}
		$marker['draggable'] = TRUE;
		$marker['icon'] = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
		//$marker['icon']='http://maps.google.com/mapfiles/kml/pushpin/ylw-pushpin.png';									
		$marker['icon_size'] = '30,30';
		$marker['icon_anchor'] = '2,35';	
		$marker['zIndex'] = '999';
		
		 $marker['ondragend']="


		 document.getElementById('myDiv').style.display='grid';

		 document.getElementById('txtLat').value=event.latLng.lat();

		 document.getElementById('txtLng').value=event.latLng.lng();

		 ";

		 $marker['animation'] = 'DROP'; 

		  

		 
		
		$this->googlemaps->add_marker($marker);

	 }else{

	

		$marker = array();
		if(count($this->session->userdata('points'))>=1){
		$marker['position'] = $this->session->userdata('points')[count($this->session->userdata('points'))-1];
	}else{$marker['position']='auto';}
	
	
		$marker['draggable'] = TRUE;
		//$marker['icon'] = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
		$marker['icon']='http://maps.google.com/mapfiles/kml/pushpin/ylw-pushpin.png';									
		$marker['icon_size'] = '70,70';
		$marker['icon_anchor'] = '20,68';	
		$marker['zIndex'] = '999';
		
		 $marker['ondragend']="


		 document.getElementById('myDiv').style.display='grid';

		 document.getElementById('txtLat').value=event.latLng.lat();

		 document.getElementById('txtLng').value=event.latLng.lng();

		 ";

		 $marker['animation'] = 'DROP'; 

		  

		 
		
		$this->googlemaps->add_marker($marker);

	 }


	
//--------------------------------------------------------------------------------

		

		$data['map'] = $this->googlemaps->create_map();

		

		

		

		

		$this->load->view('templates/header_vertical',$data);
		 $this->load->view('pages/'.$page,$data);
		// $this->load->view('pages/about',$data);
		$this->load->view('templates/footer');

	
		
	}

	public function multiple_marker_images($id_p){

										

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

									            

									            $this->post_model->upload_marker_image($filename,$id_p);

									            
									   
									          
									          }
									        
									   
									      }

									      
									     

									    

	
											   }
	

	public function create_marker(){

		

		if(!$this->session->userdata('logged_in')){

		redirect('users/login');

	}

	if($this->input->post('exampleReset')){

		

		$this->session->unset_userdata('points');

		//unset($polyline['points']);

		 $polyline['points'] = NULL;

		 redirect('about');



	}

	if($this->input->post('example')){

		

		$b = $this->input->post('lat');
		$c = $this->input->post('long');



		$data = $this->session->userdata('points');

		
		  $data[$this->session->userdata('inc')] = "$b, $c";

		  $this->session->set_userdata('inc',$this->session->userdata('inc')+1);

		 

		$this->session->set_userdata('points', $data);

		//var_export($this->session->userdata('points'));



		

		
		redirect('about');

		

			

		


	}else{

		    $this->post_model->create_marker();

		    $this->multiple_marker_images(intval($this->post_model->get_maxId_marker()['marker_id']));


			$this->session->set_flashdata('marker_created','Marker Created');

			 redirect('about');

		}



	}

	

	public function delete_marker(){

		if(!$this->session->userdata('logged_in')){

		redirect('users/login');

	}


            
            $id = $this->input->post('marker');


		    $this->post_model->delete_marker($id);

			$this->session->set_flashdata('delete_created','Marker Deleted');

			redirect('about');



	}

	
}




















 ?>
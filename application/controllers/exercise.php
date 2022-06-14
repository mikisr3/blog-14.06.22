<?php 



class Exercise extends CI_Controller
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

			

		$data['title'] = 'Exercises';

		$data['categories'] = $this->category_model->get_categories();

		$data['num'] = $this->category_model->get_posts_per_category();


		// var_export($data['num']);

		

		    $this->load->view('templates/header_vertical');
			$this->load->view('exercise/index',$data);
			$this->load->view('templates/footer');


	}

	


	
	


	public function create(){

		

		 $this->session->set_userdata('numFields',$this->input->post('numFields'));

		


	// $data['numfields'] = $this->session->userdata('numFields');

		 $wraper = array();

		 for ($x = 1; $x <= $this->session->userdata('numFields'); $x++) {

		 
		 	array_push($wraper,str_split($this->input->post('seq'.$x)));

  

                 }


	   // $wraper = array(str_split($this->input->post('seq1')),str_split($this->input->post('seq2')),str_split($this->input->post('seq3')));

	    $final = array();

	    $collect = array();



	    //var_export($wraper);

	   $m = 0;
         while($m<count($wraper)-1){
	    for ($i = 0; $i < count($wraper[$m]); $i++) {

	    	for ($j = 0; $j < count($wraper[$m+1]); $j++) {

	    		if($wraper[$m+1][$j] === $wraper[$m][$i]){


	    			array_push($collect,$wraper[$m][$i]);

	    			break;





	    		}


  
                  }
  

               }

               $m++;

               $collect = array_unique($collect);

               array_push($final,$collect);

               $collect = array();

           }

          // echo "<br>";

           //var_export($final);

           //echo "<br>";

          // var_export(array_intersect($final[0],$final[1]));

           switch (count($final)) {
           	case '2':
           		
           		 //var_export(array_intersect($final[0],$final[1]));
           		 $data['final'] = implode("",array_intersect($final[0],$final[1]));

           		break;

           		case '3':
           		
           		 //var_export(array_intersect($final[0],$final[1],$final[2]));
           		 $data['final'] = implode("",array_intersect($final[0],$final[1],$final[2]));

           		break;

           		case '4':

           		// var_export(array_intersect($final[0],$final[1],$final[2],$final[3]));
           		 $data['final'] = implode("",array_intersect($final[0],$final[1],$final[2],$final[3]));
           		

           		break;
           	
           	

           }



           //$data['final'] = implode("",array_intersect($final[0],$final[1]));
           
	
		$data['title'] = 'Exercises';

		

		    $this->load->view('templates/header_vertical');
			$this->load->view('exercise/index',$data);
			$this->load->view('templates/footer');




		


	}

	public function numTimes(){

		//echo $this->input->post('numSeq');

		//$arr = ;

		$range = range("1","100");

		$final = array();

		array_push($final,0);

		$arr = array_map('intval',explode(",",$this->input->post('numSeq')));

		//var_export($arr);
		//var_export(range("1","100"));

		$count = 0;

		for ($x = 0; $x < count($range); $x++) {

			for ($y = 0; $y < count($arr); $y++) {

				if($arr[$y] === $range[$x]){

					$count++;





				}











			}

			array_push($final,$count);
			$count = 0;
		}

		//echo "<br>";

		//var_export($final);

		// for ($x = 0; $x < count($final); $x++) {


		// 	if($final[$x] != 0){


		// 	echo "Number ".$x."->".$final[$x];

		// 	echo "<br>";

		// }









		// }

		$data['final1'] = $final;

		$data['title'] = "Number Count";


		    $this->load->view('templates/header_vertical');
			$this->load->view('exercise/index',$data);
			$this->load->view('templates/footer');












	}

	public function zigZag(){


$sub = array();

$arr = array_map('intval',str_split($this->input->post('zigZag')));

sort($arr);

//$arr = str_split($this->input->post('zigZag'));

 //echo implode("",$arr);

 //echo "<br>";

//echo count($arr);

//echo "<br>";

if(count($arr)%2 === 1){

$temp = $arr[floor(count($arr)/2)];

$arr[floor(count($arr)/2)] = $arr[count($arr)-1];

$arr[count($arr)-1] = $temp;



$y = count($arr)-2;

$x = floor(count($arr)/2)+1;

//echo "<br>";
//echo floor((floor(count($arr)/2)+1)/2);

 while($x < count($arr)- floor((floor(count($arr)/2)+1)/2)) {

 	$temp1 = $arr[$x];

 	$arr[$x] = $arr[$y];

 	$arr[$y] = $temp1;

 	$y--;

 	$x++;




 }

 //var_export($arr);
 //echo "<br>";

//echo implode("",$arr);

$data['final3'] = implode("",$arr);

}else{

	$data['final3'] = "Enter Odd Number!";
}

$data['title'] = "Zig Zag";


		    $this->load->view('templates/header_vertical');
			$this->load->view('exercise/index',$data);
			$this->load->view('templates/footer');

 




	}

	public function maxSubarray(){

		$arr = array_map('intval',explode(",",$this->input->post('maxSub')));

		//echo $this->input->post('maxSub');

		$result = array();

		$seqPos = array();

		//var_export($arr);

		//$maxSum = $arr[0];

		if($arr[0]>=0){

			$maxSum = 0;



		}else{

			$maxSum = $arr[0];




		}

		//$maxSum = 0;

		$maxSeqSum = 0;

		$maxNegative = -99999999999999999999;

		for ($i = 0; $i <= count($arr)-1; $i++){

			if($arr[$i]>=0){

				$maxSeqSum = $maxSeqSum+$arr[$i];

				array_push($seqPos,$arr[$i]);

			}else{

				if($arr[$i]>$maxNegative){

					$maxNegative=$arr[$i];


				}


			}


		}

		if($maxSeqSum===0){


			$maxSeqSum=$maxNegative;



		}






		



		

		for ($x = 0; $x <=count($arr)-1; $x++){

			

			$init = 0;

			$startIndex = $x;

			for ($y = $x; $y < count($arr); $y++){

				$init = $init+$arr[$y];

				if($init>$maxSum){

					$result = array();

					array_push($result,$x+1,$y+1);

					$maxSum = $init;
				}



			}


		}

		//echo "<br>";

		// echo $maxSum;

		// echo "<br>";

		 //var_export($seqPos);

		 //echo implode(",",$seqPos);

        $data['vlez'] = "Input array : [ ".$this->input->post('maxSub')." ].";

        if(!empty($result)){

		$data['out']="Max Sum : ".$maxSum." from elements in range : [".$result[0]."-".$result[1]."].";

	}

		$data['outSeq']="Max Sum : ".$maxSeqSum." from elements : [".implode(",",$seqPos)."].";



		$data['title'] = "Max Subarray";


		    $this->load->view('templates/header_vertical');
			$this->load->view('exercise/index',$data);
			$this->load->view('templates/footer');
















	}

	public function equalStacks(){


$arr = array();

$final = array();

$h1 = array_map('intval',str_split($this->input->post('max1')));

$h2 = array_map('intval',str_split($this->input->post('max2')));

$h3 = array_map('intval',str_split($this->input->post('max3')));

array_push($arr,$h1,$h2,$h3);

array_push($final,array_sum($arr[0]),array_sum($arr[1]),array_sum($arr[2]));

//var_export($arr);

//var_export($final);

//echo "<br>";

while(count(array_unique($final)) != 1){

	array_shift($arr[array_search(max($final), $final)]);

	$final = array();

	array_push($final,array_sum($arr[0]),array_sum($arr[1]),array_sum($arr[2]));

}

//echo "<br>";

//var_export($arr);

//echo "<br>";

//echo $final[0];

$data['output'] = "First Stack Sequence : [ ".implode(",",$h1)." ]."."<br>"."Second Stack Sequence : [ ".implode(",",$h2)." ]."."<br>"."Third Stack Sequence : [ ".implode(",",$h3)." ]."."<br><br>"."Modifed First Stack Sequence : [ ".implode(",",$arr[0])." ]."."<br>"."Modifed Second Stack Sequence : [ ".implode(",",$arr[1])." ]."."<br>"."Modifed Third Stack Sequence : [ ".implode(",",$arr[2])." ]."."<br><br>"."Sum : ".$final[0];

$data['title'] = " Stack Sequence";

$this->load->view('templates/header_vertical');
			$this->load->view('exercise/index',$data);
			$this->load->view('templates/footer');



//array_shift($arr[array_search(max($final), $final)]);

//var_export(array_intersect($final[0],$final[1],$final[2]));










	}

	public function lily(){

		$arr = array_map('intval',explode(",",$this->input->post('lily')));

		//var_export($arr);

		function subLily($arr){

		$new = array();



		$sorted_arr = $arr;

		sort($sorted_arr);

		//var_export($arr);

		

		//echo "<br>";

		//var_export($sorted_arr);

		



		$result = 0;

	for ($x = 0; $x < count($arr); $x++){

		$new[$arr[$x]] = $x;




	}

	//echo "<br>";

	//var_export($new);

	//echo "<br>";

	for ($i = 0; $i < count($arr); $i++){

		
        
        if($arr[$i] != $sorted_arr[$i]){

        	$swap_index = $new[$sorted_arr[$i]];

        	$result++;

        	$temp = $arr[$i];

        	$new[$arr[$i]]=$swap_index;
            
            $arr[$i] = $arr[$swap_index];

            $arr[$swap_index] = $temp;

            
        }

        //var_export($arr);
        //echo "<br>";
        
        
        
        
    }
    

	return  $result;

}

//echo subLily($arr);

$data['res'] =  min(subLily($arr),subLily(array_reverse($arr)));

	// var_export($arr);

	// var_export($new);

$data['title'] = "Lily's Homework";

$this->load->view('templates/header_vertical');
			$this->load->view('exercise/index',$data);
			$this->load->view('templates/footer');











	}

	public function transmiter(){

		$arr = array_map('intval',explode(",",$this->input->post('lily')));

		sort($arr);

		//var_export($arr);

		// 2 4 5 6 7 9 11 12
		// 0 1 2 3 4 5 6  7

		$i = 0;
		$k = 2;
		$count = 0;

		while($i<count($arr)){

			$loc = $arr[$i]+$k;

			while(($i < count($arr))&&($arr[$i]<=$loc)){

				$i++;

			}

			$i--;

			$count = $count+1;

			$loc = $arr[$i]+$k;

			while(($i < count($arr))&&($arr[$i]<=$loc)){

				$i++;


			}


		}

		$data['transmiter'] = $count;

		$data['title'] = "Hackerland Radio Transmitters";

            $this->load->view('templates/header_vertical');
			$this->load->view('exercise/index',$data);
			$this->load->view('templates/footer');




	}

	public function sherlock(){

		$arr = str_split($this->input->post('sherlock'));

		// Write your code here
    $alpha = range("a","z");
    
   
   
    
    $count = 0;
    $result = array();
    
    for ($x = 0; $x < count($alpha); $x++){
        for ($y = 0; $y < count($arr); $y++){
            
            if($arr[$y]===$alpha[$x]){
                
                $count++;
               
            }
              
        }
        if($count > 0){
        array_push($result,$count);
        }
        $count = 0;
    }
    
 
    
    if(count($result) > 1){
    sort($result);
    var_export($result);
    if((($result[0]===$result[count($result)-2])&&(($result[count($result)-2]+1)===$result[count($result)-1]))||
    
    ((($result[count($result)-1])===$result[0])))
    
    {
        
        $out = "YES";
        
        
    }else{
        
        rsort($result);
        
        if(($result[0]===$result[count($result)-2])&&(($result[count($result)-2]-1)===$result[count($result)-1])){
            
            $out = "YES";
        }else{
            
            if(($result[0]===$result[count($result)-2])&&(($result[count($result)-1])===1)){
                
                $out = "YES";
            }else{
                
                $out = "NO";
            }
            
            
        }
        
        
        
    }
    }else{
        $out = "YES";
    }

    $data['out'] = $out;

    $data['title'] = "Sherlock and the Valid String";

            $this->load->view('templates/header_vertical');
			$this->load->view('exercise/index',$data);
			$this->load->view('templates/footer');
   














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
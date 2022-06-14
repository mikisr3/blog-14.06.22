
<?php //var_export($json) ?>

<div class="row" style="height: 100px;">
	<div class="col-md-4 my-auto">
		<h2 class="" style="







		"><?= $title ?></h2>
	</div>



	
	


<div class="col-md-3 offset-md-5 my-auto">
  <input type="search" class="form-control rounded goSubmit" placeholder="Search" aria-label="Search"
    aria-describedby="search-addon" name="<?php if($m){echo $m;} ?>" id="search">
  
</div>
</div>


<hr style="border: 1px solid lightblue;margin-left: -15px;width: 99.6%; ">

<!-- <div class="row justify-content-end"><span>Logged as  :  <strong><?php echo $this->session->userdata('username'); ?></strong></span></div> -->
<div id="demo1"></div>

<div id="demo" style="">
	

<?php 



foreach ($posts as $post) {

	?>

				<h3 style="


				margin-top: 100px;
				margin-top: 100px;
		   
		    width: fit-content;
		    padding: 6px 7px;
		    border: 1px solid #00000029;





				"><?php echo $post['title']; ?></h3>
			
				<div class="row" style="

				padding: 16px;

    box-shadow: inset -3px -3px 7px #ffffff73, inset 3px 3px 5px rgb(94 104 121 / 29%);





				">
					<div class="col-md-3 text-center my-auto "> 

						<img  src="

						<?php if(($post['post_image'] === 'noimage.jpg') || ($post['post_image'] === '')){

							echo site_url() ?>assets/images/posts/noimage.jpg<?php

							

						}else{

							echo site_url() ?>assets/images/posts/<?php

					        echo $post['post_image'];
							
						} ?>" width="150" height="150" alt="">


					</div>
					<div class="col-md-9">

						<!-- padding: 5px;margin-top: 5px;margin-bottom:5px;display: block; -->

						<div class="row">
							<div class="col-md-6">
								<small style="">Posted on : <?php echo $post['created_at']; ?>

				 in <strong><?php echo $post['name']; ?></strong>  </small>
							</div>
							<div class="col-md-6 text-right">
								<small>Posted by : <strong><?php echo $post['username']; ?></strong></small>
							</div>

				 
						</div>

				 <hr style="">

				<?php echo word_limiter($post['body'],60) ?>


				
                <div class="">
				<div class="row comments" style="width: 43%;">
					<p class="col-md-2 my-auto" style="padding: 0px 0px;"><small>	<a class="col btn btn-primary" style="" href="<?php echo site_url('/posts/'.$post['slug']); ?>">More</a></small></p>

				<p class="col-md-3 my-auto" style="text-align: center;border-right: 1px solid darkgrey;"><small><span><strong>Likes : </strong></span> <?php


				if($post['number_likes']){

					 echo $post['number_likes'];


				}else{echo "0";}


				 ?> </small></p>

				<p class="col-md-3 my-auto" style="text-align: center;border-right: 1px solid darkgrey;"><small><span><strong>Com : </strong></span> <?php 


				 

				 $x = $post['id_p'];


				 	 if(isset($num_post_comments[$x])){



				 	 	echo $num_post_comments[$x];



				 	 }else{echo 0;}

				 	

				 ?></small></p>

				 <p class="col-md-3 my-auto" style="text-align: center;"><small><span><strong>Views : </strong></span>

				 	<?php echo $post['visits'] ?>



				 </small></p>
				

				</div>
				</div>

				<hr>
						

					</div>
				</div>






					<?php





					
				} ?>



			</div>


			<hr style="border: 1px solid lightblue;margin-left: -15px;width: 99.6%; ">


			<div class="row align-items-center">
				<div class="col-md-9">
					<p><?php


			if(isset($links)){

				echo $links;

			}

			  ?></p>

				</div>

			 
                   <!--  <div class="col-md-3">


                    	<?php 


                    	//echo form_open('posts');
            // $options = array(
                            
            //                  '1' => '1',
            //                   '2' => '2',
            //                   '3' => '3',
            //                   '5' => '5'

            //              );
          //  echo '<div class="d-inline">'.form_dropdown('sel',$options,$page_selected,'class = "select"','id = "myselect"').'</div>';
           // echo '<div class="d-inline">'.form_submit('submit','GO','class="x"').'</div>';


                    	 ?>
 

                    </div>    -->

                    <div class="col-md-3" >
                    	
                    	<form action="posts" method = "POST">
                    		<div>
                    			<select name="sel" id="myselect" onchange="return this.form.submit()" class="select">
                    				<option value="1" <?php 

                    				if($page_selected === "1"){

                    					echo "selected";

                    				}

                    				 ?>>1</option>
                    				<option value="2" <?php 
                    				if($page_selected === "2"){

                    					echo "selected";

                    				}
                    				 ?>>2</option>
                    				<option value="3" <?php
                    				if($page_selected === "3"){

                    					echo "selected";

                    				} 
                    				 ?>>3</option>
                    				<option value="4" <?php 
                    				if($page_selected === "4"){

                    					echo "selected";

                    				}
                    				 ?>>4</option>
                    				<option value="5" <?php 

                    				if($page_selected === "5"){

                    					echo "selected";

                    				}


                    				 ?>>5</option>
                    			</select>
                    		</div>



                    	</form>
                    </div>

                    </div>                    
  

				<script type='text/javascript'>

						  
						 
						   $('#search').keyup(function(){

						    var username = $(this).val();

						    var username1 = $(this).attr("name");

						    $.ajax({

						     url:'http://localhost/blog/ajax-post',

						     method: 'post',

						     data: {result: username,result1: username1},

						     
						     
						     success: function(response){

						       console.log(response);

						       $('#demo').html(response);
						 
						     }

						   });

						  });

// ============================================================================================================================						   

						   $("li").click(function () {

                               $(this).addClass("active").siblings().removeClass("active");

                            });

   // ======================================================================================================================

						   $("sel").change(function(){

								    $(this).removeClass($(this).attr('class'))

								           .addClass($(":selected",this).attr('class'));


								});

// ================================================================================================================================

						$('#page_step').on('change',function(){

						    var username = $(this).val();

						    $.ajax({

						     url:'http://localhost/blog/ajax-post1',

						     method: 'post',

						     data: {result1: username},

						     
						     
						     success: function(response){

						       console.log(response);
						        $('#demo1').html(response);

						      
						 
						     }

						   });

						  });

// ==========================================================================================================================================


						 

						  

						   


						 
                 </script>


				






				









				   
				











                






	




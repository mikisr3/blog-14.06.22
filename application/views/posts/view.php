<div style="margin-top: 100px;">
	<h2><?php echo  $post['title'] ;  ?></h2>



	<?php 

	// echo $post['id_p'];

     $slug = explode("/",current_url())[5];

     // echo $slug;


	 ?>

	<?php  ?>



<small style="display: block;margin-top: 10px;margin-bottom: 10px;">Posted on : <?php echo $post['created_at']  ?><span> by : <strong><?php echo $post['username']; ?></strong></span></small>

                 <img  src="

						<?php if(($post['post_image'] === 'noimage.jpg') || ($post['post_image'] === '')){

							echo site_url() ?>assets/images/posts/noimage.jpg<?php

							

						}else{

							echo site_url() ?>assets/images/posts/<?php

					        echo $post['post_image'];
							
						} ?>" width="150" height="150" alt="">
				

<div class="" style="margin-top: 30px;">

	<?php echo $post['body']; ?>

	<hr>

	<div class="d-flex flex-row align-top" style="">

		<?php if($this->session->userdata('user_id') === $post['user_id']){ ?>

		<?php echo form_open('/posts/delete/'.$post['id_p']); ?>

	<input type="submit" value="delete" class="btn btn-danger">



     </form>

     <a style="margin-left: 10px;margin-bottom: 15px;" class="btn btn-info" href="edit/<?php echo $post['slug']; ?>">Edit</a> 

         




     
 <?php } ?>

 <?php echo form_open('/posts/images/'.$post['id_p']); ?>

	

	<input type="hidden" name="image_slug" value="<?php echo $post['slug']; ?>">

	<input type="hidden" name="imageTitle" value="<?php echo $post['title']; ?>">

	<input type="hidden" name="imageUsername" value="<?php echo $post['username']; ?>">

	
		<button type="submit"  style="margin-left: 10px;text-align: center;" value="View Photos" id="submitWarning" class="btn btn-warning">Photos<span class="popuptext" id="myPopup"><?php echo $photos; ?></span></button>
	



     </form>

   <?php if($this->session->userdata('user_id') != $post['user_id']){ ?>
     <div style="display:block;width:300px;height: 39px;border-radius: 5px;" class="ml-2">

				
 
				     	
				     		<div class="row">
				     			<div class="col-md-3">
				     				<img id="image" src="

				     	<?php echo site_url() ?>assets/images/posts/like1.jpg" alt="" style="width: 52.8px;height: 39px;" style = "cursor: pointer;">

				    

				     			</div>

				     			<div class="col-md-9 my-auto" style="margin-left: -30px;" id="num_likes">
				     				<?php echo $post['number_likes']; ?>
				     			</div>
				     			

				     		</div>
                            
				     	


     
     </div> 

     <?php } ?>



     



     



     <!-- <p style="padding:5px;margin-left: 20px;">Comments : 5</p> -->
	</div>



	<hr style="border: 2px solid lightblue;">

	<h3>Comments :</h3>




	<?php if($comments){

		$i = 0;

		foreach ($comments as $comments) {

			$i++;


			?><div class="card-body mt-2" id="zoom" onclick="onClick(this)">

				<p class="comments_number"><?php echo $i; ?></p>

				<?php echo form_open('/comments/delete_comment/'.$comments['id']); ?>

				<input type="hidden" name="comment_slug" value="<?php echo $slug; ?>">
				<input type="hidden" name="delete_comment_from_posts" value="<?php echo $post['id_p']; ?>">

				<button id="delete_image" class="deleteComment" style="

			/*	height: fit-content;
				cursor: pointer;
				border:none;*/
				/*margin-top: -1px;*/
				/*position: absolute;
                margin-left: 1064px;

                margin-top: -13px;*/
               

				"><i style="

				opacity: 0.3;
				color: red;
				
				" class="fa fa-trash fa-2x" aria-hidden="true"></i></button>

			</form>

				<div style="margin-top: 32px;overflow: auto;height: auto;"><?php echo word_limiter($comments['body'],60) ?></div>
				<div style="display: none;"><?php echo $comments['body']; ?></div>
				<small style="

				/*border: 1px  solid #00000052;
*/
				    font-family: cursive;
				    color: brown;
				    margin-left: -17px;
				    position: absolute;
				    margin-top: -2px;
				    box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgb(94 104 121 / 29%);

				"><strong style="font-weight:500; "> <?php echo $comments['name'] ?></strong></small>
				
			</div><?php



			
		}


	}else{

		?> 


		<p>No Comments</p>




		<?php





	} ?>

	<div id="modal01" class="" style="

	  z-index: 3;
    display: none;
    padding-top: 100px;
    transition: transform 0.8s; 

    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    /*display: block;*/
    
	">
  <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
  <div class="w3-modal-content" style="

  ">
    <div id="divModal" style="width: 100%;">
    	
    
    </div>

    <button id="closeButton" style="

  	position: absolute;
    margin-left: 1108px;
    margin-top: 7px;
    border: none;




  	">Close</button>

    

  </div>

  	
  	
 

  
</div>

	

	<hr style="border: 2px solid lightblue;">




	<!-- <h3>Add Comment</h3> -->
	<?php if($this->session->userdata('logged_in')) {?>

		<?php if($this->session->userdata('user_id') != $post['user_id']) {?>

	<?php echo form_open('comments/create/'.$post['id_p']); ?>
	<p>
		  <a class="btn btn-primary" data-toggle ="collapse" href="#collapseExample" role="button" aria-expanded="false" data-target = "#collapseExample" aria-controls="collapseExample">
		    Add Comment
		  </a>
  
    </p>
<div class="collapse" id="collapseExample">


  <textarea  name="body" id="editor1" class="form-control" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);" placeholder="<?php echo form_error('body'); ?>" autofocus></textarea>

  <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">

  <button type="submit" class="btn btn-primary mt-3" >Submit</button>
	

		

			</div>

			</form>



			

		<?php } ?>

		<?php if($this->session->userdata('user_id') == $post['user_id']) {?>

				<?php echo form_open_multipart('comments/multiple_images/'.$post['id_p']); ?>

					<input type="hidden" name="image_slug" value="<?php echo $post['slug'] ?>">

				<div class="row"> 
    <div class="col-md-3 my-auto">
      <div class="file-input">

    
        <input type="file" name='files[]' size="20" id="file" class="file" accept="image/*" onchange="showImageHereFunc();" multiple="multiple">
    <label for="file">Select Image

    <!--   <p class="file-name"></p> -->

      


    </label>
    

    
  </div>
    </div>
  <div class="col-md-8">
    <div class="row" id="showImageHere">
            
        </div>
  </div>

  
  </div>
  <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
	


			</form>



			<?php } ?>
		<?php } ?>

	



		<!-- <div class="form-group mt-5">
			<label>Name</label>

			<input type="text" name="name" class="form-control" placeholder="<?php echo form_error('name'); ?>" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">
		</div> -->

		<!-- <div class="form-group mt-5">
			<label>Email</label>
			<input type="email" name="email" class="form-control" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);" placeholder="<?php echo form_error('email'); ?>">
		</div> -->

		<!-- <div class="form-group mt-5">
			<label>Body</label>
			<textarea  name="body" id="editor1"> class="form-control" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);" placeholder="<?php echo form_error('body'); ?>"></textarea>
		</div> -->
		

		







	

</div>
</div>


                      

                      <script type='text/javascript'>

                      

									 $('#image').click(function(){


                                        $("#image").attr('src',"http://localhost/blog/assets/images/posts/like2.jpg");

						    
						    $.ajax({

						     url:'http://localhost/blog/ajax-post1',

						     method: 'post',

						     data: {result: "<?php echo $post['slug']; ?>", result1:<?php echo ++$post['number_likes']; ?>},

						     
						     
						     success: function(response){

						       console.log(response);

						       $('#num_likes').text(response);
						 
						     }

						   });

						  });

									 function showImageHereFunc() {

								  var total_file=document.getElementById("file").files.length;

								  for(var i=0;i<total_file;i++) {

									    $('#showImageHere').append("<div class='col-md-3 mt-3'><img class='' width='150' height='150'  src='"+URL.createObjectURL(event.target.files[i])+"'></div>");

									  }

									}

									function onClick(element) {

																  var c = element.children;

																  // console.log(c[2].innerHTML);


																   document.getElementById("divModal").innerHTML = c[3].innerHTML;

																   document.getElementById("modal01").style.display = "block";

																   const closeButton = document.getElementById('closeButton');

																   closeButton.addEventListener('click',function(){

																document.getElementById("modal01").style.display = "none";



																});

																  
																  
																}

														



                      </script>

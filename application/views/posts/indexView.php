<?php
	
	foreach ($posts as $post) {

	?>

				<h3 style="margin-top: 100px;"><?php echo $post['title']; ?></h3>
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


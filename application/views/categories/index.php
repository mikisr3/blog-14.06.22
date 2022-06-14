<h2 style="

margin-top: 100px;
margin-left: 381px;




"><?= $title; ?></h2>

<?php //echo base_url(); ?>


	<ul class="list-group" style="margin-top: 87px;">

		<div class="row">
			<div class="col-md-3 offset-md-3 mb-3" style="display: flex;max-width: 342px;">
				<li class="" style="width: 322px;list-style: none;"><span><small>Log as : <strong><?php echo $this->session->userdata('username') ?></strong></small></span></li>
			</div>
		</div>
	
	<?php foreach ($categories as $i) {

		?>

		
			<div class="row">
			
				<div class="col-md-3 offset-md-3" style="display: flex;max-width: 342px;">
				<li class="list-group-item" style="width: 322px;"><a href="<?php echo site_url('categories/posts/'.$i['id']); ?>"><?php echo $i['name']; ?><span><small style="

				float: right;
				


}



				">Posts : <strong style="color: green;"><?php 

				for($x = 0;$x<count($num);$x++){

					$check = false;

					switch ($i['id']) {

					
					    case $num[$x]['category_id']:

						echo $num[$x]['total'];

						 $check = true;

						break;

						
				}

				if($check){break;}


				}

				if(!$check){echo 0;}


				 ?></strong></small></span></a></li>

				 <?php //echo $this->session->userdata('user_id'); ?>

				 <?php if($this->session->userdata('user_id') === $i['user_id']){ ?>
				
					<?php echo form_open('/categories/delete/'.$i['id']); ?>
			
			<input type="submit" class="btn-link text-danger" style="

			height:50px;
			/*margin-left: -39px;*/
			width: 44px;
			margin-top: 0px;
			position: absolute;

			" value="[X]">
			

					</form>

				<?php } ?>

					
				
			</div>
			
			<!-- <div class="col-md-1"> -->
				
						<!-- </div> -->
			

					
					</div>
					

					<?php } ?>

			</ul>



		








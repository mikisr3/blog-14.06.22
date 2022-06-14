

<?php //echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>

<div class="row" style="margin-top: 100px;">
	<div class="col-md-4 offset-md-4">
		<h1 class="text-center"><?= $title; ?></h1>
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name" placeholder="<?php 

					if(form_error('name')){

						      echo form_error('name');

						    }else{echo 'Name';}




					 ?>" style = "

					  <?php if(form_error('name')){ ?>

     	                  border-color: red;
      

                             <?php } ?>

					  "







					  >
				</div>
					<div class="form-group">
					<label for="">Zipcode</label>
					<input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
				</div>
					<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" name="email" placeholder="<?php 

						if(form_error('email')){

						      echo form_error('email');

						    }else{echo "Email";}


					 ?>" style = "

					  <?php if(form_error('email')){ ?>

     	                  border-color: red;
      

                             <?php } ?>


					 ">
				</div>
					<div class="form-group">
					<label for="">Username</label>
					<input type="text" class="form-control" name="username" placeholder="<?php 


					if(form_error('username')){

						      echo form_error('username');

						    }else{echo "Username";}



					 ?>" style="

					 					  <?php if(form_error('username')){ ?>

						     	                  border-color: red;
						      

						                             <?php } ?>




					  ">
				</div>
					<div class="form-group">
					<label for="">Password</label>
					<input type="password" class="form-control" name="password" style="

					 

						<?php if(form_error('password')){ ?>

						     	                  border-color: red;
						      

						                             <?php } ?>

					" placeholder="<?php
					if(form_error('password')){

						      echo form_error('password');

						    }else{echo "Password";}







					?>"


					>
				</div>
					<div class="form-group">
					<label for="">Confirm Password</label>
					<input type="password" class="form-control" name="password2" placeholder="<?php
					if(form_error('password2')){

						      echo form_error('password2');

						    }else{echo "Confirm Password";}







					?>" style = "

					 <?php if(form_error('password2')){ ?>

						     	                  border-color: red;
						      

						                             <?php } ?>

					">
				</div>

				<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</div>




<?php echo form_close(); ?>

<script>

	if($('name').val()) {
    $('name').focus();
}
	







</script>


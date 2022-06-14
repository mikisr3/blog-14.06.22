<h2 style="margin-top: 40px;margin-bottom: 40px;"><?=  $title;  ?></h2>

<?php //echo validation_errors();  ?>

<!-- <form style="margin-top: 100px;"> -->
	<?php echo form_open_multipart('posts/create'); ?>
  <div class="mb-3">
    <label style="

    <?php if(form_error('title')){ ?>

     	color: red;

     <?php } ?>







    ">Title</label>

    <input type="text" class="form-control" name="title" placeholder="<?php

    if(form_error('title')){

      echo "You Must add Title!";

    }else{echo "Add Title";}



      ?>" style="


     <?php if(form_error('title')){ ?>

     	border-color: red;
      

     <?php } ?>

    box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);" >

  </div>
  <div class="mb-3 mt-5">
    <label  class="form-label" style="

    <?php if(form_error('body')){ ?>

     	color: red;

     <?php } ?>




    ">Body</label>
    <textarea id="editor1"  class="form-control" name="body" placeholder="Add Body" style="

     background-color: red;




    "></textarea> 
  </div>


  <div class="form-group">

  	<label for="">Category</label>

			  	<select name="category_id" id="" class="form-control" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">


			  		<?php 

			  		foreach ($categories as $category) { 

  			 ?>

  			<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>

				  			<?php
				  		}

				  		?>
				  		
				  	</select>

	</div>

	<div class="row"> 
    <div class="col-md-3 my-auto">
      <div class="file-input">

    
        <input type="file" name="userfile" size="20" id="file" class="file" accept="image/*" onchange="loadFile(event)" />
    <label for="file">Select Image

      <p class="file-name"></p>

      


    </label>
    

    
  </div>
    </div>
  <div class="col-md-8">
    <img id="output_create" width="200" height="200">
  </div>
  </div>


					  
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>

         <!--  <script type='text/javascript'>

            var loadFile = function(event) {

                var output = document.getElementById('output_create');

                output.src = URL.createObjectURL(event.target.files[0]);

                output.onload = function() {

                URL.revokeObjectURL(output_create.src) // free memory

                    }

                  };
            
          </script> -->





















  	

<h2 style="margin-top: 40px;margin-bottom: 40px;"><?=  $title;  ?></h2>

<?php echo validation_errors();  ?>

<!-- <form style="margin-top: 100px;"> -->
	<?php echo form_open_multipart('posts/update'); ?>

  <input type="hidden" value = "<?php echo $post['id_p']; ?>" name = "id_p">
  <div class="mb-3">
    <label>Title</label>
    <input type="text" value="<?php echo $post['title'] ?>" class="form-control"  name="title" placeholder="Title" >
    <input type="hidden" value="<?php echo $post['slug'] ?>" class="form-control" name="slug" > 
    
  </div>
  <div class="mb-3 mt-5">
    <label  class="form-label">Body</label>
    <textarea  id="editor1"   class="form-control" name="body"  placeholder="Add Body"><?php echo $post['body'] ?></textarea> 
  </div>

  <div class="row mt-5">
    <div class="col-md-3 text-center my-auto">
      <img  src="

            <?php if(($post['post_image'] === 'noimage.jpg') || ($post['post_image'] === '')){

              echo site_url() ?>assets/images/posts/noimage.jpg<?php

              

            }else{

              echo site_url() ?>assets/images/posts/<?php

                  echo $post['post_image'];
              
                    } ?>" width="150" height="150" alt="">
                      </div>

                    <div class="form-group col-md-9 text-center my-auto">
                      <!-- <label for="file-upload">Upload Image</label>
                      <input type="file" id="file-upload" name="userfile" size="20" > -->
                      <div class="file-input">

                      
                          <input type="file" name="userfile" size="20" id="file" class="file" />
                          <label for="file">Select Image

                                <p class="file-name"></p>


                          </label>
    

    
                      </div>

                    </div>
    </div>
    <input type="hidden" value="<?php echo $post['post_image']; ?>" name="post_image">

<?php 





 ?>
                                
  <div class="form-group mt-5">

    <label for="">Category</label>

          <select name="category_id" id="" class="form-control">


            <?php 

            foreach ($categories as $category) { 

         ?>

        <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>

                <?php
              }

              ?>
              
            </select>

  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
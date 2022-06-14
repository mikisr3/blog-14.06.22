
	
<div class="slidecontainer">
    		<div style="display: flex;">
    			<p><span style="white-space: pre;">Radius : </span></p>
    		<p id="txtHint"><?php echo $sliderajax; ?></p>
    		</div>
  <input type="range" name="slider"  min="1" max="500" value="<?php echo $sliderajax; ?>" id="step" style="width: 100%;">
    	</div>
    	


		<?php echo form_open_multipart('pages/delete_marker'); ?>
  <div id="myDelete" style="

    	display: none;
	    width: 22%;
	    border: 1px solid #00000030;
	    padding: 18px;
	    border-radius: 17px;
	    position: absolute;
	    z-index: 999;
	    background:rgb(197 232 197 / 50%);
	    margin-left: 17%;
    margin-top: -3%;


    	">

    	
  	<div class="form-group">
  		<button type="button" class="close" onclick="document.getElementById('myDelete').style.display = 'none'" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>



  </div>
  <div class="form-group">
  	<label for="">Marker ID:</label>
    
    <input type="text" class="form-control" id="mark" name="marker" style="color:red" value="">
  </div>
  <button type="submit" class="btn" style="background:#ea43356e ;">Delete</button>
  </div>
</form>


    <?php echo form_open_multipart('pages/create_marker'); ?>
  <div id="myDiv" style="

    	display: none;
	    width: 22%;
	    border: 1px solid #00000030;
	    padding: 18px;
	    border-radius: 17px;
	    position: absolute;
	    z-index: 999;
	    background:rgb(197 232 197 / 50%);
	    margin-left: -22%;
    margin-top: -6%;





    	">

    	
  	<div class="form-group">
  		<button type="button" class="close" onclick="document.getElementById('myDiv').style.display = 'none'" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
    <label for="">Latitude:</label>
    <input type="text" class="form-control" id="txtLat" name="lat" style="color:red" value="" aria-describedby="">
   <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="">Longitude:</label>
    <input type="text" class="form-control" id="txtLng" name="long" style="color:red" value="">
    
  </div>
  <div class="form-group">
    <label for="">Title:</label>
    <input type="text" class="form-control" name="title" style="" value="" aria-describedby="">
   <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
  	<label for="">Description:</label>
  	<textarea name="textarea" rows="4" cols="50" maxlength = "255"  class="form-control" name="body" placeholder="Add Body" style="

    




    "></textarea> 
  	
  </div> 
  <button type="submit" class="btn" style="background:#ea43356e ;">Store Marker</button>
  </div>
</form>

<?php echo $mapajax['htmlajax']; ?>





<script>
	$('#step').on('change',function(){

						    var username = $(this).val();

						    var username1 = $(this).attr('id');

						    $.ajax({

						     url:'http://localhost/blog/ajax-post2',

						     method: 'post',

						     data: {result1: username,result2: username1},

						     
						     
						     success: function(response){

						     	//console.log(response);

						      
    
						        //$('#txtHint').html(response);
						          $('#demo3').html(response);


						      
						 
						     }

						   });

						  });

	//console.log(document.getElementById('txtHint').value);
</script>


	


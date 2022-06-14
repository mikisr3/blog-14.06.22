<span><p style="
text-align: center;
    margin-top: 37px;



">Images for : <strong style="font-size: 28px;"><?php echo $title; ?></strong></p></span>

<?php //echo $id_p; ?>

<div class="container">

	<div class="row">

		<?php foreach ($images as $images ) { ?>

			
			<div id="gallery" class="col-lg-3 col-md-6 col-12  mt-5" style="display: flex;

			transition: transform 0.8s; 


			"><img class="" id="<?php echo $images['id_images'];  ?>" onclick="onClick(this)" width="200"  height="200"  src="<?php echo site_url() ?>assets/images/posts/<?php echo $images['image_name']; ?>"
				>
				<div class="full_delete_div" style="width: min-content;margin-left: -31px;margin-top: 5px;">

					<!-- <button id="full_image" style="height: fit-content;cursor: pointer;border:none;"><i style="opacity: 0.3;" class="fa fa-expand fa-2x" aria-hidden="true"></i></button> -->

					<?php if($this->session->userdata('username') === $username){ ?>

					<?php echo form_open('/posts/delete_gallery_image/'.$images['id_images']); ?>

					<input type="hidden" name="id_p" value="<?php echo $id_p; ?>">

					<button id="delete_image" style="height: fit-content;cursor: pointer;border:none;margin-top: -1px;"><i style="opacity: 0.3;color: red;" class="fa fa-trash fa-2x" aria-hidden="true"></i></button>

				</form>

			<?php } ?>
				


				</div>








			</div>
			
		<?php } ?>
	</div>

	<div id="modal01" class="" onclick="


	 //this.style.display='none';
	



	" style="

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
    
    
}

	
 



	">
  <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
  <div class="w3-modal-content" style="width: 780px;

 /* animation-duration: 0.8s;
    animation-timing-function: ease;
    animation-delay: 0s;
    animation-iteration-count: 1;
    animation-direction: normal;
    animation-fill-mode: none;
    animation-play-state: running;*/






  ">
    <div id="panzoom">
    	<img id="img01" style="


    width:100%;
   



    ">
    
    </div>

    

  </div>

  <div class="buttons">
  	<button id="buttonZoomIn">Zoom in </button>
  	<button id="buttonZoomOut">Zoom out </button>
  	<button id="Reset">Reset</button>
  	<button id="closeButton">Close</button>
  </div>
</div>

</div>

<script>

	var scale = true;

	const elem = document.getElementById('panzoom');

	const buttonZoomIn = document.getElementById('buttonZoomIn');
	const buttonZoomOut = document.getElementById('buttonZoomOut');
	const resetButton = document.getElementById('Reset');
	const closeButton = document.getElementById('closeButton');

const panzoom = Panzoom(elem, {

      // options here

      cursor: 'move',
      step: 0.3,

      maxScale:5

});


buttonZoomIn.addEventListener('click',panzoom.zoomIn);

buttonZoomOut.addEventListener('click', panzoom.zoomOut);
resetButton.addEventListener('click', panzoom.reset);
closeButton.addEventListener('click',function(){

document.getElementById("modal01").style.display = "none";



});


// elem.parentElement.addEventListener('wheel', panzoom.zoomWithWheel);	

	function onClick(element) {

  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  
}

</script>
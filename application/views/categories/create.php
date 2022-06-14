<h2 style="margin-top: 100px;"><?= $title;  ?></h2>





<?php echo validation_errors(); 






 ?>

 <?php echo form_open_multipart('categories/create','id="event-notify-form"'); ?>

						 <div class="form-group" style="margin-top: 50px;">

						 	<label for="">Name</label>

						 	<input type="text" class="form-control" name="name" placeholder="Enter name" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">






						 </div>

						  <input type="hidden" name="CatId" />

						 <div class="panel-group">

           <div class="panel panel-default">
          <div class="panel-heading">
        <h4 class="panel-title">                   <!-- nav-link dropdown-toggle -->
          <a class="" data-toggle="collapse" onclick="func();" href="#collapse1" style="color: #00000047;">Parent Category<span id="arrow" class = "caret-down"></span></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">

        <ul class="list-group">
        	<?php foreach ($categories as $i) { 

            if($i['parent']==='0'){


            ?>
         <a data-toggle="collapse" href="#mite<?php echo $i['id'] ?>" id="<?php echo $i['id'] ?>"><li class="alt"><?php echo $i['name']  ?></li></a>

          <div id="mite<?php echo $i['id']  ?>" class="panel-collapse collapse" >

         <?php foreach($categories as $j) { ?>

          

           <?php if($j['parent']===$i['id']){ ?>

          

             <a data-toggle="collapse"  href="#mitemite<?php echo $j['id'] ?>" id="<?php echo $j['id'] ?>"><li class="alt" style="margin-left: 20px;"><?php echo $j['name']  ?></li></a>

             <div id="mitemite<?php echo $j['id']  ?>" class="panel-collapse collapse" >

              <?php foreach($categories as $m) { ?>

          

           <?php if($m['parent']===$j['id']){ ?>

            <a data-toggle="collapse"  href="#<?php echo $m['id'] ?>" id="<?php echo $m['id'] ?>"><li class="alt" style="margin-left: 40px;"><?php echo $m['name']  ?></li></a>


           

           <?php } ?>



            <?php } ?>

              </div>

             <?php } ?>





            <?php } ?>

             </div>




          

       
         
         
          <?php } }?>
        </ul>
        
      </div>
    </div>
  </div>

 <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>






</form>

<script>
  var x = true;
function func(){

  if(x){

document.getElementById("arrow").classList.add("caret-reversed");

x = false;

  }else{

document.getElementById("arrow").classList.remove("caret-reversed");

x = true;
  }






}




</script>
<h2 style="margin-top: 100px;"><?= $title;  ?></h2>





<?php echo validation_errors(); 






 ?>

 

 <?php 






 echo form_open_multipart('exercise/create','id="event-notify-form"')?>

 <div style="width: fit-content;
    float: right;margin-bottom: 10px;">
    <label for="">Number of Fields</label>
   <select name="numFields" id="" class="select" onchange="return this.form.submit()">

  <option value="3"<?php 

  

    if($this->session->userdata('numFields') === "3"){

                              echo "selected";

                            }


  


   ?>>3</option>
  <option value="4"<?php 

  

    if($this->session->userdata('numFields') === "4"){

                              echo "selected";

                            }


  



   ?>>4</option>
  <option value="5"<?php 



    if($this->session->userdata('numFields') === "5"){

                              echo "selected";

                            }


  


   ?>>5</option>
 
   



 </select>
 </div>
<p style="

font-size: 30px;
              font-weight: 600;
              text-decoration: underline;
              margin-bottom: 41px;
              margin-top: 56px;






">Common letters</p>
<?php for ($x = 1; $x <= $this->session->userdata('numFields') ; $x++) { ?>

   <div class="form-group" style="margin-top: 50px;">

              <label for="">Sequence <?php echo $x; ?></label>

              <input type="text" class="form-control" name="<?php echo "seq".$x; ?>" placeholder="Enter Sequence(only letters)" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>



<?php } ?>


						<!--  <div class="form-group" style="margin-top: 50px;">

						 	<label for="">Sequence 1</label>

						 	<input type="text" class="form-control" name="seq1" placeholder="Enter Sequence(only letters)" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

						 </div>
              <div class="form-group" style="margin-top: 50px;">

              <label for="">Sequence 2</label>

              <input type="text" class="form-control" name="seq2" placeholder="Enter Sequence(only letters)" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
              <div class="form-group" style="margin-top: 50px;">

              <label for="">Sequence 3</label>

              <input type="text" class="form-control" name="seq3" placeholder="Enter Sequence(only letters)" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div> -->

             <p>Common letters for all Sequences : <?php

             if(!empty($final)){

              echo " ".strtoupper($final);




             }else{

              echo "Empty Output!";




             }





               ?></p>

						 

						
  

 <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>






</form>

<hr style="color:1px solid black;">


<?php echo form_open_multipart('exercise/numTimes') ?>
 <div class="form-group" style="margin-top: 50px;">

              <label style="

              font-size: 30px;
              font-weight: 600;
              text-decoration: underline;
              margin-bottom: 41px;


              " for="">Count Duplicates </label>

              <input type="text" class="form-control" name="numSeq" placeholder="Enter Number Sequence(comma separated)" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
             

             

            
  

 <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>

</form>

<div>
  <?php 


if(!empty($final1)){
for ($x = 0; $x < count($final1); $x++) {


  if($final1[$x] != 0){


      echo "Number ".$x."->".$final1[$x];

      echo "<br>";

    }
  
}









}







   ?>
</div>
<hr style="color:1px solid black;">
<?php echo form_open_multipart('exercise/zigZag') ?>
 <div class="form-group" style="margin-top: 50px;">

              <label style="

              font-size: 30px;
              font-weight: 600;
              text-decoration: underline;
              margin-bottom: 41px;





              " for="">Zig Zag</label>

              <input type="text" class="form-control" name="zigZag" placeholder="Enter Number Sequence" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
             

             

            
  

 <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>

</form>

<div>
  <p>Zig Zag Sequence : <?php 



if(!empty($final3)){

  echo $final3;} ?></p>
</div>
<hr style="color:1px solid black;">
<?php echo form_open_multipart('exercise/maxSubarray') ?>
 <div class="form-group" style="margin-top: 50px;">

              <label style="

              font-size: 30px;
              font-weight: 600;
              text-decoration: underline;
              margin-bottom: 41px;






              " for="">Max Subarray </label>

              <input type="text" class="form-control" name="maxSub" placeholder="Enter Number Sequence(comma separated)" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
             

             

            
  

 <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>

</form>

<div>
  <p><?php if(!empty($vlez)){echo $vlez;}  ?></p>
  <p><?php if(!empty($out)){echo $out;}  ?></p>
  <p><?php if(!empty($outSeq)){echo $outSeq;}  ?></p>
</div>
<hr style="color:1px solid black;">
<?php echo form_open_multipart('exercise/equalStacks') ?>
 <div class="form-group" style="margin-top: 50px;">

              <p style="

              font-size: 30px;
              font-weight: 600;
              text-decoration: underline;
              margin-bottom: 41px;




              ">Equal Stacks</p>

              <input type="text" class="form-control" name="max1" placeholder="Enter Number Sequence" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
             <div class="form-group" style="margin-top: 50px;">

             

              <input type="text" class="form-control" name="max2" placeholder="Enter Number Sequence" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
             <div class="form-group" style="margin-top: 50px;">

             

              <input type="text" class="form-control" name="max3" placeholder="Enter Number Sequence" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
             

             

            
  

 <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>

</form>

<div>
  <p><?php if(!empty($output)){echo $output;}  ?></p>
  <p><?php //echo $out;  ?></p>
  <p><?php //echo $outSeq;  ?></p>
</div>
<hr style="color:1px solid black;">
<?php echo form_open_multipart('exercise/lily') ?>
 <div class="form-group" style="margin-top: 50px;">

              <p style="

              font-size: 30px;
              font-weight: 600;
              text-decoration: underline;
              margin-bottom: 41px;




              ">Lily's Homework</p>

              <input type="text" class="form-control" name="lily" placeholder="Enter Number Sequence" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
            
           
 <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>

</form>

<div>
  <p>Minimum <?php if(!empty($res)){echo $res;}?> swaps</p>
  <p><?php //echo $out;  ?></p>
  <p><?php //echo $outSeq;  ?></p>
</div>
<hr style="color:1px solid black;">
<?php echo form_open_multipart('exercise/transmiter') ?>
 <div class="form-group" style="margin-top: 50px;">

              <p style="

              font-size: 30px;
              font-weight: 600;
              text-decoration: underline;
              margin-bottom: 41px;




              ">Hackerland Radio Transmitters</p>

              <input type="text" class="form-control" name="lily" placeholder="Enter Number Sequence(comma separated)" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
            
           
 <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>

</form>

<div>
  <p><?php if(!empty($transmiter)){echo $transmiter;}?> transmitters.</p>
  <p><?php //echo $out;  ?></p>
  <p><?php //echo $outSeq;  ?></p>
</div>
<hr style="color:1px solid black;">
<?php echo form_open_multipart('exercise/sherlock') ?>
 <div class="form-group" style="margin-top: 50px;">

              <p style="

              font-size: 30px;
              font-weight: 600;
              text-decoration: underline;
              margin-bottom: 41px;




              ">Sherlock and the Valid String</p>

              <input type="text" class="form-control" name="sherlock" placeholder="Enter String" style="box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);">

             </div>
            
           
 <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>

</form>

<div>
  <p><?php if(!empty($out)){echo $out;}?> the string is valid.</p>
  <p><?php //echo $out;  ?></p>
  <p><?php //echo $outSeq;  ?></p>
</div>

<div>
  <p style="display: inline;">
  Moroka.30 is proudly Australia’s first hunting brand, pioneering the concept of lightweight</p> <h1 style="font-size: 16px;display: inline-block;font-weight: 400;">hunting gear</h1> <p style="display: unset;">in this country well over a decade ago.
No one puts more into Australian hunting than Moroka.30, forging a commitment to Australia that uniquely sets it apart from all other brands.
</p>
</div>






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
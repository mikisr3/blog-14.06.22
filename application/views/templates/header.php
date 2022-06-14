
<html>
<head>

	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simple Blog</title>

	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/list.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="text/css"  href="<?php echo base_url() ?>assets/bootstrap/bootstrap.css" rel="stylesheet">
	<link type="text/css"  href="<?php echo base_url() ?>assets/bootstrap/bootstrap.min.css" rel="stylesheet">
	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="jquery-3.2.1.min.js"></script> -->

	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
	<script   src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
	<script src="https://unpkg.com/@panzoom/panzoom@4.4.3/dist/panzoom.min.js"></script>
	

	<script   src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	
	<script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
  <script src="http://cdn.ckeditor.com/4.5.11/standard/plugins/clipboard/dialogs/paste.js"></script>
	
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>

	 
	
</head>
<body>

	<!-- <nav class="navbar navbar-inverse w-100" style="margin-top: 50px;"> -->
      <div class = "cont-header mt-5 goSubmit" >
      	<div class="row" style="padding: 12px;">
      		<div class="col-md-1">
        	<div class="navbar-header" style="">
          <a class="navbar-brand" href="/"><img src="<?php echo base_url() ?>assets/images/posts/op.jpg" alt="" style="

          width:50px;
          height:50px;
          margin-left: 7px;

          "></a>
        </div>
        </div>
        <div class="col-md-11 my-auto">
        	<div  class="row" style="" >
          
            <div class="col-md-8">
            	<ul class="nav" style=" 

            /*margin-left: 31px;*/

            " id="nav-list">
				  <li class="nav-item">
				    <a class="nav-link header_class" id="one" style="font-size: 19px;"  aria-current="page" href="<?php echo base_url() ?>">Home</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link header_class" id="About" style="font-size: 19px;" href="<?php echo base_url() ?>about">About</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link header_class" style="font-size: 19px;" id="Blog" href="<?php echo base_url() ?>posts">Blog</a>
				  </li>

				  <li class="nav-item">
				    <a class="nav-link header_class" style="font-size: 19px;" id="Categories" href="<?php echo site_url('categories') ?>">Categories</a>
				  </li>

				  <?php if($this->session->userdata('logged_in')) {?>

				    <li class="nav-item">
				    <a class="nav-link header_class" style="font-size: 19px;" id="Create_Category" href="<?php echo base_url() ?>categories/create">Create Category</a>
				  
				  </li>
				<?php } ?>
				 </ul>
            </div>

				  <div class="col-md-4">
				  	<ul class="nav" style="

				  	/*width:500px;
				  	padding-left: 40px;
				  	margin-left: 751px;
				  	position: absolute;*/

				  	">


				  	<?php if(!$this->session->userdata('logged_in')) {?>
				  	<li class="nav-item" style="">
				  		<a class="nav-link header_class" style="font-size: 19px;" id="Login" href="<?php echo base_url(); ?>users/login">Log</a>
				  	</li>

				  	<li class="nav-item" style="">
				  		<a class="nav-link header_class" style="font-size: 19px;" id="Register" href="<?php echo base_url(); ?>users/register">Register</a>
				  	</li>	
				  <?php } ?>

				  <?php if($this->session->userdata('logged_in')) {?>
				  	<li class="nav-item" style="">
				  		<a class="nav-link header_class" style="font-size: 19px;" id="Logout" href="<?php echo base_url(); ?>users/logout">Logout</a>
				  	</li>	

				  	<li class="nav-item" style="">
				  		<a class="nav-link header_class" style="font-size: 19px;" id="Create_Post" href="<?php echo base_url(); ?>posts/create">Create Post</a>
				  	</li>	
				  <?php } ?>

				 
				  
				  <!-- <li class="nav-item">
				    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				  </li> -->
			</ul>
				  </div>
			
         
        </div>
        </div>
      	</div>

      </div>
   <!--  </nav> -->

   <div style="

   width: 100%;
    margin-left: auto;
    margin-right: auto;
    max-width: 1922px;
    min-width: 1922px;





   ">

   <?php if(current_url() === 'http://localhost/blog/posts') {?>
   <div class="sidebar">

   	<div style="

   	width: 330px;

    background-color: lightblue;
    height: 25px;

   	"></div>

   	<h4 style="
   	text-align: center;
    margin-top: 18px;


   	">Filter By</h4>

  
   		<ul class="filter" style="

   	text-align: center;
    list-style: none;
    margin-top: 31px;
    margin-left: 55px;
    display: block;
    text-align: left;



   	">
   		<form action="posts" method="POST">
       <li>
        <input type="checkbox"  onchange="return this.form.submit()" name="mostLikes" <?php echo $this->session->userdata('mostLikes'); ?>>
  <label>Most Likes</label>
      </li> 
      </form>
   		<form action="posts" method="POST">
       <li>
        <input type="checkbox"  name="mostComments" onchange="return this.form.submit()"  <?php echo $this->session->userdata('mostComments'); ?>>
  <label>Most Comments</label>
      </li> 
      </form>
   		<form action="posts" method="POST">
       <li>
        <input type="checkbox" name="mostViews" onchange="return this.form.submit()"  <?php echo $this->session->userdata('mostViews'); ?>>
  <label>Most Views</label>
      </li> 
      </form>
      <form action="posts" method="POST">
       <li>
        <input type="checkbox" name="mostNew" onchange="return this.form.submit()"  <?php echo $this->session->userdata('mostNew'); ?>>
  <label>Most New</label>
      </li> 
      </form>
      <form action="posts" method="POST">
       <li>
        <input type="checkbox" name="mostOld" onchange="return this.form.submit()"  <?php echo $this->session->userdata('mostOld'); ?>>
  <label>Most Old</label>
      </li> 
      </form>
   		
   	</ul>
   






   	





   </div>

 <?php } ?>

    <div class="container">

    	<?php if($this->session->flashdata('user_registered')){ ?>

    		<p class="alert alert-success"><?php echo $this->session->flashdata('user_registered'); ?></p>

    	<?php } ?>
    	<?php if($this->session->flashdata('post_created')){ ?>

    		<p class="alert alert-success"><?php echo $this->session->flashdata('post_created'); ?></p>

    	<?php } ?>
    	<?php if($this->session->flashdata('post_updated')){ ?>

    		<p class="alert alert-success"><?php echo $this->session->flashdata('post_updated'); ?></p>

    	<?php } ?>
    	<?php if($this->session->flashdata('category_created')){ ?>

    		<p class="alert alert-success"><?php echo $this->session->flashdata('category_created'); ?></p>

    	<?php } ?>
    	<?php if($this->session->flashdata('login_failed')){ ?>

    		<p class="alert alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></p>

    	<?php } ?>
    	<?php if($this->session->flashdata('user_login')){ ?>

    		<p class="alert alert-success"><?php echo $this->session->flashdata('user_login'); ?></p>

    	<?php } ?>
    	<?php if($this->session->flashdata('user_loggedout')){ ?>

    		<p class="alert alert-success"><?php echo $this->session->flashdata('user_loggedout'); ?></p>

    	<?php } ?>
    	<?php if($this->session->flashdata('category_deleted')){ ?>

    		<p class="alert alert-success"><?php echo $this->session->flashdata('category_deleted'); ?></p>

    	<?php } ?>
    	<?php if($this->session->flashdata('images_uploaded')){ ?>

    		<p class="alert alert-success"><?php echo $this->session->flashdata('images_uploaded'); ?></p>

    	<?php } ?>

      <?php if($this->session->flashdata('comment_deleted')){ ?>

        <p class="alert alert-success"><?php echo $this->session->flashdata('comment_deleted'); ?></p>

      <?php } ?>
	
	


       

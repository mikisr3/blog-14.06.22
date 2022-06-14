
<html>
<head>







   

	
	<!-- <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<title>Simple Blog</title>

	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/list.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="text/css"  href="<?php echo base_url() ?>assets/bootstrap/bootstrap.css" rel="stylesheet">
	<link type="text/css"  href="<?php echo base_url() ?>assets/bootstrap/bootstrap.min.css" rel="stylesheet">
	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"></script> -->

    


    <!-- <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1B-Ti7B-eYdEKoSwCodEhNxuMsRB0pK4&callback=initialize_map">
</script> -->
	<!-- <script type="text/javascript" src="jquery-3.2.1.min.js"></script> -->




	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
	<script   src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
    <script   src="<?php echo base_url() ?>assets/js/Clusters.js"></script>
	<script src="https://unpkg.com/@panzoom/panzoom@4.4.3/dist/panzoom.min.js"></script>
	

	<script   src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	
	<script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
  <script src="http://cdn.ckeditor.com/4.5.11/standard/plugins/clipboard/dialogs/paste.js"></script>
	
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>

	 
	
</head>
<body>
	<div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Simple Blog</div>
                <div class="list-group list-group-flush" id="links">


                     
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="<?php echo base_url() ?>about">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="<?php echo base_url() ?>about">Shortcuts</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="<?php echo base_url() ?>about">Overview</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="#">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="#">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="#">Status</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="#">Status</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="#">Status</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="#">Status</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <img src="<?php echo base_url() ?>assets/images/posts/hide.jpg" id="sidebarToggle" style="

                        width: 43px;
                        height: 49px;
                       


                        " alt="">
                        <!-- <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button> -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0" id="myTab">
                                <li class="nav-item btn1"><a class="nav-link active" href="<?php echo base_url() ?>">Home</a></li>
                                <li class="nav-item btn1"><a class="nav-link" href="<?php echo base_url() ?>about">Places</a></li>
                                <li class="nav-item btn1"><a class="nav-link" href="<?php echo base_url() ?>posts">Blog</a></li>
                                 <li class="nav-item btn1"><a class="nav-link" href="<?php echo base_url() ?>exercise">Exercises</a></li>
                                <li class="nav-item btn1"><a class="nav-link" href="<?php echo site_url('categories') ?>">Categories</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <?php if($this->session->userdata('logged_in')) {?>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>posts/create">Post</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>categories/create">Category</a>
                                        <?php } ?>
                                        <div class="dropdown-divider"></div>

                                         <?php if(!$this->session->userdata('logged_in')) {?>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>users/login">Login</a>

                                         <?php }else{ ?> 

                                         <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">Logout</a>




                                         <?php } ?>






                                          
                                          <?php if(!$this->session->userdata('logged_in')) {?>
                                         <a class="dropdown-item" href="<?php echo base_url(); ?>users/register">Register</a>

                                          <?php } ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <p class="my-auto" style="padding-left: 14px;"><span>Logged as : </span><strong><?php echo $this->session->userdata('username'); ?></strong></p>




    <div class="container" style="

    margin-top: 39px;
   

    ">

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
      <?php if($this->session->flashdata('marker_created')){ ?>

        <p class="alert alert-success"><?php echo $this->session->flashdata('marker_created'); ?></p>

      <?php } ?>
       <?php if($this->session->flashdata('delete_created')){ ?>

        <p class="alert alert-success"><?php echo $this->session->flashdata('delete_created'); ?></p>

      <?php } ?>
      <?php if($this->session->flashdata('marker_changed')){ ?>

        <p class="alert alert-success"><?php echo $this->session->flashdata('marker_changed'); ?></p>

      <?php } ?>

     
	


       

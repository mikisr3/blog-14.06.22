






</div>
</div>
</div>
</div>
<script   src="<?php echo base_url() ?>assets/js/script.js"></script>
<!-- <script   src="<?php echo base_url() ?>assets/js/app.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->



            <script>
	
                CKEDITOR.replace( 'editor1');
            </script>

            <?php

    if(explode("/",current_url())[4] === "about"){

    echo $map['js'];

    


    }




    ?>
    
    



</body>
</html>
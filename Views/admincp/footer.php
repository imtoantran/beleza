	
        
        <footer>
        	
        </footer>
    </body>
    <!-- Chèn link JavaScript-->
    <script src="<?php echo ASSETS ?>plugins/image-manager/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>js/common.js"></script>
    <script src="<?php echo ASSETS ?>plugins/data-tables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/data-tables/DT_bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/jquery-alerts/jquery.alerts.min.js" type="text/javascript"></script>

    <script type="text/javascript">
	  	// Active menu	
        $(function() {
            var pgurl = window.location.href.substr( window.location.href.lastIndexOf("/") + 1 );
            $("#nav1 li a").each(function(){
                var href = $(this).attr("href");
                var ctr = href.substr( href.lastIndexOf("/") + 1 ) ;
                if(ctr == pgurl) 
                    $(this).parent().addClass("on");
            });
        });
    </script>
    
    <script type="text/javascript">
        var URL = "<?php echo URL ?>";
        var URL_IMAGE_MANAGER = "<?php echo ASSETS . 'plugins/image-manager/'; ?>";
        // var user_id = <?php echo Session::get('user_id')?>; // USER ID = GET SESSION['user_id']
        // var ADMIN_USERNAME = <?php echo Session::get('admin_username')?>
    </script>

    <?php
        // Include script module
        if(isset($this->script)){
            foreach ($this->script as $script) {
                echo '<script type="text/javascript" src="'. $script .'" ></script>';
            }
        }
    ?>

    <script>
        // Dropdown
        $(function(){
            $('#user').click(function(event) {
            	event.stopPropagation();
                $('#logout').fadeToggle('fast');
                $('#management_content_ddown').fadeOut('fast');
            });
            $('#management_ddown').click(function(event){
            	event.stopPropagation();
            	$('#management_content_ddown').fadeToggle('fast');
            	$('#logout').fadeOut('fast');
            });
            $('html').click(function(){
            	$('#logout').fadeOut('fast');
            	$('#management_content_ddown').fadeOut('fast');
            });
        });
    </script>
</html>
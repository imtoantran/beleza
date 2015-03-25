        <footer>
            
        </footer>
    </body>
    <!-- JavaScript required for CMS-->
    <script src="<?php echo ASSETS ?>js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.vi.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/jquery-number/jquery.number.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/jquery-alerts/jquery.alerts.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS ?>plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA" type="text/javascript"></script>

    <script src="<?php echo ASSETS ?>js/spaCMS/spaCMS.js" type="text/javascript"></script>
   
    <script type="text/javascript">
        // Active menu  
        $(function() {
            var pgurl = window.location.href.substr( window.location.href.lastIndexOf("/") + 1 );
            $("#nav1 li a").each(function(){
                var href = $(this).attr("href");
                var ctr = href.substr( href.lastIndexOf("/") + 1 ) ;
                if(ctr == pgurl || ctr == '' ) 
                    $(this).parent().addClass("on");
            });
        });
    </script>
    
    <script type="text/javascript">
        var URL = "<?php echo URL ?>";
        var URL_IMAGE_MANAGER = "<?php echo ASSETS . 'plugins/image-manager/'; ?>";
        var user_id = <?php echo Session::get('user_id')?>; // USER ID = GET SESSION['user_id']
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
        // Dropdown logout
        $(function(){
            $('#user').click(function() {
                $('#logout').fadeToggle('fast');
            });
        });

        // Dropdown notification
        $(function(){
            var nav_notifications = $("#nav-notifications");
            var notification_badge = nav_notifications.find(".notification-badge");
            var notification_list = nav_notifications.find(".notification-list");
            notification_badge.click(function() {
                notification_list.fadeToggle('fast');
            });
        });
    </script>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/21/2018
 * Time: 2:06 PM
 */
?>

<!-- jQuery 3 -->
<script src="<?php echo giaodien_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo giaodien_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo giaodien_url(); ?>plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>

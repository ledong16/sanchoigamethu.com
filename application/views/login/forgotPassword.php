<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/22/2018
 * Time: 11:21 AM
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Forgot Password</title>
        <?php $this->load->view('login/head'); ?>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url();?>">
                    <b>Admin</b>LTE
                </a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Enter your gmail which you used to create account</p>
                <?php
                if ($this->session->flashdata('mess') != null) {
                    ?>
                    <p class="text-success text-center"><?php echo $this->session->flashdata('mess');?></p>
                    <?php
                }?>
                <form method="post">
                    <div class="form-group has-feedback">
                        <input type="email" name="userEmail" class="form-control" placeholder="YourEmail@gmail.com"
                               value="<?php echo set_value('userEmail','');?>" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Receive Email</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3 text-center">
                        <a href="<?php echo base_url('login');?>" class="text-center">I remember now</a>
                    </div>
                </div>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <?php $this->load->view('login/script'); ?>
    </body>
</html>

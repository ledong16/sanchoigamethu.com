<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/21/2018
 * Time: 2:04 PM
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Log in</title>
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
                <?php
                if ($this->session->flashdata('mess') != null) {
                    ?>
                <p class="text-success text-center"><?php echo $this->session->flashdata('mess');?></p>
                <?php
                }?>
                <p class="login-box-msg">Sign in to start your session</p>
                <span class="text-danger">
                    <?php echo form_error('loginName');?>
                    <?php echo form_error('loginPass');?>
                </span>
                <form method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name="loginName" class="form-control" placeholder="Login Name"
                               value="<?php echo set_value('loginName','');?>" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="loginPass" class="form-control" placeholder="Password"
                               value="<?php echo set_value('loginPass','');?>" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-8">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <a href="<?php echo base_url('forgot');?>">I forgot my password</a><br>
                <a href="<?php echo base_url('register');?>" class="text-center">Register a new membership</a>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <?php $this->load->view('login/script'); ?>
    </body>
</html>

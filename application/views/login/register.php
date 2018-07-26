<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/21/2018
 * Time: 2:13 PM
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Registration Page</title>
        <?php $this->load->view('login/head'); ?>
    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="<?php echo base_url();?>"><b>Admin</b>LTE</a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg text-primary">Register a new membership</p>
                <span class="text-danger">
                    <?php echo form_error('loginName');?>
                    <?php echo form_error('loginPass');?>
                    <?php echo form_error('loginPassRetype');?>
                    <?php echo form_error('userEmail');?>
                    <?php echo form_error('userName');?>
                    <?php echo form_error('userPhone');?>
                </span>
                <p class="text-danger"></p>
                <form method="post">
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="text" name="loginName" class="form-control" required
                                   placeholder="Login Name" value="<?php echo set_value('loginName','');?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="password" name="loginPass" class="form-control" required
                                   placeholder="Password" value="<?php echo set_value('loginPass','');?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="password" name="loginPassRetype" class="form-control" required
                                   placeholder="Retype password" value="<?php echo set_value('loginPassRetype','');?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" name="userEmail" class="form-control" required
                                   placeholder="Email" value="<?php echo set_value('userEmail','');?>">
                        </div>
                        <div class="col-sm-4 form-control-static">
                            @gmail.com
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="text" name="userName" class="form-control" required
                                   placeholder="Your Name" value="<?php echo set_value('userName','');?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="number" name="userPhone" class="form-control" required
                                   placeholder="Your Phone Number" value="<?php echo set_value('userPhone','');?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xs-8">
                            <span class="text-danger">
                                <?php echo form_error('agree');?>
                            </span>
                        </div>
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="agree"> I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- Terms -</p>
                    <p class="text-danger">
                        Please enter your real email because if you forgot your login name or
                        password, we'll send login info to your email
                    </p>
                </div>

                <a href="<?php echo base_url('login');?>" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->

        <?php $this->load->view('login/script'); ?>
    </body>
</html>


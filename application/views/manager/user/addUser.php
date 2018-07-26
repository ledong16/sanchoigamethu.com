<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/2/2018
 * Time: 9:54 AM
 */

if ($this->session->userdata('loginPermission') == 'Member') {
    redirect('manager/profile');
}
if ($this->session->flashdata('mess') != null) {
    ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success !</h4>
        <?php echo $this->session->flashdata('mess'); ?>
    </div>
    <?php
}
?>

<section class="content-header">
    <h1>
        <?php echo $tieude; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"> Manager User</a></li>
        <li class="active"><?php echo $tieude; ?></li>
    </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><?php echo $tieude; ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="loginName" class="col-sm-3 control-label">Login Name</label>

                    <div class="col-sm-7">
                        <input type="text" name="loginName" class="form-control" id="loginName" placeholder="Login Name" required
                               value="<?php echo set_value('loginName');?>" maxlength="20" minlength="6">
                        <span class="text-danger">
                            <?php echo form_error('loginName');?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="loginPass" class="col-sm-3 control-label">Login Password</label>

                    <div class="col-sm-7">
                        <input type="text" name="loginPass" class="form-control" id="loginPass" placeholder="Login Password" required
                               value="<?php echo set_value('loginPass');?>" maxlength="20" minlength="6">
                        <span class="text-danger">
                            <?php echo form_error('loginPass');?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="loginPermission" class="col-sm-3 control-label">Login Permission</label>

                    <div class="col-sm-7">
                        <select name="loginPermission" class="form-control" id="loginPermission" required>
                            <?php
                            if ($this->session->userdata('loginPermission') == 'Administrator') {
                                ?>
                                <option>Administrator</option>
                                <?php
                            }
                            ?>
                            <option>Member</option>
                        </select>
                        <span class="text-danger">
                            <?php echo form_error('loginPermission');?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userName" class="col-sm-3 control-label">User Name</label>

                    <div class="col-sm-7">
                        <input type="text" name="userName" class="form-control" id="userName" placeholder="Your Name" required
                               value="<?php echo set_value('userName');?>">
                        <span class="text-danger">
                            <?php echo form_error('userName');?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userEmail" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-7">
                        <input type="email" name="userEmail" class="form-control" id="userEmail" placeholder="Email" required
                               value="<?php echo set_value('userEmail');?>">
                        <span class="text-danger">
                            <?php echo form_error('userEmail');?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userPhone" class="col-sm-3 control-label">Phone Number</label>

                    <div class="col-sm-7">
                        <input type="number" name="userPhone" class="form-control" id="userPhone"
                               placeholder="Your phone number" required
                               value="<?php echo set_value('userPhone');?>">
                        <span class="text-danger">
                            <?php echo form_error('userPhone');?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3">
                        <a href="<?php echo base_url('manager/listUser')?>" class="btn btn-info">Back to List User</a>
                        &nbsp;&nbsp;
                        <input type="submit" value="ADD" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/22/2018
 * Time: 5:21 PM
 */

if ($this->session->flashdata('error') != null) {
    ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
        <?php echo $this->session->flashdata('error');?>
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
        <li><a href="#"> Profile</a></li>
        <li class="active"><?php echo $tieude; ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="<?php echo giaodien_url(); ?>dist/img/user2-160x160.jpg" alt="User profile picture">

                    <h3 class="profile-username text-center"><?php echo $this->session->userdata('userName');?></h3>

                    <p class="text-muted text-center"><?php echo $this->session->userdata('loginPermission');?></p>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <p>
                <a href="<?php echo base_url('manager/profile')?>" class="btn btn-primary">Activity</a>
                <a href="<?php echo base_url('manager/information')?>" class="btn btn-primary">Change Information</a>
                <a href="#" class="btn btn-primary">Change Password</a>
            </p>

            <div class="box box-primary">
                <div class="box-body">
                    <form class="form-horizontal" method="post">
                        <input type="hidden" name="userId"
                               value="<?php echo set_value('userId',$this->session->userdata('userId'));?>">
                        <div class="form-group">
                            <label for="currPass" class="col-sm-4 control-label">Current Password</label>

                            <div class="col-sm-8">
                                <input type="password" name="currPass" class="form-control" id="currPass" placeholder="Current Password"
                                       value="<?php echo set_value('currPass','');?>" required>
                                <span class="text-danger">
                                <?php echo form_error('currPass');?>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newPass" class="col-sm-4 control-label">New Password</label>

                            <div class="col-sm-8">
                                <input type="password" name="newPass" class="form-control" id="newPass" placeholder="New Password"
                                       value="<?php echo set_value('newPass','');?>" required>
                                <span class="text-danger">
                                <?php echo form_error('newPass');?>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="retypeNewPass" class="col-sm-4 control-label">Retype New Password</label>

                            <div class="col-sm-8">
                                <input type="password" name="retypeNewPass" class="form-control" id="retypeNewPass" placeholder="Phone Number"
                                       value="<?php echo set_value('retypeNewPass','');?>" required>
                                <span class="text-danger">
                                <?php echo form_error('retypeNewPass');?>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
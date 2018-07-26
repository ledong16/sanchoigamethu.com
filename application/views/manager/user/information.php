<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/22/2018
 * Time: 5:21 PM
 */

if ($this->session->flashdata('mess') != null) {
    ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success !</h4>
        <?php echo $this->session->flashdata('mess');?>
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
                <a href="#" class="btn btn-primary">Change Information</a>
                <a href="<?php echo base_url('manager/changePassword')?>" class="btn btn-primary">Change Password</a>
            </p>
            <div class="box box-primary">
                <div class="box-body">
                    <form class="form-horizontal" method="post">
                        <input type="hidden" name="userId" required
                               value="<?php echo set_value('userId',$this->session->userdata('userId'));?>">
                        <div class="form-group">
                            <label for="userName" class="col-sm-4 control-label">Your Name</label>

                            <div class="col-sm-8">
                                <input type="text" name="userName" class="form-control" id="userName" placeholder="Your Name" required
                                       value="<?php echo set_value('userName',$this->session->userdata('userName'));?>">
                                <span class="text-danger">
                                <?php echo form_error('userName');?>
                            </span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="userEmail" class="col-sm-4 control-label">Email</label>

                            <div class="col-sm-8">
                                <input type="email" name="userEmail" class="form-control" id="userEmail" placeholder="Email" required
                                       value="<?php echo set_value('userEmail',$this->session->userdata('userEmail'));?>">
                                <span class="text-danger">
                                <?php echo form_error('userEmail');?>
                            </span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="userPhone" class="col-sm-4 control-label">Phone Number</label>

                            <div class="col-sm-8">
                                <input type="text" name="userPhone" class="form-control" id="userPhone"
                                       placeholder="Retype New Password" required
                                       value="<?php echo set_value('userPhone',$this->session->userdata('userPhone'));?>">
                                <span class="text-danger">
                                <?php echo form_error('userPhone');?>
                            </span>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-danger">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


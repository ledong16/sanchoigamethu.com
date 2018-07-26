<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/27/2018
 * Time: 3:59 PM
 */

if ($this->session->userdata('loginPermission') != 'Administrator') {
    redirect('manager/profile');
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

            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form class="form-horizontal" method="post">
                <input type="hidden" name="userId" required
                       value="<?php echo set_value('userId', $userId);?>">
                <div class="form-group">
                    <label for="loginPermission" class="col-sm-4 control-label">Permission</label>

                    <div class="col-sm-8">
                        <select name="loginPermission" class="form-control" id="loginPermission" required>
                            <?php
                            if ($this->session->userdata('loginPermission') == 'Administrator') {
                                ?>
                                <option>Administrator</option>
                                <option>Member</option>
                            <?php
                            }
                            if ($permission != 'Administrator') {
                                ?>
                                <option>Member</option>
                            <?php
                            }
                            ?>
                        </select>
                        <span class="text-danger">
                            <?php echo form_error('loginPermission');?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userName" class="col-sm-4 control-label">User Name</label>

                    <div class="col-sm-8">
                        <input type="text" name="userName" class="form-control" id="userName" placeholder="Your Name" required
                               value="<?php echo set_value('userName', $userName);?>">
                        <span class="text-danger">
                            <?php echo form_error('userName');?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userEmail" class="col-sm-4 control-label">Email</label>

                    <div class="col-sm-8">
                        <input type="email" name="userEmail" class="form-control" id="userEmail" placeholder="Email" required
                               value="<?php echo set_value('userEmail', $userEmail);?>">
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
                               value="<?php echo set_value('userPhone', $userPhone);?>">
                        <span class="text-danger">
                            <?php echo form_error('userPhone');?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-danger">Save</button>&nbsp;&nbsp;
                        <a href="<?php echo base_url('manager/listUser');?>" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


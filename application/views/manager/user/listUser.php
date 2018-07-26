<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/25/2018
 * Time: 10:15 AM
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
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>Login Name</th>
                    <th class="text-center">Login Permission</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Phone</th>
                    <th class="text-center">Active</th>
                    <th class="text-center">Action</th>
                </tr>
                <?php
                foreach ($listUser as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item->login_name;?></td>
                        <td class="text-center">
                            <?php
                            if ($item->login_permission == 'Administrator') {
                                ?>
                                <span class="label label-danger">
                                <?php echo $item->login_permission;?>
                            </span>
                                <?php
                            }
                            elseif ($item->login_permission == 'Member') {
                                ?>
                                <span class="label label-success">
                                <?php echo $item->login_permission;?>
                            </span>
                                <?php
                            }
                            else {
                                ?>
                                <span class="label label-warning">
                                <?php echo $item->login_permission;?>
                            </span>
                                <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $item->user_name;?></td>
                        <td><?php echo $item->user_email;?></td>
                        <td><?php echo $item->user_phone;?></td>
                        <td class="text-center">
                            <?php
                            if ($item->active == true) {
                                ?>
                                <i class="fa fa-fw fa-check text-green"></i>
                            <?php
                            }
                            else {
                                ?>
                                <i class="fa fa-fw fa-close text-red"></i>
                            <?php
                            }
                            ?>
                        </td>
                        <td class="text-left">
                            <a href="<?php echo base_url('listUser/edit/') . $item->id;?>" class="btn btn-warning">
                                Edit
                            </a>
                            <?php
                            if ($this->session->userdata('loginName') != $item->login_name) {
                                ?>
                                <a href="<?php echo base_url('listUser/delete/') . $item->id;?>"
                                   class="btn btn-danger" onclick="return confirm('Are you sure want to delete this user?')">
                                    Delete
                                </a>
                                <?php
                            }
                            ?>
                            <?php
                            if ($item->login_permission != 'Administrator') {
                                if ($item->active == true) {
                                    ?>
                                    <form action="<?php echo base_url('listUser/active');?>" method="post"
                                          onsubmit="return confirm('Are you sure want to delete this user?')">
                                        <input type="hidden" name="userId" value="<?php echo $item->id; ?>"/>
                                        <input type="submit" value="Block" class="btn btn-danger"/>
                                    </form>
                                    <?php
                                }
                                else {
                                    ?>
                                    <form action="<?php echo base_url('listUser/active');?>" method="post"
                                          onsubmit="return confirm('Are you sure want to delete this user?')">
                                        <input type="hidden" name="userId" value="<?php echo $item->id; ?>"/>
                                        <input type="submit" value="Active" class="btn btn-success"/>
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</section>

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/22/2018
 * Time: 2:57 PM
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
                <a href="#" class="btn btn-primary">Activity</a>
                <a href="<?php echo base_url('manager/information')?>" class="btn btn-primary">Change Information</a>
                <a href="<?php echo base_url('manager/changePassword')?>" class="btn btn-primary">Change Password</a>
            </p>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo giaodien_url(); ?>dist/img/user1-128x128.jpg" alt="user image">
                            <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                            <span class="description">Shared publicly - 7:30 PM today</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>
                        <ul class="list-inline">
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                            </li>
                            <li class="pull-right">
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                    (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo giaodien_url(); ?>dist/img/user7-128x128.jpg" alt="User Image">
                            <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                            <span class="description">Sent you a message - 3 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>

                        <form class="form-horizontal">
                            <div class="form-group margin-bottom-none">
                                <div class="col-sm-9">
                                    <input class="form-control input-sm" placeholder="Response">
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php echo giaodien_url(); ?>dist/img/user6-128x128.jpg" alt="User Image">
                            <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                            <span class="description">Posted 5 photos - 5 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="row margin-bottom">
                            <div class="col-sm-6">
                                <img class="img-responsive" src="<?php echo giaodien_url(); ?>dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="<?php echo giaodien_url(); ?>dist/img/photo2.png" alt="Photo">
                                        <br>
                                        <img class="img-responsive" src="<?php echo giaodien_url(); ?>dist/img/photo3.jpg" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="<?php echo giaodien_url(); ?>dist/img/photo4.jpg" alt="Photo">
                                        <br>
                                        <img class="img-responsive" src="<?php echo giaodien_url(); ?>dist/img/photo1.png" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <ul class="list-inline">
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                            </li>
                            <li class="pull-right">
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                    (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
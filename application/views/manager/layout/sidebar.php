<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 3/27/2018
 * Time: 9:56 AM
 */
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo giaodien_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('userName');?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <!-- Dashboard -->
            <li class="active">
                <a href="<?php echo base_url('manager/home')?>">
                    <i class="fa fa-dashboard text-aqua"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <?php
            if ($this->session->userdata('loginPermission') == 'Administrator') {
                ?>
                <!-- Quản lý thành viên -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Manager User</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url('manager/listUser')?>"><i class="fa fa-circle-o"></i>  List User</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('manager/addUser')?>"><i class="fa fa-circle-o"></i>  Add User</a>
                        </li>
                    </ul>
                </li>
            <?php
            }
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 3/27/2018
 * Time: 9:51 AM
 */
?>

<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
		<title><?php echo $tieude; ?></title>
		<?php $this->load->view('manager/layout/head'); ?>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php $this->load->view('manager/layout/menu'); ?>

            <?php $this->load->view('manager/layout/sidebar'); ?>

            <div class="content-wrapper">
                <?php $this->load->view($main_page); ?>
            </div>

            <?php $this->load->view('manager/layout/footer'); ?>

            <?php $this->load->view('manager/layout/rightsidebar'); ?>
        </div>
        <?php $this->load->view('manager/layout/script'); ?>
	</body>
<html>

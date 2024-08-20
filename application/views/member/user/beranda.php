<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">

<body class="bgbody">
    <section class="body">

        <!-- start: header -->
        <?php $this->load->view("komponen/header.php") ?>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <?php $this->load->view("komponen/sidebar.php") ?>
            <!-- end: sidebar -->

            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>Manajemen Pengguna</h2>
                </header>

                <!-- start: page -->
                <section class="content-with-menu content-with-menu-has-toolbar media-gallery">
                    <div class="content-with-menu-container">
                        <menu id="content-menu" class="inner-menu" role="menu">
                            <div class="nano">
                                <div class="nano-content">
                                    <div class="inner-menu-toggle-inside">
                                        <a href="#" class="inner-menu-collapse">
                                            <i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Bar
                                        </a>
                                        <a href="#" class="inner-menu-expand" data-open="inner-menu">
                                            Show Bar <i class="fa fa-chevron-down"></i>
                                        </a>
                                    </div>
                                    <div class="inner-menu-content">
                                        <div class="sidebar-widget m-none">
                                            <div class="widget-content">
                                                <ul class="mg-folders">
                                                    <li>
                                                        <a href="<?php echo base_url() ?>user/kategori" class="menu-item"><i class="fa fa-folder"></i>Kategori Pengguna</a>
                                                        <div class="item-options">
                                                            <a href="<?php echo base_url() ?>user/kategori">
                                                                <i class="fa fa-arrow-circle-o-left"></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url() ?>user/user" class="menu-item"><i class="fa fa-folder"></i>Manajemen Pengguna</a>
                                                        <div class="item-options">
                                                            <a href="<?php echo base_url() ?>user/user">
                                                                <i class="fa fa-arrow-circle-o-left"></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </menu>
                    </div>
                </section>
                <!-- end: page -->
            </section>
        </div>

    </section>


    <!-- Vendor -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="<?php echo base_url() ?>assets/javascripts/theme.js"></script>
    <script src="<?php echo base_url() ?>assets/javascripts/theme.init.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/raphael/raphael.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/morris/morris.js"></script>

</body>

</html>
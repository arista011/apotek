<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!-- start: header -->
<header class="header">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo base_url() ?>/assets/images/favicon.png" type="image/ico">
    <title>Apotek Mama</title>
    <meta name="author" content="Paber">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/skins/default.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/theme-custom.css">
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/morris/morris.css" />
    <script src="<?php echo base_url() ?>assets/vendor/modernizr/modernizr.js"></script>

    <div class="logo-container">
        <a href="<?php echo base_url() ?>" class="logo">
            <img src="<?php echo base_url() ?>assets/images/<?php echo $this->db->get_where('profil_apotek', array('id' => '1'), 1)->row()->logo; ?>" height="35" alt="Logo" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="header-right">
        <ul class="notifications">
            <li>
                <a href="<?php echo base_url() ?>penjualan/kasir" type="button" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa  fa-shopping-cart"></i> Point Of Sales</a>
            </li>
        </ul>


        <span class="separator"></span>
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <div class="profile-info" style="min-width:60px;">
                    <span class="name"><?php echo $this->session->userdata('nama_admin'); ?></span>
                    <span class="role"><?php echo $this->session->userdata('nama_kategori'); ?></span>
                </div>
                <i class="fa custom-caret"></i>
            </a>
            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url() ?>password"><i class="fa fa-lock"></i> Ganti Password</a>
                    </li>
                    <li>
                        <a role="menuitem" href="<?php echo base_url() ?>dashboard/logout"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->
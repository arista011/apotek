<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html>

<head>
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
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/skins/default.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/theme-custom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/pnotify/pnotify.custom.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/isotope/jquery.isotope.css" />
    <script src="<?php echo base_url() ?>assets/vendor/modernizr/modernizr.js"></script>
    <style type="text/css">
        .nama_produk {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            line-height: 18px;
            /* fallback */
            height: 45px;
            /* fallback */
            max-height: 39px;
            /* fallback */
            -webkit-line-clamp: 2;
            /* number of lines to show */
            -webkit-box-orient: vertical;
        }

        .fit-image {
            width: 100%;
            object-fit: contain;
            height: 120px;
            /* only if you want fixed height */
        }

        .panel-featured-primary {
            margin-top: -15px;
        }
    </style>
</head>

<body class="bgbody">
    <section class="body">
        <div class="col-md-12 col-lg-7 col-xl-7">
            <section class="panel-featured-right panel-featured-primary">
                <div class="panel-body">
                    <div class="input-group mb-md">
                        <input type="text" class="form-control" id="keywords" placeholder="Search Product Keyword" onkeyup="searchFilter()">
                        <a class="input-group-addon btn-success btn"><i class="fa fa-search"></i></a>
                        <select id="sortBy" onchange="searchFilter()" class="form-control">
                            <option value="">Sort By</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>

                    <div class="row mg-files" id="postList" style="max-height: 500px;overflow-y: scroll;">

                        <!-- END Product-->
                        <?php if (!empty($posts)) : foreach ($posts as $post) : ?>

                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="thumbnail">
                                        <div class="thumb-preview">
                                            <img src="<?php echo base_url() ?>/images/<?php echo $post['gambar']; ?>" class="img-responsive fit-image" alt="Foto Produk">
                                        </div>
                                        <span class="mg-title nama_produk">
                                            <?php if ($post['jenis'] == 'racikan') echo "<b>[racikan]</b>"; ?> <?php echo $post['nama_item']; ?>
                                        </span>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="text-bold">
                                                    <?php echo rupiah($post['harga_jual']); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a id="beli-item<?php echo $post['kode_item']; ?>" class="btn btn-xs btn-success" onclick="beli(this)" data-barcode="<?php echo $post['kode_item']; ?>"><i class="fa fa-shopping-cart"></i> Beli Produk</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                        else : ?>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <p>Product not available.</p>
                            </div>
                        <?php endif; ?>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <ul class="pagination">
                                <?php echo $this->ajax_pagination->create_links(); ?>
                            </ul>
                        </div>

                        <!-- END PRoduct-->
                    </div>
                </div>
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
    <script src="<?php echo base_url() ?>assets/vendor/isotope/jquery.isotope.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/pnotify/pnotify.custom.js"></script>
    <script src="<?php echo base_url() ?>assets/javascripts/theme.js"></script>
    <script src="<?php echo base_url() ?>assets/javascripts/theme.init.js"></script>
    <script>
        function searchFilter(page_num) {
            page_num = page_num ? page_num : 0;
            var keywords = $('#keywords').val();
            var sortBy = $('#sortBy').val();
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(); ?>penjualan/ajaxPaginationData/' + page_num,
                data: 'page=' + page_num + '&keywords=' + keywords + '&sortBy=' + sortBy,
                beforeSend: function() {
                    $('.loading').show();
                },
                success: function(html) {
                    $('#postList').html(html);
                }
            });
        }
    </script>
</body>

</html>
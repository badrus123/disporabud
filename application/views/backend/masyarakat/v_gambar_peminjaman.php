<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/ecommerce_products_grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:17:13 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengajuan Penyewaan</title>

    <link href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url() ?>assets/backend/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/backend/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/css/style.css" rel="stylesheet">



</head>

<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <!-- <img alt="image" class="img-circle" src="<?php echo base_url() ?>assets/backend/img/profile_small.jpg" /> -->
                             </span>
                        <a href="<?php echo base_url() ?>c_disporabud/index">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director </span> </span> </a>
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/index"><i class="fa fa-clock-o"></i> <span class="nav-label">Jadwal</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/gambarPeminjaman"><i class="fa fa-paper-plane"></i> <span class="nav-label">Pengajuan Penyewaan</span></a>
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-edit"></i> <span class="nav-label">Akun</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <!-- <li><a href="<?php echo base_url() ?>c_disporabud/admin/admin">Riwayat Login</a></li> -->
                        <li>
                            <a href="<?php echo base_url() ?>c_disporabud/editProfilMasyarakat">Edit Profil</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>c_disporabud/editPasswordMasyarakat">Ubah Pasword</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/v_buktiPembayaran"><i class="fa fa-book">
                    </i> <span class="nav-label">Pembayaran</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/historyPenyewaan"><i class="fa fa-history"></i> <span class="nav-label">Histori Penyewaan</span></a>
                </li>
                
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to Dashboard Masyarakat </span>
                    </li>

                    <li>
                        <a href="<?php echo base_url() ?>c_disporabud/logout">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Pengajuan Penyewaan</h2>
                <ol class="breadcrumb">
                    <li>
                        <p>Silahkan pilih lapangan yang anda inginkan</p>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <?php foreach ($fasilitas as $d) { ?>
                <a href="<?php echo base_url() ?>c_disporabud/tambahPeminjaman?id=<?php echo $d->id_prasarana ?>">
                    <div class="col-md-3">
                        <div class="ibox">
                            <div class="ibox-content product-box">
                                <img src="<?php echo base_url().$d->gambar ?>" width="100%">
                                <!-- <div class="product-imitation"> -->
                                <!-- </div> -->
                                <div class="product-desc">
                                    <span class="product-price">
                                        Rp. <?php echo number_format($d->tarif, 0, '', '.') ?> / Hari
                                    </span>
                                    <small class="text-muted">Nama Lapangan</small>
                                    <a href="#" class="product-name"> <?php echo $d->nama_prasarana ?></a>



                                    <div class="small m-t-xs">
                                        ID Prasarana : <?php echo $d->id_prasarana ?>
                                    </div>
                                    <div class="m-t text-righ">

                                        <!-- <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <?php } ?>
                <!-- <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    $10
                                </span>
                                <small class="text-muted">Category</small>
                                <a href="#" class="product-name"> Product</a>



                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                </div>



        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>

    </div>
</div>



<!-- Mainly scripts -->
<script src="<?php echo base_url() ?>assets/backend/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url() ?>assets/backend/js/inspinia.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/plugins/pace/pace.min.js"></script>



</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/ecommerce_products_grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:17:13 GMT -->
</html>

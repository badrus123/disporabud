<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/table_data_tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:17:07 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Selamat Datang</title>

    <link href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/backend/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

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
                <!-- <li>
                    <a href="<?php echo base_url() ?>c_disporabud/staff/penyewaan"><i class="fa fa-envelope"></i> <span class="nav-label">Pengajuan</span></a>
                </li> -->
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/index"><i class="fa fa-building"></i> <span class="nav-label">Prasarana</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/pengajuan"><i class="fa fa-building"></i> <span class="nav-label">Pengajuan</span></a>
                </li>
                <!-- <li>
                    <a href="#"><i class="fa fa-history"></i> <span class="nav-label">Histori Penyewaan</span></a>
                </li> -->

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
                    <span class="m-r-sm text-muted welcome-message">Welcome to Dashboard Pengguna Dinas </span>
                </li>
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li> -->


                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                	<h2>
                        Daftar Prasarana
                        <a href="<?php echo base_url() ?>c_disporabud/tambahPrasarana" class="pull-right">
                            <button class="btn btn-primary">Tambah Prasarana</button>
                        </a>
                    </h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                        <th>Acara</th>
                                        <th>Prasarana</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Tanggal</th>
                                        <th width="18%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) {?>
                                            <tr>
                                                <td><?php echo $d->nama_acara ?></td>
                                                <td><?php echo $d->nama_prasarana ?></td>
                                                <?php if ($d->bukti_pembayaran == "-"): ?>
                                                <td>Belum ada bukti</td>
                                                <?php else: ?>
                                                <td><a href="<?php echo base_url().$d->bukti_pembayaran?>" class="btn btn-success" target="_blank">Tampilkan Bukti</button></td>
                                                <?php endif;?>
                                                <td><?php echo date('d F Y', $d->tgl_pelaksanaan) ?></td>
                                                <td>
                                                    <?php if ($d->approval_pengajuan == "Belum diapprove") {?>
                                                        <a href="<?php echo base_url(); ?>c_disporabud/accPengajuan/<?php echo $d->id_transaksi ?>" class="btn btn-sm btn-success">ACC</a>
                                                    <?php } else {?>
                                                        <button class="btn btn-sm btn-primary">Sudah diapprove</button>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
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

    <script src="<?php echo base_url() ?>assets/backend/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url() ?>assets/backend/js/inspinia.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                ]

            });

        });

    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/table_data_tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:17:09 GMT -->
</html>

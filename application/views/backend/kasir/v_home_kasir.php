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
                        <a href="<?php echo base_url() ?>c_disporabud">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director </span> </span> </a>
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/index"><i class="fa fa-edit">
                    </i> <span class="nav-label">Peminjaman</span></a>
                </li>
                <!-- <li>
                    <a href="<?php echo base_url() ?>c_disporabud/tambahPeminjaman"><i class="fa fa-paper-plane"></i> <span class="nav-label">Pengajuan Penyewaan</span></a>
                </li> -->
                <!-- <li>
                    <a href="index.html"><i class="fa fa-edit"></i> <span class="nav-label">Peminjaman</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo base_url() ?>c_disporabud/index">Approval</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>c_disporabud/sudahApproveKasir">History</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/sudahApproveKasir"><i class="fa fa-history"></i> <span class="nav-label">Histori</span></a>
                </li>
                <!-- <li>
                    <a href="<?php echo base_url() ?>c_disporabud/v_buktiPembayaran"><i class="fa fa-book">
                    </i> <span class="nav-label">Pembayaran</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/historyPenyewaan"><i class="fa fa-history"></i> <span class="nav-label">Histori Penyewaan</span></a>
                </li> -->
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>


        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Dashboard Kasir </span>
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
                	<h2>Daftar Pengajuan Penyewaan Prasarana</h2>
                    <?php if (!empty($notifikasi) and $notifikasi > 0):?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Ada <?php echo $notifikasi?> Pembayaran Belum diperiksa
                    </div>
                <?php endif;?>
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
                                <th>Peminjam</th>
                                <th>Prasarana</th>
                                <th>Tanggal</th>
                                <th width="20%">Bukti Pembayaran</th>
                                <th width="18%">Aprove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) {?>
                                    <tr>
                                        <td><?php echo $d->nama_lengkap ?></td>
                                        <td><?php echo $d->nama_prasarana ?></td>
                                        <td><?php echo date('d F Y', $d->tgl_pelaksanaan) ?></td>
                                        <?php if (strpos($d->bukti_pembayaran, '.pdf') !== false): ?>
                                        <td><a href="<?php echo base_url() . $d->bukti_pembayaran ?>" class="btn btn-success" target="_blank">Tampilkan Bukti</button></td>
                                        <?php else: ?>


                                        <td>
                                            <a data-toggle="modal" data-target="#<?php echo $d->id_transaksi ?>">
                                                <img src="<?php echo base_url() . $d->bukti_pembayaran ?>" width="15%">
                                            </a>

                                            <!-- ini modal -->
            <div class="modal inmodal" id="<?php echo $d->id_transaksi ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Cek Bukti Pembayaran</h4>
                            <!-- <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> -->
                        </div>
                        <div class="modal-body">
                            <img width="50%" src="<?php echo base_url() . $d->bukti_pembayaran ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                                        </td>
                                <?php endif?>
                                <td>
                                        <?php if ($d->status_pembayaran == 'Belum dibayar') {?>
                                            <a href="<?php echo base_url() ?>c_disporabud/approveKasir?id=<?php echo $d->id_transaksi ?>">
                                                <button class="btn btn-sm btn-primary">Approve</button>
                                            </a>
                                            <a href="<?php echo base_url() ?>c_disporabud/tolakKasir?id=<?php echo $d->id_transaksi ?>">
                                                <button class="btn btn-sm btn-danger">Tolak</button>
                                            </a>
                                            <?php } else {?>
                                                <?php if ($d->status_pembayaran == 'Ditolak') {?>
                                                    <button class="btn btn-sm btn-danger">Ditolak</button>
                                                <?php } else {?>
                                                    <button class="btn btn-sm btn-primary">Sudah Di Bayar</button>
                                                <?php }?>
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

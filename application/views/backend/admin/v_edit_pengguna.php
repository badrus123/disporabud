<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:14:36 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Pengguna</title>

    <link href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/backend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

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
                    <a href="index.html"><i class="fa fa-desktop"></i> <span class="nav-label">Data Pengguna</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url() ?>c_disporabud/admin/admin">Admin</a></li>
                        <li><a href="<?php echo base_url() ?>c_disporabud/admin/masyarakat">Masyarakat</a></li>
                        <li><a href="<?php echo base_url() ?>c_disporabud/admin/pengguna_dinas">Pengguna Dinas</a></li>
                        <li><a href="<?php echo base_url() ?>c_disporabud/admin/kasir">Kasir</a></li>
                    </ul>
                </li> -->
                <li>
                    <a href="<?php echo base_url() ?>c_disporabud/index">
                        <i class="fa fa-desktop"></i> <span class="nav-label">Data Pengguna</span></a>
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
                    <span class="m-r-sm text-muted welcome-message">Welcome to Dashboard Admin </span>
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
                            <a href="grid_options.html">
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
                <div class="col-lg-10">
                    <h2>Edit Pengguna</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            
            </div>
            <div class="row">
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Edit Pengguna</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <?php foreach ($data as $d) { ?>
                            <form method="POST" class="form-horizontal" action="<?php echo base_url() ?>c_disporabud/editPengguna">
                                <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="username" value="<?php echo $d->username ?>" readonly></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10"><input type="password" class="form-control" name="password" value="<?php echo $d->password ?>" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama_lengkap" value="<?php echo $d->nama_lengkap ?>" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">No. Handphone</label>
                                    <div class="col-sm-10"><input type="number" class="form-control" name="no_hp" value="<?php echo $d->no_hp ?>" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="email" value="<?php echo $d->email ?>" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="alamat" value="<?php echo $d->alamat ?>" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Akses</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="akses" value="<?php echo $d->akses ?>" required></div>
                                </div>
                                <!-- <div class="form-group"><label class="col-sm-2 control-label">Akses</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="akses">
                                            <option value="admin">Admin</option>
                                            <option value="masyarakat">Masyarakat</option>
                                            <option value="kabid">Kepala Bidang</option>
                                            <option value="kasek">Kepala Seksi</option>
                                            <option value="kadin">Kepala Dinas</option>
                                            <option value="kasir">Staff Kasir</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Edit Pengguna">
                                        <!-- <a href=""><button class="btn btn-white">Batal</button></a>
                                        <button class="btn btn-primary" type="submit">Tambah Pengguna</button> -->
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
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

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url() ?>assets/backend/js/inspinia.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/backend/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:14:37 GMT -->
</html>

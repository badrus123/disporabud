<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:13:18 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar | DISPORABUD</title>

    <link href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/backend/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3>Welcome to Disporabud</h3>
            <!-- <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views. -->
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            <!-- </p> -->
            <p>Daftar Akun</p>
            <form method="post" class="m-t" role="form" action="<?php echo base_url() ?>c_disporabud/registrasi">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="No KTP" required="" name="no_ktp">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" required="" name="nama_lengkap">
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" placeholder="No Handphone" required="" name="no_hp">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" required="" name="email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Alamat" required="" name="alamat">
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Daftar</button>

                <!-- <a href="#"><small>Forgot password?</small></a> -->

                <p class="text-muted text-center"><small>Sudah punya akun?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url() ?>c_disporabud/v_login">Login</a>
            </form>
            <!-- <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p> -->
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>assets/backend/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/js/bootstrap.min.js"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:13:18 GMT -->
</html>

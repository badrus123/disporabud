<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/graph_chartjs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:14:10 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet">

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
                    <a href="<?php echo base_url() ?>c_disporabud/index"><i class="fa fa-book">
                    </i> <span class="nav-label">Laporan</span></a>
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
                    <span class="m-r-sm text-muted welcome-message">Welcome to Dashboard</span>
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
                <h2>Laporan Peminjaman</h2>
                <p>Laporan Peminjaman Sarana Olahraga DISPORABUD</p>
                <!-- <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a>Graphs</a>
                    </li>
                    <li class="active">
                        <strong>Chart</strong>
                    </li>
                </ol> -->
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Total Peminjaman Prasarana Disporabud </h5>
                            <!-- <?php echo print_r($peminjaman) ?> -->
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="doughnutChart" height="85"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
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

    <!-- ChartJS-->
    <script src="<?php echo base_url() ?>assets/backend/js/plugins/chartJs/Chart.min.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/backend/js/demo/chartjs-demo.js"></script> -->

    <script>
        $(function () {

            var doughnutData = {
                <?php 
                $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                
                // $random_warna = "'#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6)";
                foreach ($peminjaman as $d) {
                    $jumlah[] = $d->jumlah;
                    $nama_prasarana[] = $d->nama_prasarana;
                    $warna[] = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
                }

                // print_r($jumlah);
                // print_r($nama_prasarana);
                // print_r($warna);

                ?>

                labels : <?=json_encode($nama_prasarana)?>,
                datasets : [{
                    data: <?=json_encode($jumlah)?>,
                    backgroundColor: <?=json_encode($warna)?>
                }]
            };
            
            // var doughnutData = {
            //     labels: ["App","Software","Laptop", "App","Software","Laptop" ],
            //     datasets: [{
            //         data: [300,50,100,300,50,100],
            //         backgroundColor: ["#a3e1d4","#dedede","#b5b8cf", "#a3e1d4","#dedede","#b5b8cf"]
            //     }]
            // } ;


            var doughnutOptions = {
                responsive: true
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        });
    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/graph_chartjs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 May 2018 07:14:11 GMT -->
</html>

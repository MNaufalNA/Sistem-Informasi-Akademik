<?php
$tahun_ajaran = $this->db->query("SELECT tahun_ajaran, semester FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ASIS | Aplikasi Sistem Sekolah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/jvectormap/jquery-jvectormap.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/select2/dist/css/select2.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
  
  <link href="<?php echo base_url(); ?>asset/fullcalendar.css" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/dist/js/jquery.tabledit.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="<?php echo base_url(); ?>asset/fullcalendar.js"></script>

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/upload/'.$sekolah->logo; ?>" alt="ASIS LOGO" class="brand-image img-rounded elevation-3" style="height: 40px; width: 40px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <div class="pull-left image">
          <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/upload/'.$sekolah->logo; ?>" style="height: 40px; width: 40px;" class="img-circle" alt="ASIS LOGO"></div><b>AKADEMIK</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
          <li>
            <a href="#"><span style="background:red;padding:5px;font-weight:bold;">Tahun Ajaran : <?php echo $tahun_ajaran->tahun_ajaran.' | Semester '.$tahun_ajaran->semester; ?></span></a>
          </li>
       
          <li>
            <a href="<?php echo base_url(); ?>logout" style="background:#000;"><i class="fa fa-sign-out"> </i> Logout</a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
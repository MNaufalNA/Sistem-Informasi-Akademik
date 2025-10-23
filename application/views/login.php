<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ASIS | Aplikasi Sistem Sekolah </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/plugins/animate/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/animate.css-master/animate.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/login/w3.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/login/main.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/login/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/login/font.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/login/custom.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/login/material-design-icons.css">
  <!-- Font Awesome Icons -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
</head>

<style type="text/css">
body,
html {
  height: 100%;
}

div.app {
  display: flex;
  height: 100%;
  width: 100%;
  flex-direction: column;
}

.login-wrapper {
  flex: 1;
  background-color: black;
  height: 100%;
}

.login-wrapper>* {
  height: 100% !important;
}

.login-wrapper .bg-pic {
  position: absolute;
  width: 100%;

  overflow: hidden;
}

.login-wrapper .bg-pic>img {
  height: 100%;
  opacity: 0.9;
  max-width: 75%;
}

.login-wrapper .login-container {
  width: 500px;
  display: block;
  position: relative;
  float: right;
  /*background: linear-gradient(to bottom, #5e70f7 0%, #20b9fe 100%);*/
  /*color:white;*/
}

.login-wrapper .bg-caption {
  width: 500px;
}

.login-wrapper .pull-bottom {
  position: absolute !important;
  bottom: 0;
}

small,
.small {
  line-height: 18px;
}

.changevhd {
  margin: 0 auto;
  font-size: 36px;
  padding: 100px;
}

/* Responsive handlers : Login
    ------------------------------------
    */
@media (max-width: 768px) {
  .login-wrapper .login-container {
    width: 100%;
  }

  .register-container {
    width: 100%;
    padding: 15px;
  }
}

@media only screen and (max-width: 321px) {
  .login-wrapper .login-container {
    width: 100%;
  }
}
</style>

<?php
    $Dd  = date("D");
    $bln = date("M");
    if ($Dd == "Sun") {$hari = "Minggu, ";} else if ($Dd == "Mon") {$hari = "Senin, ";} else if ($Dd == "Tue") {$hari = "Selasa, ";} else if ($Dd == "Wed") {$hari = "Rabu, ";} else if ($Dd == "Thu") {$hari = "Kamis, ";} else if ($Dd == "Fri") {$hari = "Jum'at, ";} else if ($Dd == "Sat") {$hari = "Sabtu, ";} else { $hari = $Dd;}

    if ($bln == 'Jan') {$bln = "Januari ";} elseif ($bln == 'Feb') {$bln = "Februari ";} elseif ($bln == 'Mar') {$bln = "Maret ";} elseif ($bln == 'Apr') {$bln = "April";} elseif ($bln == 'May') {$bln = "Mei ";} elseif ($bln == 'Jun') {$bln = "Juni ";} elseif ($bln == 'Jul') {$bln = "Juli ";} elseif ($bln == 'Aug') {$bln = "Agustus ";} elseif ($bln == 'Sep') {$bln = "September ";} elseif ($bln == 'Oct') {$bln = "Oktober ";} elseif ($bln == 'Nov') {$bln = "November";} elseif ($bln == 'Dec') {$bln = "Desember ";} else { $bln = $bln;}
    $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
?>


</head>

<body>
  <div id="app" class="app ">
    <div class="login-wrapper">
      <div class="bg-pic animated fadeInLeft" style="background-color: #fff; width: calc(100% - 500px); display: flex;
  align-items: center;
  justify-content: center;">
        <div style="width: 50%; display: flex;
  align-items: center;
  justify-content: center;">
          <img width="200%" height="200%" src="<?php echo base_url(); ?>upload/logo.jpeg">
        </div>

        <!-- <div class="bg-caption pull-bottom text-white p-l-md">
          <h2 class="semi-bold"></h2>
        </div> -->
      </div>

      <div class="login-container white animated fadeInDown" style="min-height: 100vh;">
        <div class="m-x-sm m-t-sm">
          <div class="p-x-sm p-y-xs pull-left btn btn-primary btn-sm">
            <i class='fas fa-calendar-alt'></i>
            <?php echo $hari . "&nbsp;";
                echo date('d') . "&nbsp;";
                echo $bln . "&nbsp;";
            echo date('Y'); ?>
          </div>
          <div class="p-x-sm p-y-xs pull-right btn btn-danger btn-sm">
            <i class="far fa-clock"></i> <span class="" id="clock"></span>
          </div>
        </div>

        <div class=" p-x-md m-t-lg"><br>
          <div class="text-center p-x-sm">
            <h3>LOGIN</h3>
            </b>
          </div>

          <form action="<?php echo base_url(); ?>login/cek" method='post' class="">
            <div class="md-form-group 1"><b>Username</b>
              <input placeholder="username" type="text" required="required" name="username" value=""
                class="md-input p-l-1">
            </div>

            <div class="md-form-group 1"><b>Password</b>
              <input placeholder="password" type="password" name="password" required="required" class="md-input p-l-1">
            </div>

            <div class="m-b-md">
              <label class="md-check">
                <input type="checkbox" id="show_password" value="1"><i class="primary"></i> Show Password</label>
            </div>

            <button type="submit" name="submit" class="btn blue p-l-md p-r-md btn-block p-x-md">LOGIN</button>
            <input type="hidden" name="submit">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
      if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
          $status  = htmlspecialchars($_SESSION['status'], ENT_QUOTES, 'UTF-8');
          $message = htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8');

          echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'OTP Expired',
                text: '{$message}',
                icon: '" . strtolower($status) . "',
                confirmButtonText: 'OKE'
            });
        });
    </script>";

          unset($_SESSION['status']);
          unset($_SESSION['username']);
          unset($_SESSION['password']);
          unset($_SESSION['message']);
      }
  ?>




  <script src="<?php echo base_url(); ?>assets/dist/login/packages.js" type="text/javascript"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <!-- <script>
  Swal.fire({
    title: 'Tes SweetAlert2!',
    text: 'Ini hanya tes.',
    icon: 'success',
    confirmButtonText: 'OK'
  });
  </script> -->
  <script type="text/javascript">
  function showTime() {
    var a_p = "";
    var today = new Date();
    var curr_hour = today.getHours();
    var curr_minute = today.getMinutes();
    var curr_second = today.getSeconds();
    if (curr_hour < 12) {
      a_p = "AM";
    } else {
      a_p = "PM";
    }
    if (curr_hour == 0) {
      curr_hour = 12;
    }
    if (curr_hour > 12) {
      curr_hour = curr_hour - 12;
    }
    curr_hour = checkTime(curr_hour);
    curr_minute = checkTime(curr_minute);
    curr_second = checkTime(curr_second);
    document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
  }

  function checkTime(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
  }
  setInterval(showTime, 500);
  </script>

  <script>
  $(document).ready(function() {
    if ($('input[name=username]').val().trim() == '') $('input[name=username]').focus();
    else $('input[name=password]').focus();

    $("#show_password").change(function(event) {
      if ($(this).is(':checked')) {
        $("input[name=password]").prop('type', "text");
      } else {
        $("input[name=password]").prop('type', "password");
      }
    });
  });
  // Swal.fire({
  //   icon: "error",
  //   title: "Oops...",
  //   text: "Something went wrong!",
  //   // footer: '<a href="#">Why do I have this issue?</a>'
  // });
  </script>
  <script src="<?php echo base_url(); ?>assets/dist/login/app.js" type="text/javascript"></script>
</body>

</html>
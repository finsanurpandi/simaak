<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMAAK</title>
  <!-- FAVICON -->
  <link rel="icon" href="<?=base_url('assets/img')?>/favicon.gif" type="image/gif">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/css/')?>AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/css')?>/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins')?>/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="<?=base_url('assets/plugins')?>/morris/morris.css"> -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins')?>/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins')?>/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins')?>/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins')?>/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Custom CSS Bootstrap -->
  <link rel="stylesheet" href="<?=base_url('assets/css')?>/custom.css">
  <!-- SELECT 2 -->
  <link rel="stylesheet" href="<?=base_url('assets/css')?>/select2.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">SIMAAK</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
            <?php
              if ($user['image'] == null) {
                if ($user['jenis_kelamin'] == 'L') {
                  echo "<img src='".base_url('assets/uploads/profiles/default_male.jpg')."' class='user-image' alt='User Image'>";
                } else {
                  echo "<img src='".base_url('assets/uploads/profiles/default_female.jpg')."' class='user-image' alt='User Image'>";
                };
              } else {
              ?>
                <img src="<?=base_url('assets/uploads/profiles/'.$user['image'])?>" class="user-image" alt="User Image">
              <?php
              } 
             ?>

              <span class="hidden-xs">
              <?php 
              if ($role == 2) {
                      if ($user['gelar_depan'] !== '') {
                        echo $user['gelar_depan'].' '.$user['nama'].', '.$user['gelar_belakang'];
                      } else {
                        echo $user['nama'].', '.$user['gelar_belakang'];
                      }
                      
                    } else {
                      echo $user['nama'];
                    }
              ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <?php
                  if ($user['image'] == null) {
                    if ($user['jenis_kelamin'] == 'L') {
                      echo "<img src='".base_url('assets/uploads/profiles/default_male.jpg')."' class='img-circle' alt='User Image'>";
                    } else {
                      echo "<img src='".base_url('assets/uploads/profiles/default_female.jpg')."' class='img-circle' alt='User Image'>";
                    };
                  } else {
                  ?>
                    <img src="<?=base_url('assets/uploads/profiles/'.$user['image'])?>" class="img-circle" alt="User Image">
                  <?php
                  } 
                 ?>

                <p>
                  <?php
                    if ($role == 0) {
                      echo $user['nama'];
                    } else if ($role == 1) {
                      echo $user['nama'];
                      echo "<small>Angkatan ".$user['angkatan']."</small>";
                    } else if ($role == 2) {
                      if ($user['gelar_depan'] !== '') {
                        echo $user['gelar_depan'].' '.$user['nama'].', '.$user['gelar_belakang'];
                      } else {
                        echo $user['nama'].', '.$user['gelar_belakang'];
                      }
                      
                    }
                  ?>

                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               <!--  <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="text-center">
                  <a href="<?=base_url('login/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         <!--  <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
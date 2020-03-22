<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>New Order</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
   <!-- Invoice credentials css-->
   <link rel="stylesheet" href="<?php echo base_url('assets/css/invoice.css');?>">
   <!-- Invoice time set-->
   <script type="text/javascript" src="<?php echo base_url('assets/js/time.js');?>"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body  class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="POST" >
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="text" placeholder="Search" name="search" id="search" value='<?php $search ?>'>
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit" name="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link" id="show_time"></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link" id="show_date"></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url('assets/img/logo.jpg');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Invoice Builder</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/img/photo.jpg');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Satender Singh</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo site_url('main/add_user');?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Add User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('#');?>" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Manage Invoices
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Auth/change_password');?>" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Auth/change_email');?>" class="nav-link">
            <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Change Email
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Auth/unregister');?>" class="nav-link">
            <i class="nav-icon fas fa-ban"></i>
              <p>
                Deactivate Account
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Auth/logout');?>" class="nav-link" onclick="return confirm_logout()">
              <i class="nav-icon fa fa-sign-out"  ></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

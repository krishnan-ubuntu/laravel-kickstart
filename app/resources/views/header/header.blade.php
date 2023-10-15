<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" sizes="32x32" href="/static/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/static/images/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/static/images/favicon/favicon-16x16.png">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  Laravel Kickstart
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

  <script src="/static/assets/js/lib/jquery-3.4.1.min.js"></script>
  <script src="/static/assets/js/lib/jquery.validate.js"></script>
  <script src="/static/assets/js/core/bootstrap.min.js"></script>

  <!-- CSS Files -->
  <link href="/static/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/static/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/static/assets/demo/demo.css" rel="stylesheet" />

  <script src="/static/assets/js/lib/vue.min.js"></script>
  <script src="/static/assets/js/lib/axios.min.js"></script>
  <script src="/static/assets/js/lib/lodash.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.13/dist/sweetalert2.all.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="success">
      <div class="logo">
        <a href="home" class="simple-text logo-normal">
          <p><img id="default_logo" class="img-responsive"
            src="/static/images/logo/team_tasks_logo.png" alt="laravel kickstart logo"></p><br><br>
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li>
              <a href="/dashboard">
                <i class="nc-icon nc-minimal-right"></i>
                <p><b>Dashboard</b></p>
              </a>
            </li>
            <li>
              <a href="/home">
                <i class="nc-icon nc-minimal-right"></i>
                <p><b>Home</b></p>
              </a>
            </li>
            <li>
              <a href="/admin">
                <i class="nc-icon nc-minimal-right"></i>
                <p><b>Admin</b></p>
              </a>
            </li>
            <li>
              <a href="/reports">
                <i class="nc-icon nc-minimal-right"></i>
                <p><b>Reports</b></p>
              </a>
            </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand"><b>Welcome</b></a>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>


          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div>
              <input class="form-control" type="text" placeholder="Enter search query">
            </div>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown" id="notificationsApp">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i><span class="badge badge-danger">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <span v-for="(item, index) in notifications">
                    <a class="dropdown-item" href="/notifications/detail/1">Test notification</a>
                  </span>
                    <hr>
                    <a class="dropdown-item" href="notifications">See all notifications</a>
                </div>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-single-02"></i>
                  <p><b>Profile</b></p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="my-profile">Profile</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<script src="/static/assets/js/app/isadmin.js"></script>
<script src="/static/assets/js/app/recent_notifications.js"></script>
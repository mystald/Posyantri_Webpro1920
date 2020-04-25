<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/carousel.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/main.css">
	  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/mdb.min.css">
    
    <style>
      .modal-backdrop {
        z-index: 1;
      }
      
    </style>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">
        <img src="<?=base_url()?>assets/img/logofixfix-removebg-preview-removebg-preview.png" width='50' height='50'alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=#>About</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <button type="button" class="nav-link btn btn-primary" data-toggle="modal" data-target="#login">Login</button>
              <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="post" action="<?php echo base_url('main/actionLogin'); ?>">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputUsername1">Username</label>
                          <input type="username" class="form-control" id="exampleInputUsername1" placeholder="Enter username" name="username">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
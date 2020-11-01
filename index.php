<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    $_SESSION['index']=0;
    $p = 'start';
  ?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>CarPaint - Home Page</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="./index.php?p=start">CarPaint</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
        </ul>
      </div>
      <form class="form-inline mr-auto" method="get" action="index.php?p=search">
        <input name="search" class="form-control" type="text" placeholder="Search by brand" aria-label="Search" />
        <button style="background-color: cadetblue" class="btn btn-mdb-color btn-rounded btn-sm my-0 ml-sm-2"
          type="submit">
          Search
        </button>
      </form>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Welcome to CarPaint</h1>
        <?php
        if(isset($_GET['search'])){
          $_REQUEST['p'] = 'search';
        }
            if(isset($_REQUEST['p'])){
              $p=$_REQUEST['p'];
            }
            switch($p){
              case 'start' :  require 'listing.php';
                              break;
              case 'paint' :  require 'paint.php';
                              break;
              case 'color' :  require 'color.php';
                              break;
              case 'search':  require 'search.php';
                              break;
              default: echo("the page doesn't exist");
            }
          ?>
        <p>Powered by : </p>
        <ul class="list-unstyled">
          <li>Bootstrap 4.5.0</li>
          <li>php</li>
          <li>MongoDB</li>
          <li>node.js</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- JavaScript -->
  <script src="./jsFunctions.js">
</script>
  <script src="./jquery/jquery.slim.min.js"></script>
  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Pokemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="container-fluid">

        <div class="row">
            <!-- SIBEDAR -->
             <!-- <div id="container-sidebar"   class="bg-dark col-md-6 col-lg-1 m-0 p-0"> -->
                <?php require_once __DIR__."/sidebar.php"; ?>
             <!-- </div> -->
            <div class="col-12 col-lg-11 bg-light">
                
                <!-- NAVBAR -->
                <div id="container-navbar">
                    <?php require_once "navbar.php"; ?>
                </div>

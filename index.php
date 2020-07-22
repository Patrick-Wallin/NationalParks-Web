<!doctype html>
<?php
  require_once "global.php";
  require_once "loadparks.php";
  require_once "loadregionsandstates.php";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Patrick Wallin">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>National Parks Developed By Patrick Wallin</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-custom">
          <a class="navbar-brand" href="#">
            <img src="images/NPS_Logo.png" />
            
          </a>
          <div class="title font-italic font-weight-bold">National Parks</div>
          <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ml-auto regionmenu">
              <?php
                loadRegions();
              ?>
            </ul>
          </div>
      </nav>
    </header>
    <div class="mainbody">
      <nav class="nav d-flex statemenu">
        <?php
          loadStates();
        ?>
      </nav>
    </div>
    <div class="container-fluid" id="listparks">
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/scripts.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        console.log( "ready!" );        
        $('a.regionmenu').first().trigger('click');
      });
    </script>
  </body>
</html>
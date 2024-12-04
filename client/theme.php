<!DOCTYPE html>
<html lang="en">
<head>
  <title>FF-Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="asset/style.css">
  <link href="../admin/asset/css/mycss.css" rel="stylesheet">
</head>
<body>

<div class="jumbotron">
  <?php include('../client/header.php')?>
</div>
<hr>

<div class="danhmuc">
   <?php include('../client/danhmuc.php')?>
</div>


<div class="container">    
    <?php include('../client/section.php') ?>
    <?php include('../client/timkiem.php') ?>
   
</div><br>
 


<footer>
  <?php include('../client/footer.php')?>
</footer>

</body>
</html>

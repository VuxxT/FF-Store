


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shop FF-store / Administrator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="./asset/css/mycss.css" rel="stylesheet">
  <title>Shop FF-store / Administrator</title>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <?php
        include('../admin/menu.php')
      ?>
    </div>

    <div class="col-sm-9">
    <?php
        include('../admin/section.php')
    ?>
    </div>
  </div>
</div>

<footer class="container-fluid">
<?php
        include('../admin/footer.php')
?>
</footer>

</body>
</html>
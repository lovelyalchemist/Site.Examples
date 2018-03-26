<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dicle Kırmızıoğlu</title>
  <link rel="stylesheet" media="screen" href="style.css?v=8may2013">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="path/to/node_modules/clarity-icons/clarity-icons.min.css">
  <meta name="author" content="Ebru Esra">
  <meta name="description" content="Bir tanıtım sitesi.">
  <meta name="robots" content="all">

  <!--[if lt IE 9]>
  <script src="script/html5shiv.js"></script>
  <![endif]-->
</head>
<body >
   <form action="accept-file.php" method="post" enctype="multipart/form-data">
        Your Photo: <input type="file" name="photo" size="25" />
    <input type="submit" name="submit" value="Submit" />
    </form>
</body>
</html>
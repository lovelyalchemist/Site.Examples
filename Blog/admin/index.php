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
	<div class="loginpage">
		<div class="form">
    		<form class="form-wrapper" id="login-form" method="post">
    			<div class="form-title"><h3>Kullanıcı Adı</h3></div>
    			<div class="form-input-user"></div>
    				<input type="text" class="form-input" name="user" required="required" placeholder="Username" autofocus required></input>
        		<div class="form-title"><h3>Şifre</h3></div>
        		<div class="form-input-password"></div>
        			<input type="password"  class="form-input" name="pass" required="required" placeholder="Password" required></input>
        		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
        	</form>
    	</div>
        <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
			
			$query 		= mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['user_id']=$row['user_id'];
					header('location:home.php');
					
				}
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>
  </div>
</body>
</html>
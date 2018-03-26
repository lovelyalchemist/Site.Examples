<?php
// connect to the database
include('dbcon.php');

// creates the new/edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($title = '', $body ='', $error = '', $id = '')
{ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dicle Kırmızıoğlu</title>

	<link rel="stylesheet" media="screen" href="style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Ebru Esra">
	<meta name="description" content="Bir tanıtım sitesi.">
	<meta name="robots" content="all">
</head>
<body>
<div class="container">
	<div class="sidebar">
    <ul>	
    	<li><a href="home.php">AnaSayfa</a></li>
    	<li><a href="about.php">Hakkımda</a></li>
        <li><a href="writings.php">Yazılar</a></li>
    </ul>
	</div>

<div>
<?php if ($id != '') { ?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>ID: <?php echo $id; ?></p>
<?php } ?>

<strong>Yazı</strong> 
<div name="body">
    <?php echo $body; ?>
</div>


</div>

</body>
</html>

<?php }



/*

EDIT RECORD

*/
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id']))
{
// make sure the 'id' in the URL is valid
if (is_numeric($_POST['id']))
{
// get variables from the URL/form
$id = $_POST['id'];
$title = htmlspecialchars_decode($_POST['title'], ENT_QUOTES);
$body = htmlspecialchars_decode($_POST['body'], ENT_QUOTES);
}

// if the form hasn't been submitted yet, get the info from the database and show the form
else
{
// make sure the 'id' value is valid
if (is_numeric($_GET['id']) && $_GET['id'] > 0)
{
// get 'id' from URL
$id = $_GET['id'];

// get the recod from the database
if($stmt = $con->prepare("SELECT * FROM posts WHERE id=?"))
{
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->bind_result($id, $title, $body, $date);
$stmt->fetch();

// show the form
renderForm($title, $body, NULL, $id);
$stmt->close();
}
}
}
}



// close the con connection
$con->close();
?>
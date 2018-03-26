<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

// creates the new/edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($title = '', $body ='', $error = '', $id = '')
{ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>
<?php if ($id != '') { echo "Kayıt Düzenleme"; } else { echo "Yeni Kayıt"; } ?>
</title>
<script src="ckeditor/ckeditor.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1><?php if ($id != '') { echo "Kayıt Düzenleme"; } else { echo "Yeni Kayıt"; } ?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error
. "</div>";
} ?>

<form action="" method="post">
<div>
<?php if ($id != '') { ?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>ID: <?php echo $id; ?></p>
<?php } ?>
<textarea name="body" id="editor1" rows="10" cols="80">
    <?php echo $body; ?>
</textarea>
<input type="submit" name="submit" class="button" value="Submit" />

</div>
</form>
<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
 CKEDITOR.replace( 'editor1' );
</script>
</body>
</html>

<?php }

/*

EDIT RECORD

*/
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id']))
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// make sure the 'id' in the URL is valid
if (is_numeric($_POST['id']))
{
// get variables from the URL/form
$id = $_POST['id'];
$title = htmlentities($_POST['title'], ENT_QUOTES);
$body = htmlentities($_POST['body'], ENT_QUOTES);

// check that title and body are both not empty
if ($body == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($title, $body, $error, $id);
}
else
{
// if everything is fine, update the record in the database
if ($stmt = $con->prepare("UPDATE posts SET body = ?
WHERE id=?"))
{
$stmt->bind_param("si", $body, $id);
$stmt->execute();
$stmt->close();
}
// show an error message if the query has an error
else
{
echo "ERROR: could not prepare SQL statement.";
}

// redirect the user once the form is updated
header("Location: writingsview.php");
}
}
// if the 'id' variable is not valid, show an error message
else
{
echo "Error!";
}
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
// show an error if the query has an error
else
{
echo "Error: could not prepare SQL statement";
}
}
// if the 'id' value is not valid, redirect the user back to the writings.php page
else
{
header("Location: writings.php");
}
}
}

/*

NEW RECORD

*/
// if the 'id' variable is not set in the URL, we must be creating a new record
else
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// get the form data
$title = htmlentities($_POST['title'], ENT_QUOTES);
$body = htmlentities($_POST['body'], ENT_QUOTES);

// check that title and body are both not empty
if ($body == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($title, $body, $error);
}
else
{
// insert the new record into the database
if ($stmt = $con->prepare("INSERT posts (title, body) VALUES (?, ?)"))
{
$stmt->bind_param("ss", $title, $body);
$stmt->execute();
$stmt->close();
}
// show an error if the query has an error
else
{
echo "ERROR: Could not prepare SQL statement.";
}

// redirect the user
header("Location: writingsview.php");
}

}
// if the form hasn't been submitted yet, show the form
else
{
renderForm();
}
}

// close the con connection
$con->close();
?>
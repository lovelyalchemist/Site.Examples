<?php 
include'dbcon.php';
include 'header.php';
// creates the new/edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($title = '', $body ='', $error = '', $id = '')
{ ?>

	<div class="content"> 
		<div class="boxpost">
			<?php if ($id != '') { ?>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<?php } ?>
	    <?php echo "" . htmlspecialchars_decode($body). ""; ?>
	</div>
</div>
</div>
</div>
</body>
</html>

<?php }

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
}

// close the con connection
$con->close();
?>
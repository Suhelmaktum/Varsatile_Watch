
<?php
session_start();
$old_user = $_SESSION['valid_user']; 

// store to test if they were logged in
unset($_SESSION['shopping_cart']);
unset($_SESSION['user']);

session_destroy();
 header('Location:adminmain.html');
?>
<html>
<body>
<h1>Log out</h1>
<?php
if (!empty($old_user))
{
echo 'Logged out.<br />';
}
else
{
// if they weren't logged in but came to this page somehow
echo 'You were not logged in, and so have not been logged out.<br />';
}
?>
<a href="demo.php">Back to main page</a>
</body>
</html>				
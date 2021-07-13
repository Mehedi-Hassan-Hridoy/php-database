<?php
include 'DBRead.php';

$userName = $_pass ="";
$userNameErr = $_passErr ="";
$flag = false;

if($_SERVER['REQUEST_METHOD'] == "POST") {

	$userName = $_POST['uname'];
	$password = $_POST['password'];
	if(empty($_POST['uname'])) {
		$userNameErr = "User name can't be empty!";
		$flag = true;
    }
    if(empty($_POST['uname'])) {
		$userNameErr = "Password can't be empty!";
		$flag = true;
    }
    if(!$flag) {
    	
    }
}
                    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
	<h1>Login Form</h1>
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<fieldset>
			<legend><b>Login</b></legend>
			<label for="username">Username:</label>
			<input type="text" name="uname" id="username">
            <?php echo $userNameErr; ?>
            <br><br>
			<label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <?php echo $_passErr; ?>
        </fieldset>
        <input type="submit" value="Login">
    </form>
    <a href="reg-form.php">Registration</a>
</body>
</html> 
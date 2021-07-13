<?php
include 'DBInsert.php'; 

$firstName = $lastName = $gender = $dob = $religion = $presentAdd = $permAdd = $phoneNo =  $emailId = $webLink = $userName = $_pass = "";

$firstNameErr = $lastNameErr = $genderErr = $dobErr = $religionErr = $presentAddErr = $permAddErr = $phoneErr =  $emailErr = $webLinkErr = $userNameErr = $_passErr = "";
$validMessage = $errorMessage = "";
$flag = false;
 
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $firstName = $_POST['fname']; 
    $lastName = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['birthday'];
    $religion = $_POST['religion'];
    $presentAdd = $_POST['presentaddress'];
    $permAdd = $_POST['permanentaddress'];
    $phoneNo = $_POST['phone']; 
    $emailId = $_POST['email'];
    $webLink = $_POST['website']; 
    $userName = $_POST['uname']; 
    $_pass = $_POST['password'];

    if(empty($_POST['fname'])) {
        $firstNameErr = "First name can't be empty!";
        $flag = true;
    }
    if(empty($_POST['lname'])) {
        $lastNameErr = "Last name can't be empty!";
        $flag = true;
    }
    if(empty($_POST['gender'])) {
        $genderErr = "Gender can't be empty!";
        $flag = true;
    } 
    if(empty($_POST['birthday'])) {
        $dobErr = "DOB can't be empty!";
        $flag = true;
    }
    if(empty($_POST['riligion'])) {
        $riligionErr = "Riligion can't be empty!";
        $flag = true;
    }
    if(empty($_POST['presentaddress'])) {
        $presentAddErr = "Present address can't be empty!";
        $flag = true;
    }
    if(empty($_POST['permanentaddress'])) {
        $permAddErr = "Permanent address can't be empty!";
        $flag = true;
    }
    if(empty($_POST['Phone'])) {
        $phoneErr = "Phone can't be empty!";
        $flag = true;
    }
    if(empty($_POST['email'])) {
        $emailErr = "Email can't be empty!";
        $flag = true;
    }
    if(empty($_POST['website'])) {
        $webLinkErr = "Web address can't be empty!";
        $flag = true;
    }
    if(empty($_POST['uname'])) {
        $userNameErr = "User name can't be empty!";
        $flag = true;
    }
    if(empty($_POST['password'])) {
        $_passErr = "Password can't be empty!";
        $flag = true;
    }
    if(!$flag) {
         $firstName = test_input($firstName);
    
         $gender = test_input($gender);
         $dob = test_input($dob);
            $religion = test_input($religion);
            $presentAdd = test_input($presentAdd);
            $permAdd = test_input($permAdd);
            $phoneNo = test_input($phoneNo); 
            $emailId = test_input($emailId);
            $webLink = test_input($webLink); 
            $userName = test_input($userName); 
            $_pass = test_input($_pass);
            $response = register($fname,$gender,$birthday,$religion,$presentaddress,$permanentaddress,$phone,$email,$website,$uname,$password);
            if($response){
                $validMessage = "Successfully saved";
            }
            else{
                $errorMessage = "Error while saving";
            }
    }  
}

 function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
}

 function write($content) {
$fileName = "reg.txt";
$resource = fopen($fileName, "w");
$fw = fwrite($resource, $content);
fclose($resource);
return $fw;
}
          
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <h1>Registration Form:</h1>
    <a href="login.php">Login</a>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <legend>Basic Information:</legend>
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname">
            <?php echo $firstNameErr; ?>
            <br><br>
            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="lname">
            <?php echo $lastNameErr; ?>
            <br><br>
            <label for="gender">Gender:</label>
            <br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
            <?php echo $genderErr; ?>
            <br><br>
            <label for="birthday">Date of birth:</label>
            <input type="date" id="birthday" name="birthday">
            <?php echo $dobErr; ?>
            <br><br>
            <label for="religion">Religion:</label> 
            <select id="religion" name="religion">
                <option value="muslim">Muslim</option>
                <option value="hindu">Hindu</option>
                <option value="buddish">Buddish</option>
                <option value="christan">Christan</option>
            </select>
            <?php echo $religionErr; ?>
            
        </fieldset>
        <br><br>       
        <fieldset>
            <legend>Contact Information:</legend>
            <label for="presentaddress">Present Address:</label>
            <input type="text" id="presentaddress" name="presentaddress">
            <?php echo $presentAddErr; ?>
            <br><br>
            <label for="permanentaddress">Permanent Address:</label>
            <input type="text" id="permanentaddress"name="permanentaddress">
            <?php echo $permAddErr; ?>
            <br><br>
            <label for="phone">Phone :</label>
            <input type="tel" id="phone" name="phone" >
            <!--<?php echo $phoneErr; ?>-->
            <br><br>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email">
            <?php echo $emailErr; ?>
            <br><br>
            <label for="website">Personal Website link :</label>
            <input type="url" id="website" name="website">
            <?php echo $webLinkErr; ?>
        </fieldset>
        <br><br>
        <fieldset>
            <legend>Account Information:</legend>
            <label for="uname">User Name:</label>
            <input type="text" id="uname" name="uname">
            <?php echo $userNameErr; ?>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <?php echo $_passErr; ?>
        </fieldset>
        <br>
        <input type="submit" value="Submit">
    </form>
    <?php echo $validMessage ?>
 <?php echo $errorMessage ?>

<?php
 
 function read() {
$fileName = "reg.txt";
$fileSize = filesize($fileName);
$fr = "";
if($fileSize > 0) {
$resource = fopen($fileName, "r");
$fr = fread($resource, $fileSize);
fclose($resource);
return $fr;
}
}

?>

</body>
</html>
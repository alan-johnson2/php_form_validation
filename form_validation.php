<?php 
$username = $password = $email = $gender ="";
$nameError = $passwordError = $emailError = $genderError ="";

if(isset($_POST["submit"]))
{
    if(empty($_POST["username"]))
    {
        $nameError = "username is required !";
    }
    else
    {
        $username=test($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
            $nameError = "Only letters and white space allowed";
          }
    }
    if(empty($_POST["password"]))
    {
        $passwordError="password is required !";
    }
    else
    {
        $password=test($_POST["password"]);
    }
    if(empty($_POST["email"]))
    {
        $emailError="email is required !";
    }
    else
    {
        $email=test($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
          }
    }
    if(empty($_POST["gender"]))
    {
        $genderError="required !";
    }
    else
    {
        $gender=test($_POST["gender"]);
    }
}

function test($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error{color:red;}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>Simple Form</h1>
    <p class="error">* required</p>
    Username : <input type="text" name="username" placeholder="enter your name">
    <span class="error">* <?php echo $nameError; ?></span><br><br>
    Password : <input type="text" name="password" placeholder="enter your password">
    <span class="error">* <?php echo $passwordError; ?></span><br><br>
    Email : <input type="text" name="email" placeholder="enter your email">
    <span class="error">* <?php echo $emailError; ?></span><br><br>
    Gender : <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender=="male") echo "checked";?>>Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female" >Female
    <input type="radio" name="gender" value="other" <?php if(isset($gender) && $gender=="other") echo "checked"; ?>>Other
    <span class="error">* <?php echo $genderError; ?></span><br><br>
    <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php 
if(isset($_POST["submit"])){
echo "<h1>Your Inputs : </h1>";
echo "Your username is : $username<br>";
echo "your password is : $password<br>";
echo "Your email is : $email<br>";
echo "Your gender is : $gender<br>";
}
?>

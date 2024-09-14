<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Accounts.php");
    require_once("includes/classes/Constants.php");

    $account = new Accounts($con);

    if(isset($_POST["submitButton"])){
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

        $success = $account->login($username, $password);

        if($success){
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
        }        
    }

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
<div class="signInContainer">
        <div class="column">
            <div class="header">
                <img src="assets/images/netflix.png" alt="">
                <h3>Sign In</h3>
                <span>to continue to Netflix</span>
                
            </div>
            <form action="" method="post">
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submitButton" value="Submit">
            </form>
            <span class="signInMsg">Don't have an account? <a href="register.php">Sign Up here!</a></span>
        </div>
    </div>
</body>
</html>
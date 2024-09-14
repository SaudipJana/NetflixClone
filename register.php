<?php
    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Accounts.php");
    require_once("includes/classes/Constants.php");

    $account = new Accounts($con);

    if(isset($_POST["submitButton"])){
        $firstName = FormSanitizer::sanitizeFormNames($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormNames($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);

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
    <title>Register</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
<div class="signInContainer">
        <div class="column">
            <div class="header">
                <img src="assets/images/netflix.png" alt="">
                <h3>Sign Up</h3>
                <span>to continue to Netflix</span>
                
            </div>
            <form action="" method="post">
                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <input type="text" name="firstName" placeholder="First Name" value="<?php getInputValue("firstName"); ?>" required>

                <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                <input type="text" name="lastName" placeholder="Last Name" value="<?php getInputValue("lastName"); ?>" required>

                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>

                <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
                <input type="email" name="email" placeholder="Email" value="<?php getInputValue("email"); ?>" required>

                <input type="email" name="email2" placeholder="Confirm Email" value="<?php getInputValue("email2"); ?>" required>

                <?php echo $account->getError(Constants::$passDosentMatch); ?>
                <?php echo $account->getError(Constants::$passwordLength); ?>
                <input type="password" name="password" placeholder="Password" required>

                <input type="password" name="password2" placeholder="Confirm Password" required>

                <input type="submit" name="submitButton" value="Submit">
            </form>
            <span class="signInMsg">Already have an account? <a href="login.php">Sign In here!</a></span>
        </div>
    </div>
</body>
</html>
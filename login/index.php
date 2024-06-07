<?php
session_start();

// Check if the error parameter is set in the URL
if (isset($_GET['error'])) {
    // Retrieve the error message from the URL
    $errorMessage = $_GET['error'];
    // Print the error message in HTML
    echo '<div class="error-message">' . htmlspecialchars($errorMessage) . '</div>';
}
if (isset($_SESSION["users_name"])) {
?>
    <p><?php echo "Welcome MR. " . $_SESSION["users_name"] . "<br>"; ?></p>
    <p><?php echo "Your Email : " . $_SESSION["users_email"] . "<br>"; ?></p>
    <p><a href="includes/logout.login.php">Logout</a></p>
<?php
} else {
?>
    <p><a href="index.php">Login</a> <a href="index.php">Registration</a></p>
<?php
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Registration</title>
</head>

<body>
    <div class="forms-container">
        <form action="includes/registration.php" method="post">
            <label for="registration"> Name :
                <input type="text" name="username" id="">
            </label>
            <label for="registration"> Password :
                <input type="text" name="password" id="">
            </label>
            <label for="registration"> Email :
                <input type="text" name="email" id="">
            </label>
            <input type="submit" name="submit" value="Get Registrated">
        </form>

        <br>
        <br>

        <form action="includes/login.php" method="post">
            <label for="registration">
                <label for="login">
                    Username : <input type="text" name="username" id="">
                </label>
                <label for="login">
                    Password : <input type="text" name="password" id="">
                </label>
                <input type="submit" value="Login" name="submit">
        </form>
    </div>
</body>

</html>
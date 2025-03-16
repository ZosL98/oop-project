<?php

    include 'includes/header.php';
    include 'includes/footer.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $pwd = $_POST['password'];
        
            require_once 'Classes/Dbh.php';
            require_once 'Classes/User.php';
        
            $user = new User($username, $pwd);
            $user->signupUser();
        } else {
            echo '<p>username and password are required</p> <hr>';
        }
    }
?>

    <h1>Register</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <div>
            <div>Username:</div>
            <input type="text" name="username" value="<?php if (isset($_POST['username'])) {echo $_POST['username'];} ?>">
        </div>
        <div>
            <br>
        <div>Password:</div>
            <input type="password" name="password">
        </div>
            <br>
        <div><input type="submit" value="Submit"></div>
    </form>

    <p><a href="index.php">Back to home page</a></p>
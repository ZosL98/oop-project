<?php
    include 'includes/header.php';
    include 'includes/footer.php';
?>

<?php

    if (isset($_SESSION['id'])) {
        header("Location: index.php?message=You are already logged in");
        die();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'Classes/Dbh.php';
        require_once 'Classes/User.php';

        $user = new User($_POST['username'], $_POST['password']);
        $user->login();
    }
?>

<h1>Login</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <div>
            <div>Username:</div>
            <input type="text" name="username">
        </div>
            <br>
        <div>
        <div>Password:</div>
            <input type="password" name="password">
        </div>
            <br>
        <div><input type="submit" value="Submit"></div>
    </form>


<p><a href="index.php">Back to home page</a></p>
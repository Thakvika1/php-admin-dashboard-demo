
<link rel="stylesheet" href="./src/log-in.css">

<?php
    $file_user_data = "user-data.json";

    // auto login
    if (isset($_COOKIE['remember_user'])) {
        header("Location: web.php");
        exit;
    }


    // Handle login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $users_data = json_decode(file_get_contents($file_user_data), true);

        if (isset($users_data[$username]) && $users_data[$username]['password'] === $password) {
            setcookie("remember_user", $username, time() + (86400 * 7)); // 7 days
            header("Location: web.php");
            exit;
        }

        else {
            $error = "Invalid informations.";
        }
    }
?>


    <h1>Login</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input name="username" placeholder="Username" ><br>
        <input name="password" type="password" placeholder="Password" ><br>
        <button type="submit">Login</button>
    </form>
    <a href="web.php">View our application</a>

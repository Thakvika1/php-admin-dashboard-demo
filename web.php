<?php

    $username = "Guest";

    if (isset($_COOKIE['remember_user'])) {
        $username = $_COOKIE['remember_user'];
    }


    $guest = '<h1>Welcome to the web application</h1> <br /> 
            <a href="sign-up.php">Sign up</a><br />
            <a href="log-in.php">Log in</a>';

    $user = '<h1>
                Hello ' . htmlspecialchars($username) . ', welcome to the web application
            </h1><br/>
            <a href="log-out.php">Logout</a><br />
            <h3>
                <a href="admin-dashboard.php">View admin dashboard</a>
            </h3>';


    echo $username === "Guest" ? $guest : $user;
?>





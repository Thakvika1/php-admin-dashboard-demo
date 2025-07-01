
<link rel="stylesheet" href="./src/sign-up.css">


<?php
    $file_user_data = 'user-data.json';

    // auto login
    if (isset($_COOKIE['remember_user'])) {
        header("Location: web.php");
        exit;
    }

    $username_exist = false;


    if (file_exists($file_user_data)) {
        $data = file_get_contents($file_user_data);
        $users = json_decode($data, true);
    }

    // when click sign up
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // get values from input form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // check if user exist 
        if (isset($users[$username])) {
            $username_exist = true;
        }


        // if not assign new user sign up
        else {
            $users[$username] = [
                'password' => $password,
                'email' => $email,
            ];

            // set cookie to remember user
            setcookie("remember_user", $username, time() + (86400 * 7)); // 7 days

            // Save user to file 
            file_put_contents($file_user_data, json_encode($users, JSON_PRETTY_PRINT));


            if (isset($users)) {
                header("Location: web.php");
                exit;
            }
        }

        // 6-digit code
        // $code = rand(100000, 999999); 


    }
?>

<form method="post">
    <h1>Signup</h1>
    <?php echo $username_exist ? "<h2 style='color:red;'> Username already taken !!</h2>" : ""  ?>
    <input name="username" required placeholder="Username"><br>
    <input name="password" type="password" required placeholder="Password"><br>
    <input name="email" type="email" required placeholder="Email"><br>
    <button type="submit">Sign Up</button>
</form>
<a href="web.php">View our application</a>

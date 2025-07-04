

<?php

    $file_user_data = 'user-data.json';


    // get user data 
    if (file_exists($file_user_data)) {
        $data = file_get_contents($file_user_data);
        $users = json_decode($data, true);
    }

    // delete user
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_user'])) {
        $delete_user = $_POST['delete_user'];
        unset($users[$delete_user]);
        
        file_put_contents($file_user_data, json_encode($users, JSON_PRETTY_PRINT));
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./src/dashboard.css">
</head>
<body>

    <?php
    foreach($users as $name => $email) {
        echo '<div class="user-box">';
        echo "Name: ". htmlspecialchars($name)."<br />";
        echo "Email: ".htmlspecialchars($email['email'])."<br />";
        echo '
            <form method="post" style="display:inline;">
                <input type="hidden" name="delete_user" value="'.$name.'">
                <button type="submit">Delete</button>
            </form>
        ';
        echo '</div>';

    }

?>

    <h1>
        <a href="web.php">Go back to application</a>
    </h1>
    
</body>
</html>




    
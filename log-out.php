

<?php

    // Delete cookie
    setcookie("remember_user", "", time() - 3600); 

    // auto redirect to sign-up-page 
    header("Location: sign-up.php");

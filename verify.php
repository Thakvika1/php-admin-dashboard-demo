

<?php
    $userFile = "users/" . $_GET['user'] . ".json";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input_code = $_POST['code'];
    $user = json_decode(file_get_contents($userFile), true);

    if ($user['code'] == $input_code) {
        $user['verified'] = true;
        file_put_contents($userFile, json_encode($user, JSON_PRETTY_PRINT));
        echo "✅ Verified! You can now log in.";
    } else {
        echo "❌ Invalid code.";
    }
}
?>

<h2>Email Verification</h2>
<form method="post">
    <input name="code" required placeholder="Enter the 6-digit code"><br>
    <button type="submit">Verify</button>
</form>

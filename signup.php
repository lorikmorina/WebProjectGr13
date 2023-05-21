<?php
require_once('dbConfig.php');
// Set the values of the parameters
$fullname = $_POST["Fullname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Validate email using ZeroBounce API
$apiKey = '71b13a3403174ff68b63a1d2a053b213';
$validationUrl = "https://api.zerobounce.net/v2/validate?api_key={$apiKey}&email={$email}";

$ch = curl_init($validationUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

if ($response !== false) {
    $result = json_decode($response, true);

    // Check if email is valid
    if ($result['status'] === 'valid') {
        // Email is valid, proceed with database insertion
        $sql = "INSERT INTO users (id, fullName, email, username, saltedHash) VALUES (NULL, :fullname, :email, :username, :saltedHash)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':saltedHash', $hashed_password);

        if ($stmt->execute()) {
            // Database insertion successful
            echo "User registered successfully!";
        } else {
            // Database insertion failed
            echo "Error: Unable to register user.";
        }
    } else {
        // Email is invalid
        echo "Error: Invalid email address.";
    }
} else {
    // Error occurred while validating email
    echo "Error: Unable to validate email address.";
}
?>

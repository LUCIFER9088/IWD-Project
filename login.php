<?php
require "db.php";

$email = $_POST["email"];
$password = $_POST["password"];

$user = $db->users->findOne(['email' => $email]);

if (!$user || !password_verify($password, $user['password'])) {
    die ("Invalid Email or Password");
}
$otp = random_int(100000,999999);

$db->otps->insertOne([
    'user_id' => $user['_id'],
    'otp' => $otp,
    'expires_at' => new MongoDB\BSON\UTCDateTime(
        (time() + 120) * 1000
    )
]);

echo "OTP Sent Successfully";
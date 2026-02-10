<?php
require 'db.php';

$email = $_POST['email'];
$otp = $_POST['otp'];

$user = $db->users->findOne(['email' => $email]);

if (!$user) {
    die ("User not found");
}

$result = $db->otps->findOne([
    'user_id' => $user['_id'],
    'otp' => (int)$otp,
    'expires_at' => ['$gt' => new MongoDB\BSON\UTCDateTime()] 
]);

if (!$result){
    die ("Invalid or expired OTP");
}

$db->otps->deleteMany(['user_id' => $user['_id']]);
echo "Login Successful";
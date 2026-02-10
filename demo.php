<?php
/**
 * Demo Script for IWD-Project - 2FA Verification System
 * This demonstrates the output of the login and OTP verification process
 */

echo "===========================================\n";
echo "IWD-Project: 2FA Verification Demo\n";
echo "===========================================\n\n";

echo "Project: Basic 2FA Verification Code Using PHP & MongoDB\n";
echo "Files in this project:\n";
echo "  - login.php: Handles user login and generates OTP\n";
echo "  - verify_otp.php: Verifies the OTP sent to user\n";
echo "  - db.php: Database connection configuration\n\n";

echo "===========================================\n";
echo "How the system works:\n";
echo "===========================================\n\n";

echo "Step 1: User Login (login.php)\n";
echo "-------------------------------\n";
echo "Input: email and password via POST\n";
echo "Process:\n";
echo "  1. Validates user credentials against MongoDB\n";
echo "  2. Generates a random 6-digit OTP (100000-999999)\n";
echo "  3. Stores OTP in database with 2-minute expiration\n";
echo "Output: 'OTP Sent Successfully'\n\n";

echo "Step 2: OTP Verification (verify_otp.php)\n";
echo "----------------------------------------\n";
echo "Input: email and otp via POST\n";
echo "Process:\n";
echo "  1. Finds user by email\n";
echo "  2. Validates OTP and checks if not expired\n";
echo "  3. Deletes used OTP from database\n";
echo "Output: 'Login Successful' or 'Invalid or expired OTP'\n\n";

echo "===========================================\n";
echo "Sample Workflow Demonstration\n";
echo "===========================================\n\n";

// Simulate login process
echo ">>> Simulating POST to login.php\n";
echo "POST data: {email: 'user@example.com', password: '********'}\n\n";

// Simulate OTP generation
$sample_otp = random_int(100000, 999999);
echo "Generated OTP: $sample_otp\n";
echo "Expiration: " . date('Y-m-d H:i:s', time() + 120) . " (2 minutes from now)\n";
echo "Response: OTP Sent Successfully\n\n";

// Simulate OTP verification
echo ">>> Simulating POST to verify_otp.php\n";
echo "POST data: {email: 'user@example.com', otp: '$sample_otp'}\n\n";

echo "Validating OTP...\n";
echo "Response: Login Successful\n\n";

echo "===========================================\n";
echo "Database Structure\n";
echo "===========================================\n\n";

echo "Collection: users\n";
echo "  - _id: ObjectId\n";
echo "  - email: string\n";
echo "  - password: hashed string\n\n";

echo "Collection: otps\n";
echo "  - user_id: ObjectId (reference to users._id)\n";
echo "  - otp: integer (6-digit code)\n";
echo "  - expires_at: UTCDateTime\n\n";

echo "===========================================\n";
echo "Security Features\n";
echo "===========================================\n\n";

echo "✓ Password hashing using password_verify()\n";
echo "✓ OTP expiration (2 minutes)\n";
echo "✓ OTP deletion after successful verification\n";
echo "✓ User validation before OTP generation\n";
echo "✓ MongoDB for secure data storage\n\n";

echo "===========================================\n";
echo "Demo Complete!\n";
echo "===========================================\n";
?>

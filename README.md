# IWD-Project
Basic 2FA Verification Code Using PHP & MongoDB

## Overview
This project implements a Two-Factor Authentication (2FA) system using PHP and MongoDB. It provides secure user login with OTP (One-Time Password) verification.

## Features
- ✓ User authentication with email and password
- ✓ 6-digit OTP generation for two-factor authentication
- ✓ OTP expiration (2 minutes)
- ✓ Secure password hashing
- ✓ MongoDB database integration

## Project Structure
```
.
├── db.php           - Database connection configuration
├── login.php        - Handles user login and OTP generation
├── verify_otp.php   - Verifies OTP for authentication
├── demo.php         - Demonstration script showing system output
└── composer.json    - PHP dependencies
```

## Prerequisites
- PHP >= 7.4
- MongoDB installed and running
- Composer for dependency management

## Installation
1. Clone the repository
2. Install dependencies:
   ```bash
   composer install
   ```
3. Configure MongoDB connection in `db.php` (default: localhost:27017)

## How It Works

### Step 1: Login (login.php)
- **Input**: Email and password via POST
- **Process**:
  1. Validates user credentials against MongoDB
  2. Generates a random 6-digit OTP (100000-999999)
  3. Stores OTP in database with 2-minute expiration
- **Output**: "OTP Sent Successfully"

### Step 2: OTP Verification (verify_otp.php)
- **Input**: Email and OTP via POST
- **Process**:
  1. Finds user by email
  2. Validates OTP and checks if not expired
  3. Deletes used OTP from database
- **Output**: "Login Successful" or "Invalid or expired OTP"

## Database Structure

### Collection: users
- `_id`: ObjectId
- `email`: string
- `password`: hashed string

### Collection: otps
- `user_id`: ObjectId (reference to users._id)
- `otp`: integer (6-digit code)
- `expires_at`: UTCDateTime

## Demo Output
Run the demo script to see the system in action:
```bash
php demo.php
```

This will display:
- Complete workflow explanation
- Sample OTP generation and verification
- Database structure
- Security features

## Security Features
- Password hashing using `password_verify()`
- OTP expiration (2 minutes)
- OTP deletion after successful verification
- User validation before OTP generation
- MongoDB for secure data storage

## Usage Example

### 1. Login Request
```bash
curl -X POST http://your-server/login.php \
  -d "email=user@example.com" \
  -d "password=yourpassword"
```
Response: `OTP Sent Successfully`

### 2. Verify OTP
```bash
curl -X POST http://your-server/verify_otp.php \
  -d "email=user@example.com" \
  -d "otp=123456"
```
Response: `Login Successful`

## License
This project is open source and available for educational purposes.

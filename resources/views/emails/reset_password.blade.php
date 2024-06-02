<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
      text-align: center;
      padding: 20px 0;
      background-color: #EB2188;
      color: #fff;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }
    .content {
      padding: 20px;
    }
    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #080A52;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Jain-e-patrika</h1>
    </div>
    <div class="content">
      <h2>Password Reset</h2>
      <p>Dear {{ $mailData['name'] }},</p>
      <p>You recently requested to reset your password for your Jain-e-patrika account. To proceed with the password reset process, please click the button below:</p>
      <p><a href="{{ $mailData['password_reset_link'] }}" class="btn">Reset Password</a></p>
      <p><strong>Note:</strong> This reset password link will expire within 24 hours.</p>
      <p>If you did not request a password reset, please ignore this email.</p>
      <p>Thank you,<br>Jain-e-patrika Team</p>
    </div>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Successful</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
      padding: 20px;
      background-color: #EB2188;
      color: #fff;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }
    .header .row {
      align-items: center;
    }
    .header img {
      max-width: 100%;
      height: auto;
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
    @media (max-width: 767px) {
      .header .row {
        text-align: center;
      }
      .header .col-md-4 {
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="row">
        <div class="col-md-4 col-sm-12 text-center">
          <img src="{{ asset('logo/logo.png') }}" width="120" alt="Jain-e-patrika Logo">
        </div>
        <div class="col-md-8 col-sm-12 text-center text-md-left">
          <h1>Jain-e-patrika</h1>
        </div>
      </div>
    </div>
    <div class="content">
      <h2>Registration Successful</h2>
      <p>Dear {{ $user->name }},</p>
      <p>Congratulations! Your account has been successfully registered with Jain-e-patrika.</p>
      <p>Please find your account details below:</p>
      <ul>
        <li>Email: {{ $user->email }}</li>
        <li>WhatsApp Number: {{ $user->whatsapp_no }}</li>
        <li>User ID: {{ $user->userId }}</li>
      </ul>
      <p>You can now access our platform and enjoy the following benefits:</p>
      <ul>
        <li>Receive the latest news and updates</li>
        <li>Participate in our online community</li>
        <li>Access exclusive content and resources</li>
      </ul>
      <p>To get started, click the button below:</p>
      <p><a href="#" class="btn">Login to Your Account</a></p>
      <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>
      <p>Thank you for joining Jain-e-patrika!<br>Best regards,<br>Jain-e-patrika Team</p>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Igniculus HRM System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 200px;
        }

        .content {
            background-color: #f2f2f2;
            padding: 30px;
            border-radius: 10px;
        }

        .credentials {
            margin-bottom: 30px;
        }

        .credentials p {
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #888888;
            font-size: 14px;
        }

        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="https://igniculuss.com/wp-content/uploads/2023/08/igniculuss-logo-1.png" alt="Igniculus HRM System">
        </div>
        <div class="content">
            <h2>Welcome to Igniculus HRM System</h2>
            <p>Dear <b> {{ $mailData['title'] }} {{ $mailData['first_name'] }} {{ $mailData['last_name'] }} </b></p>
            <p>Thank you for registering with Igniculus HRM System. Please find your login credentials below:</p>
            <div class="credentials">
                <p><strong>Employee ID:</strong> {{ $mailData['employee_id'] }}</p>
                <p><strong>Username:</strong> {{ $mailData['username'] }}</p>
                <p><strong>URL:</strong> {{ $mailData['password_reset_link'] }}</p>
            </div>
            <p>For security reasons, we recommend setting up your password as soon as possible. Click the button below to set your password:</p>

            <a href="{{ $mailData['password_reset_link'] }}" class="btn btn-primary">Set Your Password</a>
            <p>Please note that the password setup link will expire in 10 days.</p>
            <p>If you have any questions or need further assistance, please contact our support team at <a href="mailto:support@igniculushrm.com">support@igniculushrm.com</a>.</p>
            <p>Best regards,<br>Igniculus HRM Team</p>
        </div>
        <div class="footer">
            &copy; 2024-2025 Igniculus HRM System. All rights reserved.
        </div>
    </div>

</body>

</html>






<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmpRegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Emp Register Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'emails.empRegisterMail',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }


    public function build()
    {
        return $this->subject($this->mailData['mail_title'])
                    ->view('emails.empRegisterMail')
                    ->with('mailData', $this->mailData);
    }

}





Route::get('emp-reset-password/{token?}',function(){
    return view('emails.password_generate');
 });



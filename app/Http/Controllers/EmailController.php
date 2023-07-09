<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $to_email = "recipient@gmail.com";
        $subject = "Simple Email Testing via PHP";
        $body = "Hello,\n\nIt is a testing email sent by PHP Script";
        $headers = "From: sender@example.com";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed...";
        }
    }
}

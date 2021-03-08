<?php

namespace App\Http\Controllers\Email;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Panggil SendMail yang telah dibuat
use App\Mail\SendMail;
// Panggil support email dari Laravel
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $nama = "lamart";
        $email = "lamargt719@gmail.com";
        $kirim = Mail::to($email)->send(new SendMail($nama));

        if ($kirim) {
            echo "Email telah dikirim";
        }
    }
}

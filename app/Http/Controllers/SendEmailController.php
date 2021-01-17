<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;

class SendEmailController extends Controller
{
    public function index()
    {
        $user = User::find(5);
        Mail::to($user->email)
            ->send(new ReminderEmail($user, 10));

    }
}

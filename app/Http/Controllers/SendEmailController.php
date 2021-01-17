<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;

use App\User;
use App\Point;

class SendEmailController extends Controller
{
    public function index()
    {
        $points = Point::all();
        foreach ($points as $point) {
          $date1 = date('Y-m-d', strtotime('1 year', strtotime($point->date)));
          $date2 = date('Y-m-d');

          $diff = strtotime($date1) - strtotime($date2);
          $days = floor(($diff / (60*60*24)));

          if ($days <= 30) {
            Mail::to($point->user->email)->send(new ReminderEmail($point->user, $point->point));
          }
        }
        
        return redirect()->back();
    }
}

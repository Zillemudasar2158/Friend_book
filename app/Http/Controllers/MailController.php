<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class MailController extends Controller
{
    public function sendemail()
    {
    	$to="zillemudasar2158@gmail.com";
    	$msg="your interview this day";
    	$subject="for interview call";

    	Mail::to($to)->send(new SendEmail($msg,$subject));
    }
}

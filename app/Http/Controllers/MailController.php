<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    public function index(Request $request)
    {
        // Mail::to("cchan2@paragoniu.edu.kh")->send(new My());
        //     dd("Done");
    }
}

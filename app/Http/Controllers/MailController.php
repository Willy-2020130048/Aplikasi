<?php

namespace App\Http\Controllers;

use app\Mail\MailNotify;
use Exception;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Name',
            'message' => 'message',
            'subject' => 'Email Tester',
            'body' => 'Hello this is body'
        ];
        try {
            Mail::to('arby77078@gmail.com')->send(new MailNotify($data));
            return response()->json(['Great check your email']);
        } catch (Exception $th) {
            return response()->json(['Error Sending Email']);
        }
    }
}

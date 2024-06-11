<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Mail\MailNotify;
use Mail;

class MailController extends Controller
{
    //
    public function index(){
        $data = [
            'subject' => 'Email Tester',
            'body' => 'Hello this is body'
        ];
        try{
            Mail::to('arbysofyan@gmail.com')->send(new MailNotify($data));
            return response()->json(['Great check your email']);
        }catch(Exception $th){
            return response()->json(['Error Sending Email']);
        }
    }
}

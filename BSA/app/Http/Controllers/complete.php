<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
class complete extends Controller
{
    //
    function complete(Request $req)
    {
        session_start(); 
        $username1 = $req->input('serve');
        $str = DB::Table('booking')->select('email')->where('idbook',$username1 )->count();
        $str1 = DB::Table('booking')->select('email')->where('idbook',$username1 )->get()->pluck('email');
        $str1 = str_replace('"', '', $str1);
        $str1 = str_replace('[', '', $str1);
        $str1 = str_replace(']', '', $str1);

        $name = DB::Table('booking')->select('name')->where('idbook',$username1)->get()->pluck('name');
        $name = str_replace('"', '', $name);
        $name = str_replace('[', '', $name);
        $name = str_replace(']', '', $name);
        $bike = DB::Table('booking')->select('bike')->where('idbook',$username1)->get()->pluck('bike');
        $bike = str_replace('"', '', $bike);
        $bike = str_replace('[', '', $bike);
        $bike = str_replace(']', '', $bike);
        if($str == 1)
{
                DB::table('booking')->where('idbook', $username1)->update(array('status' => 'completed')); 
                $contact_data = [] ;
                $contact_data['name'] = $name ;  
                $contact_data['email'] = $str1 ;   
                $contact_data['message'] = 'your Bike '.$bike.' sevice has been completed ' ;
                Mail::to($str1)->send(new ContactFormMail($contact_data)); 
        $msg = 'Update index'.$username1.' completed';
}else
{
    $msg = 'Not exits!';
}
        return  redirect('sam')->with('message', $msg);
    }
}

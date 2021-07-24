<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Mail;
class booking extends Controller
{
    //
        //
        function booking(Request $req)
        {
            $data = array('name'=>"Virat Gandhi");
            $bike = $req->input('book1');
            $sername = $req->input('cars');
            $email = Auth::user()->email;
            $name = Auth::user()->name;
            $status = "booked";
            $num = DB::table('booking')->count();
      
      
   

          
            $str = DB::Table('email')->select('*')->where('idemail',1)->get()->pluck('ademail');
            $str = str_replace('"', '', $str);
            $str = str_replace('[', '', $str);
            $str = str_replace(']', '', $str);
   

                DB::insert('insert into booking (idbook,name, email,bike,service,status) values (?, ?, ?, ?, ?, ?)', array($num+1,$name, $email,$bike,$sername,$status));
                $msg1 = "Record inserted successfully";

            $contact_data = [] ;
            $contact_data['name'] = $name ;  
            $contact_data['email'] = $str ;   
            $contact_data['message'] = 'Service booked for '.$bike ;
                Mail::to($email)->send(new ContactFormMail($contact_data));
            $contact_data = [] ;
            $contact_data['name'] = $name ;  
            $contact_data['email'] = $str ;   
            $contact_data['message'] = 'Bike '.$bike.' Service type '.$sername.' has booked from '.$email.'' ;
            Mail::to($str)->send(new ContactFormMail($contact_data));
                return  redirect('home')->with('message', $msg1);
            
        }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class serve extends Controller
{
    //
    function serve(Request $req)
    {
        
        $username1 = $req->input('serve');
        $users = DB::table('serve')->select('services')->count();
        $result = DB::Table('serve')->select('*')->where('services',$username1 )->count(); 
  
       
       if($result == 0)
       {
        DB::insert('insert into serve (idser, services) values (?, ?)', array($users+1, $username1));
        $msg = 'Inserted '.$username1;
        return  redirect('adadmin')->with('message', $msg);
       }
       
           else
           {
            $msg = 'Already exists !';
            return  redirect('adadmin')->with('message', $msg);
           }
       
   
    
    }
}

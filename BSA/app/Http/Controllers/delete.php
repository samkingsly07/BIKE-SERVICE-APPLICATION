<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class delete extends Controller
{
    //
    function delete(Request $req)
    {
        $username1 = $req->input('serve');
        $users = DB::table('serve')->select('services')->count();
        $result = DB::Table('serve')->select('*')->where('services',$username1 )->count(); 

        if($result == 1)
       {
        
        DB::table('serve')->select('services,idser,ademail')->where('services', $username1)->delete();
        $msg = 'Deleted '.$username1;
        return  redirect('adadmin')->with('message', $msg);
       }
       
           else
           {
            $msg = 'Not exists !';
            return  redirect('adadmin')->with('message', $msg);
           }
    }
}

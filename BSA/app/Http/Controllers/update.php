<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class update extends Controller
{
    //
    function update(Request $req)
    {
        session_start(); 
        $username1 = $req->input('serve1');
        DB::table('email')->where('idemail', 1)->update(array('ademail' => $username1));  
        $msg = 'Updated  '.$username1 .'as Admin';
        return  redirect('adadmin')->with('message', $msg);
    
    }
}

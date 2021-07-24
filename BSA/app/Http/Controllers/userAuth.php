<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Auth\Authenticatable as Authenticableirait;
use Illuminate\Contracts\Auth\Authenticatable;
use App\User;
use Illuminate\Session\Middleware\StartSession;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class userAuth extends Controller
{
    //
    function userlogin(Request $req)
    {
         
          $username1 = $req->input('user');
          $passwor = $req->input('pass');
         
          $results = DB::select('select * from admin');
          $users = DB::table('admin')->count();
          $result = DB::Table('admin')->select('user')->where('user',$username1 )->get(); 
          $user = DB::Table('admin')->select('pass')->where('pass',$passwor )->get(); 
          $count = $result->count();
          $count1 = $user->count();
          $ss=array($result);
         $played = implode("[ ",$ss);
         $played = implode(" [",$ss);
     
         if($count==1 && $count1==1){
          
            session_start(); 
            $_SESSION['user'] = $username1;
            $msg = " Logged in as Admin";
            return redirect('sam')->with('name', $username1)->with('message', $msg);
        }
        else{
            $msg = " You Have Entered Incorrect Password";
          
        }
      
     

 
    }
}
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BSA</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">

    
</head>

<body onload="myFunction()" >

    <div class="navigation1 onLoad" >
      <ul>
        <li class = "list">
        <span class = "icon" >    <img class = "img" src ="/img/sa.png"" ></img></ion-icon></span>
                <span class = "title" >SBS</span>
        </li>
      </ul>
    </div>
  
    

   


<div class="card">
    <div>
    <div class="loader" id ="loader"></div>
    <div class="card1">
   
             <div class="container">
              <h4 style = "  color: white;" ><b>Admin Login</b></h4> 
              <br>
              <form method="POST" action="user"   >
          <h1 style = "color:yellow;font-size:small;">Username or password incorrect!</h1>
<br>

                  <input type = "text" name="user" id = "user" placeholder = "enter username " required><br>
                  <br>
                  <input type= "password" name="pass" id="pass" placeholder = "enter password" required><br><br>
                  <input style = "  color: rgb(149, 103, 255);background-color:green;color:white;border-radius:6px;height:40px;width:50px;"  type="submit" name="submit" value="Login">
              </form>
              <br>
              <a style="color:white;background-color:grey;border-radius:10px;" href="login" >User Login</a>

     </div>  
    
</div>



<script>
    $("#nav ul li a").click(function(e){
    e.preventDefault();
    $(".card").hide();
    var toShow = $(this).attr('href');
    $(toShow).show();
});
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
let menuToggle = document.querySelector('.toggle');
let title = document.querySelector('.title');
let img = document.querySelector('.img');
let navigation = document.querySelector('.navigation');
let card = document.querySelector('.card');
    menuToggle.onclick = function(){ 
        menuToggle.classList.toggle('active');
        title.classList.toggle('active');
        img.classList.toggle('active');
        navigation.classList.toggle('active');
        card.classList.toggle('active');
        }
        
       
    
    //add active class in selected list item
    let list =document.querySelectorAll('.list');
    for (let i=0; i<list.length; i++){
      list[i].onclick = function(){
          let j = 0;
          while(j < list.length)
          {
              list[j++].className = 'list' ;
          }
          list[i].className = 'list active';
      }
    }

</script>

<script>
    // $(document).ready(function(){
        // 	$('div#loading').removeAttr('id');
    // });
    var preloader = document.getElementById("loader");
    // window.addEventListener('load', function(){
    // 	preloader.style.display = 'none';
    // 	})

    function myFunction(){
        
        preloader.style.display = 'none';
    };
</script>
</body>
</html>
<?php  session_start(); 

?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BSA</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
 table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
 
  font-family: 'Roboto', 
}
th{
  padding: 20px 15px;
  text-align: center;
  font-weight: 800;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: center;
  vertical-align:middle;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}

        </style> 
</head>
<body onload="myFunction()">
<!-- HEADING-->
    <div class="navigation1 onLoad" >
      <ul>
        <li class = "list">
                <span class = "icon" ><img class = "img" src ="/img/ss.png" ></img></span>
                <span class = "title" >SBS</span>
              
        </li>
      </ul>
    </div>
    <!-- NAVBAR-->
    <div class="navigation" id="nav">
        <ul>
        
            <li class = "list active">
                <b></b>
                <b></b>
                <a href="#c1" >
                    <span class = "icon" ><ion-icon name="home-outline"></ion-icon></span>
                    <span class = "title" >Home</span>
                    
            </li>
            
            <li class = "list">
             
                <a href="#" >
                               <a href = "adadmin">
                    <b></b>
                    <b></b>
                    <span class = "icon" ><ion-icon name="person-circle-outline"></ion-icon></span>
                    <span class = "title" > <?php
                       
       if (isset($_SESSION['user'])) {
               // logged in
        
               echo $_SESSION['user'];
             } else {
               // not logged in
               echo '<script>alert("Log in !")</script>';
               header('Refresh: 0; URL = adminlog');
          
             }
             ?></span></a>
            </li>
          
            <li class = "list">
                <a href="#" >
                    <a href = "cklog">
                    <b></b>
                    <b></b>
                 
                    <span class = "icon" ><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class = "title" >Signout</span></a>
                    
            </li>
        </ul>
    </div>
    

    <div class="toggle">
        <ion-icon name="menu-sharp" class="open"></ion-icon>
                <ion-icon name="close-outline" class = "close"></ion-icon>
    </div>


<div class="card">
    <div>
    <div class="loader" id ="loader"></div>
    <div class="card1">
      <br>
        @csrf
        @if(Session::has('message'))
        <p style = "font-size:20px;color:yellow;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <center>
          <?php 
          $result = DB::Table('serve')->select('*')->from('serve')->get(); 
          $users = DB::table('serve')->select('serives')->count();
          $users1 = DB::table('booking')->select('name')->count();
       
          ?>
            <br>  <br>  <br>        <form method="POST" action="{{ url('rfd') }}"  >
              @csrf
                          <input style="background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);border-radius:6px;height:40px;width:200px;text-align:center;" placeholder="Enter ID" type="text" id = "serve" name="serve"   required>

                          <input style="background-color:green;color:white;border-radius:6px;height:40px;width:150px;" type="submit" id="update_button" value="Ready for delievery"  />
                          <input style="background-color:blue;color:white;border-radius:6px;height:40px;width:70px;"type="submit"  formaction="{{ url('complete') }}" name="update" value="Completed" />
          
                         
          
                        </form>    <br>  <br>
            <table style="width:100%;text-align:center; background: -webkit-linear-gradient(left, #6783FF , #6783FF );
            background: linear-gradient(to right, #6783FF #6783FF);border-radius:3%;overflow-x:auto;">
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Bike</th>
                  <th>Service</th>
                  <th>Status</th>
                </tr>
    
        @for ($i = 0;$i<$users1;$i++)
        <?php $str = DB::Table('booking')->select('name')->where('idbook',$i+1 )->get()->pluck('name');
            
          
                
          
         $string = str_replace('"', '', $str);
         $string = str_replace('[','',$string); 
         $string = str_replace(']','',$string); 
         ?>
        <tr>
          <td> 
                
            {{ $i+1; }}
        </td>

            <td> 
                
                {{ $string; }}
            </td>
      
       
         
              
          <td>
            <?php $str = DB::Table('booking')->select('email')->where('idbook',$i+1 )->get()->pluck('email');
            
          
                
          
            $string = str_replace('"', '', $str);
            $string = str_replace('[','',$string); 
            $string = str_replace(']','',$string); 
            ?> <h1 style="font-size:60%;">{{ $string }}</h1></td>
            
          <td>
            <?php $str = DB::Table('booking')->select('bike')->where('idbook',$i+1 )->get()->pluck('bike');
            
          
                
          
            $string = str_replace('"', '', $str);
            $string = str_replace('[','',$string); 
            $string = str_replace(']','',$string); 
            ?> {{ $string }}
        </td>
        <td>
            <?php $str = DB::Table('booking')->select('service')->where('idbook',$i+1 )->get()->pluck('service');
            
          
                
          
            $string = str_replace('"', '', $str);
            $string = str_replace('[','',$string); 
            $string = str_replace(']','',$string); 
            ?> {{ $string }}
        </td>
        <td>
            <?php $str = DB::Table('booking')->select('status')->where('idbook',$i+1 )->get()->pluck('status');
            
          
                
          
            $string = str_replace('"', '', $str);
            $string = str_replace('[','',$string); 
            $string = str_replace(']','',$string); 
            ?> {{ $string }}
        </td>

        @endfor
        </tr>
        
               
              </table>
             </center>
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
let card1 = document.querySelector('.card1');
    menuToggle.onclick = function(){ 
        menuToggle.classList.toggle('active');
        title.classList.toggle('active');
        img.classList.toggle('active');
        navigation.classList.toggle('active');
        card.classList.toggle('active');
        card1.classList.toggle('active');
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

    var preloader = document.getElementById("loader");


    function myFunction(){
 
        preloader.style.display = 'none';
   
                 
    };
</script>

</body>
</html>
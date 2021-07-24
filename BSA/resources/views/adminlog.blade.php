<?php  session_start(); 
                  
                  if (isset($_SESSION['user'])) {
               // logged in
             
               header('Refresh: 0; URL = sam');
   
             } else {
               // not logged in
               
          
          
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
<!-- HEADER-->
    <div class="navigation1 onLoad" >
      <ul>
        <li class = "list">
                <span class = "icon" >    <img class = "img" src ="{{asset("/img/sa.png")}}" ></img></ion-icon></span>
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
              <!-- FORM-->
              <form method="POST" action="user"   >
                  @csrf
                  @if(Session::has('message'))
                  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                  @endif
                  <h1 style= "font-size:small;color:yellow;">
<br><br>
                  </h1>

                  <input style="background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);border-radius:6px;height:29px;width:200px;" type = "text" name="user" id = "user" placeholder = "Enter username " required><br>
                  <br>
                  <input style="background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);border-radius:6px;height:29px;width:200px;" type= "password" name="pass" id="pass" placeholder = "Enter password" required><br><br>
                  <input style = "  color: rgb(149, 103, 255);background-color:green;color:white;border-radius:6px;height:40px;width:50px;" type="submit" name="submit" value="Login">
                  
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

    var preloader = document.getElementById("loader");


    function myFunction(){
        
        preloader.style.display = 'none';
    };
</script>
</body>
</html>
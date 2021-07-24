<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BSA</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body onload="myFunction()" >

    <div class="navigation1 onLoad" >
      <ul>
          <!-- HEADING-->
        <li class = "list">
                <span class = "icon" >  <img class = "img" src ="/img/ss.png" style="width:30%"></img></ion-icon></span>
                <span class = "title" >BSA</span>
              
        </li>
      </ul>
    </div>
  
    

   


<div class="card">
    <div>
    <div class="loader" id ="loader"></div>
    <div class="card1">
   
             <div class="container">
              <h4 style = "  color: white;" ><b>Login</b></h4> 
             

<br>
<!-- FORM FOR LOGIN -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                      

                        <div class="form-group row">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <h1 style="font-size:15px;color:yellow">    <strong>{{ $message }}</strong></h1>
                            </span>
                        @enderror
                         <br>
                            <label for="email" style = "  color: white;" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address :') }}</label>&nbsp:

                      
                                <input style="background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);border-radius:6px;height:29px;width:200px;" id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                               
                           
                        </div>
                        <br>

                        <div class="form-group row">
                            <label style = "  color: white;" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password :') }}</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;

                      
                                <input style="background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);border-radius:6px;height:29px;width:200px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   
                        </div>
  
<br>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label style = "  color: white;" class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4" style = "text-align:right;width:90%;font-size:20%;"><br>
                                <button style = "  color: rgb(149, 103, 255);background-color:green;color:white;border-radius:6px;height:40px;width:50px;" type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div>
                                @if (Route::has('password.request'))<br>
                                    <a style = "background-color:violet;border-radius:7px;font-size:20px; " class="btn btn-link" style = "text-align:center;" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a style = "background-color:violet;border-radius:7px;font-size:20px; "href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a style = "background-color:violet;border-radius:7px;font-size:20px; "href="adminlog" class="ml-4 text-sm text-gray-700 underline">Admin</a>

                            </div>
                        </div>
                  
                
                           
                
                    </form>
              

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

    var preloader = document.getElementById("loader");


    function myFunction(){
        
        preloader.style.display = 'none';
    };
</script>
</body>
</html>
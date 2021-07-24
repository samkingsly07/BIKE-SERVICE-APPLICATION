

@section('content')

@endsection

</center>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BSA</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style1.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body onload="myFunction()" >

    <div class="navigation1 onLoad" >
      <ul>
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
    <br>
                    <div style="color:white;" class="card-header">{{ __('Reset Password') }}</div>
    <br>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
    
                            <input type="hidden" name="token" value="{{ $token }}">
    <br>
                            <div class="form-group row">
                                <label style="color:white;" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                            
                                    <input style="background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);border-radius:6px;height:29px;width:200px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:yellow;">{{ $message }}</strong>
                                        </span>
                                    @enderror
                          
                            </div>
    <br>
                            <div class="form-group row">
                                <label style="color:white;" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                   
                                    <input style="background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);border-radius:6px;height:29px;width:200px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:yellow;">{{ $message }}</strong>
                                        </span>
                                    @enderror
                        
                            </div>
    <br>
                            <div class="form-group row">
                                <label style="color:white;" for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                           
                                    <input style="background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);border-radius:6px;height:29px;width:200px;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                             
                            </div>
    <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button style = "  color: rgb(149, 103, 255);background-color:green;color:white;border-radius:6px;height:40px;width:150px;"  type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
     
              <br>
                                    <a style="color:white;background-color:grey;border-radius:10px;" href="{{ asset('login') }}" >Login</a>
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
    // $(document).ready(function(){
        //  $('div#loading').removeAttr('id');
    // });
    var preloader = document.getElementById("loader");
    // window.addEventListener('load', function(){
    //  preloader.style.display = 'none';
    //  })

    function myFunction(){
        
        preloader.style.display = 'none';
    };
</script>
</body>
</html>
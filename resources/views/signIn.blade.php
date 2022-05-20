
<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Styles -->
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
      
      <link rel="stylesheet" href='css/style.css' >
    </head>
    <body >
  
            @if($errors->any())
            <div class="container mx-auto bg-danger errors p-2">
                @foreach($errors->all() as $error)
                <div class="row mx-auto">
                     <li>{{$error}}</li>
                </div>  
                @endforeach
                </div>
            @endif
            
        
    <div class="userForm container-fluid">
          <form class='container formContainer' name="infoForm " id="infoForm" action="/adminAccount" method="post">
              @csrf
              <div class="row">
                  <div class="col">
                    <label for="login">Login</label>
                </div>
              
                <div class="col"><input  id="login" placeholder="Login"  maxlength = "16"
                  type="text" name="Login" /></div>
              </div>
              
              <div class="row">
                <div class="col"> 
                    <label for="userpassword">Password</label>
                </div>
                <div class="col"> 
                     <input id="userpassword" placeholder="Password" type="password" name="Userpassword" />
                </div>
             </div>
             
                <div class="row ">
                <button type="submit" id ="btnSubmit" >Enter</button>
                </div>
          </form>
        </div>
    </body>
</html>

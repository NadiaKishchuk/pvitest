
<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Styles -->
    
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      
      <link rel="stylesheet" href='../css/style.css' >
    </head>
    <body>
  
         
            
    <nav class="navbar navbar-expand-sm navWelcome">
     <div class="container-fluid">
      
    <img src="../img/logo2.png"
     alt="Logo" style="width:40px;" class="rounded-pill navWelcomeIcon">
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item navWelcomeItem">
          <a class="nav-link navWelcomeItemLink" href="/adminAccount/addPhoto">Add photo</a>
        </li>
        <li class="nav-item navWelcomeItem">
          <a class="nav-link navWelcomeItemLink" href="/adminAccount/addAdmin">Add admin</a>
        </li>
        <li class="nav-item navWelcomeItem ">
          <a class="nav-link navWelcomeItemLink" href="/">Exit</a>
        </li>
        
      </ul>
      <form class="d-flex" action ='/adminAccount/findpicture'  method='get'>
        <input class="form me-2 inputSearch" name='TagName' type="text" placeholder="Search">
       <button class="btn btnSearch" type="submit" >Search</button>
        
      </form>
    </div>
  </div>
</nav>
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
          <form class='container formContainer' name="infoForm " id="infoForm" action="/adminAccount/addAdmin" method="post">
              @csrf
              <div class="row">
                  <div class="col">
                    <label for="login">Surname</label>
                </div>
              
                <div class="col"><input  id="surname" placeholder="Surname"  maxlength = "35"
                  type="text" name="Surname" /></div>
              </div>
              <div class="row">
                  <div class="col">
                    <label for="login">Name</label>
                </div>
              
                <div class="col"><input  id="name" placeholder="Name"  maxlength = "35"
                  type="text" name="Name" /></div>
              </div>


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

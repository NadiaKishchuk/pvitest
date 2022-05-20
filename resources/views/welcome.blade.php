
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
      
      <link rel="stylesheet" href='css/style.css' >
    </head>
    <body >
    <nav class="navbar navbar-expand-sm navWelcome">
     <div class="container-fluid">
      
    <img src="img/logo2.png"
     alt="Logo" style="width:40px;" class="rounded-pill navWelcomeIcon">
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item navWelcomeItem">
          <a class="nav-link navWelcomeItemLink" href="signin">Enter as admin</a>
        </li>
        
      </ul>
      <form class="d-flex " action ='/findpicture' method='get'>
        <input class="form me-2 inputSearch" name='TagName' type="text" placeholder="Search">
       <button class="btn btnSearch" type="submit" >Search</button>
        
      </form>
    </div>
  </div>
</nav>
            
<!-- @if($photos!=null)
@php
$elInRow=4;
@endphp

            <div class="container mx-auto photoList errors p-2">
           
                @foreach($photos->all() as $photo)
                @if($elInRow==4)
                <div class="row  mb-4 mx-auto">
                @endif 
                @php
                $elInRow-=1;
                @endphp
                    <div class='col  my-3'>
                      <img
                        src= {{ $photo->url }} alt= {{$photo->tags}}
                        width='270' 
                        >
                    </div>
                    @if($elInRow<=0)
                    </div>
                    @php
                    $elInRow=4;
                    @endphp
                 @endif 
                @endforeach
                </div>
            @endif 
 -->
 @if($photos!=null)
@php
$elInRow=4;
@endphp

                @foreach($photos->all() as $photo)
                @if($elInRow==4)
                <div class=" d-flex justify-content-between container mx-auto photoList p-2">
                @endif 
                @php
                $elInRow-=1;

                @endphp
                 <div  class=" py-3 card d-flex text-center flex-column 
                 justify-content-between align-content-center my-2"
                  style="width:305px">
                      <img class='mx-auto'
                        src= {{ $photo->url }} alt= {{$photo->tags}}
                        width='95%'
                        >
                        <div class = 'container my-2' >
                        <p >{{$photo->tags}}</p>
                        </div>
                        
                          
                        
                    </div>
                    @if($elInRow<=0)
                    </div>
                    @php
                    $elInRow=4;
                    @endphp
                 @endif 
                @endforeach
               
            @endif 
    </body>
</html>

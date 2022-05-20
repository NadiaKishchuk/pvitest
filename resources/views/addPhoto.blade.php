
<!DOCTYPE html>
<html>
  
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
      
      <link rel="stylesheet" href='../css/style.css' >
</head>
  
<body>
    
@if($errors->any())
            <div class="container mx-auto bg-danger errors p-2">
                @foreach($errors->all() as $error)
                <div class="row mx-auto">
                     <li>{{$error}}</li>
                </div>  
                @endforeach
                </div>
            @endif 
<div class="userForm userFormUpload container-fluid">
          <form class='container formContainer' name="infoForm " id="infoForm" 
          action="/adminAccount/addPhoto" method="post"
          enctype="multipart/form-data">
              @csrf
              <div class="row">
                    <div class="col-2">
                        <label for="file">File</label>
                    </div>
              
                    <div class="col"><input type="file"  accept="image/*" 
                    name="Uploadfile" 
                    value="" />
                </div>
              </div>

              <div class="row">
                <div class="col-2"> 
                    <label for="photolink">Link</label>
                </div>
                <div class="col"> 
                     <input id="photolink" placeholder="Photolink"  name="Photolink" max=150 />
                </div>
                </div>
                <div class="row d-flex justify-content-between"> 
                <div class="col-2"> 
                    <label for="photolink">Tags</label>
                </div>
                <div class="col textarea"> 
                     <textarea id="photolink" placeholder="Tags"   name="Tags" ></textarea>
                </div>
                </div>
             
             
                <div class="row ">
                    
                <button type="submit" id ="btnSubmit" >Enter</button>
                </div>
          </form>
        </div>
</body>
  
</html>
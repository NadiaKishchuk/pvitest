<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\AdminAccount;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\FilesystemAdapter;
use App\Providers\GoogleDriveServiceProvider;
class FormController extends Controller
{
    public function checkInputSignIn(Request $req){
        $errors=$req->validate([    
            'Login'=>'required',
            'Userpassword'=>'required|min:8|max:20'
       ]);

     
    }
    public function SignIn(Request $req ){
        $this->checkInputSignIn($req);
        $admin = AdminAccount::where('login',$req['Login'])
        ->where('password', $req['Userpassword'])
        ->get()->first();
        
        if($admin==null){
            echo '<script>
            alert("The login or password is not correct. Please, check your input.");
            window.location.assign("/signin")</script>';
        }else{
            $name= $admin->name;
            echo '<script>
            alert("Hello,'. $name . '");
            window.location.assign("/adminAccount");</script>';
           // echo '<script> alert("'. $a . '")</script>';
        }
       
    }
    public function AddAdmin(Request $req){
        $errors=$req->validate([    
            'Login'=>'required',
            'Userpassword'=>'required|min:8|max:20',
            'Surname'=>'required|regex:"^[A-Z]{1}\w+"',    
            'Name'=>'required|regex:"^[A-Z]{1}\w+"'
       ]);
       if(AdminAccount::where('login',$req['Login'])->get()->first()!=null){
           echo '<script>
           alert("The login is already in database. Please, use another one.");
           window.location.assign("/adminAccount/addAdmin")</script>';
       }else{
           AdminAccount::create([
                'name'=>$req['Name'],
                'surname'=> $req["Surname"],
                'login' => $req["Login"],
                'password' =>$req['Userpassword']
           ]);
        echo'<script>window.location.assign("/adminAccount")</script>';
       }

      
    }
    public function AddPhoto(Request $req){
        
        if(empty($req['Photolink'])&&empty($req['Uploadfile'])||!empty($req['Photolink']))
                $errors=$req->validate([    
                'Photolink'=>'active_url',
                'Tags'=>'min:1'  
                       
            ]);
            if(!empty($req['Photolink'])){
            $req['Tags'] = strtolower($req['Tags']);
            if(!$this->addPhotoToDB($req['Photolink'],$req['Tags'] ))
                
            {

            echo'<script>
            alert("The photo is already in database");
            </script>';
            }
        }
            if(!empty($req['Uploadfile'])){
             
                $filename= $req['Uploadfile']->store('',"google");
                if(!$this->addPhotoToDB(\Storage::disk('google')->url($filename),\strtolower($req['Tags'] ))){
                        echo'<script>
                        alert("The photo is already in database");
                        </script>';}
                 
            }
            echo'<script>window.location.assign("/adminAccount")</script>';

        
    }
    function addPhotoToDB(string $url,string $tags){
        if(!$this->isInDB($url)){
            Photo::create([
                'url' => $url,
                'tags' => $tags
            ]);
            return true;
        }
        return false;
       
    }
    function isInDB(string $url){
        return ( Photo::where('url',$url)->get()->first()!=null);
        
    }
    public function findPictures(Request $req){
        $photos=$this->findPhotoByTag(strtolower($req['TagName']));

        return view('welcome',compact('photos'));
        
    }
    static function findPhotoByTag(string $tag){
        
        return Photo::where('tags', 'like', '%' . $tag . '%')->get();
    }
    public function findPicturesForAdmin(Request $req){
        $tag = strtolower($req['TagName']);
        $_SESSION['tag']=$tag;  
        $photos=$this->findPhotoByTag($tag);
        return view('adminAccount',compact('photos'));
    }
    public function DeletePhoto(){
       $id=($_COOKIE['idPhoto']) ; 
       Photo::find($id)->delete();
       $photos=$this->findPhotoByTag($_SESSION['tag']);     
       echo'<script>window.location.assign("/adminAccount")</script>';

    }

    public function EditTags(){
      
        Photo::find($_COOKIE['idPhoto'])->update([
                'tags'=>$_COOKIE['NewTags']
        ]);
        
        $photos=$this->findPhotoByTag($_SESSION['tag']);     
        
        echo'<script>window.location.assign("/adminAccount")</script>';
    }
}

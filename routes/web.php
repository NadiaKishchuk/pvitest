<?php
session_start();

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Models\Photo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $_SESSION['tag']='';
    $photos=null;
    return view('welcome',compact('photos'));
});

Route::get('/signin', function () {
    return view('signIn');
});

Route::get('/adminAccount/findpicture',[FormController::class,'findPicturesForAdmin']);
Route::get('/findpicture',[FormController::class,'findPictures']);
Route::post('/adminAccount/addAdmin',[FormController::class,'AddAdmin']);

Route::get('/adminAccount/addAdmin',function () {
    return view('addAdmin');
});
Route::get('/adminAccount/addPhoto',function () {
    return view('addPhoto');
});
Route::post('/adminAccount/addPhoto',[FormController::class,'AddPhoto']);

Route::post('/adminAccount',[FormController::class,'SignIn'] );

Route::get('/adminAccount/delete',[FormController::class,'DeletePhoto'] );
Route::get('/adminAccount/editTags',[FormController::class,'EditTags'] );
Route::post('/adminAccount/editTags',function(){
echo"sfdfs";
} );
Route::get('/adminAccount',function () {
 
        $photos=null;
    
    return view('adminAccount',compact('photos'));
});


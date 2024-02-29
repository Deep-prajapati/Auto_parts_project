<?php 
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\admin\LoginController;
    
    Route::get('login',function(){
        return  view('admin.login');
    })->name('login');
    Route::post('login',[App\Http\Controllers\admin\LoginController::class,'loginpost'])->name('login.submit');

    Route::get('logout', [LoginController::class , 'logout'])->name('logout')
?>
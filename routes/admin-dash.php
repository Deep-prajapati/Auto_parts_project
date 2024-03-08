<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;

    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

    Route::get('Addadminform', function(){
        return view('admin.add-admin');
    })->name('add-admin');

    Route::post('Addadminform' , [LoginController::class , 'registersubmit'])->name('submit.register');
    
    Route::get('Banner', function(){
        return view('admin.banner');
    })->name('add-banner');
    Route::post('banner' , [LoginController::class , 'banner'])->name('submit.banner');

    Route::get('contact', function(){
        return view('admin.contact');
    })->name('edit-contact');
    Route::post('contact' , [LoginController::class , 'contact'])->name('submit.contact');

    Route::get('about', function(){
        return view('admin.about');
    })->name('edit-about');
    Route::post('about' , [LoginController::class , 'about'])->name('submit.about');

    Route::get('Catagory', [LoginController::class, 'catagory'])->name('Catagory');
    Route::post('Catagory' , [LoginController::class , 'action_Catagory'])->name('submit.Catagory');

    Route::get('Sub-Catagory',[LoginController::class, 'subcatagory'])->name('Sub-Catagory');
    Route::post('Sub-Catagory' , [LoginController::class , 'Sub_Catagory'])->name('submit.Sub-Catagory');
    
    Route::get('edit-catagory/{id}', [LoginController::class, 'edit_catagory'])->name('edit-catagory');
    Route::post('edit-catagory/{id}', [LoginController::class, 'sumbit_edit_catagory'])->name('submit.edit-catagory');

    Route::get('edit-subcatagory/{id}', [LoginController::class, 'edit_subcatagory'])->name('edit-subcatagory');
    Route::post('edit-subcatagory/{id}', [LoginController::class, 'sumbit_edit_subcatagory'])->name('submit.edit-subcatagory');

    Route::get('deletecat/{id}', [LoginController::class, 'delete_catagory'])->name('deletecatagory');
    Route::get('deletesub/{id}', [LoginController::class, 'delete_subcatagory'])->name('delete_subcatagory_link');

    Route::get('product-addtion' , [LoginController::class , 'product'])->name('add-product');
    Route::post('product-addtion' , [LoginController::class , 'submit_product'])->name('submit.product');

    Route::post('qwertyui' , [LoginController::class , 'product_ajax'])->name('product_ajax');
    Route::post('qawsedrf' , [LoginController::class , 'catagory_ajax'])->name('catagory_ajax');

    Route::get('company',[LoginController::class, 'company'])->name('company');
    Route::post('company',[LoginController::class, 'company_submit'])->name('submit.company_name');

    Route::get('model',[LoginController::class, 'model'])->name('model');
    Route::post('model',[LoginController::class, 'model_submit'])->name('submit.model');

    Route::get('engine',[LoginController::class, 'engine'])->name('engine');
    Route::post('engine',[LoginController::class, 'engine_submit'])->name('submit.engine');

    Route::post('abc' , [LoginController::class , 'company_ajax'])->name('company_ajax');






    

?>
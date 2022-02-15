<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\commentcontroller;
use App\Http\Controllers\productadmincontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\Controller;
use App\Models\reply;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

// product description
// usercontroller routing



Route::get('/',[usercontroller::class,'homepage']);
Route::get('/redirects',[usercontroller::class,'redirect']);



// product description 
Route::get('/productdescription/{id}/{product}',[usercontroller::class,'productdescription']);


// adminblade routing
// admincontroller
Route::get('/adminhome',[admincontroller::class,'adminhome'])->middleware('admin');
Route::get('/adminproductmanage',[admincontroller::class,'adminproductmanage'])->middleware('admin');
Route::get('/admindiscounttoken',[admincontroller::class,'admindiscounttoken'])->middleware('admin');
Route::post('/adminproductadd',[admincontroller::class,'adminproductadd'])->middleware('admin');
Route::get('/adminproductadd',[admincontroller::class,'adminproductadd'])->middleware('admin');


// edit and delete in admin side
Route::post('/adminproductupdate/edit/{id}',[admincontroller::class,'adminproductupdate'])->middleware('admin');
Route::get('/adminproductupdate/edit/{id}',[admincontroller::class,'adminproductupdate'])->middleware('admin');

Route::get('/adminproductmanage/delete/{id}',[admincontroller::class,'adminproductdelete'])->middleware('admin');

Route::get('adminproductmanage/edit/{id}',[admincontroller::class,'adminproducteditpage'])->middleware('admin');

Route::get('adminproductmanage/discount/{id}',[admincontroller::class,'adminproductdiscountpage'])->middleware('admin');

Route::post('/discountadd/{product}/{id}',[admincontroller::class,'discountadd']);
Route::get('/discountadd/{product}/{id}',[admincontroller::class,'discountadd']);



// productblade  routing
// productadmin controller
Route::get('/products',[productadmincontroller::class,'products'])->middleware('productmanager');
Route::get('/ownproductdiscount',[productadmincontroller::class,'ownproductdiscount'])->middleware('productmanager');
Route::get('/producthome',[productadmincontroller::class,'producthome'])->middleware('productmanager');
Route::post('/productadd',[productadmincontroller::class,'productadd'])->middleware('productmanager');
Route::get('/productadd',[productadmincontroller::class,'productadd'])->middleware('productmanager');


// edit and delete routing in product manager side 
Route::post('/productupdate/edit/{id}',[productadmincontroller::class,'productupdate'])->middleware('productmanager');
Route::get('/productupdate/edit/{id}',[productadmincontroller::class,'productupdate'])->middleware('productmanager');

Route::get('/productmanage/delete/{id}',[productadmincontroller::class,'productdelete'])->middleware('productmanager');

Route::get('productmanage/edits/{sid}',[productadmincontroller::class,'producteditpage'])->middleware('productmanager');


// Comment and reply routing

Route::post('/commentadd/{product}/{id}',[commentcontroller::class,'commentadd']);
Route::get('/commentadd/{product}/{id}',[commentcontroller::class,'commentadd']);

Route::post('/reply/{commentid}/{userid}',[commentcontroller::class,'replyadd']);
Route::get('/reply/{commentid}/{userid}',[commentcontroller::class,'replyadd']);
// auth middleware

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


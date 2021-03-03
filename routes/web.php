<?php

use Illuminate\Support\Facades\Route;
use App\Models\Role;
use App\Models\User;

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
    return view('welcome');
});

Route::get('/create', function() {
    $user = new User;
    $user->name = 'Sunny';
    $user->email = 'Sunny@gmail.com';
    $user->password = '123455';
    $user->save();
    return "User Created";
});

Route::get('/insert', function () {
    $user = User::findOrFail(2);
    $role = new Role(['name' => 'SEO Manager']);
    $user->roles()->save($role);
    return "The User has been created with the SEO Manager Role";
});

Route::get('/read', function () {
    $user = User::findOrFail(2);
    foreach($user->roles as $role){
        echo $role->name;
    };
});

Route::get('/update', function () {
    $user = User::findOrFail(2);
    $user->roles()->update(['name' => 'Seo Manager']);
    return "Data Updated";
});

Route::get('/delete', function () {
    $user = User::findOrFail(2);
    $user->roles()->delete();
    return "Data deleted";
});
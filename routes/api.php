<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('logout', 'AuthController@logout');
        Route::get('user_profile', 'AuthController@userProfile');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'scope:admin,author'], function () {
        
        Route::resource('users', 'UserController');
        Route::get('search-user', 'UserController@searchUser');
    });
});



Route::get('/test',function(){
    return \Session::all();
});

Route::post('register','UserController@register');
Route::post('login','UserController@login');
Route::get('profile','UserController@getAuthenticatedUser');

// USER 
Route::resource('admin', 'AdminController');






Route::post('/loadHoldings', 'TicketController@loadHoldings');

Route::post('/quickView/{id}', 'TicketController@quickView');

Route::post('/loadHoldings_keyword/{keyword}', 'TicketController@loadHoldings_keyword');

Route::post('/loadHoldings_All/{keyword}', 'TicketController@loadHoldings_All');
Route::post('/loadHoldings_Title/{keyword}', 'TicketController@loadHoldings_Title');
Route::post('/loadHoldings_Author/{keyword}', 'TicketController@loadHoldings_Author');
Route::post('/loadHoldings_Subject/{keyword}', 'TicketController@loadHoldings_Subject');
Route::post('/loadHoldings_CallNum/{keyword}', 'TicketController@loadHoldings_CallNum');

Route::post('/loadHoldings_Type_All/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_All');
Route::post('/loadHoldings_Type_Title/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_Title');
Route::post('/loadHoldings_Type_Author/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_Author');
Route::post('/loadHoldings_Type_Subject/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_Subject');
Route::post('/loadHoldings_Type_CallNum/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_CallNum');


Route::post('/loadHoldings_All_keyword/{keyword}', 'TicketController@loadHoldings_All_keyword');
Route::post('/loadHoldings_Title_keyword/{keyword}', 'TicketController@loadHoldings_Title_keyword');
Route::post('/loadHoldings_Author_keyword/{keyword}', 'TicketController@loadHoldings_Author_keyword');
Route::post('/loadHoldings_Subject_keyword/{keyword}', 'TicketController@loadHoldings_Subject_keyword');
Route::post('/loadHoldings_CallNum_keyword/{keyword}', 'TicketController@loadHoldings_CallNum_keyword');

Route::post('/loadHoldings_Type_All_keyword/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_All_keyword');
Route::post('/loadHoldings_Type_Title_keyword/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_Title');
Route::post('/loadHoldings_Type_Author_keyword/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_Author');
Route::post('/loadHoldings_Type_Subject_keyword/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_Subject');
Route::post('/loadHoldings_Type_CallNum_keyword/{materialType}/{keyword}', 'TicketController@loadHoldings_Type_CallNum');


Route::post('/loadHoldings_SubjectOnly/{keyword}', 'TicketController@loadHoldings_SubjectOnly');

Route::post('/loadKeyword_Holdings/{keyword}', 'TicketController@loadKeyword_Holdings');
Route::post('/loadKeyword_Author/{keyword}', 'TicketController@loadKeyword_Author');
Route::post('/loadKeyword_Subject/{keyword}', 'TicketController@loadKeyword_Subject');


Route::post('/loadHoldings_Details/{id}', 'TicketController@loadHoldings_Details');
Route::post('/loadHoldingsDetails_MaterialType/{id}', 'TicketController@loadHoldingsDetails_MaterialType');
Route::post('/loadHoldingsDetails_Articles/{id}', 'TicketController@loadHoldingsDetails_Articles');
Route::post('/loadHoldingsDetails_Articles_HoldingsOnly/{id}', 'TicketController@loadHoldingsDetails_Articles_HoldingsOnly');
Route::post('/loadHoldingsDetails_Publisher/{id}', 'TicketController@loadHoldingsDetails_Publisher');

Route::post('/loadHoldings_MainAuthor/{id}', 'TicketController@loadHoldings_MainAuthor');
Route::post('/loadHoldings_SubAuthor/{id}', 'TicketController@loadHoldings_SubAuthor');
Route::post('/loadHoldingsCopy/{id}', 'TicketController@loadHoldingsCopy');


Route::post('/ifHas_Author/{id}', 'TicketController@ifHas_Author');
Route::post('/ifHas_Publisher/{id}', 'TicketController@ifHas_Publisher');
Route::post('/ifHas_Subject/{id}', 'TicketController@ifHas_Subject');
Route::post('/ifHas_File/{id}', 'TicketController@ifHas_File');
Route::post('/quickView_Multimedia/{id}', 'TicketController@quickView_Multimedia');
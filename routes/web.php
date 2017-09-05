<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get("/admin/index", "AdminController@view_index");

Route::get("/admin/login", "AdminController@view_login");

Route::get("/admin/logout", "AdminController@logout");

Route::post("/admin/login", "AdminController@post_login");

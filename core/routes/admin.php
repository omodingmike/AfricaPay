<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);
    $page_title = "Admin Dashboard";

    return view('admin.home', compact('page_title'));
})->name('admin.home');


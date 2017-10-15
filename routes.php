<?php
use Auth;

Route::get('/login_out', function () {
    Auth::logout();
});
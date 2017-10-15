<?php

Route::get('/login/out', function () {
     Auth::logout();
     return 'tui';
});

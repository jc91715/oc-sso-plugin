<?php

Route::get('/login/out', function () {
     Auth::logout();
    \Flash::success('用户退出成功');
    return Redirect()->to('/');
});

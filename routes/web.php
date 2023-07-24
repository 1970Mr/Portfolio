<?php

use Illuminate\Support\Facades\Route;

require_once('user_interface.php');

Route::prefix('admin-panel')->middleware('auth')->name('admin.panel.')->group(function () {
    require_once('admin.php');
});

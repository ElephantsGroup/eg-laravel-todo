<?php

use ElephantsGroup\ToDo\Controllers;

Route::group(['middleware' => ['web', 'role:todo-admin']], function () {
    Route::middleware('web')->resource('todo/task', 'ElephantsGroup\ToDo\Controllers\TaskController');
});


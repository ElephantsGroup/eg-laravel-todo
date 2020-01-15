<?php

use ElephantsGroup\ToDo\Controllers;

Route::group(['middleware' => ['web', 'role:todo-admin']], function () {
    Route::get('todo/task/{id}/done', 'ElephantsGroup\ToDo\Controllers\TaskController@done');
    Route::get('todo/task/{id}/undone', 'ElephantsGroup\ToDo\Controllers\TaskController@undone');
    Route::resource('todo/task', 'ElephantsGroup\ToDo\Controllers\TaskController');
});


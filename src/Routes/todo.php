<?php

use ElephantsGroup\ToDo\Controllers;

Route::resource('todo/task', 'ElephantsGroup\ToDo\Controllers\TaskController');

/*Route::get('/todo', function () {
    var_dump('Hello todos!');
})->name('todo-home');*/
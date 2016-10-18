<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * task as is
 */
Route::get('/validateString.php', function () {
    $i = Request::get('i');
    return var_export($i, true) . ' is ' . (
        (new App\Helpers\ValidateString)->isValidBrackets($i)
            ? "correct"
            : "incorrect"
    );
});

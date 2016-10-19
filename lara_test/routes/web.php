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
 * as task needed
 * @todo move to controller with, form and ajax API? :)
 */
Route::get('/validateString.php', function () {
    //important
    $i = Request::get('i');
    $result['i'] = var_export($i, true) . ' is ' . (
        (new App\Helpers\ValidateString)->isValidBrackets($i)
            ? "correct"
            : "incorrect"
    );
    //optional
    $q = Request::get('q');
    if ($q !== null) {
        $result['q'] = 'quotes: ' . var_export($q, true) . ' is ' . (
        (new App\Helpers\ValidateString)->isValidQuotes($q)
            ? "correct"
            : "incorrect"
        );
    }

    return implode('<br />', $result);
});

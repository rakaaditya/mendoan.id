<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'HomeController@index');
$app->post('/', 'HomeController@store');
$app->get('comment', 'CommentController@index');
$app->post('comment', 'CommentController@store');
$app->get('comment/search', 'CommentController@search');
$app->get('comment/delete', 'CommentController@delete');
$app->get('comment/restore', 'CommentController@restore');
$app->get('comment/trash', 'CommentController@trash');

$app->get('tentang', function() use ($app) {
    return view('about');
});

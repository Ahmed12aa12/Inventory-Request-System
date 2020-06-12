<?php

use Illuminate\Http\Request;
use App\User;

Route::apiResource('users', 'AdminApi\UserController');
Route::apiResource('roles', 'AdminApi\RoleController');
Route::apiResource('permissions', 'AdminApi\PermissionController');
Route::get('activities/{userId?}', 'AdminApi\ActivityController@index');


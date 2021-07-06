<?php

use App\Http\Controllers\Api\SoapController;
use App\Http\Controllers\Api\XmlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('xml-parse',[XmlController::class,'parse']);
Route::get('people',[SoapController::class,'index']);

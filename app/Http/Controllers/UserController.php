<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function index(){
        return __METHOD__;
    }
    function show($first =null){
        return $first .' ' ;
    }
}

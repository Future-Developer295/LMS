<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        return view('frontend_theme.index');
    }
    function class (){
        return view('frontend_theme.class');
    }
    function calendar (){
        return view('frontend_theme.calendar');
    }
    function classwork (){
        return view('frontend_theme.classwork');
    }
    function detail (){
        return view('frontend_theme.classwork-detail');
    }
    function archived (){
        return view('frontend_theme.archived');
    }
    function steam (){
        return view('frontend_theme.steam');
    }
    function people (){
        return view('frontend_theme.people');
    }
}

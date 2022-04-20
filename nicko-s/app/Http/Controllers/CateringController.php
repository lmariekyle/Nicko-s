<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CateringController extends Controller
{
    function landing() {
        return view('catering/index');
    }
    function event_form() {
        return view('catering/event_form');
    }
    function package() {
        return view('catering/package');
    }
    function package_detail() {
        return view('catering/package_detail');
    }
    function summary() {
        return view('catering/summary');
    }

    // Testing

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Package;

class CateringController extends Controller
{
    function landing() {
        return view('catering/index');
    }
    function event_form() {
        return view('catering/event_form');
    }
    function package() {
        $packages = Package::all();
        return view('catering/package', ['data' => $packages]);
    }
    function package_detail(Request $request) {
        $package_id = $request->package_id;
        $package = Package::findOrFail($package_id);
        return view('catering/package_detail', ['data' => $package]);
    }
    function summary(Request $request) {
        $package_id = $request->package_id;
        $package = Package::findOrFail($package_id);
        return view('catering/summary', ['data' => $package]);
    }

    // Testing

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Package;

class CateringController extends Controller
{
    function landing() {
        // Cache::put('cachekey', 'secretmessage', now()->addHour());
        // dd(
        //     Cache::get('cachekey')
        // );
        return view('catering/index');
    }
    function event_form() {
        return view('catering/event_form');
    }
    function event_form_post(Request $req) {
        Cache::put('event_type', $req->selector, now()->addHour());
        Cache::put('start_datetime', $req->start_datetime, now()->addHour());
        Cache::put('end_datetime', $req->end_datetime, now()->addHour());
        Cache::put('address', $req->address, now()->addHour());
        Cache::put('city', $req->city, now()->addHour());
        Cache::put('Town', $req->Town, now()->addHour());
        Cache::put('zip', $req->zip, now()->addHour());
        return redirect('catering/package');
    }
    function package_post(Request $req) {
        Cache::put('package_id', $req->package, now()->addHour());
        return redirect('catering/package_detail');
    }
    function package() {
        $packages = Package::all()->take(3);
        return view('catering/package', ['data' => $packages]);
    }

    function package_detail_post(Request $req) {
        Cache::put('allergies', $req->allergies, now()->addHour());
        Cache::put('notes', $req->notes, now()->addHour());
        return redirect('catering/summary');
    }
    function package_detail() {
        $package_id = Cache::get('package_id');
        $package = Package::findOrFail($package_id);
        return view('catering/package_detail', ['data' => $package]);
    }
    function summary() {
        $package_id = Cache::get('package_id');
        $package = Package::findOrFail($package_id);
        return view('catering/summary', ['data' => $package]);
    }
    function catering_done() {
        Cache::flush();
        return redirect('/');
    }

    // Testing

}

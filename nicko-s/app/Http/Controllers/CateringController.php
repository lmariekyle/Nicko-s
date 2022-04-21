<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Package;
use App\Models\Catering;
use App\Models\CateringDetail;

class CateringController extends Controller
{
    function landing() {
        Cache::flush();
        return view('catering/index');
    }
    function event_form() {
        return view('catering/event_form');
    }
    function event_form_post(Request $req) {
        Cache::put('event_type', $req->selector, now()->addHour());
        Cache::put('start_datetime', $req->start_datetime, now()->addHour());
        Cache::put('end_datetime', $req->end_datetime, now()->addHour());
        Cache::put('event_address', $req->address, now()->addHour());
        Cache::put('event_city', $req->city, now()->addHour());
        Cache::put('event_town', $req->Town, now()->addHour());
        Cache::put('event_zipcode', $req->zip, now()->addHour());
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
        Cache::put('customer_allergies', $req->allergies, now()->addHour());
        Cache::put('customer_notes', $req->notes, now()->addHour());
        return redirect('catering/summary');
    }
    function package_detail() {
        $package_id = Cache::get('package_id');
        $package = Package::findOrFail($package_id);
        Cache::put('price', $package->price, now()->addHour());
        return view('catering/package_detail', ['data' => $package]);
    }
    function summary() {
        $package_id = Cache::get('package_id');
        $package = Package::findOrFail($package_id);
        return view('catering/summary', ['data' => $package]);
    }
    function catering_done() {

        $c = new Catering;
        $cd = new CateringDetail;
        
        $cd->package_id = Cache::get('package_id');
        $cd->start_datetime = Cache::get('start_datetime');
        $cd->end_datetime = Cache::get('end_datetime');
        $cd->event_type = Cache::get('event_type');
        $cd->event_address = Cache::get('event_address');
        $cd->event_city = Cache::get('event_city');
        $cd->event_town = Cache::get('event_town');
        $cd->event_zipcode = Cache::get('event_zipcode');
        $cd->customer_allergies = Cache::get('customer_allergies');
        $cd->customer_notes = Cache::get('customer_notes');
        $cd->save();

        $c->catering_detail_id = $cd->id;
        $c->customer_id = 0; // change later
        $c->total_payment = Cache::get('price');
        $c->catering_status = 'pending';
        $c->save();

        Cache::flush();
        return redirect('/');
    }

    // Testing

}

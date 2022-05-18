<?php

namespace App\Http\Controllers;

use DateTime;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Package;
use App\Models\Catering;
use App\Models\CateringDetail;

class CateringController extends Controller
{
    function landing() {
        // if (Session::has('customerlogin')) {
        //     $data = Session::get('data');
        //     $customer_id = $data[0]->id;
        //     error_log($customer_id);
        //     return response()->json(['status' => 'goods']);
        // } else {
        //     return response()->json(['status' => 'please log in']);
        // }
        return view('catering/index');
    }
    function event_form() {
        return view('catering/event_form');
    }
    function event_form_post(Request $req) {

        date_default_timezone_set('Asia/Manila');
        $today = date('Ymd');
        $user_datetime = new DateTime($req->event_datetime);
        $user_date = $user_datetime->format('Ymd');

        if ($today > $user_date) {
            return redirect('catering/event_form')->with('msg','Please select correct date(Past Date Selected)');
        } else if ($today == $user_date){
            return redirect('catering/event_form')->with('msg','Cannot make Catering Reservation on the same date');
        }

        // query from db, insert sorted, ascending
        $dates_reserved = [];
        $cd = CateringDetail::all();
        foreach($cd as $d) {
            $temp = (new DateTime($d->event_datetime))->format('Ymd');
            for ($i = count($dates_reserved); $i > 0 && $temp < $dates_reserved[$i-1]; $i--) {
                $dates_reserved[$i] = $dates_reserved[$i-1];
            }
            $dates_reserved[$i] = $temp;
        }
        var_dump($dates_reserved);

        // check if there is already a reservation(2)
        $count = count($dates_reserved);
        for ($i = 0; $i < $count && $dates_reserved[$i] != $user_date; $i++) {}

        if ($count > $i+1 && $dates_reserved[$i+1] == $user_date) {
            return redirect('catering/event_form')->with('msg','sorry we are already fully booked for that date');
        }

        Cache::put('event_type', $req->selector, now()->addHour());
        Cache::put('event_datetime', $req->event_datetime, now()->addHour());
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
        Cache::put('price', $package->Price, now()->addHour());
        return view('catering/package_detail', ['data' => $package]);
    }
    function summary() {
        $package_id = Cache::get('package_id');
        $package = Package::findOrFail($package_id);
        return view('catering/summary', ['data' => $package]);
    }
    function payment() {
        return view('catering/payment');
    }

    function catering_done() {

        $package_id = Cache::get('package_id');
        $event_datetime = Cache::get('event_datetime');
        $event_type = Cache::get('event_type');
        $event_address = Cache::get('event_address');
        $event_city = Cache::get('event_city');
        $event_town = Cache::get('event_town');
        $event_zipcode = Cache::get('event_zipcode');
        $customer_allergies = Cache::get('customer_allergies');
        $customer_notes = Cache::get('customer_notes');
        $total_price = Cache::get('price');

        if (
        $package_id != null && $event_datetime != null && $event_type != null && 
        $event_address != null && $event_city != null && $event_town != null && 
        $event_zipcode != null && $customer_allergies != null && $customer_notes != null && 
        $customer_notes != null && $total_price != null 
        ) {
            $c = new Catering;
            $cd = new CateringDetail;
            
            $cd->package_id = $package_id;
            $cd->event_datetime = $event_datetime;
            $cd->event_type = $event_type;
            $cd->event_address = $event_address;
            $cd->event_city = $event_city;
            $cd->event_town = $event_town;
            $cd->event_zipcode = $event_zipcode;
            $cd->customer_allergies = $customer_allergies;
            $cd->customer_notes = $customer_notes;
            $cd->save();

            $c->catering_detail_id = $cd->id;
            $c->customer_id = 0; // change later
            $c->total_price = $total_price;
            $c->total_payments = 0;
            $c->catering_status = 'pending';
            $c->save();

            Cache::flush();
            return redirect('/');
        } else {
            Cache::flush();
            return redirect('catering/event_form')->with('msg','Please Complete All Data Required');
        }
    }
}

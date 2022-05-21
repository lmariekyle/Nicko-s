<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use App\Models\Catering;
use App\Models\CateringDetail;


class AdminCateringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caterings = Catering::all();
        $r = [];
        foreach($caterings as $c) {
            $cd = CateringDetail::find($c->catering_detail_id);
            $t = new stdClass();
            $t->total_price = $c->total_price;
            $t->total_payments = $c->total_payments;
            $t->catering_status = $c->catering_status;
            $t->package_id = $cd->package_id;
            $t->event_datetime = $cd->event_datetime;
            $t->event_address = $cd->event_address;
            $t->event_city = $cd->event_city;
            $t->event_town = $cd->event_town;
            array_push($r, $t);
        }
        
        // filter out pending, approve, rejected orders
        $pending = [];
        $approved = [];
        foreach($r as $x) {
            if ($x->catering_status == 'pending') {
                array_push($pending, $x);
            } else if ($x->catering_status == 'approved') {
                array_push($approved, $x);
            }
        }
        return view('admincatering.index', ['pending' => $pending, 'approved' => $approved]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

@extends('catering/c_layout')
@section('content') 
<main>
    <div class="back">
        <a href="{{url('/catering')}}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/catering">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reservations</li>
        </ol>
    </nav>
    <h1 class="title">Catering Reservations</h1>
    <div id="reservation">

        @forelse($reserv as $r)
            <div class="reserv">
                <h1>Package {{$r->package_id}}</h1>
                <div class="column">
                    <span>Event Date</span>
                    <span>{{date('Y-m-d h:i a', strtotime($r->event_datetime))}}</span>
                </div>
                <div class="column">
                    <span>Event Venue</span>
                    <span>{{$r->event_address}} {{$r->event_city}} {{$r->event_town}}</span>
                </div>
                <div class="column">
                    <span>Total Cost</span>
                    <span>{{$r->total_price}}</span>
                </div>
                <div class="column">
                    <span>Total Payments</span>
                    <span>{{$r->total_payments}}</span>
                </div>
                <div class="column">
                    <span>Status</span>
                    <span>{{$r->catering_status}}</span>
                </div>
            </div>
        @empty
            <p>You haven't made a reservation yet :)</p>
        @endforelse

    </div>
    <div id="contact_admin">
        <a href="{{url('catering/')}}">
            <span>Contact Admin</span>
        </a>
    </div>
    
</main>
@endsection
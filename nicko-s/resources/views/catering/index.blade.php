@extends('catering/c_layout')
@section('content') 
<main>
    <div class="back">
        <a href="{{url('/')}}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
    <div id="reservation_link">
        <a href="{{url('/catering/reservation')}}">
            <span>Your Reservations</span>
            <i class="fa-solid fa-utensils"></i>
        </a>
    </div>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    
    <h1 class="title mt-6">Celebrate your Special Occasions with Us</h1>
    <div class="text-content">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu 
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
            mollit anim id est laborum."
        </p>
    </div>
    <a href="{{url('/catering/event_form')}}" class="button">
        GET STARTED
    </a>
</main>
@endsection
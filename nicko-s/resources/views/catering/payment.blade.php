@extends('catering/c_layout')
@section('content') 
<main>
    <div class="back">
        <a href="{{url('/catering/summary')}}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/catering">Home</a></li>
            <li class="breadcrumb-item"><a href="/catering/event_form">Event Details</a></li>
            <li class="breadcrumb-item"><a href="/catering/package">Choose a Package</a></li>        
            <li class="breadcrumb-item"><a href="/catering/package_detail">Notes</a></li>        
            <li class="breadcrumb-item"><a href="/catering/summary">Summary</a></li>        
            <li class="breadcrumb-item active" aria-current="page">Payments</li>        
        </ol>
    </nav>
    <form action="" id="package_page">
        <h1 class="title">Payments</h1>
        <div id="payments">
            <div class="text-content">
                <p>
                    To confirm your Catering Reservation, a downpayment of 50% is required. Payment should be done through GCASH and within 3 days from this date.
                </p>
            </div>

            <div class="gcash-box">
                <img src="../img/gcash.png" class="gcash-img" alt="">
                <p>
                    GCash Account: <br>
                    Nickos Kitchen <br>
                    0987651234 
                </p>
            </div>

            <div class="text-content">
                <p>
                    After confirming your catering reservation. Nicko’s Kitchen will contact you through the phone number and email you have provided. 
                    Please do keep a screenshot of your gcash transaction with us.
                    Thank you for trusting Nicko’s Kitchen.
                </p>
            </div>


        </div>
        
        <div class="next button">
            <a href="{{url('catering/catering_done')}}">
                <span>Submit</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </form>
</main>
@endsection
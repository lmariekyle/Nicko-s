@extends('catering/c_layout')
@section('content') 
<main>
    <div class="back">
        <a href="{{url('/catering/package_detail')}}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/catering">Home</a></li>
            <li class="breadcrumb-item"><a href="/catering/event_form">Event Details</a></li>
            <li class="breadcrumb-item"><a href="/catering/package">Choose a Package</a></li>        
            <li class="breadcrumb-item"><a href="/catering/package_detail">Notes</a></li>        
            <li class="breadcrumb-item active" aria-current="page">Summary</li>        
        </ol>
    </nav>
    <form action="" id="package_page">
        <h1 class="title">A Summary of your Request</h1>
        <div id="summary">
            <div id="summary_group">
                <div class="summary_detail">
                    <h2 class="header">Event Type:</h2>
                    <span class="content">{{Cache::get('event_type')}}</span>
                </div>
                <div class="summary_detail">
                    <h2 class="header">Date of Event:</h2>
                    <span class="content">{{date('Y-m-d h:i a', strtotime(Cache::get('event_datetime')))}}</span>
                </div>  
                <div class="summary_detail">
                    <h2 class="header">Venue:</h2>
                    <p>
                        <span>Location:</span> {{Cache::get('event_address')}} <br>
                        <span>City:</span> {{Cache::get('event_city')}} <br>
                        <span>Town:</span> {{Cache::get('event_town')}} <br>
                        <span>Zip Code:</span> {{Cache::get('event_zipcode')}} <br>
                    </p>
                </div>
            </div>

            <div id="selections">
                @if($data)
                    <label for="option">
                        <div class="package_head">
                            <span class="package_name">{{$data->PackageName}}</span> 
                        </div>
                        <div class="selection">
                            <p>
                                <span class="text-bold"> 
                                    {{$data->LechonQty}} Lechon 
                                </span>

                                <span class="text-bold"> 
                                    {{$data->FoodQty}} Main Dish
                                </span>
                                {{$data->Foods}} 

                                <span class="text-bold"> 
                                    {{$data->DessertQty}} Dessert
                                </span>
                                {{$data->Desserts}} 

                                <span class="text-bold"> 
                                    {{$data->BeverageQty}} Unlimited Refill Beverage
                                </span>
                                {{$data->Desserts}} 

                                <span class="text-bold"> 
                                    {{$data->TablesQty}} Tables
                                </span>
                                <span class="text-bold"> 
                                    {{$data->ChairsQty}} Chairs
                                </span>
                                <span class="text-bold"> 
                                    {{$data->DiningSetQty}} pax Dining Set
                                </span>

                                <span class="text-bold"> 
                                    Decoration:
                                </span>
                                {{$data->Decoration}}

                                <span class="text-bold"> 
                                    Description:
                                </span>
                                {{$data->Description}}
                            </p>
                        </div>
                        <div class="price">₱{{$data->Price}}</div>
                    </label>
                @endif
            </div>

            <div id="summary_notes">
                <div class="note">
                    <h2>Allergies and Restrictions</h2>
                    <div class="box">{{ Cache::get('customer_allergies') }}</div>  
                </div>
                <div class="note">
                    <h2>Notes</h2>
                    <div class="box">{{ Cache::get('customer_notes') }}</div>  
                </div>
            </div>
        </div>
        
        <div class="next button">
            <a href="{{url('catering/payment')}}">
                <span>Proceed</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </form>
</main>
@endsection
@extends('catering/c_layout')
@section('content') 
<main>
    <div class="back">
        <a href="{{url('/catering/package')}}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/catering">Home</a></li>
            <li class="breadcrumb-item"><a href="/catering/event_form">Event Details</a></li>
            <li class="breadcrumb-item"><a href="/catering/package">Choose a Package</a></li>        
            <li class="breadcrumb-item active" aria-current="page">Notes</li>        
        </ol>
    </nav>
    <form action="/catering/package_detail_post" method="POST" id="package_page">
        @csrf
        <h1 class="title">Package Details</h1>
        
        <div id="details_page">
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

            <div id="requests">
                <div class="req">
                    <h2>Allergies and Restrictions</h2>
                    <div class="subtitle_detail">Please list all food allergies, dietary restrictions, and food aversions</div>
                    <textarea name="allergies" id="allergies" cols="60" rows="4" required></textarea>
                </div>
                <div class="req">
                    <h2>Notes</h2>
                    <div class="subtitle_detail">Please provide additional details in regards to your event.<br>
                    Is there a theme? Do you only like chocolate desserts?</div>
                    </p>
                    <textarea name="notes" id="notes" cols="60" rows="4" required></textarea>
                </div>
            </div>
        </div>
        
        <div class="next button">
            <button type="submit">  
                <span>Proceed</span>
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    
    </form>
</main>
@endsection
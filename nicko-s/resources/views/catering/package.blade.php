<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering | Choose a Package</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/css/catering.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <main>
            <div class="back">
                <a href="{{url('/catering/event_form')}}">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <form action="/catering/package_post" method="POST" id="package_page">
                @csrf
                <h1 class="title">Choose a Package</h1>
                <div class="subtitle">₱550 per head on all packages</div>
                
                <div id="selections">
                    @if($data)
                        @foreach($data as $d)
                            <label for="{{$d->id}}">
                                <div class="package_head">
                                    @if($loop->index == 0)
                                        <input type="radio" name="package" id="{{$d->id}}" value="{{$d->id}}" class="option-input radio" checked>
                                    @else 
                                        <input type="radio" name="package" id="{{$d->id}}" value="{{$d->id}}" class="option-input radio">
                                    @endif
                                    <span class="package_name">{{$d->PackageName}}</span> 
                                    
                                </div>
                                <div class="selection">
                                    <p>
                                        <span class="text-bold"> 
                                            {{$d->LechonQty}} Lechon 
                                        </span>

                                        <span class="text-bold"> 
                                            {{$d->FoodQty}} Main Dish
                                        </span>
                                        {{$d->Foods}} 

                                        <span class="text-bold"> 
                                            {{$d->DessertQty}} Dessert
                                        </span>
                                        {{$d->Desserts}} 

                                        <span class="text-bold"> 
                                            {{$d->BeverageQty}} Unlimited Refill Beverage
                                        </span>
                                        {{$d->Desserts}} 

                                        <span class="text-bold"> 
                                            {{$d->TablesQty}} Tables
                                        </span>
                                        <span class="text-bold"> 
                                            {{$d->ChairsQty}} Chairs
                                        </span>
                                        <span class="text-bold"> 
                                            {{$d->DiningSetQty}} pax Dining Set
                                        </span>

                                        <span class="text-bold"> 
                                            Decoration:
                                        </span>
                                        {{$d->Decoration}}

                                        <span class="text-bold"> 
                                            Description:
                                        </span>
                                        {{$d->Description}}
                                    </p>
                                </div>
                                <div class="price">₱{{$d->Price}}</div>
                            </label>
                        @endforeach
                    @endif
                </div>
                
                <div class="next">
                    <button type="submit">  
                        <span>Proceed</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            
            
            </form>
        </main>
        <div class="image_bg">
            <img src="../img/catering_index.jpeg" alt="">
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="/css/checkout.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Forum&family=Open+Sans&family=Satisfy&family=Work+Sans:wght@300&display=swap" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <?php
    $data = Session::get('data');
?> 
</head>
<body>
    
    <div class="checkout-bar">
    <a href="{{url('basket')}}"><span class='bi bi-chevron-left arrow-style'></span></a>
    </div>

    <h3 class="header-txt">Checkout</h3>
    <form action="{{url('place-order')}}" method="POST">
        {{csrf_field()}}
    <div class="container-box">
        <div class="checkout-form">
               
            <div class="title">Customer Details</div>
            
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name:</span>
                        <input type="text" name="fname" value="{{$data[0]->firstname}}"  placeholder="Enter First Name">
                    </div>
                    <div class="input-box">
                        <span class="details">Middle Name:</span>
                        <input type="text" name="mname" value="{{$data[0]->middlename}}" placeholder="Enter Middle Name">
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name:</span>
                        <input type="text" name="lname" value="{{$data[0]->lastname}}"  placeholder="Enter Last Name">
                    </div>

                    <div class="input-box">
                        <span class="details">Phone:</span>
                        <input type="text" name="phone" value="{{$data[0]->phone}}" placeholder="Enter Phone">
                    </div>

                    <div class="input-box">
                        <span class="details">Email Address:</span>
                        <input type="text" name="email" value="{{$data[0]->email}}"  placeholder="Enter Email Address">
                    </div>

                    <div class="input-box">
                        <span class="details">Province:</span>
                        <input type="text" name="province" value="{{$data[0]->province}}" placeholder="Enter Province">
                    </div>

                    <div class="input-box">
                        <span class="details">City:</span>
                        <input type="text" name="city" value="{{$data[0]->city}}" placeholder="Enter City">
                    </div>

                    <div class="input-box">
                        <span class="details">Municipality:</span>
                        <input type="text" name="municipality" value="{{$data[0]->municipality}}"  placeholder="Enter Municipality">
                    </div>
                    
                    <div class="input-box">
                        <span class="details">Barangay:</span>
                        <input type="text" name="barangay" value="{{$data[0]->barangay}}" placeholder="Enter Barangay">
                    </div>

                    <div class="input-box">
                        <span class="details">Street Name:</span>
                        <input type="text" name="streetname" value="{{$data[0]->street_name}}" placeholder="Enter Street Name">
                    </div>

                    <div class="input-box">
                        <span class="details">House Number:</span>
                        <input type="text" name="housenumber" value="{{$data[0]->house_number}}" placeholder="Enter House Number">
                    </div>

                    <div class="input-box">
                        <span class="details">Zip Code:</span>
                        <input type="text" name="zipcode" value="{{$data[0]->zip_code}}" placeholder="Enter Zip Code">
                    </div>
                </div>
            </div>

        <div class = "order-summary-box">
            <h5 class="order-details-txt">Order Summary:</h5>
            @php $total= 0; @endphp
            @foreach($basketItems as $item)
            <div class="checkout-item">
                <p class="checkout-item-name">
                {{$item->food->Name}}
                </p>
                <p>Quantity: {{$item->food_qty}} Food Tray(s)</p>
                <p>PHP {{$item->food->Price}} Each</p>
            </div>
            @php $total += $item->food->Price * $item->food_qty ; @endphp
            @endforeach
            <p class="checkout-total">
                Total : PHP {{$total}}
            </p>
        </div>
        <div class="payment-box">               
                <p class="payment-desc-1">Order Now , Pay on Delivery</p>
                <input name="payment_method" id="payment_cod" value="COD" type="radio" checked="checked">
                <label for="COD">Cash On Delivery<i class="bi bi-cash icon-cash"></i></label><br>
                
                <p class="payment-desc-2">E-Wallet Payment</p>
                <input name="payment_method" id="payment_gcash" value="GCASH" type="radio">
                <label for="GCASH">GCASH <br> Nicko's Kitchen <br> 0918273645</label>
        </div>

        </div>
            <div class="place-order-box">
                <button class="place-order-btn">Place Order</button>
            </div>
    </div> 
    </form>
</body>
</html>
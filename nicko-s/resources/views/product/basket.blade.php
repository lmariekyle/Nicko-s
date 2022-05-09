<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>MENU</title>

    <link href="/css/menu.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Forum&family=Open+Sans&family=Satisfy&family=Work+Sans:wght@300&display=swap" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
        <a href="{{url('menu')}}"><span class='bi bi-chevron-left arrow-style'></span></a>
        <a href="{{url('basket')}}"><span class='bi bi-cart cart-style'></span></a>

   
    <div class="food-display-container-view">
        <div class="row2">
            @php $total= 0; @endphp
        @foreach($basketItems as $item)
            <div class="food-container-view">
            <img src="{{asset('public/img/'.$item->food->image)}}" height="150px" width="150px">
                    <div class=food-desc-container>
                        <p class="food-name-view">{{$item->food->Name}}</p>
                        <p class="food-description-view">PHP {{$item->food->Price}}</p>
                        <input type="hidden" value="{{$item->food_id}}" class="food_id">
                        
                        <label for="Quantity">Quantity</label>
                        <button class="changeQuantity decrement-btn">-</button>
                        <input type="text" name="qty" class="qty-input" value="{{$item->food_qty}}">
                        <button class="changeQuantity increment-btn">+</button>

                        <div>
                            <button type="button" class="remove-btn"> <i class="fa fa-trash"></i> Remove</button>
                        </div>

                    </div>
            </div>
            @php $total += $item->food->Price * $item->food_qty ; @endphp
        @endforeach
        </div>

        <div>
            <h5>Total Price: PHP {{$total}}</h5>
            <button type="button" class="checkout-btn">Proceed to Checkout</button>
        </div>

    </div>

    <script>
    $(document).ready(function(){

        $('.increment-btn').click(function(e){
            e.preventDefault();

            var inc_value=$(this).closest('.food-container-view').find('.qty-input').val();
            var value=parseInt(inc_value, 10);
            value = isNaN(value)? 0 : value;
            if(value < 10){
                value++;
                $(this).closest('.food-container-view').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function(e){
            e.preventDefault();

            var dec_value=$(this).closest('.food-container-view').find('.qty-input').val();
            var value=parseInt(dec_value, 10);
            value = isNaN(value)? 0 : value;
            if(value > 1){
                value--;
                $(this).closest('.food-container-view').find('.qty-input').val(value);
            }
        });

        $('.remove-btn').click(function (e){

            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var food_id = $(this).closest('.food-container-view').find('.food_id').val();
            $.ajax({
                method: "POST",
                url: "delete-basket-item",
                data: {
                    'food_id':food_id,
                },
                success:function(response){
                    window.location.reload();
                    swal("",response.status, "success");
                }
            });

        });

        $('.changeQuantity').click(function (e){

            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var food_id = $(this).closest('.food-container-view').find('.food_id').val();
            var qty = $(this).closest('.food-container-view').find('.qty-input').val();
            data ={
                    'food_id': food_id,
                    'food_qty': qty,
            }
            $.ajax({
                method: "POST",
                url: "update-basket",
                data: data,
                success:function(response){
                    window.location.reload();
                }
            });

        });


    });

</script>


</body>

</html>


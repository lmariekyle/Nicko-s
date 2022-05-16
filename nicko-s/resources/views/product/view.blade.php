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
            <div class="food-container-view">
            <img src="{{asset('public/img/'.$foods->image)}}" class="food-img-view">
            <div class=food-desc-container>
                <p class="food-name-view">{{$foods->Name}}</p>
                <p class="food-description-view">{{$foods->Description}}</p>
                <p class="food-price-view">PHP {{$foods->Price}}</p>

                <input type="hidden" value="{{$foods->id}}" class="food-id">
                <div class="qty-box">
                <label for="Quantity" class="qty-txt">Quantity : </label>
                <button class="decrement-btn">-</button>
                <input type="text" name="qty" class="qty-input" value="1">
                <button class="increment-btn">+</button>
                </div>
                <div>
                    <button type="button" class="add-to-basket-btn">Add to Basket</button>
                </div>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function(){

        $('.add-to-basket-btn').click(function (e) {
            e.preventDefault();

            var food_id=$(this).closest('.food-desc-container').find('.food-id').val();
            var food_qty=$(this).closest('.food-desc-container').find('.qty-input').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url:"/add-to-basket",
                data:{
                    'food_id' : food_id,
                    'food_qty' : food_qty,
                },
                success: function (response){
                    alert(response.status);
                }
            });

        });

        $('.increment-btn').click(function(e){
            e.preventDefault();

            var inc_value=$('.qty-input').val();
            var value=parseInt(inc_value, 10);
            value = isNaN(value)? 0 : value;
            if(value < 10){
                value++;
                $('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function(e){
            e.preventDefault();

            var dec_value=$('.qty-input').val();
            var value=parseInt(dec_value, 10);
            value = isNaN(value)? 0 : value;
            if(value > 1){
                value--;
                $('.qty-input').val(value);
            }
        });

    });

</script>


</body>

</html>


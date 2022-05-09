<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>

    <link href="/css/menu.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Forum&family=Open+Sans&family=Satisfy&family=Work+Sans:wght@300&display=swap" rel="stylesheet">

</head>
<body>
        <a href="{{url('/')}}"><span class='bi bi-chevron-left arrow-style'></span></a>
        <a href="{{url('basket')}}"><span class='bi bi-cart cart-style'></span></a>
    <div class="menu-container">
        <h3 class="menu-title">Menu</h3>
        <div class="menu-contents">
            @foreach($category as $c)
            <a href="{{url('viewcategory/'.$c->CategoryName)}}" class="category-name">{{$c->CategoryName}}</a>
            @endforeach
        </div>
    </div>

    <div class="food-display-container">
        <div class="row">
        @foreach($food as $f)
            <div class="food-container">
            <img src="{{asset('public/img/'.$f->image)}}" class="food-img">
                <p class="food-name">{{$f->Name}}</p>
                <!-- <p class="food-description">{{$f->Description}}</p> -->
                <a href="{{url('viewfood/'.$f->Name)}}" class="food-view">View</a>
            </div>
        @endforeach
        </div>
    </div>
    
</body>
</html>
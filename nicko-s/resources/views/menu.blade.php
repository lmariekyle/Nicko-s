<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>

    <link href="/css/menu.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">

</head>
<body>

    <div class="menu-container">
        <h3 class="menu-title">MENU</h3>
        <div class="menu-contents">
            @foreach($category as $c)
            <h4 class="category-name">{{$c->CategoryName}}</h3>
            @endforeach
        </div>
    </div>
    
</body>
</html>
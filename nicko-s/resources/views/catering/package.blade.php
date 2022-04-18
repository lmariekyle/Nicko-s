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
            <form action="" id="package_page">
                <h1 class="title">Choose a Package</h1>
                <div class="subtitle">₱550 per head on all packages</div>
                
                <div id="selections">
                    <label for="option1">
                        <div class="package_head">
                            <input type="radio" name="package" id="option1" class="option-input radio" checked>
                            <span class="package_name">Package One</span> 
                        </div>
                        <div class="selection">
                            <p>
                                1 Lechon <br>
                                5 Main Dish <br>
                                1 Unlimited Refill Beverage <br>
                                6 Tables <br> 
                                30 Chairs <br>
                                30 pax Dining Set <br>

                                Decoration: <br>
                                Table Setting <br>
                                Buffet Table Setting <br>
                            </p>
                        </div>
                        <div class="price">₱16,500</div>
                    </label>
                    <label for="option2">
                        <div class="package_head">
                            <input type="radio" name="package" id="option2" class="option-input radio">
                            <span class="package_name">Package Two</span> 
                        </div>
                        <div class="selection">
                            <p>
                                1 Lechon <br>
                                7 Main Dish <br>
                                3 Unlimited Refill Beverage <br>
                                10 Tables <br> 
                                50 Chairs <br>
                                50 pax Dining Set <br>

                                Decoration: <br>
                                Table Setting <br>
                                Buffet Table Setting <br>
                            </p>
                        </div>
                        <div class="price">₱16,500</div>
                    </label>
                    <label for="option3">
                        <div class="package_head">
                            <input type="radio" name="package" id="option3" class="option-input radio">
                            <span class="package_name">Package Three</span> 
                        </div>
                        <div class="selection">
                            <p>
                                2 Lechon <br>
                                9 Main Dish <br>
                                4 Unlimited Refill Beverage <br>
                                15 Tables <br> 
                                75 Chairs <br>
                                75 pax Dining Set <br>

                                Decoration: <br>
                                Table Setting <br>
                                Buffet Table Setting <br>
                            </p>
                        </div>
                        <div class="price">₱16,500</div>
                    </label>

                </div>
                
                
                <div class="next">
                    <a href="{{url('/catering/package_detail')}}">
                        <span>Proceed</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            
            
            </form>
        </main>
        <div class="image_bg">
            <img src="../img/catering_index.jpeg" alt="">
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering | Package Details</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/css/catering.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <main>
            <div class="back">
                <a href="{{url('/catering/package')}}">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <form action="" id="package_page">
                <h1 class="title">Package Details</h1>
                
                <div id="details_page">
                    <div id="selections">
                        <label for="option1">
                            <div class="package_head">
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
                    </div>

                    <div id="requests">
                        <div class="req">
                            <h2>Allergies and Restrictions</h2>
                            <div class="subtitle_detail">Please list all food allergies, dietary restrictions, and food aversions</div>
                            <textarea name="allergies" id="allergies" cols="60" rows="4"></textarea>
                        </div>
                        <div class="req">
                            <h2>Notes</h2>
                            <div class="subtitle_detail">Please provide additional details in regards to your event.<br>
                            Is there a theme? Do you only like chocolate desserts?</div>
                            </p>
                            <textarea name="allergies" id="allergies" cols="60" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="next">
                    <a href="{{url('/catering/summary')}}">
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
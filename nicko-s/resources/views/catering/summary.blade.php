<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering | Summary</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/css/catering.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <main>
            <div class="back">
                <a href="{{url('/catering/package_detail')}}">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <form action="" id="package_page">
                <h1 class="title">A Summary of your Request</h1>
                
                <div id="summary">
                    <div id="summary_group">
                        <div class="summary_detail">
                            <h2 class="header">Event Type:</h2>
                            <span class="content">Birthday Party</span>
                        </div>
                        <div class="summary_detail">
                            <h2 class="header">Event Date:</h2>
                            <span class="content">May 26, 2022</span>
                        </div>
                        <div class="summary_detail">
                            <h2 class="header">Event Time:</h2>
                            <span class="content">6:00PM - 9:00PM</span>
                        </div>
                        <div class="summary_detail">
                            <h2 class="header">Venue:</h2>
                            <p>
                                <span>Location:</span> Beautiful Resort <br>
                                <span>City:</span> Cebu City <br>
                                <span>Town:</span> Dalaguete <br>
                                <span>Zip Code:</span> 6022 <br>
                            </p>
                        </div>
                    </div>

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

                    <div id="summary_notes">
                        <div class="note">
                            <h2>Allergies and Restrictions</h2>
                            <div class="box">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam reprehenderit,</div>  
                        </div>
                        <div class="note">
                            <h2>Notes</h2>
                            <div class="box">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam reprehenderit,</div>  
                        </div>
                    </div>
                </div>
                
                <div class="next">
                    <a href="{{url('')}}">
                        <span>Done</span>
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
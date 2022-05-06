<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering | Event Form</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/css/catering.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <main>
            <form method="POST" action="/catering/event_form_post/"  id="event-form">
                @csrf
                <h1 class="title">Tell us about your Event</h1>

                <div class="event-type">
                    <h2>Event Type:</h2><br>
                    <label>
                        <input type="radio" id="bday" class="option-input radio" name="selector" value="birthday" checked>
                        Birthday Party
                    </label>
                    <label>
                        <input type="radio" id="wedding" class="option-input radio" name="selector" value="wedding">
                        Wedding
                    </label>
                    <label>
                        <input type="radio" id="christening" class="option-input radio" name="selector" value="christening">
                        Christening
                    </label>
                    <label>
                        <input type="radio" id="corporate" class="option-input radio" name="selector" value="corporate">
                        Corporate Event
                    </label>
                    <label>
                        <input type="radio" id="other" class="option-input radio" name="selector" value="other">
                        Other
                    </label>
                </div>

                <div id="date-wrapper">
                    <div class="event-date">
                        <h2>Event Date & Time:</h2><br>
                        <label for="datetime">
                            <input type="datetime-local" name="event_datetime" required/>
                            &nbsp;&nbsp; Datetime
                        </label>
                        @if(Session::has('msg'))
                            <p class="text-danger">{{session('msg')}}</p>
                        @endif
                    </div>
                </div>

                
                <div class="event-venue">
                    <h2>Venue Address:</h2><br>
                    <input type="text" id="address" name="address" placeholder="Sitio Nasipit" required>
                    <label for="address">Address</label> <br><br>

                    <input type="text" id="city" name="city" placeholder="cebu" required> 
                    <label for="city">City</label>

                    <input type="text" id="Town" name="Town" placeholder="talamban" required>
                    <label for="Town">Municipality/Town</label>

                    <input type="text" id="zip" name="zip" placeholder="6000" required>
                    <label for="zip">Zip Code</label>
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
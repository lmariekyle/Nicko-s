<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering | Payments</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/css/catering.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <main>
            <div class="back">
                <a href="{{url('/catering/summary')}}">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <form action="" id="package_page">
                <h1 class="title">Payments</h1>
                <div id="payments">
                    <div class="text-content">
                        <p>
                            To confirm your Catering Reservation, a downpayment of 50% is required. Payment should be done through GCASH and within 3 days from this date.
                        </p>
                    </div>

                    <div class="gcash-box">
                        <img src="../img/gcash.png" class="gcash-img" alt="">
                        <p>
                            GCash Account: <br>
                            Nickos Kitchen <br>
                            0987651234 
                        </p>
                    </div>

                    <div class="text-content">
                        <p>
                            After confirming your catering reservation. Nicko’s Kitchen will contact you through the phone number and email you have provided. 
                            Please do keep a screenshot of your gcash transaction with us.
                            Thank you for trusting Nicko’s Kitchen.
                        </p>
                    </div>


                </div>
                
                <div class="next button">
                    <a href="{{url('catering/catering_done')}}">
                        <span>Submit</span>
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
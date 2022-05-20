<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering | Reservations</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/css/catering.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <main>
            <div class="back">
                <a href="{{url('/catering')}}">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
            
            <h1 class="title">Catering Reservations</h1>
            <div id="reservation">

                @forelse($reserv as $r)
                    <div class="reserv">
                        <h1>Package {{$r->package_id}}</h1>
                        <div class="column">
                            <span>Event Date</span>
                            <span>{{date('Y-m-d h:i a', strtotime($r->event_datetime))}}</span>
                        </div>
                        <div class="column">
                            <span>Event Venue</span>
                            <span>{{$r->event_address}} {{$r->event_city}} {{$r->event_town}}</span>
                        </div>
                        <div class="column">
                            <span>Total Cost</span>
                            <span>{{$r->total_price}}</span>
                        </div>
                        <div class="column">
                            <span>Total Payments</span>
                            <span>{{$r->total_payments}}</span>
                        </div>
                        <div class="column">
                            <span>Status</span>
                            <span>{{$r->catering_status}}</span>
                        </div>
                    </div>
                @empty
                    <p>You haven't made a reservation yet :)</p>
                @endforelse

            </div>
            <div id="contact_admin">
                <a href="{{url('catering/')}}">
                    <span>Contact Admin</span>
                </a>
            </div>
            
        </main>
        <div class="image_bg">
            <img src="../img/catering_index.jpeg" alt="">
        </div>
    </div>

</body>
</html>
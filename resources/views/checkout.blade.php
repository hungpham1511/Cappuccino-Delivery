<!-- Created by Hung Pham on 29/06/2021 -->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cappucino Delivery</title>

    <!-- Custom css -->
    <link href="{{ asset('css/checkout.css')}}" rel="stylesheet" type="text/css" media="all">

    <!-- Favicon-->
    <link href="img/Favicon1.svg" rel="icon" type="image/x-icon" media="all">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Datetime Picker -->

    <!-- Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <div id="app">
        <nav>
            {{-- <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Sign in') }}
            </a> --}}
            <header>
                <img id="home-page" class="logo" src="{{ asset('img/Frame2.png') }}" alt="">
                <p class="logo-name">CAPPUCCINO <br>DELIVERY</p>
            </header>
        </nav>
        <main class="py-4" style="margin-bottom: 10%;">
            <div class="row">
                <div class="navback-btn col-auto position-absolute">
                    <a href="{{ url('/home') }}" class="btn">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-12">
                    <p class="title">Checkout</p>
                </div>
            </div>
            <div class="container-fluid">
                <form action="{{ route('checkout.create') }} " method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Customer infomation -->
                            <div class="container-fluid border py-3 px-3 mb-4">
                                <h3 class="mb-3">1. Please confirm your order</h3>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label>Address</label>
                                    <input type="text" class="form-control mb-3" id="address" placeholder="Your address" name="address">
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-6 form-group pmd-textfield pmd-textfield-floating-label">
                                        <label>Full name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Your name" name="name">
                                    </div>
                                    <div class="col-lg-6 form-group pmd-textfield pmd-textfield-floating-label">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Your phone number" name="number">
                                    </div>
                                </div>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label>Note</label>
                                    <textarea required="" class="form-control mb-3" rows="3" id="note" type="text" name="note" placeholder="Your note for us" required></textarea>
                                </div>
                            </div>
                            <!-- Payment method -->
                            <div class="container-fluid border py-3 px-3 mb-4">
                                <h3 class="mb-3">2. Term of payments</h3>
                                <div class="form-check pt-3">
                                    <input class="form-check-input" type="radio" name="paymentmethod" id="cod" value="cod" checked>
                                    <img src="{{asset ('assets/img/cod.png')}}" alt="cod" width="24" height="24" />
                                    <label class="form-check-label" for="cod">Cash on Delivery</label>
                                </div>
                                <div class="form-check pt-3 mb-3">
                                    <input class="form-check-input" type="radio" name="paymentmethod" id="momo" value="momo">
                                    <img src="{{asset ('assets/img/momo.png')}}" alt="momo" width="24" height="24" />
                                    <label class="form-check-label" for="momo">Momo</label>
                                </div>
                            </div>
                            <!-- Weekly book -->
                            <div class="container-fluid border py-3 px-3">
                                <h3 class="mb-3">3. Weeklybook</h3>
                                <div class="form-check form-switch ml-3">
                                    <input class="form-check-input" type="checkbox" id="isWeeklyBook" name="isWeeklyBook" onclick="weeklybook()">
                                    <label class="form-check-label" for="isWeeklyBook">Use our weeklybook service</label>
                                </div>
                                <div id="weekday" style="display:none">
                                    <div class="row align-items-center">
                                        <div class="col-lg-auto">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label>Select start date</label>
                                                <input type="date" id="startdate" name="startdate" value="2021-07-11" min="2021-07-11" max="2021-12-31">
                                            </div>
                                        </div>
                                        <div class="col-lg-auto">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label>Select end date</label>
                                                <input type="date" id="enddate" name="enddate" value="2021-07-11" min="2021-07-11" max="2021-12-31">
                                            </div>
                                        </div>
                                        <div class="col-lg-auto">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label>When can we deliver your coffee?</label>
                                                <input type="time" id="time" name="time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="mon" name="mon">
                                        <label class="form-check-label" for="mon">Monday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="tue" name="tue">
                                        <label class="form-check-label" for="tue">Tuesday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="web" name="web">
                                        <label class="form-check-label" for="wed">Wednesday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="thu" name="thu">
                                        <label class="form-check-label" for="thu">Thursday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="fri" name="fri">
                                        <label class="form-check-label" for="fri">Friday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sat" name="sat">
                                        <label class="form-check-label" for="sat">Saturday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sun" name="sun">
                                        <label class="form-check-label" for="sun">Sunday</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="container-fluid border py-3 px-3">
                                <h3 class="mb-3">4. Receipt</h3>
                                <table class="table-m">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th class="receipt-text">Amount</th>
                                        <th class="receipt-text">Cost</th>
                                    </tr>
                                    <tr>
                                        <td class="td-bt">
                                            <img src="Assets/Frappe.png" alt="Frappe" />
                                        </td>
                                        <td class="drink-name td-bt">Frappé</td>
                                        <td class="receipt-text td-bt">1</td>
                                        <td class="receipt-text td-bt">50.000 VND</td>
                                    </tr>
                                    <tr>
                                        <td class="td-bt">
                                            <img src="Assets/Cappuchino.png" alt="Cappuchino" />
                                        </td>
                                        <td class="drink-name td-bt">Cappuchino</td>
                                        <td class="receipt-text td-bt">1</td>
                                        <td class="receipt-text td-bt">50.000 VND</td>
                                    </tr>
                                </table>
                                <p class="receipt-text money-out-table mt-3">
                                    Sum <span style="float: right">100.000 VND</span>
                                </p>
                                <p class="receipt-text money-out-table">
                                    Shipping <span style="float: right">0 VND</span>
                                </p>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="promotion" name="promotion" placeholder="Promotion">
                                    <button class="btn btn-brand-color" type="button">Submit</button>
                                </div>
                                <p class="receipt-text money-out-table mt-3">
                                    Total <span style="float: right">100.000 VND</span>
                                </p>
                                <button type="submit" data-toggle="modal" data-target="#checkoutmodel" class="btn col-12 btn-brand-color">Buy now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Order Success Modal -->
            <div class="modal fade" id="checkoutmodel" tabindex="-1" role="dialog" aria-labelledby="checkoutmodelTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Javascript -->
            <script src="{{asset ('js/checkout.js')}}"></script>
        </main>
</body>

</html>

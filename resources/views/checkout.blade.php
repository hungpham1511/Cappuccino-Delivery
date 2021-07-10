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
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet" type="text/css" media="all">

    <!-- Favicon-->
    <link href="picture/Favicon1.svg" rel="icon" type="image/x-icon" media="all">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div>
        <nav>
            {{-- <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Sign in') }}
            </a> --}}
            <header>
                <img id="home-page" class="logo" src="{{ asset('assets/img/logo.png') }}" alt="">
                <p class="logo-name">CAPPUCCINO <br>DELIVERY</p>
            </header>
        </nav>
        <main>
            <div>
                <div class="navback-btn col-auto position-absolute">
                    <a href="{{ url('/home') }}" class="btn">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-12 p-0">
                    <p class="title mr-0">Checkout</p>
                </div>
            </div>
            <form id="checkoutform" class="needs-validation" novalidate action="{{ route('checkout.create') }} "
                method="GET">
                <div class="container-fluid">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7">
                            <!-- Customer infomation -->
                            <div class="container-fluid section-border py-3 px-3 mb-4">
                                <h3 class="mb-3">1. Please confirm your order</h3>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label>Address</label>
                                    <input type="text" class="require form-control mb-3" id="address"
                                        placeholder="Your address" name="address" value="{{ $user[0]->address }}" required>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-6 form-group pmd-textfield pmd-textfield-floating-label">
                                        <label>Full name</label>
                                        <input type="text" class="require form-control" id="name"
                                            placeholder="Your name" name="name" value="{{ $user[0]->fullName }}" required>
                                    </div>
                                    <div class="col-lg-6 form-group pmd-textfield pmd-textfield-floating-label">
                                        <label>Phone number</label>
                                        <input type="number" class="require form-control" id="phone"
                                            placeholder="Your phone number" name="number" value="{{ $user[0]->phone }}" required>
                                    </div>
                                </div>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label>Note</label>
                                    <input class="form-control mb-3" rows="3" id="note" type="text" name="note"
                                        placeholder="Your note for us"></textarea>
                                </div>
                            </div>
                            <!-- Payment method -->
                            <div class="container-fluid section-border py-3 px-3 mb-4">
                                <h3 class="mb-3">2. Term of payments</h3>
                                <div class="form-check pt-3">
                                    <input class="form-check-input" type="radio" name="paymentmethod" id="cod"
                                        value="cod" checked>
                                    <img src="{{ asset('assets/img/cod.png') }}" alt="cod" width="24" height="24" />
                                    <label>Cash on Delivery</label>
                                </div>
                                <div class="form-check pt-3">
                                    <input class="form-check-input" type="radio" name="paymentmethod" id="momo"
                                        value="momo">
                                    <img src="{{ asset('assets/img/momo.png') }}" alt="momo" width="24" height="24" />
                                    <label>Momo</label>
                                </div>
                                <div class="form-check pt-3 mb-3">
                                    <input class="form-check-input" type="radio" name="paymentmethod" id="bank"
                                        value="bank">
                                    <img src="{{ asset('assets/img/bank.png') }}" alt="bank" width="24" height="24" />
                                    <label>Banking</label>
                                </div>
                            </div>
                            <!-- Weekly book -->
                            <div class="container-fluid section-border py-3 px-3 mb-4">
                                <h3 class="mb-3">3. Weeklybook</h3>
                                <div class="form-check form-switch ml-3">
                                    <input class="form-check-input" type="checkbox" id="isWeeklyBook"
                                        name="isWeeklyBook" onclick="weeklybook()">
                                    <label>Use our weeklybook service</label>
                                </div>
                                <div id="weekday" style="display:none">
                                    <div class="row align-items-center">
                                        <div class="col-lg-auto">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label>Select start date</label>
                                                <input type="date" id="startdate" name="startdate" value="2021-07-11"
                                                    min="2021-07-11" max="2021-12-31">
                                            </div>
                                        </div>
                                        <div class="col-lg-auto">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label>Select end date</label>
                                                <input type="date" id="enddate" name="enddate" value="2021-07-11"
                                                    min="2021-07-11" max="2021-12-31">
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
                                        <label>Monday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="tue" name="tue">
                                        <label>Tuesday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="wed" name="wed">
                                        <label>Wednesday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="thu" name="thu">
                                        <label>Thursday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="fri" name="fri">
                                        <label>Friday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sat" name="sat">
                                        <label>Saturday</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sun" name="sun">
                                        <label>Sunday</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="container-fluid section-border anchor py-3 px-3 mb-4">
                                <h3 class="mb-3">4. Receipt</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td colspan="4" class="amount border-top-none"">Amount</td>
                                            <td class=" cost1 border-top-none"">Cost</td>
                                        </tr>
                                    </thead>
                                    <tbody class="cart-detail">
                                    </tbody>
                                    <tfoot>
                                        <tr class="row2">
                                            <td colspan="4">Sum</td>
                                            <td class="sum"></td>
                                        </tr>
                                        <tr class="row2">
                                            <td colspan="4">Shipping</td>
                                            <td class="shipping"></td>
                                        </tr>
                                        <tr class="row2">
                                            <td colspan="5">
                                                <div class="input-group py-2">
                                                    <input type="text" class="form-control" id="promotion"
                                                        name="promotion" placeholder="Promotion">
                                                    <button class="btn btn-brand-color" type="button"
                                                        onclick="submitPromo('{{ $promotion }}')">Submit</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="row2">
                                            <td colspan="4">Total</td>
                                            <td class="total"></td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-none" colspan="5">
                                                <button id="modalbtn" type="button" data-toggle="modal"
                                                    data-target="#checkoutmodel" class="mt-2 btn col-12 btn-brand-color"
                                                    onclick="changeFormula()">Buy now</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="footer">
                    <div class="row mx-0">
                        <div class="col-lg-4 logo-brand">
                            <img class="logo-img2" src="{{asset('picture/Frame2.png')}}" alt="logo image">
                            <h4 class="logo-name2">CAPPUCCINO <br>DELIVERY</h4>
                        </div>
                        <div class="col-lg-8">
                            <i class="footer-contact fa fa-facebook" aria-hidden="true">cappuccino.com</i>
                            <i class="footer-contact fa fa-instagram" aria-hidden="true">_ilovecappu</i>
                            <i class="footer-contact fa fa-phone" aria-hidden="true">0898536271</i>
                            <i class="footer-contact fa fa-building" aria-hidden="true">86-88 Cao Thắng, phường 4, quận 3, Hồ Chí Minh</i>
                        </div>
                    </div>
                </div>
                <!-- Order Success Modal -->
                <div class="modal fade" id="checkoutmodel" tabindex="-1" role="dialog"
                    aria-labelledby="checkoutmodelTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Order complete</h5>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p class="modal-text" id="modal-message"></p>
                                    <img class="modal-img" src="" name="modal-picture" id="modal-picture">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-brand-color">Confirm & return to menu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Javascript -->
            <script src="{{ asset('js/checkout.js') }}"></script>
        </main>
</body>

</html>

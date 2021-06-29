<!-- Created by Hung Pham on 29/06/2021 -->
<!-- W3C Markup validation verified -->
@extends('layouts.userlog')

@section('content')
<p>
    <button onclick="location.href = '/User/OrderPage/index.html';" class="nav-back">
        <img src="Assets/coolicon.png" alt="Back" />
    </button>
<p class="title">Checkout</p>
</p>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <form class="border-0">
                <!-- Customer infomation -->
                <div class="container-fluid border py-3 px-3 mb-4">
                    <h3>1. Please confirm your order</h3>
                    <input type="text" class="form-control" id="address" placeholder="Your address">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="name" placeholder="Your name">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="phone" placeholder="Your phone number">
                        </div>
                    </div>
                    <textarea class="form-control mt-2" rows="3" id="note" type="text" placeholder="Your note for us" required></textarea>
                </div>
                <!-- Payment method -->
                <div class="container-fluid border py-3 px-3 mb-4">
                    <h3>2. Term of payments</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentmethod" id="cod" value="cod" checked>
                        <img src="./Assets/cod.jpg" alt="COD" width="24" height="24" />
                        <label class="form-check-label" for="cod">Cash on Delivery</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentmethod" id="momo" value="momo">
                        <img src="./Assets/cod.jpg" alt="COD" width="24" height="24" />
                        <label class="form-check-label" for="momo">Momo</label>
                    </div>
                </div>
                <!-- Weekly book -->
                <div class="container-fluid border py-3 px-3">
                    <h3>3. Weeklybook</h3>
                    <div class="form-check form-switch ml-3">
                        <input class="form-check-input" type="checkbox" id="isWeeklyBook" name="isWeeklyBook" onclick="weeklybook()">
                        <label class="form-check-label" for="isWeeklyBook">Use our weeklybook service</label>
                    </div>
                    <div id="weekday" style="display:none">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="mon">
                            <label class="form-check-label" for="mon">Monday</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="tue">
                            <label class="form-check-label" for="tue">Tuesday</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="web">
                            <label class="form-check-label" for="wed">Wednesday</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="thu">
                            <label class="form-check-label" for="thu">Thursday</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="fri">
                            <label class="form-check-label" for="fri">Friday</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sat">
                            <label class="form-check-label" for="sat">Saturday</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sun">
                            <label class="form-check-label" for="sun">Sunday</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <div class="container-fluid border py-3 px-3">
                <h3>4. Receipt</h3>
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
                <div class="row">
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="promotion" placeholder="Promotion">
                    </div>
                    <div class="col-lg-4">
                        <button class="btn">Submit</button>
                    </div>
                </div>
                <p class="receipt-text money-out-table mt-3">
                    Total <span style="float: right">100.000 VND</span>
                </p>
                <button class="btn">Buy now</button>
            </div>
        </div>
    </div>
</div>
<!-- Order Success Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <h3>Fresh coffee is on it’s way!</h3>
        <img class="modal-image" src="Assets/ModalPicture.png" alt="2 cups of coffee" />
        <h4>
            Your order is confirmed and it will reach you within the next 20
            minutes.
        </h4>
        <button onclick="location.href = '/User/OrderPage/index.html';" class="btn" style="width: 88%">
            Return to Menu
        </button>
    </div>
</div>
<!-- Modal script -->
<script src="{{asset ('js/checkout.js')}}"></script>
@endsection

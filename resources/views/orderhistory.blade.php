<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- css -->
    <link rel ="stylesheet" href="{{asset('css/order-history.css')}}" type="text/css" media="all">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" />

    <!-- bootstrap css -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
     integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
   
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'orderhistory') }}</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="{{asset('css/order-history.css')}}" rel="stylesheet" type="text/css" media="all">
    <title>order history</title>
</head>

<body>

     <!-- js -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
     integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
     crossorigin="anonymous"></script>

    <!--header-->

        <div class ="container-fluid" style="background-color:#cfc6b7;  overflow:auto; position: relative;" > 
            <div style="padding: 1rem;">
                <a>
                    <img class="logo" src="{{asset('picture/logo.png')}}" alt="logo image" />
                    <p class="logo-name" style="padding: 0.5em;">CAPPUCCINO <br />DELIVERY</p>
                </a>
                <img class="cart" src="{{asset('picture/cart.png')}}" style="padding: 0.5em; position: absolute; top: 20px;
                right: 20px;"/>
            </div>         
        </div>
  

        <!--order history-->
        <div class="container" style ="padding: 1em;margin-bottom: 3em;" >
            <div class="row">
                <div class="col-lg-2">
                    <i class="fas fa-arrow-left back" style="
                    left: 5%;
                    right: 95%;
                    top: 23%;
                    bottom: 84.68%; 
                   "
                        onclick="location.href='{{ route('orderpage') }}'"
                   ></i>
                </div>

                <div class="col-lg-8 col-sm-4">
                    <h3 class="content-order" style="
                    top: 35%;
                    left: 45%;
                    
                    ">ORDER HISTORY</h3>
                </div>
                <div class="col-lg-2 col-sm-4">
    
                </div>
            </div>
        

        <table class="table table-bordered" id="dataTable"  cellspacing="0">

           

            <tr>
            {{--  <th>IdUser</th> --}}
                <th>IdReceipt</th>
                <th>ReceiptDate</th>
                <th>Payment</th>  
                <th>Status</th>
                <th>Total</th> 
                <th>Action</th>
               

            </tr>
           @foreach ($receipt as $receipt)
            <tr>
    {{--        <td>{{ $receipt->idUser }}</td> --}}
                <td>{{ $receipt->idReceipt }}</td>
                <td>{{ $receipt->receiptDate }}</td>
                @if($receipt->payment==1) 
                <td>
                    COD
                </td>
                @elseif ($receipt->payment==2) 
                <td>
                 Momo
                </td>
                @elseif ($receipt->payment==3) 
                <td>
                 Bank
                </td>
                @endif

                @if ($receipt->status==1)
                <td>
                 Order Received
                </td>
                @elseif ($receipt->status==2) 
                <td>
                 Payment received
                </td>
                @elseif ($receipt->status==3) 
                <td>
                 Delivering
                </td>
                @elseif ($receipt->status==4) 
                <td>
                 Finished
                </td>
                @endif
                <td>{{ $receipt->total }}</td>
                <td>
                    <button onclick="showDetailReceipt('{{$detail}}', '{{$menu}}','{{$topping}}', '{{$detailTopping}}', '{{$detailWeekly}}', '{{$receipt->idReceipt}}', '{{$receipt->idDetailWeeklyBook}}')" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Show Detail Receipt</button>
                </td>
               
            </tr>
            @endforeach
           
        </table>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Receipt</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button onclick="clearDetail()" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    <script src="{{ asset('js/orderhistory.js') }}"></script>

    <script>
        var btns = document.querySelectorAll('.button');
        btns.forEach(function(btn) {
            btn.setAttribute('onclick',"location.href='../OrderPage/index.html'")
        })
    </script>

     <main class="py-4" style="margin-bottom: 10%;">
        @yield('content')
    </main>

    </body>

</html>

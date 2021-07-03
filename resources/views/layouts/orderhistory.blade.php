
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel ="stylesheet" href="order-history.css">
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
                    <img class="logo" src="./assets/logo.png" alt="" />
                    <p class="logo-name" style="padding: 0.5em;">CAPPUCCINO <br />DELIVERY</p>
                </a>
                <img class="cart" src="./assets/cart.png" style="padding: 0.5em; position: absolute; top: 20px;
                right: 20px;"/>
            </div>         
        </div>
  

        <!--order history-->
        <div class="container" style ="padding: 1em;margin-bottom: 3em;" >
            <div class="row">
                <div class="col-lg-2">
                    <i class="fas fa-arrow-left back" style="
                    position: absolute;
                    left: 5%;
                    right: 95%;
                    top: 23%;
                    bottom: 84.68%; 
                   "
                        onclick="location.href='../OrderPage/index.html '"
                   ></i>
                </div>

                <div class="col-lg-8 col-sm-4">
                    <h3 class="content-order" style="
                    position: absolute;
                    top: 23%;
                    left: 45%;
                    
                    ">ORDER HISTORY</h3>
                </div>
                <div class="col-lg-2 col-sm-4">
    
                </div>
            </div>
        </div>

        <table>
            <!-- 2 cafe 21/05/2021 -->
            <tr>
                <div class="container-fluid" >
                    <div class="row" style="padding: 1em;">
                        <div style="text-align: center;" class="col-sm-3">
                           <img src="./assets/image 46.png" style="height: 100px; width: 100px;margin:auto"/>
                        </div>
                        <div class="col-sm-3">Banana Smoothie</div>
                        <div class="col-sm-1">x</div>
                        <div class="col-sm-1">1</div>
                        <div style="text-align: right;" class="col-sm-4">50.000 VND</div>
                    </div>
                    <div class="row" style="padding: 1em;">
                        <div style="text-align: center;" class="col-sm-3">
                            <img src="./assets/image 39.png" style="height: 100px; width: 100px;margin:auto"/>
                        </div>
                        <div class="col-sm-3">Iced Tiramisu</div>
                        <div class="col-sm-1">x</div>
                        <div class="col-sm-1">1</div>
                        <div style="text-align: right;" class="col-sm-4">45.000 VND</div>
                    </div>
                </div>
            </tr>
            <!-- tinh tien 2 cafe -->
            <tr>
                <div class="container-fluid">
                    <div class="row" style="padding: 1em;">
                        <div class="col-sm-4">08:15 - 21/05/2021</div>
                        <div class="col-sm-6"style="text-align: right;" >$total</div>
                        <div style="text-align: right;" class="col-sm-2">95.000 VND</div>
                    </div>
                    <div class="row" style="padding: 1em;">
                        <div class="col-sm-9">
    
                        </div>
                        <div class="col-sm-3" style="text-align: right;" >
                            <button style="text-align: center;" class="button">Reorder</button>
                        </div>
                    </div>
                </div>
            </tr>
            <!-- 1 cafe 17/05/2021 -->
            <tr>
                <div class="container-fluid">
                    <div class="row" style="padding: 1em;">
                        <div style="text-align: center;" class="col-sm-3">
                            <img src="./assets/image 25.png" style="height: 100px; width: 100px;margin:auto"/>
                        </div>
                        <div class="col-sm-3">Cappuccino</div>
                        <div class="col-sm-1">x</div>
                        <div class="col-sm-1">2</div>
                        <div style="text-align: right;" class="col-sm-4">45.000 VND</div>
                    </div>
                    
                </div>
            </tr>
            <!-- tinh tien 1 cafe -->
            <tr>
                <div class="container-fluid">
                    <div class="row" style="padding: 1em;">
                        <div class="col-sm-4">18:03 - 17/05/2021</div>
                        <div class="col-sm-6"style="text-align: right;" >$total</div>
                        <div style="text-align: right;" class="col-sm-2">90.000 VND</div>
                    </div>
                    <div class="row" style="padding: 1em;">
                        <div class="col-sm-9">
            
                        </div>
                        <div class="col-sm-3" >
                            <button style="text-align: center;" class="button">Reorder</button>
                        </div>
                    </div>
                </div>
            </tr>

             <!-- 1 cafe 15/05/2021-->
             <tr>
                <div class="container-fluid">
                    <div class="row" style="padding: 1em;">
                        <div style="text-align: center;" class="col-sm-3">
                            <img src="./assets/image 47.png" style="height: 100px; width: 100px;margin:auto"/>
                        </div>
                        <div class="col-sm-3">Tropical Smoothie</div>
                        <div class="col-sm-1">x</div>
                        <div class="col-sm-1">1</div>
                        <div style="text-align: right;" class="col-sm-4">55.000 VND</div>
                    </div>
                    
                </div>
            </tr>
            <!-- tinh tien 1 cafe -->
            <tr>
                <div class="container-fluid">
                    <div class="row" style="padding: 1em;">
                        <div class="col-sm-4">11:07 - 15/05/2021</div>
                        <div class="col-sm-6" style="text-align: right;" >$total</div>
                        <div style="text-align: right;" class="col-sm-2">55.000 VND</div>
                    </div>
                    <div class="row" style="padding: 1em;">
                        <div class="col-sm-9">
            
                        </div>
                        <div class="col-sm-3">
                            <button style="text-align: center;" class="button">Reorder</button>
                        </div>
                    </div>
                </div>
            </tr>

            <!-- 2 cafe 05/05/2021-->
            <tr>
                <div class="container-fluid" >
                    <div class="row" style="padding: 1em;">
                        <div style="text-align: center;" class="col-sm-3">
                           <img src="./assets/image 40.png" style="height: 100px; width: 100px;margin:auto"/>
                        </div>
                        <div class="col-sm-3">Frappuccino</div>
                        <div class="col-sm-1">x</div>
                        <div class="col-sm-1">2</div>
                        <div style="text-align: right;" class="col-sm-4">100.000 VND</div>
                    </div>
                    <div class="row" style="padding: 1em;">
                        <div style="text-align: center;" class="col-sm-3">
                            <img src="./assets/image 45.png" style="height: 100px; width: 100px;margin:auto"/>
                        </div>
                        <div class="col-sm-3">Lemon Tea</div>
                        <div class="col-sm-1">x</div>
                        <div class="col-sm-1">1</div>
                        <div style="text-align: right;" class="col-sm-4">55.000 VND</div>
                    </div>
                </div>
            </tr>
            <!-- tinh tien 2 cafe -->
            <tr>
                <div class="container-fluid">
                    <div class="row" style="padding: 1em;">
                        <div class="col-sm-4">14:10 - 05/05/2021</div>
                        <div class="col-sm-6"style="text-align: right;" >$total</div>
                        <div style="text-align: right;" class="col-sm-2">155.000 VND</div>
                    </div>
                    <div class="row" style="padding: 1em;">
                        <div class="col-sm-9">
    
                        </div>
                        <div class="col-sm-3" style="text-align: right;" >
                            <button style="text-align: center;" class="button">Reorder</button>
                        </div>
                    </div>
                </div>
            </tr>
    
        </table>

       
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

    
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Flex Nadhiri | </title>
    <!-- tailwind css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/one-page-wonder.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Flex Nadhiri</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a data-toggle="modal" href="#myModal" class="nav-link">Join Today</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#myModal-2" data-toggle="modal">Log In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container">
            <h1 class="masthead-heading mb-0">Flex Nadhiri</h1>
            <h2 class="masthead-subheading mb-0">Grow Your Church or Non Profit Organization</h2>
            <h4 class="masthead-subheading2 mb-0">Attract Donors, Get Financial Insights, Automate Everything While growing Your Impact</h4>
            <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-xl rounded-pill mt-5">Join Us Today</a>
            <a href="#myModal-2" class="btn btn-primary btn-xl rounded-pill mt-5">Log In</a>
        </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
</header>

<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5">
                    <img class="img-fluid rounded-circle" src="{{asset('images/religion.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">Watch Your Donations Climb...</h2>
                    <p>Don't let your outdated donation process hold you back from growing your giving. Get a full donation system off the ground in minutes that will give you donor-friendly donation solutions, automatic donation receipts and tracking, and increased giving.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="p-5">
                    <img class="img-fluid rounded-circle" src="{{asset('images/accounts.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-5">
                    <h2 class="display-4">Control Your Accounting & Financials</h2>
                    <p> Make accounting easy by tracking your bookkeeping and donations all in one place. Customizable nonprofit reports, fund accounting, and donation receipts make it simple to steward your resources, track your contributions and allocated funds precisely, and share reports with your committee.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5">
                    <img class="img-fluid rounded-circle" src="{{asset('images/accounts.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">Engage With Your Supporters In Your Mission!</h2>
                    <p>sending texts or emails, alerting members on church events,
                        donations and fundraising thus allowing easy dissemination of information across the congregation.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- join us modal window-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <section class="login-block">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                             <div class="mb-4" :errors="$errors" />
                                <form class="md-float-material form-material" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="auth-box card">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="text-center heading">Create your Nadhiri account. It’s free and only takes a minute.</h3>
                                                </div>
                                            </div>
                                            <div class="form-group form-primary"> <input id="name" type="text" class="form-control" name="name"  placeholder="First Name" > </div>
                                             <div class="form-group form-primary"> <input id="lastname" type="text" class="form-control" name="lastname"  placeholder="Last Name" > </div>
                                            <div class="form-group form-primary"> <input id="email" type="text" class="form-control" name="email" placeholder="Email" > </div>
                                             <div class="form-group form-primary"> <input id="phone_no" type="text" class="form-control" name="phone_no" placeholder="Phone Number" > </div>
                                            <div class="form-group form-primary"> <input id="password" type="password" class="form-control" name="password" placeholder="Password" > </div>
                                            <div class="form-group form-primary"> <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Repeat password" > </div>
                                            <div class="row">
                                                <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Signup Now">
                                                </div>
                                            </div>
                                         
                                           <br>   <!--
                                            <p class="text-inverse text-center">Already have an account? <a href="#" data-abc="true">Login</a></p> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>
<!-- ending of join us modal window-->
<!-- login modal window -->

<!-- Modal HTML -->
<div id="myModal-2" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">              
                <h4 class="modal-title">Member Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                 <form method="POST" action="{{ route('login') }}">
            @csrf

                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <input type="text" name="email" id="email" class="form-control" placeholder="email address" required="required">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input type="password" id="password" class="form-control" placeholder="Password" name="password"
                                required autocomplete="current-password">                 
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">
                    </div>
                    <!-- remember me-->
                    <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
                </form>             
                
            </div>
            <div class="modal-footer">
                 @if (Route::has('password.request'))
                <a href=""{{ route('password.request') }}">Forgot Password?</a>
                 @endif
            </div>
        </div>
    </div>
</div>     

<!-- end of login modal window-->
<!-- Footer -->
                                            <footer class="py-5 bg-black">
                                                <div class="container">
                                                    <p class="m-0 text-center text-white small">Copyright &copy; Flex Nadhirr 2020</p>
                                                </div>
                                                <!-- /.container -->
                                            </footer>

                                            <!-- Bootstrap core JavaScript -->
                                            <script src="{{asset('jquery/jquery.js')}}"></script>
                                            <script src="{{asset('js/bootstrap.bundle.js')}}"></script>

                                            <!-- modal javascript-->
                                            <script>
                                                $(document).ready(function(){
                                                    $("#myBtn").click(function(){
                                                        $("#myModal").modal();
                                                    });
                                                });
                                            </script>

                                            <!-- modal2 javascript-->
                                            <script>
                                                $(document).ready(function(){
                                                    $("#myBtn").click(function(){
                                                        $("#myModal-2").modal();
                                                    });
                                                });
                                            </script>

</body>

</html>

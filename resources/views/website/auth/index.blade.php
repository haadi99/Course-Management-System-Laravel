@extends('website.master')

@section('title')
    Login/Registration Page
@endsection

@section('body')

    <section class="page-title overlay" style="background-image: url({{asset('/')}}website/images/background/page-title.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white font-weight-bold">Login / Registration Page</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Login / Registration Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center text-danger">{{session('message')}}</h5>
            </div>
        </div>
    </section>

    <!-- login-registration -->
    <section class="section">
        <div class="container bg-light shadow">
            <div class="row">
                <div class="col-md-6">
                    <div class="signup">
                        <div class="row">
                            <div class="col-md-5 signup-greeting overlay" style="background-image: url({{asset('/')}}website/images/background/signup.jpg);">
                                <img src="{{asset('/')}}website/images/logo-signup.png" alt="logo">
                                <h4>Welcome!</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna.</p>
                            </div>
                            <div class="col-md-7">
                                <div class="signup-form">
                                    <form action="{{route('student-login')}}" method="POST" class="row">
                                        @csrf
                                        <div class="col-12">
                                            <h4>Login</h4>
                                            <p class="float-sm-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-12">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-primary btn-sm">Login</button>
                                        </div>
                                        <div class="col-sm-8 text-sm-right">
                                            <p class="signup-with">Or Login with</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-facebook">
                                                        <i class="ti-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-google">
                                                        <i class="ti-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="signup">
                        <div class="row">
                            <div class="col-md-5 signup-greeting overlay" style="background-image: url({{asset('/')}}website/images/background/signup.jpg);">
                                <img src="{{asset('/')}}website/images/logo-signup.png" alt="logo">
                                <h4>Welcome!</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna.</p>
                            </div>
                            <div class="col-md-7">
                                <div class="signup-form">
                                    <form action="{{route('student-register')}}" method="POST" class="row">
                                        @csrf
                                        <div class="col-12">
                                            <h4>Sign Up</h4>
                                            <p class="float-sm-right">  </p>
                                        </div>

                                        <div class="col-12">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                        </div>

                                        <div class="col-12">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                        </div>

                                        <div class="col-12">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>

                                        <div class="col-12">
                                            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
                                        </div>

                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary btn-sm">Sign Up</button>
                                        </div>
                                        <div class="col-sm-8 text-sm-right">
                                            <p class="signup-with">Or Sign Up with</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-facebook">
                                                        <i class="ti-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-google">
                                                        <i class="ti-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection

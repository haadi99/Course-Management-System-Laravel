@extends('website.master')

@section('title', '{{$training->title}}')

@section('body')


    <section class="page-title overlay" style="background-image: url({{asset('/')}}website/images/background/page-title.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white font-weight-bold">{{$training->title}}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>{{$training->category->name}}/</li>
                        <li>{{$training->title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- blog single -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 py-100">
                    <div class="border rounded bg-white">
                        <img class="img-fluid w-100 rounded-top" src="{{asset($training->image)}}" alt="blog-image">
                        <div class="p-4">
                            <h3>{{$training->title}}</h3>
                            <ul class="list-inline d-block pb-4 border-bottom mb-3">
                                <li class="list-inline-item text-color">Trainer Name {{$training->teacher->name}} </li>
                                <li class="list-inline-item text-color">Training Starts at {{$training->starting_date}}</li>
                                <li class="list-inline-item text-color">Training Category : {{$training->category->name}} </li>
                            </ul>

                            <div> {!! $training->description !!} </div>

                            <div class="py-4 border-bottom">
                                <div class="row">
                                    <div class="col-lg-5 mb-4 mb-lg-0">
                                        <!-- share-icon -->
                                        <div class="d-flex">
                                            <span class="font-weight-light mt-2 mr-3">Share:</span>
                                            <ul class="list-inline d-inline-block">
                                                <li class="list-inline-item">
                                                    <a class="share-icon bg-facebook" href="#">
                                                        <i class="ti-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="share-icon bg-twitter" href="#">
                                                        <i class="ti-twitter-alt"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="share-icon bg-linkedin" href="#">
                                                        <i class="ti-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="share-icon bg-google" href="#">
                                                        <i class="ti-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <!-- tags -->
                                        <div class="d-flex">
                                            <span class="font-weight-light mt-2 mr-3">Tags:</span>
                                            <ul class="list-inline tag-list">
                                                <li class="list-inline-item">
                                                    <a href="#">Business</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#">Marketing</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#">Finance</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="py-5">
                            @if($enrollStatus == 0)
                                <form action="{{route('training-enroll', ['id' => $training->id])}}" method="POST" class="row">
                                @csrf
                                @if(!Session::has('student_id'))
                                    <h4>Enroll Form:</h4>
                                    <p class="mb-30">Required fields are marked *</p>

                                    <div class="col-lg-12">
                                        <label for="">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control mb-30" id="user-name" name="name" placeholder="Your name here"/>
                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" id="user-email" name="email" class="form-control mb-30" placeholder="Your email address here"/>
                                        <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="number" id="user-mobile" name="mobile" class="form-control mb-30" placeholder="Your mobile number here"/>
                                        <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary" type="submit" value="send">Confirm Enroll</button>
                                </div>
                            </form>
                            @else
                                <button type="button" class="btn btn-success disabled">Already Enrolled</button>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Sidebar -->
                    <div class="bg-white px-4 py-100 sidebar-box-shadow">
                        <!-- Search Widget -->
                        <div class="mb-50">
                            <h4 class="mb-3">Search Here</h4>
                            <div class="search-wrapper">
                                <input type="text" class="form-control" name="search" placeholder="Type Here...">
                            </div>
                        </div>
                        <!-- categories -->
                        <div class="mb-50">
                            <h4 class="mb-3">Categories</h4>
                            <ul class="pl-0 mb-0">
                                <li class="border-bottom">
                                    <a href="#" class="d-block text-color py-10">Business Analysis</a>
                                </li>
                                <li class="border-bottom">
                                    <a href="#" class="d-block text-color py-10">Consultancy</a>
                                </li>
                                <li class="border-bottom">
                                    <a href="#" class="d-block text-color py-10">Investment</a>
                                </li>
                                <li class="border-bottom">
                                    <a href="#" class="d-block text-color py-10">Profit & Growth</a>
                                </li>
                                <li>
                                    <a href="#" class="d-block text-color py-10">Marketing Guidance</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Widget Recent Post -->
                        <div class="mb-50">
                            <h4 class="mb-3">Recent News</h4>
                            <div class="d-flex py-3 border-bottom">
                                <div class="mr-4">
                                    <a href="blog-single.html">
                                        <img class="rounded" src="{{asset('/')}}website/images/blog/post-thumb-sm-01.jpg" alt="post-thumb">
                                    </a>
                                </div>
                                <div>
                                    <h6 class="mb-3">
                                        <a class="text-dark" href="blog-single.html">Marketing Strategy 2017-2018.</a>
                                    </h6>
                                    <p class="meta">16 Dec, 2018</p>
                                </div>
                            </div>
                            <div class="d-flex py-3 border-bottom">
                                <div class="mr-4">
                                    <a href="blog-single.html">
                                        <img class="rounded" src="{{asset('/')}}website/images/blog/post-thumb-sm-02.jpg" alt="post-thumb">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="mb-3">
                                        <a class="text-dark" href="blog-single.html">Jack Ma & future of E-commerce</a>
                                    </h6>
                                    <p class="meta">16 Dec, 2018</p>
                                </div>
                            </div>
                            <div class="d-flex py-3">
                                <div class="mr-4">
                                    <a href="blog-single.html">
                                        <img class="rounded" src="{{asset('/')}}website/images/blog/post-thumb-sm-03.jpg" alt="post-thumb">
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="mb-3">
                                        <a class="text-dark" href="blog-single.html">Jack Ma & future of E-commerce</a>
                                    </h6>
                                    <p class="meta">16 Dec, 2018</p>
                                </div>
                            </div>
                        </div>
                        <!-- Widget Tags -->
                        <div class="mb-50">
                            <h4 class="mb-3">Tags</h4>
                            <ul class="list-inline tag-list">
                                <li class="list-inline-item">
                                    <a href="#">Business</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Marketing</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Finance</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Consultancy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Market Analysis</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Rvenenue</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Widget Newsletter -->
                        <div class="newsletter">
                            <h4 class="mb-3">Stay Updated</h4>
                            <form action="#">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                <button type="submit" class="btn btn-primary btn-sm">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /blog-single -->

@endsection

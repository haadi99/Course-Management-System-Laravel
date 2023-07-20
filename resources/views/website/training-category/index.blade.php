@extends('website.master')

@section('title')
{{$category->name}}

@endsection

@section('body')


    <section class="page-title overlay" style="background-image: url({{asset('/')}}website/images/background/page-title.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white font-weight-bold">{{$category->name}}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>{{$category->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <!-- service -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- training item -->
            @foreach($category->trainings as $training)
                <!-- service item -->
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card text-center">
                            <div class="card-img-wrapper overlay-rounded-top">
                                <img class="card-img-top rounded-0" src="{{asset($training->image)}}" alt="service-image"/>
                            </div>
                            <div class="card-body p-0">
                                <h4 class="card-title pt-3">{{$training->title}}</h4>
                                <p class="card-text mx-2 mb-0">Starting Date : {{$training->starting_date}}</p>
                                <a href="{{route('training-detail', ['id' => $training->id])}}" class="btn btn-secondary translateY-25">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /service -->

@endsection

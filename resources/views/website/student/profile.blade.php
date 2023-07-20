@extends('website.master')

@section('title')
    Student Profile
@endsection


@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body">
                        <ul class="list-group">
                            <li class="list-group-item"> <a href="{{route('my-dashboard')}}">My Dashboard</a> </li>
                            <li class="list-group-item"> <a href="{{route('my-profile')}}">My Profile</a> </li>
                            <li class="list-group-item"> <a href="#">My Training</a> </li>
                            <li class="list-group-item"> <a href="#">Change Password</a> </li>
                            <li class="list-group-item"> <a href="{{route('student-logout')}}">Logout</a> </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card card-body">
                        <h1 class="text-center">My Profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

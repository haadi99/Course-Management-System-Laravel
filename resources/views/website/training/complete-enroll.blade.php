@extends('website.master')

@section('title')
    Enroll Complete Page
@endsection


@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body">
                        <h3 class="text-center text-success">{{session('message')}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

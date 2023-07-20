@extends('admin.master')

@section('title')
    Manage Training
@endsection

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Training Module</h4>

                    <h4 class="text-success text-center">{{session('message')}}</h4>

                    <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Training Title</th>
{{--                            <th>Training Description</th>--}}
                            <th>Starting Date</th>
                            <th>Training Price</th>
                            <th>Training Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($trainings as $training)
                            <tr class="{{ $training->status == 1 ? ' ' : 'bg-warning text-white' }}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$training->title}}</td>
{{--                                <td>{{$training->description}}</td>--}}
                                <td>{{$training->starting_date}}</td>
                                <td>{{$training->price}}</td>
                                <td>{{$training->status == 1? 'Published' : 'Unpublished'}}</td>
                                <td><img src="{{asset($training->image)}}" alt="" height="100" width="100"/> </td>

                                <td class="d-flex">
                                    <a href="{{route('admin.training-detail', ['id' => $training->id])}}" class="btn btn-success btn-sm mr-1"> <i class="fa fa-book-open"></i> </a>

                                    <a href="{{route('admin.update-training-status', ['id' => $training->id])}}" class="btn btn-success btn-sm mr-1"> <i class="fa fa-arrow-circle-up"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection



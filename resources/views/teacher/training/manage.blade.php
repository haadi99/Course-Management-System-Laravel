@extends('teacher.master')

@section('title')
    Manage Teacher
@endsection

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Training Module</h4>

                    <h4 class="text-success text-center">{{session('message')}}</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Training Title</th>
                            <th>Training Description</th>
                            <th>Starting Date</th>
                            <th>Training Price</th>
                            <th>Training Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($trainings as $training)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$training->title}}</td>
                                <td>{{$training->description}}</td>
                                <td>{{$training->starting_date}}</td>
                                <td>{{$training->price}}</td>
                                <td>{{$training->status == 1? 'Published' : 'Unpublished'}}</td>
                                <td><img src="{{asset($training->image)}}" alt="" height="100" width="100"/> </td>

                                <td class="d-flex">
                                    <a href="{{route('training.detail', ['id' => $training->id])}}" class="btn btn-success btn-sm mr-1"> <i class="fa fa-book-open"></i> </a>

                                    <a href="{{route('training.edit', ['id' => $training->id])}}" class="btn btn-success btn-sm mr-1"> <i class="fa fa-edit"></i> </a>

                                    <form action="{{route('training.delete', ['id' => $training->id])}}" method="POST" onsubmit="return confirm('Sure to Delete Teacher Info??.??')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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


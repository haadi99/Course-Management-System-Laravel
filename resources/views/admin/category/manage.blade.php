@extends('admin.master')

@section('title')
    Manage Category Page
@endsection

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Category Module</h4>

                    <h4 class="text-success text-center">{{session('message')}}</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                <td><img src="{{asset($category->image)}}" alt="" height="100" width="100"/> </td>

                                <td class="d-flex">
                                    <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-success btn-sm mr-1"> <i class="fa fa-edit"></i> </a>

                                    <form action="{{route('category.delete', ['id' => $category->id])}}" method="POST" onsubmit="return confirm('Sure to Delete Category Info??.??')">
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


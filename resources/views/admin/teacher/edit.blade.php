@extends('admin.master')

@section('title')
    Add Teacher
@endsection

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4 text-center">Edit Teacher Form</h1>

                    <form action="{{route('teacher.update', ['id'=>$teacher->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" value="{{$teacher->name}}" placeholder="Enter Name"/>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email" value="{{$teacher->email}}" placeholder="Enter Email Address"/>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="mobile" class="col-sm-3 col-form-label">Mobile Number</label>
                            <div class="col-sm-9">
                                <input type="number" name="mobile" class="form-control" id="mobile" value="{{$teacher->mobile}}" placeholder="Enter Mobile Number">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" id="image" value="{{$teacher->image}}" accept="image/*">
                                <img src="{{asset($teacher->image)}}" alt="" height="120" width="100"/>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Teacher</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

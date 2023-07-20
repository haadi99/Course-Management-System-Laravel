@extends('teacher.master')

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4 text-center">Add Training Form</h1>

                    <h4 class="text-success text-center">{{session('message')}}</h4>
                    <form action="{{route('training.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mb-4">
                            <label for="teacher_id" class="col-sm-3 col-form-label">Training Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" required name="category_id">
                                    <option value="" disabled selected> -- Select Training Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="title" class="col-sm-3 col-form-label">Training Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Training Title"/>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="description" class="col-sm-3 col-form-label">Training Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control summernote" id="description" placeholder="Enter Training Description">
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="starting_date" class="col-sm-3 col-form-label">Starting Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="starting_date" class="form-control" id="starting_date">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="price" class="col-sm-3 col-form-label">Training Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" id="price" placeholder="Enter Training Price">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Training</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.admin-app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @elseif(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
            @endif

            @if ($errors->any())
                <div class="alert alert-class alert-danger bg-danger text-white">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row  mt-3">
                <div class="col-xl-6 d-flex grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between">
                                <h4 class="card-title mb-3">Add Category</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="circleProgress6" class="progressbar-js-circle rounded p-3"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{route('admin.category.store')}}" method="POST">
                                                @csrf
                                                <label class="font-weight-bold" for="category">Category Title</label>
                                                <input class="form-control" type="text" id="category" name="category_title">

                                                <div class="text-right mt-3 button">
                                                    <button class="btn btn-info" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 d-flex grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between">
                                <h4 class="card-title mb-3">All Categories</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ol>
                                                @forelse($categories as $category)
                                                    <li class="p-2 py-3 m-2" style="border: 1px solid #bfbfbf;border-radius: 5px">
                                                        <p class="ml-3 text-capitalize font-weight-bold d-inline float-left">
                                                            {{$category->title}}
                                                        </p>
                                                        <div class="btn-group d-inline float-right">
                                                            <a href="#" class="btn btn-info btn-xs" style="cursor: pointer" data-toggle="modal" data-target="#category-{{$category->id}}">Edit</a>
                                                            <a href="{{route('admin.category.destroy', $category->id)}}" class="btn btn-danger btn-xs" style="cursor: pointer">Delete</a>
                                                        </div>
                                                    </li>

                                                    <div class="modal fade" id="category-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{route('admin.category.update')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$category->id}}">
                                                                <div class="modal-body">
                                                                    <label class="font-weight-bold" for="category">Category Title</label>
                                                                    <input class="form-control text-capitalize" type="text" id="category" name="category_title" value="{{$category->title}}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <li>No Category Found</li>
                                                @endforelse
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                        href="" target="_blank"></a> {{\Carbon\Carbon::now()->format('Y')}}</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection

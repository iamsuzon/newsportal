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
                <div class="col-xl-12 d-flex grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between">
                                <h4 class="card-title mb-3">Create Posts</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div id="circleProgress6" class="progressbar-js-circle rounded p-3"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label class="font-weight-bold" for="title">Post Title</label>
                                                        <input class="form-control form-control-sm" type="text" id="title" name="post_title">
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="font-weight-bold" for="category">Select Category</label>
                                                        <select class="form-control" name="category" id="category" style="padding-bottom: 12px">
                                                            @forelse($categories as $category)
                                                                <option class="text-capitalize" value="{{$category->id}}">{{$category->title}}</option>
                                                            @empty
                                                                <option class="text-capitalize" value="" disabled>No Category Found</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                        <label class="font-weight-bold" for="description">Post Description</label>
                                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                        <label class="font-weight-bold" for="thumbnail">Post Thumbnail</label>
                                                        <input class="form-control" type="file" name="post_thumbnail" id="thumbnail">
                                                    </div>
                                                </div>

                                                <div class="text-right mt-3 button">
                                                    <button class="btn btn-info" type="submit">Post</button>
                                                </div>
                                            </form>
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
                <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="" target="_blank"></a> {{\Carbon\Carbon::now()->format('Y')}}</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection

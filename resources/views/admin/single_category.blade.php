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
                                <h4 class="card-title mb-3">Category <span class="text-info">{{$category->title}}</span></h4>
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
                                            <div class="row">
                                                @forelse($posts as $post)
                                                    <div class="col-4 @if($loop->index > 2) mt-3 @endif">
                                                        <div class="card" style="width:200px">
                                                            <a href="{{route('index.post', $post->slug)}}">
                                                                <div class="image text-center">
                                                                    <img class="card-img-top"
                                                                         src="{{asset($post->path)}}"
                                                                         alt="Card image"
                                                                         style="width:100%;height: 150px">
                                                                    @php $randColor = ['badge-primary', 'badge-success', 'badge-danger', 'badge-info']; @endphp
                                                                    <div class="badge">
                                                                        <a href="{{route('admin.category.show', $post->categories->slug)}}">
                                                                            <span class="text-left badge {{Arr::random($randColor)}} text-capitalize ml-1">@if(strlen($post->categories->title) > 10) {{substr($post->categories->title, 0, 10)}}.. @else {{substr($post->categories->title, 0, 10)}} @endif</span>
                                                                        </a>
                                                                        <span class="text-right badge {{Arr::random($randColor)}} text-capitalize mr-1">{{$post->created_at->diffForHumans()}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-3">
                                                                    <h4 class="card-title text-center"
                                                                        style="font-size: 15px">{{substr($post->title,0,50)}}</h4>
                                                                    <p class="card-text text-dark"
                                                                       style="font-size: 13px">{{substr($post->description,0,100)}}..</p>

                                                                    <div class="buttons text-center mt-3">
                                                                        <a class="btn btn-sm btn-info" href="#"
                                                                           data-toggle="modal"
                                                                           data-target="#postEdit-{{$post->id}}">Edit</a>
                                                                        <a class="btn btn-sm btn-danger" href="{{route('admin.post.destroy',$post->id)}}">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @empty
                                                    <div class="col-12">
                                                        <p class="text-center">No Result Found</p>
                                                    </div>
                                                @endforelse
                                            </div>
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

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
                <div class="col-xl-8 d-flex grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between">
                                <h4 class="card-title mb-3">All Posts</h4>
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
                                                                            <span class="text-left badge {{Arr::random($randColor)}} text-capitalize ml-1">@if(strlen($post->categories->title) > 10) {{substr($post->categories->title, 0, 10)}}
                                                                                .. @else {{substr($post->categories->title, 0, 10)}} @endif</span>
                                                                        </a>
                                                                        <span
                                                                            class="text-right badge {{Arr::random($randColor)}} text-capitalize mr-1">{{$post->created_at->diffForHumans()}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-3">
                                                                    <h4 class="card-title text-center"
                                                                        style="font-size: 15px">{{substr($post->title,0,50)}}</h4>
                                                                    <p class="card-text text-dark"
                                                                       style="font-size: 13px">{{substr($post->description,0,100)}}
                                                                        ..</p>

                                                                    <div class="buttons text-center mt-3">
                                                                        <a class="btn btn-sm btn-info" href="#"
                                                                           data-toggle="modal"
                                                                           data-target="#postEdit-{{$post->id}}">Edit</a>
                                                                        <a class="btn btn-sm btn-danger"
                                                                           href="{{route('admin.post.destroy',$post->id)}}">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="postEdit-{{$post->id}}" tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Post</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <form action="{{route('admin.post.update', $post->id)}}"
                                                                      method="POST" enctype="multipart/form-data">
                                                                    @csrf   @method('PATCH')
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <label class="font-weight-bold"
                                                                                       for="thumbnail">Post
                                                                                    Thumbnail</label>
                                                                                <img id="thumbnail"
                                                                                     src="{{asset($post->path)}}"
                                                                                     alt="{{strtolower($post->title)}}"
                                                                                     style="width: 200px;height: auto; border-radius: 5px">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-4">
                                                                            <div class="col-12">
                                                                                <label class="font-weight-bold"
                                                                                       for="title">Post Title</label>
                                                                                <input
                                                                                    class="form-control form-control-sm"
                                                                                    type="text" id="title"
                                                                                    name="post_title"
                                                                                    value="{{$post->title}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-4">
                                                                            <div class="col-12">
                                                                                <label class="font-weight-bold"
                                                                                       for="category">Select
                                                                                    Category</label>
                                                                                <select class="form-control"
                                                                                        name="category" id="category"
                                                                                        style="padding-bottom: 12px">
                                                                                    @forelse($categories as $category)
                                                                                        @if($category->id == $post->category_id)
                                                                                            <option
                                                                                                class="text-capitalize"
                                                                                                value="{{$category->id}}"
                                                                                                selected>{{$category->title}}</option>
                                                                                            @continue
                                                                                        @endif
                                                                                        <option class="text-capitalize"
                                                                                                value="{{$category->id}}">{{$category->title}}</option>
                                                                                    @empty
                                                                                        <option class="text-capitalize"
                                                                                                value="" disabled>No
                                                                                            Category Found
                                                                                        </option>
                                                                                    @endforelse
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-4">
                                                                            <div class="col-12">
                                                                                <label class="font-weight-bold"
                                                                                       for="description">Post
                                                                                    Description</label>
                                                                                <textarea class="form-control"
                                                                                          name="description"
                                                                                          id="description" cols="30"
                                                                                          rows="10">{{$post->description}}</textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-4">
                                                                            <div class="col-12">
                                                                                <label class="font-weight-bold"
                                                                                       for="thumbnail">Post
                                                                                    Thumbnail</label>
                                                                                <input class="form-control" type="file"
                                                                                       name="post_thumbnail"
                                                                                       id="thumbnail">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Update
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-center">No Post Available Right Now</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 d-flex grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between">
                                <h4 class="card-title mb-3">Categories</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ol>
                                                @forelse($categories as $category)
                                                    <li class="p-2 py-3 m-2">
                                                        <p class="ml-1 text-capitalize font-weight-bold d-inline float-left">
                                                            {{$category->title}}
                                                        </p>
                                                        <div class="btn-group d-inline float-right">
                                                            <a href="#" class="btn btn-info btn-xs"
                                                               style="cursor: pointer" data-toggle="modal"
                                                               data-target="#category-{{$category->id}}">Edit</a>
                                                            <a href="{{route('admin.category.destroy', $category->id)}}"
                                                               class="btn btn-danger btn-xs" style="cursor: pointer">Delete</a>
                                                        </div>
                                                    </li>

                                                    <div class="modal fade" id="category-{{$category->id}}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Category</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{route('admin.category.update')}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                           value="{{$category->id}}">
                                                                    <div class="modal-body">
                                                                        <label class="font-weight-bold" for="category">Category
                                                                            Title</label>
                                                                        <input class="form-control text-capitalize"
                                                                               type="text" id="category"
                                                                               name="category_title"
                                                                               value="{{$category->title}}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Update
                                                                        </button>
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

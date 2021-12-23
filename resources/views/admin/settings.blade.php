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
                                <h4 class="card-title mb-3">Admin Settings</h4>
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
                                            <form action="{{route('admin.settings.update', Auth::guard('admin')->user()->id)}}" method="POST">
                                                @csrf   @method('PATCH')
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="font-weight-bold" for="name">Name</label>
                                                        <input class="form-control" type="text" name="name" id="name" value="{{Auth::guard('admin')->user()->name}}">
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                        <label class="font-weight-bold" for="email">Email</label>
                                                        <input class="form-control" type="email" name="email" id="email" value="{{Auth::guard('admin')->user()->email}}">
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                        <label class="font-weight-bold" for="password">Password</label>
                                                        <input class="form-control" type="password" name="password" id="password">
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-12 text-right">
                                                        <button class="btn btn-info" type="submit">Update</button>
                                                    </div>
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
                <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                        href="" target="_blank"></a> {{\Carbon\Carbon::now()->format('Y')}}</span>

            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection

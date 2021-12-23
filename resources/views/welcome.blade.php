@extends('layouts.frontend-app')

@section('content')
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    @foreach($latest->shuffle() as $post)
                                        <li class="news-item">{{substr($post->description,0,100)}}......</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="@if(isset($posts)) {{asset($posts[0]->path)}} @endif" alt="">
                                <div class="trend-top-cap">
                                    <span>@if(isset($posts)) {{$posts[0]->categories->title}} @endif</span>
                                    @if(isset($posts)) <h2><a
                                            href="{{route('index.post', $posts[0]->slug)}}">{{$posts[0]->title}}</a>
                                    </h2> @endif
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                @foreach($posts as $post)
                                    @continue($loop->index == 0)
                                    @break($loop->index == 4)
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{asset($post->path)}}" alt="" style="height: 150px">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color{{rand(1,4)}}">{{$post->categories->title}}</span>
                                                <h4>
                                                    <a href="{{route('index.post', $post->slug)}}">{{substr($post->title,0,150)}}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        @foreach($posts as $post)
                            @continue($loop->index < 4)
                            @break($loop->index == 9)
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="{{asset($post->path)}}" alt="" style="width: 120px;height: 100px">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color{{rand(1,4)}}">{{$post->categories->title}}</span>
                                    <h4><a href="{{route('index.post', $post->slug)}}">{{$post->title}}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly-News start -->
    <div class="weekly-news-area pt-50">
        <div class="container">
            <div class="weekly-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Latest News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
                            @foreach($latest as $post)
                                <div class="weekly-single @if($loop->index == 0) active @endif">
                                    <div class="weekly-img">
                                        <img src="{{asset($post->path)}}" alt="" style="height:300px;">
                                    </div>
                                    <div class="weekly-caption">
                                        <span class="color{{rand(1,4)}}">{{$post->categories->title}}</span>
                                        <h4><a href="{{route('index.post', $post->slug)}}">{{$post->title}}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!-- Whats New Start -->
    @php $count = 0; @endphp
    @foreach($categories as $category)
        @continue(count($category->posts) < 3)
        @php $count++ @endphp
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3 class="text-capitalize">{{$category->title}}</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->

                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                @foreach($category->posts as $post)
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="single-what-news mb-100">
                                                            <div class="what-img">
                                                                <img src="{{asset($post->path)}}" alt="" style="width: 350px; height: 350px">
                                                            </div>
                                                            <div class="what-cap">
                                                                <span class="color{{rand(1,4)}}">{{$post->categories->title}}</span>
                                                                <h4><a href="{{route('index.post',$post->slug)}}">{{$post->title}}</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break($loop->index == 3)
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>

                    @if($count == 1)
                        <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Category</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box CategoryFontStyle">
                                @foreach($categories as $category)
                                    <div class="follow-us align-items-center">
                                        <a href="{{route('index.category.show', $category->slug)}}">
                                            <h5 class="m-0 text-center text-capitalize" style="font-size: 18px">{{$category->title}}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- New Poster -->
                        <div class="news-poster d-none d-lg-block">

                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        @break($count > 3)
    @endforeach
    <!-- Whats New End -->
    <!--   Weekly2-News start -->

    <!-- End Weekly-News -->
    <!-- Start Youtube -->
    <!-- End Start youtube -->
    <!--  Recent Articles start -->
    <div class="recent-articles">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Recent Articles</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @foreach($posts as $post)
                            <div class="single-recent mb-100">
                                <div class="what-img">
                                    <img src="{{asset($post->path)}}" alt="" style="height: 200px">
                                </div>
                                <div class="what-cap">
                                    <span class="color{{rand(1,4)}}">{{$post->categories->title}}</span>
                                    <h4><a href="#">{{$post->title}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Recent Articles End -->
    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="flaticon-arrow roted"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="flaticon-arrow right-arrow"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
@endsection

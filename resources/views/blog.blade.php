@extends('layouts.frontend-app')

@section('content')
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($posts as $post)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{asset($post->path)}}" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{$post->created_at->format('d')}}</h3>
                                        <p>{{$post->created_at->format('M')}}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{route('index.post', $post->slug)}}">
                                        <h2>{{$post->title}}</h2>
                                    </a>
                                    <p>{{substr($post->description,0,280)}}..</p>
                                    <ul class="blog-info-link">
                                        <li class="text-capitalize"><a
                                                href="{{route('index.category.show',$post->categories->slug)}}"><i
                                                    class="fa fa-user"></i>{{$post->categories->title}}</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach

                        <style>
                            .pagination {
                                justify-content: center;
                            }

                            .pagination .page-item {
                                margin-left: 5px;
                                margin-right: 5px;
                            }

                            .page-item.active .page-link {
                                background-color: #18dcff !important;
                                border-color: #18dcff;
                            }

                            .page-link {
                                color: #0D0A0A;
                            }

                            .pagination .page-item .page-link {
                                padding: 10px 20px;
                            }
                        </style>

                        {{$posts->links()}}

                        {{--                        <nav class="blog-pagination justify-content-center d-flex">--}}
                        {{--                            <ul class="pagination">--}}
                        {{--                                <li class="page-item">--}}
                        {{--                                    <a href="#" class="page-link" aria-label="Previous">--}}
                        {{--                                        <i class="ti-angle-left"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="page-item">--}}
                        {{--                                    <a href="#" class="page-link">1</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="page-item active">--}}
                        {{--                                    <a href="#" class="page-link">2</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="page-item">--}}
                        {{--                                    <a href="#" class="page-link" aria-label="Next">--}}
                        {{--                                        <i class="ti-angle-right"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </nav>--}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Search
                                </button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                @foreach($categories as $category)
                                    @continue(count($category->posts) < 1)
                                    <li>
                                        <a href="{{route('index.category.show',$category->slug)}}" class="d-flex">
                                            <p class="text-capitalize">{{$category->title}}</p>
                                            <p>({{count($category->posts)}})</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach($posts as $post)
                                <div class="media post_item">
                                <img src="assets/img/post/post_1.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                            @endforeach
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">project</a>
                                </li>
                                <li>
                                    <a href="#">love</a>
                                </li>
                                <li>
                                    <a href="#">technology</a>
                                </li>
                                <li>
                                    <a href="#">travel</a>
                                </li>
                                <li>
                                    <a href="#">restaurant</a>
                                </li>
                                <li>
                                    <a href="#">life style</a>
                                </li>
                                <li>
                                    <a href="#">design</a>
                                </li>
                                <li>
                                    <a href="#">illustration</a>
                                </li>
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">Instagram Feeds</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Subscribe
                                </button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

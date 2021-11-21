@extends('front_end.layouts._master')
@section('title', $title)
@section('content')
    <div class="col-md-7">
        <div class="single-news">
            <a href="{{ route('frontpage.newsview',$latestonenews->id) }}">
                <h4 class="news_heading text-capitalizt">{{ $latestonenews->title }}</h4>
            </a>
            <img src="{{ asset($latestonenews->image) }}" alt="">
        </div>
        <div class="news_3_title">
            <a href="#">
                <h5 class="float-left mr-2 news_heading">সর্বশেষ সংবাদ</h5>
            </a>
            <div class="strip"></div>
        </div>
        <div class="single-3-news">
            <div class="client-section" id="client">
                <div class="container">
                    <div class="owl-carousel owl-theme span-none text-center">
                        @foreach($latestonenewsforslider as $key => $latestforslider)
                        <div class="slide slide-1">
                            <div class="slide-content fix">
                                <div class="w-3">
                                    <img src="{{ asset($latestforslider->image) }}" alt="">
                                    <a href="{{ route('frontpage.newsview',$latestforslider->id) }}">
                                        <h5 class="py-2">{{ $latestforslider->title }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div> <!--   Single News  -->
        @if($first_layer->count())
        <div class="news_3_title pt-5">
            <a href="#">
                <h5 class="float-left mr-2 news_heading">{{ $first_layer->pluck('category.nameBn')->first() }}</h5>
            </a>

            <div class="strip"></div>
        </div>

        <div class="hot-news news-border py-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="single-news second-news">
                        <img src="{{ asset($first_layer->pluck('image')->first()) }}" alt="">
                        <a href="#">
                            <h4 class="news_heading mt-3">{{ $first_layer->pluck('title')->first() }}</h4>
                        </a>
                        <div class="icon">
                            <i class="fa fa-eye"></i> <span class="view_counter">{{ $first_layer->pluck('view_count')->first() }}</span>
                        </div>
                        <div class="news-text">
                            <p class="news_heading my-3">স্টাফ রিপোর্টারঃ {{ $first_layer->pluck('title')->first() }}</p>
                        </div>
                        <div class="news-btn">
                            <a href="{{ route('frontpage.newsview',$first_layer->pluck('id')->first()) }}" class="readMore">Read More »</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @foreach($first_layer as $firsl)
                    <div class="single_suggested_news fix">
                        <div class="w-3 mr-2">
                            <img src="{{ asset($firsl->image)  }}" alt="">
                        </div>
                        <a href="{{ route('frontpage.newsview',$firsl->id) }}">
                            <p class="news_heading"> স্টাফ রিপোর্টারঃ {{ $firsl->title }}</p>
                        </a>

                        <div class="icon pb-2">
                            <i class="fa fa-eye"></i> <span class="view_counter">{{ $firsl->view_count }}</span>
                        </div>
                    </div>
                        @endforeach

                </div>
            </div>
        </div>
        @endif

        <div class="row">
            @if($second_layer->count())
            <div class="col-md-6">
                <div class="single-news second-news">
                    <div class="news_3_title pt-5">
                        <a href="{{ route('frontpage.newsview',$second_layer->pluck('id')->first()) }}">
                            <h5 class="float-left mr-2 news_heading">{{ $second_layer->pluck('category.nameBn')->first() }}</h5>
                        </a>
                        <div class="strip"></div>
                    </div>
                    <img src="{{ asset($second_layer->pluck('image')->first()) }}" alt="">
                    <a href="{{ route('frontpage.newsview',$second_layer->pluck('id')->first()) }}">
                        <h4 class="news_heading mt-3">{{ $second_layer->pluck('title')->first() }}</h4>
                    </a>
                    <div class="icon">
                        <i class="fa fa-eye"></i> <span class="view_counter">{{ $second_layer->pluck('view_count')->first() }}</span>
                    </div>
                    <div class="news-text">
                        <p class="news_heading my-3">স্টাফ রিপোর্টারঃ {{ \Illuminate\Support\Str::limit($second_layer->pluck('description')->first(), 60, '') }}.....</p>
                    </div>
                    <div class="news-btn">
                        <a href="{{ route('frontpage.newsview',$second_layer->pluck('id')->first()) }}" class="readMore">Read More »</a>
                    </div>
                </div>

                <!-- secound news -->

                <div class="suggested_news news-border mt-4">
                    @foreach($second_layer as $secondl)
                    <div class="single_suggested_news fix">
                        <div class="w-3 mr-2">
                            <img src="{{ asset($secondl->image) }}" alt="">
                        </div>
                        <a href="{{ route('frontpage.newsview',$secondl->id) }}">
                            <p class="news_heading">বিকাশ ঘোষ, স্টাফ রিপোর্টারঃ {{ $secondl->title }}</p>
                        </a>

                        <div class="icon pb-2">
                            <i class="fa fa-eye"></i> <span class="view_counter">{{ $secondl->view_count }}</span>
                        </div>
                    </div>
                    @endforeach

                </div>


                <!--suggested news -->

            </div>
            @endif
            @if($second_layer_second->count())
            <div class="col-md-6">
                <div class="single-news second-news">
                    <div class="news_3_title pt-5">
                        <a href="{{ route('frontpage.newsview',$second_layer_second->pluck('id')->first()) }}">
                            <h5 class="float-left mr-2 news_heading">{{ $second_layer_second->pluck('category.nameBn')->first() }}</h5>
                        </a>
                        <div class="strip"></div>
                    </div>
                    <img src="{{ asset($second_layer_second->pluck('image')->first()) }}" alt="">
                    <a href="{{ route('frontpage.newsview',$second_layer_second->pluck('id')->first()) }}">
                        <h4 class="news_heading mt-3">{{ $second_layer_second->pluck('title')->first() }}</h4>
                    </a>
                    <div class="icon">
                        <i class="fa fa-eye"></i> <span class="view_counter">{{ $second_layer_second->pluck('view_count')->first() }}</span>
                    </div>
                    <div class="news-text">
                        <p class="news_heading my-3">{{ \Illuminate\Support\Str::limit($second_layer_second->pluck('description')->first(), 60, '') }}.....</p>
                    </div>
                    <div class="news-btn">
                        <a href="{{ route('frontpage.newsview',$second_layer_second->pluck('id')->first()) }}" class="readMore">Read More »</a>
                    </div>
                </div>

                <!-- secound news -->

                <div class="suggested_news news-border mt-4">
                    @foreach($second_layer_second as $secondlsec)
                    <div class="single_suggested_news fix">
                        <div class="w-3 mr-2">
                            <img src="{{ asset($secondlsec->image) }}" alt="">
                        </div>
                        <a href="{{ route('frontpage.newsview',$secondlsec->id) }}">
                            <p class="news_heading">স্টাফ রিপোর্টারঃ {{ $secondlsec->title }}</p>
                        </a>

                        <div class="icon pb-2">
                            <i class="fa fa-eye"></i> <span class="view_counter">{{ $secondlsec->view_count }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!--suggested news -->

            </div>
            @endif



        </div>

        <!--Row-->
        @if($third_layer->count())
        <div class="bdnews">
            <div class="news_3_title pt-5">
                <a href="#">
                    <h5 class="float-left mr-2 news_heading">{{ $third_layer->pluck('category.nameBn')->first() }}</h5>
                </a>
                <div class="strip"></div>
            </div>
        </div>

        <div class="wrap_more_news">
            <div class="news-text-here">
                <div class="single-news fix mb-3">
                    <div class="w-3 mr-2">
                        <img src="{{ asset($third_layer->pluck('image')->first()) }}" alt="">
                    </div>

                    <a href="{{ route('frontpage.newsview',$third_layer->pluck('id')->first()) }}">
                        <h5 class="news_heading">{{ ($third_layer->pluck('title')->first()) }}</h5>
                    </a>
                    <div class="icon pb-2">
                        <i class="fa fa-eye"></i> <span class="view_counter">19</span>
                    </div>
                </div>

                <div class="news-btn">
                    <a href="{{ route('frontpage.newsview',$third_layer->pluck('id')->first()) }}" class="readMore">Read More »</a>
                </div>
            </div>

            <div class="more_news pt-4 news-border">
                <div class="row">
                    @foreach($third_layer as $thirdl)
                    <div class="col-md-6">

                        <div class="single-more-news fix">
                            <div class="w-3 mr-2">
                                <img src="{{ asset($thirdl->image) }}" alt="">
                            </div>
                            <a href="{{ route('frontpage.newsview',$thirdl->id) }}">
                                <h5 class="news_heading">{{ $thirdl->title }}</h5>
                            </a>
                            <div class="icon pb-2">
                                <i class="fa fa-eye"></i> <span class="view_counter">{{ $thirdl->view_count }}</span>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        @endif



        @if($fourth_layer->count())
        <div class="news_3_title pt-5">
            <a href="#">
                <h5 class="float-left mr-2 news_heading">{{ $fourth_layer->pluck('category.nameBn')->first() }}</h5>
            </a>
            <div class="strip"></div>
        </div>
        <div class="hot-news news-border py-2 ">
            <div class="row">
                <div class="col-md-6">
                    <div class="wrap_more_news-2">
                        <div class="single-news second-news">
                            <img src="{{ asset($fourth_layer->pluck('image')->first()) }}" alt="">
                            <a href="{{ route('frontpage.newsview',$fourth_layer->pluck('id')->first()) }}">
                                <h4 class="news_heading mt-3">{{ $fourth_layer->pluck('title')->first() }}</h4>
                            </a>
                            <div class="icon">
                                <i class="fa fa-eye"></i> <span class="view_counter">{{ $fourth_layer->pluck('view_count')->first() }}</span>
                            </div>
                            <div class="news-text">
                                <p class="news_heading my-3"> স্টাফ রিপোর্টারঃ {{ \Illuminate\Support\Str::limit($third_layer->pluck('description')->first(), 60, '') }}.....</p>
                            </div>
                            <div class="news-btn">
                                <a href="{{ route('frontpage.newsview',$fourth_layer->pluck('id')->first()) }}" class="readMore">Read More »</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="wrap_more_news-2 ">
                        @foreach($third_layer as $thirdl)
                        <div class="single_suggested_news fix">
                            <div class="w-3 mr-2">
                                <img src="{{ asset($thirdl->image) }}" alt="">
                            </div>
                            <a href="{{ route('frontpage.newsview',$thirdl->id) }}">
                                <p class="news_heading">স্টাফ রিপোর্টারঃ {{ $thirdl->title }}</p>
                            </a>

                            <div class="icon pb-2">
                                <i class="fa fa-eye"></i> <span class="view_counter">{{ $thirdl->view_count }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            @if($fifth_layer->count())
                <div class="col-md-6">
                    <div class="single-news second-news">
                        <div class="news_3_title pt-5">
                            <a href="#">
                                <h5 class="float-left mr-2 news_heading">{{ $fifth_layer->pluck('category.nameBn')->first() }}</h5>
                            </a>
                            <div class="strip"></div>
                        </div>
                        <img src="{{ asset($fifth_layer->pluck('image')->first()) }}" alt="">
                        <a href="{{ route('frontpage.newsview',$fifth_layer->pluck('id')->first()) }}">
                            <h4 class="news_heading mt-3">{{ $fifth_layer->pluck('title')->first() }}</h4>
                        </a>
                        <div class="icon">
                            <i class="fa fa-eye"></i> <span class="view_counter">{{ $fifth_layer->pluck('view_count')->first() }}</span>
                        </div>
                        <div class="news-text">
                            <p class="news_heading my-3">স্টাফ রিপোর্টারঃ {{ \Illuminate\Support\Str::limit($fifth_layer->pluck('description')->first(), 60, '') }}.....</p>
                        </div>
                        <div class="news-btn">
                            <a href="{{ route('frontpage.newsview',$fifth_layer->pluck('id')->first()) }}" class="readMore">Read More »</a>
                        </div>
                    </div>

                    <!-- secound news -->

                    <div class="suggested_news news-border mt-4">
                        @foreach($fifth_layer as $secondl)
                            <div class="single_suggested_news fix">
                                <div class="w-3 mr-2">
                                    <img src="{{ asset($secondl->image) }}" alt="">
                                </div>
                                <a href="{{ route('frontpage.newsview',$secondl->id) }}">
                                    <p class="news_heading">বিকাশ ঘোষ, স্টাফ রিপোর্টারঃ {{ $secondl->title }}</p>
                                </a>

                                <div class="icon pb-2">
                                    <i class="fa fa-eye"></i> <span class="view_counter">{{ $secondl->view_count }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>


                    <!--suggested news -->

                </div>
            @endif
            @if($fifth_layer_second->count())
                <div class="col-md-6">
                    <div class="single-news second-news">
                        <div class="news_3_title pt-5">
                            <a href="{{ route('frontpage.newsview',$fifth_layer_second->pluck('id')->first()) }}">
                                <h5 class="float-left mr-2 news_heading">{{ $fifth_layer_second->pluck('category.nameBn')->first() }}</h5>
                            </a>
                            <div class="strip"></div>
                        </div>
                        <img src="{{ asset($fifth_layer_second->pluck('image')->first()) }}" alt="">
                        <a href="{{ route('frontpage.newsview',$fifth_layer_second->pluck('id')->first()) }}">
                            <h4 class="news_heading mt-3">{{ $fifth_layer_second->pluck('title')->first() }}</h4>
                        </a>
                        <div class="icon">
                            <i class="fa fa-eye"></i> <span class="view_counter">{{ $fifth_layer_second->pluck('view_count')->first() }}</span>
                        </div>
                        <div class="news-text">
                            <p class="news_heading my-3">{{ \Illuminate\Support\Str::limit($fifth_layer_second->pluck('description')->first(), 60, '') }}.....</p>
                        </div>
                        <div class="news-btn">
                            <a href="{{ route('frontpage.newsview',$fifth_layer_second->pluck('id')->first()) }}" class="readMore">Read More »</a>
                        </div>
                    </div>

                    <!-- secound news -->

                    <div class="suggested_news news-border mt-4">
                        @foreach($fifth_layer_second as $secondlsec)
                            <div class="single_suggested_news fix">
                                <div class="w-3 mr-2">
                                    <img src="{{ asset($secondlsec->image) }}" alt="">
                                </div>
                                <a href="{{ route('frontpage.newsview',$secondlsec->id) }}">
                                    <p class="news_heading">স্টাফ রিপোর্টারঃ {{ $secondlsec->title }}</p>
                                </a>

                                <div class="icon pb-2">
                                    <i class="fa fa-eye"></i> <span class="view_counter">{{ $secondlsec->view_count }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!--suggested news -->

                </div>
            @endif



        </div>

        <div class="clearfix"></div>

        <div class="row">
            @if($sixth_layer->count())
                <div class="col-md-6">
                    <div class="single-news second-news">
                        <div class="news_3_title pt-5">
                            <a href="">
                                <h5 class="float-left mr-2 news_heading">{{ $sixth_layer->pluck('category.nameBn')->first() }}</h5>
                            </a>
                            <div class="strip"></div>
                        </div>
                        <img src="{{ asset($sixth_layer->pluck('image')->first()) }}" alt="">
                        <a href="{{ route('frontpage.newsview',$sixth_layer->pluck('id')->first()) }}">
                            <h4 class="news_heading mt-3">{{ $sixth_layer->pluck('title')->first() }}</h4>
                        </a>
                        <div class="icon">
                            <i class="fa fa-eye"></i> <span class="view_counter">{{ $sixth_layer->pluck('view_count')->first() }}</span>
                        </div>
                        <div class="news-text">
                            <p class="news_heading my-3">স্টাফ রিপোর্টারঃ {{ \Illuminate\Support\Str::limit($sixth_layer->pluck('description')->first(), 60, '') }}.....</p>
                        </div>
                        <div class="news-btn">
                            <a href="{{ route('frontpage.newsview',$sixth_layer->pluck('id')->first()) }}" class="readMore">Read More »</a>
                        </div>
                    </div>

                    <!-- secound news -->

                    <div class="suggested_news news-border mt-4">
                        @foreach($sixth_layer as $secondl)
                            <div class="single_suggested_news fix">
                                <div class="w-3 mr-2">
                                    <img src="{{ asset($secondl->image) }}" alt="">
                                </div>
                                <a href="{{ route('frontpage.newsview',$secondl->id) }}">
                                    <p class="news_heading">বিকাশ ঘোষ, স্টাফ রিপোর্টারঃ {{ $secondl->title }}</p>
                                </a>

                                <div class="icon pb-2">
                                    <i class="fa fa-eye"></i> <span class="view_counter">{{ $secondl->view_count }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>


                    <!--suggested news -->

                </div>
            @endif
            @if($sixth_layer_second->count())
                <div class="col-md-6">
                    <div class="single-news second-news">
                        <div class="news_3_title pt-5">
                            <a href="{{ route('frontpage.newsview',$sixth_layer_second->pluck('id')->first()) }}">
                                <h5 class="float-left mr-2 news_heading">{{ $sixth_layer_second->pluck('category.nameBn')->first() }}</h5>
                            </a>
                            <div class="strip"></div>
                        </div>
                        <img src="{{ asset($sixth_layer_second->pluck('image')->first()) }}" alt="">
                        <a href="{{ route('frontpage.newsview',$sixth_layer_second->pluck('id')->first()) }}">
                            <h4 class="news_heading mt-3">{{ $sixth_layer_second->pluck('title')->first() }}</h4>
                        </a>
                        <div class="icon">
                            <i class="fa fa-eye"></i> <span class="view_counter">{{ $sixth_layer_second->pluck('view_count')->first() }}</span>
                        </div>
                        <div class="news-text">
                            <p class="news_heading my-3">{{ \Illuminate\Support\Str::limit($sixth_layer_second->pluck('description')->first(), 60, '') }}.....</p>
                        </div>
                        <div class="news-btn">
                            <a href="{{ route('frontpage.newsview',$sixth_layer_second->pluck('id')->first()) }}" class="readMore">Read More »</a>
                        </div>
                    </div>

                    <!-- secound news -->

                    <div class="suggested_news news-border mt-4">
                        @foreach($sixth_layer_second as $secondlsec)
                            <div class="single_suggested_news fix">
                                <div class="w-3 mr-2">
                                    <img src="{{ asset($secondlsec->image) }}" alt="">
                                </div>
                                <a href="{{ route('frontpage.newsview',$secondlsec->id) }}">
                                    <p class="news_heading">স্টাফ রিপোর্টারঃ {{ $secondlsec->title }}</p>
                                </a>

                                <div class="icon pb-2">
                                    <i class="fa fa-eye"></i> <span class="view_counter">{{ $secondlsec->view_count }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!--suggested news -->

                </div>
            @endif



        </div>

        @if($seven_layer->count())
            <div class="news_3_title pt-5">
                <a href="{{ route('frontpage.newsview',$seven_layer->pluck('id')->first()) }}">
                    <h5 class="float-left mr-2 news_heading">{{ $seven_layer->pluck('category.nameBn')->first() }}</h5>
                </a>
                <div class="strip"></div>
            </div>
            <div class="hot-news news-border py-2 ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="wrap_more_news-2">
                            <div class="single-news second-news">
                                <img src="{{ asset($seven_layer->pluck('image')->first()) }}" alt="">
                                <a href="{{ route('frontpage.newsview',$seven_layer->pluck('id')->first()) }}">
                                    <h4 class="news_heading mt-3">{{ $seven_layer->pluck('title')->first() }}</h4>
                                </a>
                                <div class="icon">
                                    <i class="fa fa-eye"></i> <span class="view_counter">{{ $seven_layer->pluck('view_count')->first() }}</span>
                                </div>
                                <div class="news-text">
                                    <p class="news_heading my-3"> স্টাফ রিপোর্টারঃ {{ \Illuminate\Support\Str::limit($third_layer->pluck('description')->first(), 60, '') }}.....</p>
                                </div>
                                <div class="news-btn">
                                    <a href="{{ route('frontpage.newsview',$seven_layer->pluck('id')->first()) }}" class="readMore">Read More »</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="wrap_more_news-2 ">
                            @foreach($seven_layer as $thirdl)
                                <div class="single_suggested_news fix">
                                    <div class="w-3 mr-2">
                                        <img src="{{ asset($thirdl->image) }}" alt="">
                                    </div>
                                    <a href="{{ route('frontpage.newsview',$thirdl->id) }}">
                                        <p class="news_heading">স্টাফ রিপোর্টারঃ {{ $thirdl->title }}</p>
                                    </a>

                                    <div class="icon pb-2">
                                        <i class="fa fa-eye"></i> <span class="view_counter">{{ $thirdl->view_count }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div> <!-- col-md-7 -->

@endsection


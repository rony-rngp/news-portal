@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')

@endpush

@section('content')

<div class="row">
    <div class="section-one">
        @foreach($rand_top_posts as $key=>$rand_top_post)
        @if($key == 0)
        <div class="col-md-5 col-sm-4">
            <div class="leadnews">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$rand_top_post->image) }}" alt="{{ $rand_top_post->title }}" />
                <div class="hadding_1">
                    <a href="{{ route('article',[$rand_top_post->id, $rand_top_post->slug]) }}"> {{ $rand_top_post->title }} </a>
                </div>
                <div class="content-dtls">
                    <p>{!! Str::limit($rand_top_post->description, 250) !!}<a href="{{ route('article',[$rand_top_post->id, $rand_top_post->slug]) }}"> বিস্তারিত</a></p>
                </div>
            </div>
        </div>
        @else
        @if($key == 1)
        <div class="col-md-3 col-sm-4">
            @endif
            <div class="leadnews_1">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$rand_top_post->image) }}" alt="{{ $rand_top_post->title }}" />
                <h4 class="hadding_2"><a href="{{ route('article',[$rand_top_post->id, $rand_top_post->slug]) }}"> {{ $rand_top_post->title }}</a></h4>
            </div>
            @if($loop->last)
        </div>
        @endif
        @endif
        @endforeach

        @include('layouts.frontend.partial.right_sidebar')
    </div>
</div>

<div class="row">
    <div class="section-two">
        <div class="col-md-8 col-sm-8">

        @foreach ($rand_top_sec_posts_chunk as $rand_top_sec_posts)
            <div class="row">
                @foreach($rand_top_sec_posts as $rand_top_sec_post)
                <div class="col-md-4 col-sm-4">
                    <div class="middle_news">
                    <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$rand_top_sec_post['image']) }}" alt="{{ $rand_top_sec_post['title'] }}" />
                    <h4 class="hadding_2"><a href="{{ route('article',[$rand_top_sec_post['id'], $rand_top_sec_post['slug']]) }}"> {{ $rand_top_sec_post['title'] }} </a></h4>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach

        </div>
        <div class="col-md-4 col-sm-4">
            {{-- <div class="catagory-title"> ফেসবুকে আমরা </div> --}}



            <div class="catagory-title">পুরাতন সংবাদ</div>

            <form action="{{ route('search.date') }}" method="get" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12">
                    <input type="date" id="datepicker" class="form-control calender " autocomplete="off" maxlength="64" placeholder="Form Date (তারিখ হতে)" name="form" required />
                </div>
                <div class="col-md-12 col-sm-12">
                    <input type="date" id="datepickerr" class="form-control calender" autocomplete="off" maxlength="64" placeholder="To Date (তারিখ পর্যন্ত)" value="" name="to" required />
                </div>
                <div class="col-md-12 col-sm-12"> <input type="Submit" style="margin-top:0px" value=" পুরাতন নিউজ দেখুন " /></div>
            </form>

        </div>
    </div>
</div>


<div class="row">
    @if(!empty($second_ads))
    <div class="col-md-6 col-sm-6">
        <div class="add">
            <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
        </div>
    </div>
    @endif

    @if(!empty($third_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif
</div>



<div class="row">
    @foreach ($category_posts as $keys => $category_post)

    <div class="section-three">
        @if($keys == 0)

        <div class="col-md-8 col-sm-8">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}"> {{ $category_post->name }} </a>
            </div>
            <div class="row">
                @foreach($category_post->posts->take(7) as $key => $post)
                @if($key == 0)
                <div class="col-md-6 col-sm-6">
                    <div class="leadnews">
                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                        <div class="hadding_1">
                            <a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a>
                        </div>
                        <div class="content-dtls">
                            <p>{!! Str::limit($post->description, 350) !!}<a href="{{ route('article',[$post->id,$post->slug]) }}"> বিস্তারিত</a></p>
                        </div>
                    </div>
                </div>

                @else
                @if($key == 1)

                <div class="col-md-6 col-sm-6">
                    @endif
                    <div class="image-title border">
                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt=" {{ $post->title }} " />
                        <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a></h4>
                    </div>

                    @if($loop->last)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="more-news">
                                <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
        </div>

        @endif

        @if($keys == 1)
        <div class="col-md-4 col-sm-4">

            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(3) as $key => $post)
            @if($key == 0)
            <div class="middle_news">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="image-title border">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif

        {{-- Next  --}}


    </div>
    @endforeach
</div>


<div class="row">
    @if(!empty($second_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif

    @if(!empty($third_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif
</div>


<div class="row">
    @foreach ($category_posts as $keys => $category_post)

    <div class="section-three">
        @if($keys == 2)

        <div class="col-md-8 col-sm-8">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}"> {{ $category_post->name }} </a>
            </div>
            <div class="row">
                @foreach($category_post->posts->take(7) as $key => $post)
                @if($key == 0)
                <div class="col-md-6 col-sm-6">
                    <div class="leadnews">
                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                        <div class="hadding_1">
                            <a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a>
                        </div>
                        <div class="content-dtls">
                            <p>{!! Str::limit($post->description, 350) !!}<a href="{{ route('article',[$post->id,$post->slug]) }}"> বিস্তারিত</a></p>
                        </div>
                    </div>
                </div>

                @else
                @if($key == 1)

                <div class="col-md-6 col-sm-6">
                    @endif
                    <div class="image-title border">
                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt=" {{ $post->title }} " />
                        <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a></h4>
                    </div>

                    @if($loop->last)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="more-news">
                                <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
        </div>

        @endif

        @if($keys == 3)
        <div class="col-md-4 col-sm-4">

            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(3) as $key => $post)
            @if($key == 0)
            <div class="middle_news">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="image-title border">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif

        {{-- Next  --}}


    </div>
    @endforeach
</div>


<div class="row">
    @if(!empty($second_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif

    @if(!empty($third_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif
</div>

<div class="row">
    @foreach ($category_posts as $keys => $category_post)

    <div class="section-three">
        @if($keys == 4)

        <div class="col-md-8 col-sm-8">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}"> {{ $category_post->name }} </a>
            </div>
            <div class="row">
                @foreach($category_post->posts->take(7) as $key => $post)
                @if($key == 0)
                <div class="col-md-6 col-sm-6">
                    <div class="leadnews">
                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                        <div class="hadding_1">
                            <a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a>
                        </div>
                        <div class="content-dtls">
                            <p>{!! Str::limit($post->description, 350) !!}<a href="{{ route('article',[$post->id,$post->slug]) }}"> বিস্তারিত</a></p>
                        </div>
                    </div>
                </div>

                @else
                @if($key == 1)

                <div class="col-md-6 col-sm-6">
                    @endif
                    <div class="image-title border">
                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt=" {{ $post->title }} " />
                        <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a></h4>
                    </div>

                    @if($loop->last)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="more-news">
                                <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
        </div>

        @endif

        @if($keys == 5)
        <div class="col-md-4 col-sm-4">

            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(3) as $key => $post)
            @if($key == 0)
            <div class="middle_news">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="image-title border">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif

        {{-- Next  --}}


    </div>
    @endforeach
</div>

<div class="row">
    @if(!empty($second_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif

    @if(!empty($third_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif
</div>

<div class="section-six">
    @foreach ($category_posts as $keys => $category_post)
    @if($keys == 6)
    <div class="catagory-title">
        <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
    </div>
    <div class="row">
        @foreach($category_post->posts->take(8) as $key => $post)

        @if($key==0)
        <div class="col-md-3 col-sm-3">

            <div class="middle_news">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post->image) }}" alt=" ক্রিকেট নয়, আনুশকাই কোহলির সব" />
                <h4 class="hadding_2"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }}</a> </h4>
            </div>

        @elseif($key==1)

            <div class="middle_news">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post->image) }}" alt=" ক্রিকেট নয়, আনুশকাই কোহলির সব" />
                <h4 class="hadding_2"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }}</a> </h4>
            </div>

        </div>
        @else

        @if($key==2)
        <div class="col-md-5 col-sm-5">

            <div class="leadnews">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post->image) }}" alt=" ৩৪৭ করেও নিউজিল্যান্ডের কাছে হারল ভারত " />
                <div class="hadding_1">
                    <a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a>
                </div>
                <div class="content-dtls">
                    <p>{!! Str::limit($post->description, '250') !!}<a href="{{ route('article',[$post->id,$post->slug]) }}"> বিস্তারিত</a>
                </div>
            </div>
        </div>
        @else
        @if($key==3)
        <div class="col-md-4 col-sm-4">
            @endif
            <div class="image-title border">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post->image) }}" alt=" বিগ ব্যাশের ক্রিকেটার হারালেন শারাপোভাকে!" />
                <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }}</a></h4>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
        @endif
        @endforeach
    </div>
    @endif
    @endforeach
</div>

<div class="row">
    @if(!empty($second_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif

    @if(!empty($third_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif
</div>

 <div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="catagory-title">
            <i class="fa fa-camera"></i> ফটোগ্যালারী
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


            <div class="carousel-inner" role="listbox">
                @foreach($p_galleries as $key => $p_gallery)
                <div class="item {{ $key == 0 ? 'active' : '' }}">
                    <img class="lazyload" src="{{ url($p_gallery->image) }}"  alt="{{ $p_gallery->title }}" />
                    <h4 class="Photo_Caption"><a href="{{ route('gallery', $p_gallery->id) }}">{{ $p_gallery->title }}</a></h4>
                    <div class="carousel-caption"></div>
                </div>
                @endforeach
            </div>

            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="catagory-title">
        <i class="fa fa-video-camera"></i> ভিডিও গ্যালারী </div>
        <div class="row">
            @foreach($v_galleries as $v_gallery)
            <div class="col-md-6 col-sm-6 video">
                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                    <x-embed url="{{ $v_gallery->embed_code }}" />
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="add">
            <a href="http://themesbazar.com/" target="_blank"><img alt="" src="{{ asset('public/frontend') }}/others/uploads/Media/PBA0FE_biggapon.gif" style="height:auto; width:100%" /></a>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="add">
            <a href="http://themesbazar.com/" target="_blank"><img alt="" src="{{ asset('public/frontend') }}/others/uploads/Media/PBA0FE_biggapon.gif" style="height:auto; width:100%" /></a>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($category_posts as $keys => $category_post)

    <div class="section-three">
        @if($keys == 7)

        <div class="col-md-8 col-sm-8">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}"> {{ $category_post->name }} </a>
            </div>
            <div class="row">
                @foreach($category_post->posts->take(7) as $key => $post)
                @if($key == 0)
                <div class="col-md-6 col-sm-6">
                    <div class="leadnews">
                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                        <div class="hadding_1">
                            <a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a>
                        </div>
                        <div class="content-dtls">
                            <p>{!! Str::limit($post->description, 350) !!}<a href="{{ route('article',[$post->id,$post->slug]) }}"> বিস্তারিত</a></p>
                        </div>
                    </div>
                </div>

                @else
                @if($key == 1)

                <div class="col-md-6 col-sm-6">
                    @endif
                    <div class="image-title border">
                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt=" {{ $post->title }} " />
                        <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a></h4>
                    </div>

                    @if($loop->last)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="more-news">
                                <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
        </div>

        @endif

        @if($keys == 8)
        <div class="col-md-4 col-sm-4">

            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(3) as $key => $post)
            @if($key == 0)
            <div class="middle_news">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="image-title border">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}" alt="{{ $post->title }}" />
                <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif

        {{-- Next  --}}


    </div>
    @endforeach
</div>

<div class="row">
    @if(!empty($second_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif

    @if(!empty($third_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif
</div>

<div class="row">
    @foreach ($category_posts as $keys => $category_post)
    <div class="section-eight">
        @if($keys == 9)
        <div class="col-md-4 col-sm-4">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(6) as $key => $post)
            @if($key == 0)
            <div class="middle_news_1">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}"  alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="hadding_2 border-again">
                <a href="{{ route('article',[$post->id,$post->slug]) }}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> {{ $post->title }} </a>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif
    </div>
    @endforeach


    @foreach ($category_posts as $keys => $category_post)
    <div class="section-eight">
        @if($keys == 10)
        <div class="col-md-4 col-sm-4">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(6) as $key => $post)
            @if($key == 0)
            <div class="middle_news_1">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}"  alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="hadding_2 border-again">
                <a href="{{ route('article',[$post->id,$post->slug]) }}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> {{ $post->title }} </a>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif
    </div>
    @endforeach


    @foreach ($category_posts as $keys => $category_post)
    <div class="section-eight">
        @if($keys == 11)
        <div class="col-md-4 col-sm-4">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(6) as $key => $post)
            @if($key == 0)
            <div class="middle_news_1">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}"  alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="hadding_2 border-again">
                <a href="{{ route('article',[$post->id,$post->slug]) }}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> {{ $post->title }} </a>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif
    </div>
    @endforeach
</div>

<div class="row">
    @if(!empty($second_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif

    @if(!empty($third_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif
</div>

<div class="section-six">
    @foreach ($category_posts as $keys => $category_post)
    @if($keys == 12)
    <div class="catagory-title">
        <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
    </div>
    <div class="row">
        @foreach($category_post->posts->take(8) as $key => $post)

        @if($key==0)
        <div class="col-md-3 col-sm-3">

            <div class="middle_news">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post->image) }}" alt=" ক্রিকেট নয়, আনুশকাই কোহলির সব" />
                <h4 class="hadding_2"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }}</a> </h4>
            </div>

        @elseif($key==1)

            <div class="middle_news">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post->image) }}" alt=" ক্রিকেট নয়, আনুশকাই কোহলির সব" />
                <h4 class="hadding_2"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }}</a> </h4>
            </div>

        </div>
        @else

        @if($key==2)
        <div class="col-md-5 col-sm-5">

            <div class="leadnews">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post->image) }}" alt=" ৩৪৭ করেও নিউজিল্যান্ডের কাছে হারল ভারত " />
                <div class="hadding_1">
                    <a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }} </a>
                </div>
                <div class="content-dtls">
                    <p>{!! Str::limit($post->description, '250') !!}<a href="{{ route('article',[$post->id,$post->slug]) }}"> বিস্তারিত</a>
                </div>
            </div>
        </div>
        @else
        @if($key==3)
        <div class="col-md-4 col-sm-4">
            @endif
            <div class="image-title border">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post->image) }}" alt=" বিগ ব্যাশের ক্রিকেটার হারালেন শারাপোভাকে!" />
                <h4 class="hadding_3"><a href="{{ route('article',[$post->id,$post->slug]) }}"> {{ $post->title }}</a></h4>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
        @endif
        @endforeach
    </div>
    @endif
    @endforeach
</div>


<div class="row">
    @if(!empty($second_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif

    @if(!empty($third_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif
</div>

<div class="row">
    @foreach ($category_posts as $keys => $category_post)
    <div class="section-eight">
        @if($keys == 13)
        <div class="col-md-4 col-sm-4">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(6) as $key => $post)
            @if($key == 0)
            <div class="middle_news_1">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}"  alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="hadding_2 border-again">
                <a href="{{ route('article',[$post->id,$post->slug]) }}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> {{ $post->title }} </a>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif
    </div>
    @endforeach


    @foreach ($category_posts as $keys => $category_post)
    <div class="section-eight">
        @if($keys == 14)
        <div class="col-md-4 col-sm-4">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(6) as $key => $post)
            @if($key == 0)
            <div class="middle_news_1">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}"  alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="hadding_2 border-again">
                <a href="{{ route('article',[$post->id,$post->slug]) }}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> {{ $post->title }} </a>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif
    </div>
    @endforeach


    @foreach ($category_posts as $keys => $category_post)
    <div class="section-eight">
        @if($keys == 15)
        <div class="col-md-4 col-sm-4">
            <div class="catagory-title">
                <a href="{{ route('category.post',$category_post->slug) }}">{{ $category_post->name }} </a>
            </div>
            @foreach($category_post->posts->take(6) as $key => $post)
            @if($key == 0)
            <div class="middle_news_1">
                <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$post['image']) }}"  alt="{{ $post->title }}" />
                <h4 class="hadding_1"><a href="{{ route('article',[$post->id,$post->slug]) }}">{{ $post->title }}</a></h4>
            </div>
            @else
            <div class="hadding_2 border-again">
                <a href="{{ route('article',[$post->id,$post->slug]) }}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> {{ $post->title }} </a>
            </div>
            @if($loop->last)
            <div class="row">
                <div class="col-md-12">
                    <div class="more-news">
                        <a href="{{ route('category.post',$category_post->slug) }}"> আরো খবর <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif
    </div>
    @endforeach
</div>

<div class="row">
    @if(!empty($second_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif

    @if(!empty($third_ads))
        <div class="col-md-6 col-sm-6">
            <div class="add">
                <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
            </div>
        </div>
    @endif
</div>


@endsection

@push('js')

@endpush

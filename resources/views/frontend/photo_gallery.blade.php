@extends('layouts.frontend.app')

@section('title')
    {{ $photo_gallery->title }}
@endsection

@push('css')

@endpush

@section('content')

    <?php

    $banglaDate = date("Y-m-d H:i ", strtotime($photo_gallery->created_at));

    $search_array=array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ",");

    $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");

    // convert all bangle char to English char
    $date = str_replace($search_array, $replace_array, $banglaDate);

    ?>

    <section class="singlepage-section">
        <div class="row">
            <div class="col-md-8">
                <div class="single-cat-info">
                    <div class="single-cat-home">
                        <a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> প্রচ্ছদ </a>
                    </div>
                    <div class="single-cat-cate">
                        <a href="#"><i class="fa fa-bars" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div id="divToPrint">
                    <div class="single-title">
                        @if(!empty($second_ads))
                            <div class="add">
                                <a href="{{ $second_ads->link }}" target="_blank"><img alt="" src="{{ url($second_ads->image) }}" style="height:auto; width:100%" /></a>
                            </div>
                        @endif
                        <h3> {{ $photo_gallery->title }} </h3>
                    </div>
                    <div class="sgl-page-views-count">
                        <ul>
                            <li><i class="fa fa-user" aria-hidden="true"></i> </li>
                            <li> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $date }} </li>
                        </ul>
                    </div>
                    <div class="single-img">
                        <img class="lazyload" src="{{ url($photo_gallery->image) }}" alt="">
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="fb-comments" data-href="" data-numposts="5" style="width:100%"></div>
                </div>
                <div class="fix"></div>
                @if($related_photo_galleries->count() > 0)
                    <div class="sgl-cat-tittle" style="overflow:hidden"> এ জাতীয় আরো খবর </div>
                    <div class="row">
                        @foreach($related_photo_galleries as $related_photo_gallery)
                            <div class="col-sm-4 col-md-4">
                                <div class="Name-again box-shadow">
                                    <div class="image-again">
                                        <a href="{{ route('gallery',$related_photo_gallery->id) }}"><img class="lazyload" src="{{ url( $related_photo_gallery->image )  }}"  alt="{{ $related_photo_gallery->title }}"></a>
                                        <h4 class="sgl-hadding"> <a href="{{ route('gallery',$related_photo_gallery->id) }}"> {{ $related_photo_gallery->title }} </a> </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if(!empty($third_ads))
                    <div class="add">
                        <a href="{{ $third_ads->link }}" target="_blank"><img alt="" src="{{ url($third_ads->image) }}" style="height:auto; width:100%" /></a>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="tab-header">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">সর্বশেষ সংবাদ</a></li>
                    </ul>

                    <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                @foreach ($latest_posts as $latest_post)
                                    <div class="small-img tab-border">
                                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$latest_post['image']) }}" alt="{{ $latest_post->title }}" />
                                        <h4 class="hadding_3"><a href="{{ route('article',[$latest_post->id,$latest_post->slug]) }}"> {{ $latest_post->title }} </a></h4>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @if(!empty($first_ads))
                    <div class="add">
                        <a href="{{ $first_ads->link }}" target="_blank"><img alt="" src="{{ url($first_ads->image) }}" style="height:auto; width:100%" /></a>
                    </div>
                @endif
            </div>
        </div>

    </section>

@endsection

@push('js')

@endpush

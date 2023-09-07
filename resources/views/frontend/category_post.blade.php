@extends('layouts.frontend.app')

@section('title')
{{ $category->name }}
@endsection

@push('css')

@endpush

@section('content')

<section class="archive-page-section">
    <div class="row">
    <div class="col-md-12">
        <div class="single-cat-info">
            <div class="single-cat-home">
                <a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> প্রচ্ছদ</a>
            </div>
        <div class="single-cat-cate">
            <a href="{{ route('category.post',$category->slug) }}"><i class="fa fa-bars" aria-hidden="true"></i> {{ $category->name }} </a>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8">
                @foreach($posts as $cat_post)
                <div class="archive_page">
                    <div class="col-md-4">
                        <img class="lazyload" src="{{ asset('public/backend/upload/posts/main_image/'.$cat_post->image) }}" alt="{{ $cat_post->title }} " />
                    </div>
                    <div class="col-md-8">
                        <h4 class="archive_title"><a href="{{ route('article',[$cat_post->id,$cat_post->slug]) }}"> {{ $cat_post->title }} </a></h4>
                        <p>{!! Str::limit($cat_post->description, 200) !!}<a href="{{ route('article',[$cat_post->id,$cat_post->slug]) }}"> বিস্তারিত</a>
                    </div>
                </div>
                @endforeach
                <div class="pagination-container" style="margin-top:-10px; overflow:hidden">
                <nav class="pagination">
                    {{ $posts->links() }}
                </nav>
                </div>

            </div>

            @include('layouts.frontend.partial.right_sidebar')

        </div>
    </div>
    </div>
    </section>

@endsection

@push('js')

@endpush

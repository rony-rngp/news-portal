<div class="col-md-4 col-sm-4">
    <div class="tab-header">
    <div class="catagory-title">সর্বশেষ সংবাদ</div>


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
    </div>

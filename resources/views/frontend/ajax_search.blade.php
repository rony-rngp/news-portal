
    <style>
        ul {
            list-style-type: none;
        }
    </style>
<ul>
    @forelse($s_posts as $s_post)
        <a href="{{ route('article',[$s_post->id, $s_post->slug]) }}">
            <li style="float:left; margin-top: 3px">
                <img width="40px" style="float: left" src="{{ asset('public/backend/upload/posts/main_image/'.$s_post->image) }}">
                <strong>{{ \Illuminate\Support\Str::limit($s_post->title, 25) }}</strong>
            </li>
        </a>
        @empty
        <li style="float:left; margin-top: 3px">
            <strong style="color: red"><i>Data not found..</i></strong>
        </li>

    @endforelse
</ul>

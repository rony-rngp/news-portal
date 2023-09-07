<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;


class HomeController extends Controller
{
    public function index(){
        $data['page'] = 'index';
        $data['rand_top_posts'] = Post::where('status', 1)->inRandomOrder()->orderBy('id', 'desc')->take(3)->get();
        $rand_top_sec__posts = Post::where('status', 1)->inRandomOrder()->orderBy('id', 'desc')->take(6)->get()->toArray();
        $data['rand_top_sec_posts_chunk'] = array_chunk($rand_top_sec__posts, 3);
        $data['category_posts'] = Category::with('posts')->where('status',1)->orderBy('id', 'asc')->get();
        $data['p_galleries'] = PhotoGallery::where('status', 1)->latest()->get();
        $data['v_galleries'] = VideoGallery::where('status', 1)->get();
        return view('frontend.home', $data);
    }

    public function category_post($slug){
        Paginator::useBootstrap();
        $data['category'] = Category::where('slug', $slug)->firstOrFail();
        $data['posts'] = Post::with('category')->where('category_id',$data['category']->id)->where('status',1)->latest()->paginate(10);
        return view('frontend.category_post',$data);
    }

    public function article($id){
        $data['latest_posts'] = Post::where('status', 1)->latest()->take(10)->get();
        $data['post'] = Post::with('category')->where(['id'=>$id])->where('status',1)->firstOrFail();
        $data['related_posts'] = Post::where('category_id', $data['post']->category_id)->where('id', '!=', $id)->where('status',1)->inRandomOrder()->take(6)->get();
        return view('frontend.single_post',$data);
    }

    public function search(Request $request){
        if($request->search == ''){
            return redirect()->back();
        }
        Paginator::useBootstrap();
        $data['query'] = $request->input('search');
        $data['posts'] = Post::where('title','LIKE','%'.$request->search.'%')->where('status',1)->latest()->paginate(10);
        return view('frontend.search',$data);

    }

    public function ajax_search(Request $request)
    {
        $s_posts = Post::where('title','LIKE','%'.$request->search.'%')->where('status',1)->take(5)->latest()->get();
        return view('frontend.ajax_search', compact('s_posts'));
    }

    public function search_date(Request $request){
        $this->validate($request,[
            'form' => 'required|date',
            'to' => 'required|date'
        ]);

        $form = date('Y-m-d', strtotime($request->form));
        $to = date('Y-m-d', strtotime($request->to));

        Paginator::useBootstrap();
        $data['posts'] = Post::whereBetween('date',[$form, $to])->where('status',1)->latest()->paginate(10);
        return view('frontend.search',$data);
    }

    public function gallery($id){
        $data['latest_posts'] = Post::where('status', 1)->latest()->take(10)->get();
        $data['photo_gallery'] = PhotoGallery::where('id', $id)->where('status', 1)->firstOrFail();
        $data['related_photo_galleries'] = PhotoGallery::where('id', '!=', $id)->where('status',1)->inRandomOrder()->take(6)->get();
        return view('frontend.photo_gallery',$data);
    }
}

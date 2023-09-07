<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function show(){
        $posts = Post::with('category')->latest()->get();
        return view('backend.post.view_post', compact('posts'));
    }

    public function add(){
        $categories = Category::where('status',1)->get();
        return view('backend.post.add_post', compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|min:5',
            'category_id' => 'required',
            'description' => 'required|min:10'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = make_slug($request->title);
        $post->description = $request->description;
        $post->date = date('Y-m-d',strtotime(Carbon::today()));
        $post->hot_news = 1;

        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            //----Resize Main Image----
            $upload_path = 'public/backend/upload/posts/main_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(750, 418)->save($image_url);
            //----Home First Image-----
            $upload_path = 'public/backend/upload/posts/home_first_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(452, 252)->save($image_url);
            //----Home Secoend Post With Category Image-----
            $upload_path = 'public/backend/upload/posts/category_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(257, 143)->save($image_url);
            //----List Image-----
            $upload_path = 'public/backend/upload/posts/list_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(114, 64)->save($image_url);
            //----Home Page Category Wise 1s Post Image-----
            $upload_path = 'public/backend/upload/posts/h_p_c_f_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(354, 197)->save($image_url);


            $post->image = $image_fill_name;
        }

        $post->save();
        $notification = array(
            'messege' => "Post Added Successfully :)",
            'alert-type' => 'success'
        );
        return redirect()->route('view.post')->with($notification);
    }

    public function edit($id){
        $post = Post::find($id);
        $categories = Category::where('status',1)->get();
        return view('backend.post.edit_post', compact('post', 'categories'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|min:5',
            'category_id' => 'required',
            'description' => 'required|min:10'
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = make_slug($request->title);
        $post->description = $request->description;

        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            //----Resize Main Image----
            $upload_path = 'public/backend/upload/posts/main_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(750, 418)->save($image_url);
            if(!empty($post->image)){
                unlink('public/backend/upload/posts/main_image/'.$post->image);
            }
            //----Home First Image-----
            $upload_path = 'public/backend/upload/posts/home_first_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(452, 252)->save($image_url);
            if(!empty($post->image)){
                unlink('public/backend/upload/posts/home_first_image/'.$post->image);
            }
            //----Home Secoend Post With Category Image-----
            $upload_path = 'public/backend/upload/posts/category_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(257, 143)->save($image_url);
            if(!empty($post->image)){
                unlink('public/backend/upload/posts/category_image/'.$post->image);
            }
            //----List Image-----
            $upload_path = 'public/backend/upload/posts/list_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(114, 64)->save($image_url);
            if(!empty($post->image)){
                unlink('public/backend/upload/posts/list_image/'.$post->image);
            }
            //----Home Page Category Wise 1s Post Image-----
            $upload_path = 'public/backend/upload/posts/h_p_c_f_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(354, 197)->save($image_url);
            if(!empty($post->image)){
                unlink('public/backend/upload/posts/h_p_c_f_image/'.$post->image);
            }


            $post->image = $image_fill_name;
        }

        $post->save();
        $notification = array(
            'messege' => "Post Updated Successfully :)",
            'alert-type' => 'success'
        );
        return redirect()->route('view.post')->with($notification);
    }

    public function destroy($id){
        $post = Post::find($id);
        if(!empty($post->image)){
            unlink('public/backend/upload/posts/main_image/'.$post->image);
            unlink('public/backend/upload/posts/home_first_image/'.$post->image);
            unlink('public/backend/upload/posts/category_image/'.$post->image);
            unlink('public/backend/upload/posts/list_image/'.$post->image);
            unlink('public/backend/upload/posts/h_p_c_f_image/'.$post->image);
        }
        $post->delete();
        $notification = array(
            'messege' => "Post Deleted Successfully :)",
            'alert-type' => 'success'
        );
        return redirect()->route('view.post')->with($notification);
    }

    public function status(Request $request)
    {
        $post = Post::find($request->id);
        $post->status = $request->status;
        $post->save();
        return response()->json(['messege' => 'success']);
    }
}
